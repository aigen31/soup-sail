<?php

namespace App\Http\Middleware\Privileges;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanOrderServiceAccess
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    if (!$request->user()->role->privileges->can_order_service) {
      return redirect('control');
    }

    return $next($request);
  }
}
