@extends('layouts.app')

@section('content')
<div class="relative bg-cover bg-center py-16" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=1200&h=400&fit=crop');">
    <div class="container mx-auto px-4 text-center text-white">
        <h1 class="text-5xl font-bold mb-4">Browse Categories</h1>
        <p class="text-xl text-gray-100">Explore content by your favorite topics</p>
    </div>
</div>

<div class="py-20 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @foreach ($categories as $category)
            <div class="bg-white rounded shadow-md overflow-hidden hover:shadow-lg transition border border-gray-200">
                
                <div class="bg-cover bg-center h-48" style="background-image: url('{{ $category->image ?? 'https://images.unsplash.com/photo-1518770660439-4630ee79dee5?w=400&h=250&fit=crop' }}');"></div>
                
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ $category->name }}</h3>
                    
                    
                    <p class="text-gray-600 mb-4">{{ $category->short_desc ?? 'A collection of blogs related to ' . $category->name . '.' }}</p>
                    
                    <div class="flex items-center justify-between">
                    
                        <span class="text-gray-500 text-sm font-semibold">{{ $category->blogs_count }} Articles</span>
                        
                        <a href="/blogs/category/{{ $category->id }}" class="text-gray-800 font-semibold hover:text-gray-600 transition">View →</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

@endsection