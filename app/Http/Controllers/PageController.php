<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function terms()
    {
        return view('pages.terms');
    }

    public function returns()
    {
        return view('pages.returns');
    }

    public function shipping()
    {
        return view('pages.shipping');
    }

    public function faq()
    {
        return view('pages.faq');
    }
}
