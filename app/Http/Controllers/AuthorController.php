<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function home()
    {
        return view('author.pages.home');
    }
    public function profile()
    {
        return view('author.pages.profile');
    }
    public function editProfile()
    {
        return view('author.pages.updateProfile');
    }
    public function addBlog()
    {
        return view('author.pages.addBlog');
    }
    public function manageBlogs()
    {
        return view('author.pages.manegeBlogs');
    }
    public function updateBlog($id)
    {
        return view('author.pages.updateBlog', ['id' => $id]);
    }


}
