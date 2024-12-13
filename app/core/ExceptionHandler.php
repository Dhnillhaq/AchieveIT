<?php

class ExceptionHandler
{

    public static function handle(Throwable $exception)
    {

        Logger::error(sprintf(
            "Unhandled Exception: %s in %s on line %d",
            $exception->getMessage(),
            $exception->getFile(),
            $exception->getLine()
        ), [
            'trace' => $exception->getTraceAsString()
        ]);

        $statusCode = match (true) {
            $exception instanceof ValidationException => 400,
            $exception instanceof AuthenticationException => 401,
            $exception instanceof AuthorizationException => 403,
            $exception instanceof ResourceNotFoundException => 404,
            default => 500
        };

        // Set HTTP response code
        http_response_code($statusCode);

        // Render error view
        self::renderErrorView($exception, $statusCode);
        exit;
    }

    private static function renderErrorView(Throwable $exception, int $statusCode)
    {

        // Prepare error data
        $errorData = [
            'message' => $exception->getMessage(),
            'code' => $statusCode,
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => APP_DEBUG ? $exception->getTraceAsString() : null
        ];

        // Render view
        extract($errorData);
        include __DIR__ . '../views/default.php';
    }
}