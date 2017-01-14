<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin extends \Backpack\Base\app\Http\Middleware\Admin
{

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure                 $next
     * @param string|null              $guard
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->guest() || !$request->user()->hasRole('Admin')) {
            abort(403);
        }

        return parent::handle($request, $next, $guard);
    }
}
