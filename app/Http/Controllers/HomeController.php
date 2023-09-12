<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('contents.homepage', [
            'title' => 'Home',
        ]);
    }

    public function blank()
    {
        return view('contents.pages.blank', [
            'title' => 'Blank',
        ]);
    }
}