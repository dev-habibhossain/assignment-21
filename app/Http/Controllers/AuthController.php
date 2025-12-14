<?php

namespace App\Http\Controllers;

use App\Models\AuthorUser;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    
    public function register()
    {
        return view('pages.auth.register');
    }
    public function login()
    {
        return view('pages.auth.login');
    }
    public function loginPost(Request $request)
    {
        // Validate the request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = AuthorUser::where('email', $credentials['email'])->where('password', $credentials['password'])->first();

        session(['user_id' => $user->id, 'role' => $user->role]);

        $isAdmin = AuthorUser::where('role', 'admin')->first();
        $isAuthor = AuthorUser::where('role', 'author')->first();
        if($user){
            // Authentication passed...
            if($isAdmin){
                return redirect()->route('admin.home');
            }
            if($isAuthor){
                return redirect()->route('author.home');
            }
        }
    }
}
