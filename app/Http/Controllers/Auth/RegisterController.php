<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;  // TO USE User Model
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index () {
        return view('auth.register');
    }
    
    public function store (Request $request) {  // $request will have $_POST['...']
        // validate => Store => redirect(sign in) user
        
        $this->validate($request, [
            'name' => 'required|max:255', // OR ['required', 'max:255']
            'username' => 'required|max:10',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed' // This will look for password match with name='password_confirmation'
        ]);
        
        // STORING USER this is using Models/User.php/
        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        
        // Sign in Your User Here => Way 1] use Illuminate\Support\Facades\Auth || way 2] auth()->user();
        
        /*
        one way
        auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);
        */
        
        // Better way
        auth()->attempt($request->only('email', 'password'));
        
        
        
        
        // Redirecting User
        return redirect()->route('dashboard');
        // OR USE redirect('/posty/dashboard')
        
        
    }
    
    
}
