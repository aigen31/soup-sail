<?php

use App\Http\Middleware\Privileges\CanAllAccess;
use App\Http\Middleware\Privileges\CanCreateTasksAccess;
use App\Http\Middleware\Privileges\CanDelegatePerformer;
use App\Http\Middleware\Privileges\CanDelegatePerformerAccess;
use App\Http\Middleware\Privileges\CanLookAllTasksAccess;
use App\Http\Middleware\Privileges\CanOrderServiceAccess;
use App\Http\Middleware\Privileges\HasPrivilegyMiddleware;
use App\Http\Middleware\Privileges\WalletAccess;
use App\Http\Middleware\Roles\HasRoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
  ->withRouting(
    web: __DIR__ . '/../routes/web.php',
    api: __DIR__ . '/../routes/api.php',
    commands: __DIR__ . '/../routes/console.php',
    health: '/up',
  )
  ->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
      'role' => HasRoleMiddleware::class,
      'privilegy' => HasPrivilegyMiddleware::class,
    ]);
  })
  ->withExceptions(function (Exceptions $exceptions) {
    //
  })->create();
