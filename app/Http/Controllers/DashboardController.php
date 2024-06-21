<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        return view('app.dashboard.index', compact('user'));
    }
}
