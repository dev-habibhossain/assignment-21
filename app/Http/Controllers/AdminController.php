<?php

namespace App\Http\Controllers;

use App\Models\AuthorUser;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; // <-- ADD THIS for image storage/deletion

class AdminController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('category', 'author')->latest()->get();
        // Assuming your users are in the AuthorUser model and have a 'role' column
        $totalUsers = AuthorUser::where('role', 'author')->count(); 
        $categories = Category::all();
        return view('admin.pages.home', compact('blogs', 'categories', 'totalUsers'));
    }


    public function profile()
    {
        // FIX: The Auth middleware should ensure the user is logged in. Use Auth::user()
        $user = Auth::user(); 
        // dd( $user); // Removed dd()
        return view('admin.pages.profile', compact('user'));
    }

    public function editProfile()
    {
        // Fetch the current user to pre-fill the form
        $user = Auth::user();
        return view('admin.pages.updateProfile', compact('user'));
    }

    // --- READ (Index) ---
    public function postsIndex(Request $request)
    {
        // 1. Get the ID of the currently logged-in Admin/Author from the session
        $currentUserId = $request->session()->get('user_id');
        
        if (!$currentUserId) {
             $blogs = collect(); 
             return view('admin.pages.manegeBlogs', compact('blogs'));
        }
    
        // 2. Fetch all blogs posted by this specific user ID
        $blogs = Blog::with('category', 'author') 
                    ->where('user_id', $currentUserId) 
                    ->latest()
                    ->get();
                    
        return view('admin.pages.manegeBlogs', compact('blogs'));
    }

    // --- CREATE (Form) ---
    public function postsCreate()
    {
        $categories = Category::all();
        return view('admin.pages.addBlog', compact('categories'));
    }

    // --- CREATE (Store) ---
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
        $currentAuthorId = $request->session()->get('user_id');
        $author = AuthorUser::find($currentAuthorId);

        if (!$author) {
            return redirect()->back()->withInput()->withErrors(['session_error' => 'User session data is invalid. Please log in again.']);
        }
        
        $authorName = $author->name;

        // Handle published status and date
        $isPublished = $request->has('published');
        $publishedDate = $isPublished ? Carbon::now() : null;
        
        // --- 4. Create the Blog Post ---
        Blog::create([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'user_id' => $currentAuthorId,
            'author_name' => $authorName, 
            'summary' => $request->excerpt, 
            'full_desc' => $request->full_desc, 
            'image' => $imagePath,
            'read_time' => 5,
            'published_date' => $publishedDate,
            'is_featured' => false,
        ]);
        
        return redirect()->route('admin.posts.index')->with('success', 'Blog post created successfully!');
    }
    
    // --- EDIT (Form) ---
    public function postsEdit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        
        return view('admin.pages.updateBlog', compact('blog', 'categories'));
    }

    // --- UPDATE (Submission) ---
    public function update(Request $request, $id)
    {
        // 1. Validation 
        $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'excerpt' => 'required|max:500', 
            'full_desc' => 'required',
            'image_file' => 'nullable|image|max:2048', 
            'image_url' => 'nullable|url',
            'tags' => 'nullable|string|max:255',
        ]);

        // 2. Find the existing blog post
        $blog = Blog::findOrFail($id);

        $imagePath = $blog->image; 
        
        if ($request->hasFile('image_file')) {
            
            if ($blog->image && strpos($blog->image, 'http') === false) {
                Storage::disk('public')->delete($blog->image);
            }
            $imagePath = $request->file('image_file')->store('blog_images', 'public');
            
        } elseif ($request->filled('image_url')) {
            $imagePath = $request->input('image_url');
            
        } 

        
        $isPublished = $request->has('published');
        
        $publishedDate = $isPublished ? ($blog->published_date ?? Carbon::now()) : null;


        // 5. Update the Blog Post record
        $blog->update([
            'title' => $request->title,
            'category_id' => $request->category_id,
            'summary' => $request->excerpt, 
            'full_desc' => $request->full_desc, 
            'image' => $imagePath,
            'published_date' => $publishedDate,
            'tags' => $request->tags, 
            
        ]);

        // 6. Redirect
        return redirect()->route('admin.posts.index')->with('success', 'Blog post updated successfully!');
    }

    // --- DELETE (Destroy) ---
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        
        
        if ($blog->image && strpos($blog->image, 'http') === false) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Blog post deleted successfully.');
    }


    public function bannerStore(Request $request)
    {
        return redirect()->route('admin.banner.index')->with('success', 'Banner saved successfully!');
    }

    public function categoriesIndex()
    {
        // 1. Fetch all categories
        $categories = Category::latest()->get(); 
        
        // 2. Pass categories to the view
        return view('admin.pages.manageCategories', compact('categories'));
    }

    // --- CREATE (Form) ---
   public function categoriesCreate()
{
    // Make sure 'admin.pages.newCategories' matches 'admin.pages.createCategory'
    return view('admin.pages.newCategories'); 
}

// --- CREATE (Store) ---
public function categoriesStore(Request $request)
{
    // 1. Validation
    $request->validate([
        'name' => 'required|max:255|unique:categories,name',
        'short_desc' => 'nullable|max:500', 
        'image_file' => 'nullable|image|max:2048', 
        'image_url' => 'nullable|url',
    ]);

    // 2. Determine Image Path
    $imagePath = 'https://via.placeholder.com/300x200?text=No+Image';

    if ($request->hasFile('image_file')) {
        $imagePath = $request->file('image_file')->store('category_images', 'public');
    } elseif ($request->filled('image_url')) {
        $imagePath = $request->input('image_url');
    }

    // 3. Create the Category
    Category::create([
        'name' => $request->name,
        'short_desc' => $request->short_desc, // <-- CORRECT: Field is included
        'image' => $imagePath,
    ]);

    return redirect()->route('admin.categories.index')->with('success', 'Category created successfully!');
}

// --- EDIT (Form) ---
public function categoriesEdit($id)
{
    $category = Category::findOrFail($id); 
    return view('admin.pages.updateCategory', compact('category')); 
}


public function categoriesUpdate(Request $request, $id)
{
    
    $request->validate([
        'name' => 'required|max:255|unique:categories,name,'.$id,
        'short_desc' => 'nullable|max:500', 
        'image_file' => 'nullable|image|max:2048', 
        'image_url' => 'nullable|url',
    ]);
    
    $category = Category::findOrFail($id);
    $imagePath = $category->image; 
    
    if ($request->hasFile('image_file')) {
        
        if ($category->image && strpos($category->image, 'http') === false) {
            Storage::disk('public')->delete($category->image);
        }
        $imagePath = $request->file('image_file')->store('category_images', 'public');
        
    } elseif ($request->filled('image_url')) {
        $imagePath = $request->input('image_url');
        
    }

    // 3. Update the Category
    $category->update([
        'name' => $request->name,
        'short_desc' => $request->short_desc, // <-- CORRECT: Field is included
        'image' => $imagePath,
    ]);
    
    return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully!');
}
    
    // --- DELETE (Destroy) ---
    public function categoriesDestroy($id)
    {
        $category = Category::findOrFail($id);
        
        if ($category->image && strpos($category->image, 'http') === false) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}