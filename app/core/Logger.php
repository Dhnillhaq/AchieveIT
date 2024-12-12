<?php

class Logger
{
    private final static $logDir = __DIR__ . '/../../storage/logs/';
    private static $logFile;

    public static function init()
    {
        if (!is_dir(self::$logDir)) {
            mkdir(self::$logDir, 0755, true);
        }

        self::$logFile = self::$logDir . date('Y-m-d') . '.log';
    }

    public static function error($message, $context = [])
    {
        if (!self::$logFile) {
            self::init();
        }

        $logEntry = date('[Y-m-d H:i:s]') . $message .
            (!empty($context) ? ' ' . json_encode($context) : '') . PHP_EOL;

        error_log($logEntry, 3, self::$logFile);
    }
}
