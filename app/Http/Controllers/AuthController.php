<?php

namespace App\Http\Controllers;

use App\Models\AuthorUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 

class AuthController extends Controller
{
    
    // Register Function
    public function register()
    {
        return view('pages.auth.register');
    }
    public function userRegister(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:author_users,email|max:255', 
            'password' => 'required', 
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);
        $imagePath = null;
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('avatars', 'public');
        }

        AuthorUser::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'], 
            'image' => $imagePath,
            'role' => 'author',
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! You can now log in.');
    }

    // Login Function
    public function login()
    {
        return view('pages.auth.login');
    }
    public function userLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $user = AuthorUser::where('email', $credentials['email'])->where('password', $credentials['password'])->first();

        if ($user) {
            $request->session()->regenerate(); 
            Session::put(['user_id' => $user->id, 'role' => $user->role]);

            
            if ($user->role === 'admin') {
                return redirect()->route('admin.home')->with('success', 'Welcome to the Admin Dashboard!');
            }
            if ($user->role === 'author') {
                return redirect()->route('author.home')->with('success', 'Welcome to the Author Dashboard!');
            }
            
            return redirect()->intended('/'); 
        }

    }


    public function logOut(Request $request)
    {
        $request->session()->forget('user_id');
        $request->session()->forget('role');
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}
