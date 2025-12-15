@extends('admin.layout.admin')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900">Dashboard</h1>
        <p class="text-gray-600 mt-2">Welcome back! Here's an overview of your blog</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition">
            <h4 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Total Posts</h4>
            <div class="text-3xl font-bold text-gray-900 mt-2">{{ $blogs->count() }}</div>
            <p class="text-sm text-gray-500 mt-2">+8% since last week</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition">
            <h4 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Categories</h4>
            <div class="text-3xl font-bold text-gray-900 mt-2">{{ $categories->count() }}</div>
            <p class="text-sm text-gray-500 mt-2">Across your blog</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition">
            <h4 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Total Authors</h4>
            <div class="text-3xl font-bold text-gray-900 mt-2">{{ $totalUsers }}</div>
            <p class="text-sm text-gray-500 mt-2">These author can upload Blogs...</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition">
            <h4 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Pending Review</h4>
            <div class="text-3xl font-bold text-gray-900 mt-2">14</div>
            <p class="text-sm text-gray-500 mt-2">Pending review</p>
        </div>
    </div>

    <div class="flex gap-4 mb-8">
        <a href="/admin/dashboard/posts/create" class="px-6 py-3 bg-gray-800 text-white rounded-lg font-semibold hover:bg-gray-900 transition">+ New Post</a>
        <a href="/admin/dashboard/banner" class="px-6 py-3 bg-white border border-gray-300 text-gray-800 rounded-lg hover:bg-gray-50 transition">Edit Banner</a>
        <a href="/admin/dashboard/profile" class="px-6 py-3 bg-white border border-gray-300 text-gray-800 rounded-lg hover:bg-gray-50 transition">Profile</a>
    </div>

    <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-x-auto">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-bold text-gray-900">Recent Posts</h3>
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wide">Title</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wide">Author</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wide">Category</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wide">Published</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wide">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($blogs as $blog)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $blog->title }}</td>
                    
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ $blog->author->name ?? 'N/A' }} 
                    </td>
                    
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ $blog->category->name ?? 'Uncategorized' }} 
                    </td>
                    
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $blog->created_at->format('M d, Y') }}</td>
                    
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                        <a href="/admin/posts/{{ $blog->id }}/edit" class="text-gray-800 font-semibold hover:text-gray-900">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection