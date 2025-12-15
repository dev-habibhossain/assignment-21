<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        $desc_blogs = $blogs->sortByDesc('created_at');

        $categories = Category::withCount('blogs')->get();

        return view('blogs.blogs', compact('blogs','desc_blogs','categories'));
    }

    public function show($id)
    {
        // Assuming you'll fetch and pass the blog data here later
        $blog = Blog::findOrFail($id); 
        return view('blogs.show', ['blog' => $blog]);
    }
}
