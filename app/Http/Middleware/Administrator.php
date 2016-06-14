<?php
namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class Administrator - Middleware to redirect non-administrative users.
 */
class Administrator
{

    /**
     * Handle an incoming request.
     *
     * @param Request     $request The incoming request to handle.
     * @param \Closure    $next    The next middleware to execute.
     * @param string|null $guard
     *
     * @return mixed
     */
    public function handle(Request $request, \Closure $next, $guard = null)
    {
        if (!in_array(Auth::user()->role, ['supervisor', 'administrator'])) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect('/items');
            }
        }

        return $next($request);
    }
}
