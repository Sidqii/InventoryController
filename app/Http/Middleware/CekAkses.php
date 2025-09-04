<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CekAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permissions): Response
    {
        $user = Auth::user();

        if (!$user || !$user->role) {
            abort(403, 'Tidak Terautentikasi');
        }

        if (!$user->role->permissions->contains('hak_akses', $permissions)) {
            abort(403, 'Tidak ada hak akses');
        }

        return $next($request);
    }
}
