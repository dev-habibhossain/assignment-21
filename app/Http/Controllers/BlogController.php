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

    public function byCategory(Category $category)
    {
        // Filter the blogs using the category relationship
        $blogs = $category->blogs()->with('category')->get();

        // Refetch categories and recent blogs for the sidebar
        $desc_blogs = Blog::with('category')->latest()->take(5)->get();
        $categories = Category::withCount('blogs')->get();

        // Pass the data back to the same view
        return view('blogs.blogs', compact('blogs', 'desc_blogs', 'categories'));
    }


    public function show($id)
    {
        // Assuming you'll fetch and pass the blog data here later
        $blog = Blog::findOrFail($id); 
        return view('blogs.show', ['blog' => $blog]);
    }
}
