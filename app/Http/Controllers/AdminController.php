<?php

namespace App\Http\Controllers;
use Validator, Auth;
use Illuminate\Http\Request;
use Illuminate\support\Facades\File;

class AdminController extends Controller
{
    public function authenticate(Request $request)
    {
        $this ->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request -> password], $request->get('remember')))
        {
            return redirect()->route('admin.dashboard');
        }
        else {
            session()->flash('error','Either Email/Password in incorrect');
            return back()->withInput($request->only('email'));
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
