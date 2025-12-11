<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.blogs');
    }

    public function show($id)
    {
        return view('blogs.show', ['id' => $id]);
    }
}
