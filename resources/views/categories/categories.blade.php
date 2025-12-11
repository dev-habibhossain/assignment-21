@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-cover bg-center py-16" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=1200&h=400&fit=crop');">
    <div class="container mx-auto px-4 text-center text-white">
        <h1 class="text-5xl font-bold mb-4">Browse Categories</h1>
        <p class="text-xl text-gray-100">Explore content by your favorite topics</p>
    </div>
</div>

<!-- Categories Grid -->
<div class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Category Card 1 -->
            <div class="bg-white rounded shadow-md overflow-hidden hover:shadow-lg transition border border-gray-200">
                <div class="bg-cover bg-center h-48" style="background-image: url('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=400&h=250&fit=crop');"></div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Technology</h3>
                    <p class="text-gray-600 mb-4">Explore the latest tech trends, innovations, and digital advancements.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 text-sm font-semibold">24 Articles</span>
                        <a href="#" class="text-gray-800 font-semibold hover:text-gray-600 transition">View →</a>
                    </div>
                </div>
            </div>

            <!-- Category Card 2 -->
            <div class="bg-white rounded shadow-md overflow-hidden hover:shadow-lg transition border border-gray-200">
                <div class="bg-cover bg-center h-48" style="background-image: url('https://images.unsplash.com/photo-1505228395891-9a51e7e86e81?w=400&h=250&fit=crop');"></div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Lifestyle</h3>
                    <p class="text-gray-600 mb-4">Discover wellness tips, personal growth, and lifestyle inspiration.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 text-sm font-semibold">18 Articles</span>
                        <a href="#" class="text-gray-800 font-semibold hover:text-gray-600 transition">View →</a>
                    </div>
                </div>
            </div>

            <!-- Category Card 3 -->
            <div class="bg-white rounded shadow-md overflow-hidden hover:shadow-lg transition border border-gray-200">
                <div class="bg-cover bg-center h-48" style="background-image: url('https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=400&h=250&fit=crop');"></div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Travel</h3>
                    <p class="text-gray-600 mb-4">Journey through the world's best destinations and travel guides.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 text-sm font-semibold">32 Articles</span>
                        <a href="#" class="text-gray-800 font-semibold hover:text-gray-600 transition">View →</a>
                    </div>
                </div>
            </div>

            <!-- Category Card 4 -->
            <div class="bg-white rounded shadow-md overflow-hidden hover:shadow-lg transition border border-gray-200">
                <div class="bg-cover bg-center h-48" style="background-image: url('https://images.unsplash.com/photo-1495521821757-a1efb6729352?w=400&h=250&fit=crop');"></div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Food</h3>
                    <p class="text-gray-600 mb-4">Recipes, culinary adventures, and food culture from around the world.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 text-sm font-semibold">28 Articles</span>
                        <a href="/categories/food" class="text-gray-800 font-semibold hover:text-gray-600 transition">View →</a>
                    </div>
                </div>
            </div>

            <!-- Category Card 5 -->
            <div class="bg-white rounded shadow-md overflow-hidden hover:shadow-lg transition border border-gray-200">
                <div class="bg-cover bg-center h-48" style="background-image: url('https://images.unsplash.com/photo-1514306688772-aadfc5389620?w=400&h=250&fit=crop');"></div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Business</h3>
                    <p class="text-gray-600 mb-4">Entrepreneurship, career tips, and business strategies for success.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 text-sm font-semibold">22 Articles</span>
                        <a href="/categories/business" class="text-gray-800 font-semibold hover:text-gray-600 transition">View →</a>
                    </div>
                </div>
            </div>

            <!-- Category Card 6 -->
            <div class="bg-white rounded shadow-md overflow-hidden hover:shadow-lg transition border border-gray-200">
                <div class="bg-cover bg-center h-48" style="background-image: url('https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=400&h=250&fit=crop');"></div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">Entertainment</h3>
                    <p class="text-gray-600 mb-4">Movies, music, arts, and entertainment industry news and reviews.</p>
                    <div class="flex items-center justify-between">
                        <span class="text-gray-500 text-sm font-semibold">35 Articles</span>
                        <a href="/categories/entertainment" class="text-gray-800 font-semibold hover:text-gray-600 transition">View →</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection