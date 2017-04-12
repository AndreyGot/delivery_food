<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 27.03.2017
 * Time: 14:20
 */

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;


class CheckAdmin
{
    public function handle($request, \Closure $next)
    {
        if (Auth::user() &&  Auth::user()->userStatus->name == 'SUPER_ADMIN') {
            return $next($request);
        }

        return redirect()->route('admin_login_form');
    }
}