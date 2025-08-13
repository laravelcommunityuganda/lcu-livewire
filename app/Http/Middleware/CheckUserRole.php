<?php

namespace App\Http\Middleware;

use App\Enum\UserRolesEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserRole
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next, string $role, $guard = null): Response
  {
    $authGuard = Auth::guard($guard);

    if ($authGuard->guest()) abort(403);

    $roles = is_array($role) ? $role : explode('|', $role);

    if (!$authGuard->user()->hasAnyRole($roles)) abort(403);

    return $next($request);
  }
}
