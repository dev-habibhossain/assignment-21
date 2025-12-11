@extends('admin.layout.admin')

@section('title', 'Manage Blogs')

@section('content')
<div class="max-w-6xl mx-auto">
	<div class="flex items-center justify-between mb-6">
		<h2 class="text-2xl font-bold">Manage Blogs</h2>
		<a href="/admin/posts/create" class="px-4 py-2 bg-gray-800 text-white rounded">New Post</a>
	</div>

	<div class="bg-white rounded shadow border border-gray-200 p-4 mb-6">
		<div class="flex gap-4 items-center">
			<input type="text" placeholder="Search posts..." class="px-3 py-2 border border-gray-300 rounded w-full">
			<select class="px-3 py-2 border border-gray-300 rounded">
				<option>All categories</option>
				<option>Technology</option>
				<option>Lifestyle</option>
				<option>Travel</option>
			</select>
			<button class="px-4 py-2 bg-gray-800 text-white rounded">Filter</button>
		</div>
	</div>

	<div class="bg-white rounded shadow border border-gray-200 overflow-x-auto">
		<table class="min-w-full divide-y divide-gray-200">
			<thead class="bg-gray-50">
				<tr>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
					<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Published</th>
					<th class="px-6 py-3"></th>
				</tr>
			</thead>
			<tbody class="bg-white divide-y divide-gray-200">
				<!-- Fake Data Row 1 -->
				<tr>
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
				<tr>
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
				<tr>
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
