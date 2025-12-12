@extends('admin.layout.admin')

@section('title', 'Manage Categories')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">Manage Categories</h1>
        <p class="text-gray-600 mt-2">View and manage your blog categories.</p>
    </div>

    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-900 text-white rounded-md hover:bg-gray-800 transition">+ Add New Category</a>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Categories</h3>
            @if(count($categories) > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($categories as $category)
                        <div class="border border-gray-200 rounded-md p-4">
                            <img src="{{ $category['image'] ?? 'https://via.placeholder.com/300x200?text=No+Image' }}" alt="{{ $category['name'] }}" class="w-full h-32 object-cover rounded-md mb-3">
                            <h4 class="text-lg font-bold text-gray-900">{{ $category['name'] }}</h4>
                            <p class="text-sm text-gray-600 mt-1">{{ $category['description'] ?? 'No description' }}</p>
                            <div class="mt-3 flex gap-2">
                                <a href="#" class="text-sm text-blue-600 hover:text-blue-800">Edit</a>
                                <form action="#" method="POST" onsubmit="return confirm('Are you sure?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-sm text-red-600 hover:text-red-800">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No categories yet. <a href="{{ route('admin.categories.create') }}" class="text-blue-600 hover:text-blue-800">Create one</a>.</p>
            @endif
        </div>
    </div>
</div>

@endsection