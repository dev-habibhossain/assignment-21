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
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

    @forelse($categories as $category)
        {{-- 2. Burnished Card Design (Repeated for each $category) --}}
        <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition duration-300 overflow-hidden border border-gray-100 flex flex-col">
            
            {{-- Image Container --}}
            @php
                // Define image source logic once
                $imageSrc = (strpos($category->image, 'http') === 0) 
                    ? $category->image 
                    : ($category->image ? asset('storage/' . $category->image) : 'https://via.placeholder.com/400x250?text=No+Image');
            @endphp
            
            <div class="relative h-40 bg-gray-100 overflow-hidden">
                <img src="{{ $imageSrc }}" 
                    alt="{{ $category->name }}" 
                    class="w-full h-full object-cover transition duration-500 ease-in-out hover:scale-105"
                    onerror="this.onerror=null;this.src='https://via.placeholder.com/400x250?text={{ urlencode($category->name) }}';">
            </div>

            {{-- Content and Actions --}}
            <div class="p-5 flex flex-col flex-grow">
                <h4 class="text-xl font-extrabold text-gray-900 mb-2">{{ $category->name }}</h4>
                <p class="text-sm text-gray-600 mb-4 flex-grow">{{ $category->short_desc ?? 'No brief description available.' }}</p>
                
                {{-- Actions --}}
                <div class="mt-4 pt-3 border-t border-gray-100 flex justify-between items-center">
                    
                    {{-- Edit Link --}}
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="px-3 py-1 text-xs font-semibold text-gray-700 border border-gray-300 rounded-md hover:bg-gray-50 transition">
                        Edit
                    </a>
                    
                    {{-- DELETE Form --}}
                    <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete the category: {{ $category->name }}? This action cannot be undone.');" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-3 py-1 text-xs font-semibold text-white bg-red-600 rounded-md hover:bg-red-700 transition shadow-md">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
    @empty
        {{-- 3. Empty State (Displayed when $categories is empty) --}}
        <div class="md:col-span-3 p-6 bg-white rounded-xl shadow-md text-center">
            <p class="text-gray-600 text-lg">
                No categories have been created yet.
            </p>
            <a href="{{ route('admin.categories.create') }}" class="mt-4 inline-block text-blue-600 font-semibold hover:text-blue-800 transition">
                Click here to add the first category
            </a>
        </div>
    @endforelse

</div>
        </div>
    </div>
</div>

@endsection