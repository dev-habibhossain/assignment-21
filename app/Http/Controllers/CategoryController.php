<?php
// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use App\Models\Category; // <--- MAKE SURE YOU IMPORT THE MODEL
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Fetch categories and count the associated blogs for each
        $categories = Category::withCount('blogs')->get();
        
        // Pass the categories to the view
        return view('categories.categories', compact('categories'));
    }
}