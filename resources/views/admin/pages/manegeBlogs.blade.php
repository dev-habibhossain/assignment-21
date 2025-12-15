@extends('admin.layout.admin')

@section('title', 'Manage Blogs')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900">Manage Posts</h1>
        <p class="text-gray-600 mt-2">View and manage all your blog posts</p>
    </div>

    <div class="flex items-center justify-between mb-6">
        <a href="{{ route('admin.posts.create') }}" class="px-6 py-3 bg-gray-800 text-white rounded-lg font-semibold hover:bg-gray-900 transition">+ New Post</a>
    </div>

    <div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 mb-6">
        </div>

    <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wide">#</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wide">Title</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wide">Author</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wide">Category</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wide">Status</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wide">Published</th>
                    <th class="px-6 py-4"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                
                @forelse($blogs as $index => $blog)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $index + 1 }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-semibold text-gray-800">{{ $blog->title }}</div>
                        {{-- Display the summary field, truncated if necessary --}}
                        <div class="text-xs text-gray-500">{{ Str::limit($blog->summary, 40) }}</div> 
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
    {{-- Use the 'author' relationship to access the user's name --}}
    {{ $blog->author->name ?? 'User Deleted' }} 
</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ $blog->category->name ?? 'Uncategorized' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        @php
                            // Check if published_date is set (means it's published)
                            $isPublished = $blog->published_date !== null; 
                        @endphp
                        <span class="px-2 py-1 rounded text-xs 
                            {{ $isPublished ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $isPublished ? 'Published' : 'Draft' }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                        {{ $blog->published_date ? Carbon\Carbon::parse($blog->published_date)->format('M d, Y') : '—' }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
    {{-- EDIT LINK --}}
    <a href="{{ route('admin.posts.edit', $blog->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
    
    {{-- DELETE FORM --}}
    <form action="{{ route('admin.posts.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete {{ $blog->title }}?');" class="inline">
        @csrf
        @method('DELETE') {{-- Required for the DELETE route --}}
        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
    </form>
</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-6 py-8 text-center text-gray-500">
                        You have not posted any blogs yet. <a href="{{ route('admin.posts.create') }}" class="text-indigo-600 hover:underline">Create your first post</a>.
                    </td>
                </tr>
                @endforelse
                
            </tbody>
        </table>
    </div>

    <div class="mt-4 flex items-center justify-end">
        {{-- If you use ->paginate(10) instead of ->get() in the controller, uncomment this: --}}
        {{-- {{ $blogs->links() }} --}}
        <nav class="inline-flex -space-x-px shadow-sm" aria-label="Pagination">
            <a href="#" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l hover:bg-gray-50">Previous</a>
            <a href="#" class="px-3 py-2 leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">1</a>
            <a href="#" class="px-3 py-2 leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">2</a>
            <a href="#" class="px-3 py-2 leading-tight text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">3</a>
            <a href="#" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r hover:bg-gray-50">Next</a>
        </nav>
    </div>
</div>

@endsection