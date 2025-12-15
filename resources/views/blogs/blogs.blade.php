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
                @foreach ($blogs as $blog)
                <article class="mb-8 pb-8 border-b border-gray-200 hover:shadow-md transition p-6 rounded">
                    <div class="flex gap-6">
                        <div class="flex-shrink-0 w-48">
                            <img src={{ $blog->image }} alt="Article" class="w-full h-32 object-cover rounded">
                        </div>
                        <div class="flex-1">
                            <span class="inline-block text-gray-600 text-sm font-semibold mb-2 border-b-2 border-gray-800 pb-1">{{ $blog->category->name }}</span>
                            <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ $blog->title }}</h2>
                            <p class="text-gray-600 mb-4 leading-relaxed">{{ $blog->summary }}</p>
                            <div class="flex items-center justify-between">
                                <span class="text-gray-500 text-sm">{{ $blog->created_at }} • {{ $blog->read_time }} min read</span>
                                <a href="/blogs/{{ $blog->id }}" class="text-gray-800 font-semibold hover:text-gray-600 transition">Read More →</a>
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach


            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Recent Posts Widget -->
                <div class="bg-gray-50 p-6 rounded shadow-md border border-gray-200 mb-8">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 border-b-2 border-gray-800 pb-2">Recent Posts</h3>
                    <ul class="space-y-4">
                        @foreach ($desc_blogs as $blog)
                        <li>
                            <a href="/blogs/{{ $blog->id }}" class="text-gray-800 font-semibold hover:text-gray-600 transition">{{ $blog->title }}</a>
                            <p class="text-gray-500 text-sm">{{ $blog->created_at }}</p>
                        </li>
                        @endforeach
                        
                    </ul>
                </div>

                <!-- Categories Widget -->
                <div class="bg-gray-50 p-6 rounded shadow-md border border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 border-b-2 border-gray-800 pb-2">Categories</h3>
                    <ul class="space-y-3">
                        @foreach ($categories as $category)
                            <li>
                                {{-- Use a hardcoded URL structure with the category ID --}}
                                <a href="/blogs/category/{{ $category->id }}" class="text-gray-800 hover:text-gray-600 transition font-semibold flex justify-between">
                                    <span>{{ $category->name }}</span>
                                    <span class="text-gray-500">({{ $category->blogs_count }})</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection