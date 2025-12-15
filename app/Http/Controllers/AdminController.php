<?php

namespace App\Http\Controllers;

use App\Models\AuthorUser;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category', 'author')->latest()->get();
        $totalUsers = AuthorUser::where('role', 'author')->count(); 
        $categories = Category::all();
        return view('admin.pages.home', compact('blogs', 'categories', 'totalUsers'));
    }


    public function profile()
    {
        $user = AuthorUser::find();
        dd( $user);
        return view('admin.pages.profile', compact('user'));
    }

    public function editProfile()
    {
        return view('admin.pages.updateProfile');
    }

    // Posts management pages (stubs)
    public function postsIndex()
    {
        return view('admin.pages.manegeBlogs');
    }

    public function postsCreate()
    {
        $categories = Category::all();
        return view('admin.pages.addBlog', compact('categories'));
    }
    //post store method
   public function store(Request $request)
    {
        // --- 1. Validation ---
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|max:500', 
            'full_desc' => 'required',
            'image_file' => 'nullable|image|max:2048', 
            'image_url' => 'nullable|url',
            'tags' => 'nullable|string|max:255',
        ]);

        // --- 2. Determine Image Path ---
        $imagePath = 'https://via.placeholder.com/1200x600?text=Blog+Image'; 

        if ($request->hasFile('image_file')) {
            $imagePath = $request->file('image_file')->store('blog_images', 'public');
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->input('image_url');
        }
        
        // --- 3. Determine auto-populated fields ---
        
        // Retrieve the user ID from the session as requested
        $currentAuthorId = $request->session()->get('user_id'); // Recommended way to get session data in controller

        // --- IMPORTANT FIX: Retrieve the user name using the ID ---
        $author = AuthorUser::find($currentAuthorId);

        // Safety check (If user is not found or ID is missing, we must handle it)
        if (!$author) {
            return redirect()->back()->withInput()->withErrors(['session_error' => 'User session data is invalid. Please log in again.']);
        }
        
        $authorName = $author->name; // Assuming the name column on AuthorUser is 'name'

        // Handle published status and date
        $isPublished = $request->has('published');
        $publishedDate = $isPublished ? Carbon::now() : null;
        
        // --- 4. Create the Blog Post ---
        $blog = Blog::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'user_id' => $currentAuthorId, // Value taken from session
            'author_name' => $authorName, // <-- FIX: Added author_name
            'summary' => $request->excerpt, 
            'full_desc' => $request->full_desc, 
            'image' => $imagePath,
            'read_time' => 5,
            'published_date' => $publishedDate,
            'is_featured' => false,
        ]);
        
        // 5. Redirect
        return redirect()->route('admin.home')->with('success', 'Blog post created successfully!');
    }

    public function postsEdit($id)
    {
        return view('admin.pages.updateBlog', ['id' => $id]);
    }

    // Banner management
    public function bannerIndex()
    {
        // Get current banner or create default
        $banner = [
            'id' => 1,
            'image' => 'https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=1200&h=400&fit=crop',
            'heading' => 'Welcome to Our Blog',
            'subheading' => 'Explore amazing stories and insights'
        ];
        return view('admin.pages.addBanner', ['banner' => $banner, 'isEdit' => true]);
    }

    public function bannerCreate()
    {
        // If banner doesn't exist, show create form
        $banner = null;
        return view('admin.pages.addBanner', ['banner' => $banner, 'isEdit' => false]);
    }

    public function bannerStore(Request $request)
    {
        // Handle storing banner data (to be connected to database)
        return redirect()->route('admin.banner.index')->with('success', 'Banner saved successfully!');
    }

    // Categories management
    public function categoriesIndex()
    {
        // Get categories (stub for now)
        $categories = []; // Fetch from DB later
        return view('admin.pages.manageCategories', ['categories' => $categories]);
    }

    public function categoriesCreate()
    {
        return view('admin.pages.newCategories');
    }

    public function categoriesStore(Request $request)
    {
        // Handle storing category data (to be connected to database)
        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
    }
}
