<?php

namespace App\Http\Controllers\Security;


use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        return view('layouts.security');
    }
}
