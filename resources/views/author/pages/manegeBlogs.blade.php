@extends('admin.layout.admin')

@section('title', 'Manage Blogs')

@section('content')
<div class="max-w-6xl mx-auto">
	<!-- Page Header -->
	<div class="mb-8">
		<h1 class="text-4xl font-bold text-gray-900">Manage Posts</h1>
		<p class="text-gray-600 mt-2">View and manage all your blog posts</p>
	</div>

	<div class="flex items-center justify-between mb-6">
		<a href="/admin/posts/create" class="px-6 py-3 bg-gray-800 text-white rounded-lg font-semibold hover:bg-gray-900 transition">+ New Post</a>
	</div>

	<div class="bg-white rounded-lg shadow-md border border-gray-200 p-6 mb-6">
		<div class="flex gap-4 items-center">
			<input type="text" placeholder="Search posts..." class="px-4 py-2 border border-gray-300 rounded-lg w-full focus:outline-none focus:ring-2 focus:ring-gray-800">
			<select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800">
				<option>All categories</option>
				<option>Technology</option>
				<option>Lifestyle</option>
				<option>Travel</option>
			</select>
			<button class="px-4 py-2 bg-gray-800 text-white rounded-lg hover:bg-gray-900 transition">Filter</button>
		</div>
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
					<th class="px-6 py-4\"></th>
				</tr>
			</thead>
			<tbody class="bg-white divide-y divide-gray-200">
				<!-- Fake Data Row 1 -->
				<tr class="hover:bg-gray-50 transition">
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">1</td>
					<td class="px-6 py-4 whitespace-nowrap">
						<div class="text-sm font-semibold text-gray-800">The Future of Web Development</div>
						<div class="text-xs text-gray-500">Explore the latest trends and technologies...</div>
					</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">John Doe</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Technology</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm">
						<span class="px-2 py-1 rounded text-xs bg-green-100 text-green-800">Published</span>
					</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Dec 10, 2025</td>
					<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
						<a href="/admin/posts/1/edit" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
						<a href="#" class="text-red-600 hover:text-red-900">Delete</a>
					</td>
				</tr>

				<!-- Fake Data Row 2 -->
				<tr class="hover:bg-gray-50 transition">
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">2</td>
					<td class="px-6 py-4 whitespace-nowrap">
						<div class="text-sm font-semibold text-gray-800">Healthy Living Tips</div>
						<div class="text-xs text-gray-500">Discover simple yet effective ways...</div>
					</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Sarah Williams</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Lifestyle</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm">
						<span class="px-2 py-1 rounded text-xs bg-yellow-100 text-yellow-800">Draft</span>
					</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">—</td>
					<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
						<a href="/admin/posts/2/edit" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
						<a href="#" class="text-red-600 hover:text-red-900">Delete</a>
					</td>
				</tr>

				<!-- Fake Data Row 3 -->
				<tr class="hover:bg-gray-50 transition">
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">3</td>
					<td class="px-6 py-4 whitespace-nowrap">
						<div class="text-sm font-semibold text-gray-800">Best Travel Destinations</div>
						<div class="text-xs text-gray-500">Uncover hidden gems and must-visit destinations...</div>
					</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Alex Martinez</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Travel</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm">
						<span class="px-2 py-1 rounded text-xs bg-green-100 text-green-800">Published</span>
					</td>
					<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Dec 5, 2025</td>
					<td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
						<a href="/admin/posts/3/edit" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
						<a href="#" class="text-red-600 hover:text-red-900">Delete</a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<!-- Pagination (fake) -->
	<div class="mt-4 flex items-center justify-end">
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
