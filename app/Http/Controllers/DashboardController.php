<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
public function index()
{
    if (Auth::check()) {
        $role = Auth::user()->role_id;

        if ($role == 2) {
            return view('contents.homepage');
        } else if ($role == 1) {
            return view('contents.dashboard', [
                'title' => 'Dashboard',
            ]);
        }
    }

    // Handle cases where the user is not authenticated or the role doesn't match.
    return view('contents.homepage');
}

}
