<?php

namespace App\Http\Controllers;

use App\Models\AuthorUser;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    
    // Register Function
    public function register()
    {
        return view('pages.auth.register');
    }
    public function userRegister(Request $request)
    {
        // Validate the request data
        $img = null;
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        AuthorUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'img' => $img,
            'role' => 'author',
        ]);

        return redirect()->route('login');
    }

    // Login Function
    public function login()
    {
        return view('pages.auth.login');
    }
    public function userLogin(Request $request)
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

    // Logout Function
    public function logOut(Request $request)
    {
        $request->session()->forget('user_id');
        $request->session()->forget('role');
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
