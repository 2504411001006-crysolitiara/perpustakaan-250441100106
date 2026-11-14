<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

try {
    if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
        require $maintenance;
    }

    require __DIR__.'/../vendor/autoload.php';

    /** @var Application $app */
    $app = require_once __DIR__.'/../bootstrap/app.php';

    $app->handleRequest(Request::capture());

} catch (\Throwable $e) {
    error_log('LARAVEL ORIGINAL ERROR: '.$e::class);
    error_log('LARAVEL ORIGINAL MESSAGE: '.$e->getMessage());
    error_log('LARAVEL ORIGINAL FILE: '.$e->getFile().':'.$e->getLine());

    http_response_code(500);
    echo 'Internal Server Error. Check Vercel Runtime Logs.';
}