@extends('admin.layout.admin')

@section('title', 'Manage Categories')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">Manage Categories</h1>
        <p class="text-gray-600 mt-2">View and manage your blog categories.</p>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-900 text-white rounded-md hover:bg-gray-800 transition">+ Add New Category</a>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Categories</h3>
            @forelse($categories as $category)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div class="border border-gray-200 rounded-md p-4">
                        {{-- Determine image source: URL or stored asset --}}
                        @php
                            $imageSrc = (strpos($category->image, 'http') === 0) 
                                ? $category->image 
                                : ($category->image ? asset('storage/' . $category->image) : 'https://via.placeholder.com/300x200?text=No+Image');
                        @endphp
                        
                        <img src="{{ $imageSrc }}" 
                             alt="{{ $category->name }}" 
                             class="w-full h-32 object-cover rounded-md mb-3"
                             onerror="this.onerror=null;this.src='https://via.placeholder.com/300x200?text=No+Image';">
                             
                        <h4 class="text-lg font-bold text-gray-900">{{ $category->name }}</h4>
                        <p class="text-sm text-gray-600 mt-1">{{ $category->short_desc ?? 'No description' }}</p>
                        
                        <div class="mt-3 flex gap-2">
                            {{-- EDIT Link --}}
                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="text-sm text-blue-600 hover:text-blue-800">Edit</a>
                            
                            {{-- DELETE Form --}}
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the category: {{ $category->name }}?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No categories yet. <a href="{{ route('admin.categories.create') }}" class="text-blue-600 hover:text-blue-800">Create one</a>.</p>
            @endforelse
        </div>
    </div>
</div>

@endsection