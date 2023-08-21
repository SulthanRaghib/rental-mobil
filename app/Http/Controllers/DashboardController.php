<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('contents.dashboard', [
            'title' => 'Dashboard',
        ]);
    }

    public function blank()
    {
        return view('contents.pages.blank', [
            'title' => 'Blank',
        ]);
    }
}
