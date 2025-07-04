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
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        if (!Auth::user()->hasPermissionTo(UserPermissionsEnum::from($permission))) {
            abort(403);
        }
        return $next($request);
    }
}
