<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->editor == 0) {
            return redirect('/')
            ->with('status', ['type' => 'error', 'message' => 'Usted no debió de intentar hacer eso >:-(']);
        } else {
            return $next($request);
        }
    }
}
