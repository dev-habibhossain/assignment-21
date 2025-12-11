<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.pages.home');
    }

    public function profile()
    {
        return view('admin.pages.profile');
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
        return view('admin.pages.addBlog');
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
}
