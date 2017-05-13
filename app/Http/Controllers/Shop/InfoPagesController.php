<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InfoPagesController extends Controller
{
    public function about()
    {
        return view('shop.infoPages.about');
    }

    public function contacts()
    {
        return view('shop.infoPages.contacts');
    }

    public function partners()
    {
        return view('shop.infoPages.partners');
    }

    public function agreement()
    {
        return view('shop.infoPages.agreement');
    }

    public function freefood()
    {
        return view('shop.infoPages.freefood');
    }
}
