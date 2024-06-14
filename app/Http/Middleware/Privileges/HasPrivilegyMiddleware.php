<?php

namespace App\Http\Middleware\Privileges;

use App\Http\Controllers\UserController;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HasPrivilegyMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next, string $privilegy): Response
  {
    if (!UserController::hasPrivilegy($privilegy)) {
      return redirect('control');
    }

    return $next($request);
  }
}
