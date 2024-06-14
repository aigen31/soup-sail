<?php

namespace App\Http\Middleware\Roles;

use App\Http\Controllers\UserController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class HasRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
      $authRole = UserController::getRole();
      $role = Str::lower($role);

      if ($authRole !== $role) {
        return redirect('control');
      }

      return $next($request);
    }
}
