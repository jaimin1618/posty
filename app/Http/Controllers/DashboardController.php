<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\PostLiked;
use Illuminate\Support\Facades\Mail;


class DashboardController extends Controller
{
    
    public function __construct() {
        $this->middleware(['auth']);
    }
    
    public function index () {
        // To see, You are signed in Use: dd(auth()->user());
        // dd(auth()->user()->name);
        $user = auth()->user();
        
        // // Mail::to('jaimin.chokhawala@gmail.com') OR
        // Mail::to($user)->send(new PostLiked());
        
        return view('dashboard');
    }
}
