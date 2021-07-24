<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index () {
        return view('auth.login');
    }
    
    public function store (Request $request) {
        // Sign in user
            
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required' // This will look for password match with name='password_confirmation'
        ]);
        
        // ATTEMPT AUTHENTIFICATION
        if (!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid Login Details');
        }
        return redirect()->route('dashboard');
    }
}
