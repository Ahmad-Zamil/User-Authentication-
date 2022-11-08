<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // echo 'Hello';

        return view('admin.dashboard');
    }
}
