<?php

namespace App\Http\Middleware;

use App\Enum\UserPermissionsEnum;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckUserPermission
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next, string $permission, $guard = null): Response
  {
    $authGuard = Auth::guard($guard);

    if ($authGuard->guest()) abort(403);

    $permissions = is_array($permission) ? $permission : explode('|', $permission);

    if (!$authGuard->user()->hasAnyPermission($permissions)) abort(403);

    return $next($request);
  }
}
