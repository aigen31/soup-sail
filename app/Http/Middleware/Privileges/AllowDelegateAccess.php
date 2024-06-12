<?php

namespace App\Http\Middleware\Privileges;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AllowDelegateAccess
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    if (!$request->user()->role->privileges->allow_delegate_access) {
      return redirect('control');
    }

    return $next($request);
  }
}
