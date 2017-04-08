<?php
/**
 * Created by PhpStorm.
 * User: development
 * Date: 27.03.2017
 * Time: 9:36
 */

namespace App\Http\Controllers\Security;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';


    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function register()
    {
//        $userStatus = new UserStatus();
//        $userStatus->name = 'SUPER_ADMIN';
//        $userStatus->save();
//
//        $admin = new Admin();
//        $admin->name = 'SUPER ADMIN';
//        $admin->email = 'gera8469@gmail.com';
//        $admin->password = bcrypt('123');
//
//        $userStatus->admins[] = $admin;
//        $userStatus->admins()->save($admin);
//        $admin->save();
        return response(__METHOD__);
    }

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    /*protected function guard()
    {
        return Auth::guard('admin');

    }*/
}