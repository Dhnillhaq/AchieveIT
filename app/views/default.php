<h1>Error <?= $code ?></h1>
<p><?= htmlspecialchars($message) ?></p>

<?php if (APP_DEBUG && $trace): ?>
    <pre><?= htmlspecialchars($trace) ?></pre>
<?php endif; ?>