<?php
$envPath = __DIR__ . '/../.env';
$envExamplePath = __DIR__ . '/../.env.example';

// Check if .env exists, if not use .env.example
if (!file_exists($envPath)) {
    if (file_exists($envExamplePath)) {
        copy($envExamplePath, $envPath);
        echo ".env created from .env.example<br>";
    } else {
        die(".env.example not found.");
    }
}

$env = file_get_contents($envPath);

$updates = [
    'DB_CONNECTION' => 'mysql',
    'DB_HOST' => '127.0.0.1',
    'DB_PORT' => '3306',
    'DB_DATABASE' => 'rtyazil1_laravel',
    'DB_USERNAME' => 'rtyazil1_laravel_merkez',
    'DB_PASSWORD' => '"9gPWkqy9PLwWH+t"'
];

foreach ($updates as $key => $value) {
    if (preg_match("/^{$key}=.*/m", $env)) {
        $env = preg_replace("/^{$key}=.*/m", "{$key}={$value}", $env);
    } else {
        $env .= "\n{$key}={$value}";
    }
}

file_put_contents($envPath, $env);
echo ".env updated successfully.";
unlink(__FILE__); // self delete
