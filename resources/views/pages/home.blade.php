@extends('layouts.app')

@section('content')
<!-- Hero Section with Background Image -->
<div class="relative bg-cover bg-center h-96" style="background-image: url('https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=1200&h=500&fit=crop');">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    <div class="relative container mx-auto px-4 h-full flex items-center justify-center">
        <div class="text-center text-white">
            <h1 class="text-6xl font-bold mb-4">Welcome to Our Blog</h1>
            <p class="text-2xl mb-8 text-gray-100">Discover amazing stories and insights</p>
            <div class="flex justify-center gap-4">
                <a href="#" class="bg-white text-gray-800 px-8 py-3 rounded font-semibold hover:bg-gray-100 transition">
                    Explore Blogs
                </a>
                <a href="#" class="border-2 border-white px-8 py-3 rounded font-semibold hover:bg-white hover:text-gray-800 transition">
                    Browse Categories
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Featured Blog Posts Section -->
<div class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-3">Featured Articles</h2>
            <p class="text-gray-600 text-lg">Check out our latest and most popular blog posts</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Blog Card 1 -->
            <div class="bg-white rounded shadow-md overflow-hidden hover:shadow-lg transition border border-gray-200">
                <div class="bg-cover bg-center h-48" style="background-image: url('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400&h=250&fit=crop');"></div>
                <div class="p-6">
                    <span class="inline-block text-gray-600 text-sm font-semibold mb-3 border-b-2 border-gray-800 pb-1">Technology</span>
                    <h3 class="text-2xl font-bold mb-3 text-gray-800">The Future of Web Development</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">Explore the latest trends and technologies that are shaping the future of web development.</p>
                    <div class="flex items-center justify-between border-t pt-4">
                        <span class="text-gray-500 text-sm">Dec 10, 2025</span>
                        <a href="#" class="text-gray-800 font-semibold hover:text-gray-600 transition">Read More →</a>
                    </div>
                </div>
            </div>

            <!-- Blog Card 2 -->
            <div class="bg-white rounded shadow-md overflow-hidden hover:shadow-lg transition border border-gray-200">
                <div class="bg-cover bg-center h-48" style="background-image: url('https://images.unsplash.com/photo-1505228395891-9a51e7e86e81?w=400&h=250&fit=crop');"></div>
                <div class="p-6">
                    <span class="inline-block text-gray-600 text-sm font-semibold mb-3 border-b-2 border-gray-800 pb-1">Lifestyle</span>
                    <h3 class="text-2xl font-bold mb-3 text-gray-800">Healthy Living Tips</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">Discover simple yet effective ways to improve your health and wellness through daily habits.</p>
                    <div class="flex items-center justify-between border-t pt-4">
                        <span class="text-gray-500 text-sm">Dec 8, 2025</span>
                        <a href="#" class="text-gray-800 font-semibold hover:text-gray-600 transition">Read More →</a>
                    </div>
                </div>
            </div>

            <!-- Blog Card 3 -->
            <div class="bg-white rounded shadow-md overflow-hidden hover:shadow-lg transition border border-gray-200">
                <div class="bg-cover bg-center h-48" style="background-image: url('https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=400&h=250&fit=crop');"></div>
                <div class="p-6">
                    <span class="inline-block text-gray-600 text-sm font-semibold mb-3 border-b-2 border-gray-800 pb-1">Travel</span>
                    <h3 class="text-2xl font-bold mb-3 text-gray-800">Best Travel Destinations</h3>
                    <p class="text-gray-600 mb-4 leading-relaxed">Uncover hidden gems and must-visit destinations for your next adventure around the globe.</p>
                    <div class="flex items-center justify-between border-t pt-4">
                        <span class="text-gray-500 text-sm">Dec 5, 2025</span>
                        <a href="#" class="text-gray-800 font-semibold hover:text-gray-600 transition">Read More →</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Categories Section -->
<div class="py-20 bg-gray-100">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-3">Browse by Category</h2>
            <p class="text-gray-600 text-lg">Find content that interests you</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Category Card -->
            <div class="bg-white p-8 rounded shadow-md text-center hover:shadow-lg transition border-t-4 border-gray-800 cursor-pointer">
                <div class="text-5xl mb-4">💻</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Technology</h3>
                <p class="text-gray-600 font-semibold">24 Articles</p>
            </div>

            <!-- Category Card -->
            <div class="bg-white p-8 rounded shadow-md text-center hover:shadow-lg transition border-t-4 border-gray-800 cursor-pointer">
                <div class="text-5xl mb-4">🏃</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Lifestyle</h3>
                <p class="text-gray-600 font-semibold">18 Articles</p>
            </div>

            <!-- Category Card -->
            <div class="bg-white p-8 rounded shadow-md text-center hover:shadow-lg transition border-t-4 border-gray-800 cursor-pointer">
                <div class="text-5xl mb-4">✈️</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Travel</h3>
                <p class="text-gray-600 font-semibold">32 Articles</p>
            </div>

            <!-- Category Card -->
            <div class="bg-white p-8 rounded shadow-md text-center hover:shadow-lg transition border-t-4 border-gray-800 cursor-pointer">
                <div class="text-5xl mb-4">🍽️</div>
                <h3 class="text-2xl font-bold text-gray-800 mb-2">Food</h3>
                <p class="text-gray-600 font-semibold">28 Articles</p>
            </div>
        </div>
    </div>
</div>

<!-- Call to Action Section -->
<div class="relative bg-cover bg-center py-20" style="background-image: url('https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=1200&h=400&fit=crop');">
    <div class="absolute inset-0 bg-gray-800 bg-opacity-50"></div>
    <div class="relative container mx-auto px-4 text-center text-white">
        <h2 class="text-4xl font-bold mb-4">Stay Updated with Our Latest Content</h2>
        <p class="text-xl mb-8 text-gray-100">Subscribe to our newsletter and never miss an update</p>
        <div class="flex justify-center gap-4 flex-wrap">
            <input type="email" placeholder="Enter your email" class="px-6 py-3 rounded text-gray-800 w-full md:w-auto focus:outline-none">
            <button class="bg-gray-800 text-white px-8 py-3 rounded font-semibold hover:bg-gray-700 transition border border-white">
                Subscribe
            </button>
        </div>
    </div>
</div>

@endsection
