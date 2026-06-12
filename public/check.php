<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h1>System Diagnostic</h1>";

echo "<h2>PHP Version</h2>";
echo PHP_VERSION . "<br>";

echo "<h2>.env File</h2>";
if (file_exists(__DIR__ . '/../.env')) {
    echo ".env exists.<br>";
} else {
    echo ".env is MISSING!<br>";
    if (file_exists(__DIR__ . '/../.env.example')) {
        copy(__DIR__ . '/../.env.example', __DIR__ . '/../.env');
        echo "Copied .env.example to .env.<br>";
    }
}

echo "<h2>Storage Permissions</h2>";
$paths = [
    '/../storage',
    '/../storage/framework',
    '/../storage/framework/cache',
    '/../storage/framework/sessions',
    '/../storage/framework/views',
    '/../storage/logs',
    '/../bootstrap/cache',
];

foreach ($paths as $path) {
    $fullPath = __DIR__ . $path;
    if (!file_exists($fullPath)) {
        mkdir($fullPath, 0775, true);
        echo "Created missing directory: $path<br>";
    }
    if (is_writable($fullPath)) {
        echo "$path is writable.<br>";
    } else {
        echo "<span style='color:red'>$path is NOT writable!</span><br>";
    }
}

echo "<h2>Trying to boot Laravel...</h2>";
try {
    require __DIR__.'/../vendor/autoload.php';
    $app = require_once __DIR__.'/../bootstrap/app.php';
    $kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
    echo "Laravel bootstrapped successfully.<br>";
} catch (\Throwable $e) {
    echo "<pre style='color:red'>";
    echo $e->getMessage() . "\n";
    echo $e->getTraceAsString();
    echo "</pre>";
}
