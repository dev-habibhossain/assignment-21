@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div class="relative bg-cover bg-center py-16" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=1200&h=400&fit=crop');">
    <div class="container mx-auto px-4 text-center text-white">
        <h1 class="text-5xl font-bold mb-4">Latest Articles</h1>
        <p class="text-xl text-gray-100">Discover our newest and most compelling stories</p>
    </div>
</div>

<!-- Blog Posts Grid -->
<div class="py-20 bg-white">
    <div class="container mx-auto px-4">
        
        <!-- Sidebar and Articles Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Main Content -->
            <div class="lg:col-span-2">
                <!-- Blog Post Card 1 -->
                <article class="mb-8 pb-8 border-b border-gray-200 hover:shadow-md transition p-6 rounded">
                    <div class="flex gap-6">
                        <div class="flex-shrink-0 w-48">
                            <img src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=300&h=200&fit=crop" alt="Article" class="w-full h-32 object-cover rounded">
                        </div>
                        <div class="flex-1">
                            <span class="inline-block text-gray-600 text-sm font-semibold mb-2 border-b-2 border-gray-800 pb-1">Technology</span>
                            <h2 class="text-2xl font-bold text-gray-800 mb-3">The Future of Web Development</h2>
                            <p class="text-gray-600 mb-4 leading-relaxed">Explore the latest trends and technologies that are shaping the future of web development in 2025 and beyond.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-500 text-sm">Dec 10, 2025 • 5 min read</span>
                                <a href="/blogs/1" class="text-gray-800 font-semibold hover:text-gray-600 transition">Read More →</a>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Blog Post Card 2 -->
                <article class="mb-8 pb-8 border-b border-gray-200 hover:shadow-md transition p-6 rounded">
                    <div class="flex gap-6">
                        <div class="flex-shrink-0 w-48">
                            <img src="https://images.unsplash.com/photo-1505228395891-9a51e7e86e81?w=300&h=200&fit=crop" alt="Article" class="w-full h-32 object-cover rounded">
                        </div>
                        <div class="flex-1">
                            <span class="inline-block text-gray-600 text-sm font-semibold mb-2 border-b-2 border-gray-800 pb-1">Lifestyle</span>
                            <h2 class="text-2xl font-bold text-gray-800 mb-3">Healthy Living Tips</h2>
                            <p class="text-gray-600 mb-4 leading-relaxed">Discover simple yet effective ways to improve your health and wellness through daily habits and lifestyle changes.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-500 text-sm">Dec 8, 2025 • 4 min read</span>
                                <a href="/blogs/2" class="text-gray-800 font-semibold hover:text-gray-600 transition">Read More →</a>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Blog Post Card 3 -->
                <article class="mb-8 pb-8 border-b border-gray-200 hover:shadow-md transition p-6 rounded">
                    <div class="flex gap-6">
                        <div class="flex-shrink-0 w-48">
                            <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=300&h=200&fit=crop" alt="Article" class="w-full h-32 object-cover rounded">
                        </div>
                        <div class="flex-1">
                            <span class="inline-block text-gray-600 text-sm font-semibold mb-2 border-b-2 border-gray-800 pb-1">Travel</span>
                            <h2 class="text-2xl font-bold text-gray-800 mb-3">Best Travel Destinations</h2>
                            <p class="text-gray-600 mb-4 leading-relaxed">Uncover hidden gems and must-visit destinations for your next adventure around the globe.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-500 text-sm">Dec 5, 2025 • 6 min read</span>
                                <a href="/blogs/3" class="text-gray-800 font-semibold hover:text-gray-600 transition">Read More →</a>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Blog Post Card 4 -->
                <article class="mb-8 pb-8 border-b border-gray-200 hover:shadow-md transition p-6 rounded">
                    <div class="flex gap-6">
                        <div class="flex-shrink-0 w-48">
                            <img src="https://images.unsplash.com/photo-1495521821757-a1efb6729352?w=300&h=200&fit=crop" alt="Article" class="w-full h-32 object-cover rounded">
                        </div>
                        <div class="flex-1">
                            <span class="inline-block text-gray-600 text-sm font-semibold mb-2 border-b-2 border-gray-800 pb-1">Food</span>
                            <h2 class="text-2xl font-bold text-gray-800 mb-3">Easy Recipes for Busy Days</h2>
                            <p class="text-gray-600 mb-4 leading-relaxed">Learn quick and delicious recipes that you can prepare in less than 30 minutes.</p>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-500 text-sm">Dec 1, 2025 • 3 min read</span>
                                <a  href="/blogs/4" class="text-gray-800 font-semibold hover:text-gray-600 transition">Read More →</a>
                            </div>
                        </div>
                    </div>
                </article>

            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Recent Posts Widget -->
                <div class="bg-gray-50 p-6 rounded shadow-md border border-gray-200 mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 border-b-2 border-gray-800 pb-2">Recent Posts</h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="#" class="text-gray-800 font-semibold hover:text-gray-600 transition">The Future of Web Development</a>
                            <p class="text-gray-500 text-sm">Dec 10, 2025</p>
                        </li>
                        <li>
                            <a href="#" class="text-gray-800 font-semibold hover:text-gray-600 transition">Healthy Living Tips</a>
                            <p class="text-gray-500 text-sm">Dec 8, 2025</p>
                        </li>
                        <li>
                            <a href="#" class="text-gray-800 font-semibold hover:text-gray-600 transition">Best Travel Destinations</a>
                            <p class="text-gray-500 text-sm">Dec 5, 2025</p>
                        </li>
                    </ul>
                </div>

                <!-- Categories Widget -->
                <div class="bg-gray-50 p-6 rounded shadow-md border border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 border-b-2 border-gray-800 pb-2">Categories</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-gray-800 hover:text-gray-600 transition font-semibold flex justify-between">
                                <span>Technology</span>
                                <span class="text-gray-500">(24)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-800 hover:text-gray-600 transition font-semibold flex justify-between">
                                <span>Lifestyle</span>
                                <span class="text-gray-500">(18)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-800 hover:text-gray-600 transition font-semibold flex justify-between">
                                <span>Travel</span>
                                <span class="text-gray-500">(32)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-800 hover:text-gray-600 transition font-semibold flex justify-between">
                                <span>Food</span>
                                <span class="text-gray-500">(28)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection