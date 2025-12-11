@extends('admin.layout.admin')

@section('title', 'Update Blog')

@section('content')
<div class="max-w-4xl mx-auto">
	<div class="flex items-center justify-between mb-6">
		<h2 class="text-2xl font-bold">Edit Post</h2>
		<div class="flex gap-2">
			<a href="/admin/posts" class="px-3 py-2 bg-white border border-gray-300 rounded">Back</a>
			<form action="#" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
				@csrf
				@method('DELETE')
				<button class="px-3 py-2 bg-red-600 text-white rounded">Delete</button>
			</form>
		</div>
	</div>

	<div class="bg-white p-6 rounded shadow border border-gray-200">
		<form action="/admin/posts/1" method="POST" enctype="multipart/form-data" class="space-y-6">
			@csrf
			@method('PUT')

			<div>
				<label class="block text-sm font-medium text-gray-700">Title</label>
				<input type="text" name="title" value="The Future of Web Development" class="mt-1 block w-full rounded border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800" required>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
				<div>
					<label class="block text-sm font-medium text-gray-700">Category</label>
					<select name="category" class="mt-1 block w-full rounded border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800">
						<option value="Technology" selected>Technology</option>
						<option value="Lifestyle">Lifestyle</option>
						<option value="Travel">Travel</option>
						<option value="Food">Food</option>
						<option value="Business">Business</option>
						<option value="Entertainment">Entertainment</option>
					</select>
				</div>

				<div>
					<label class="block text-sm font-medium text-gray-700">Publish</label>
					<div class="mt-1">
						<label class="inline-flex items-center">
							<input type="checkbox" name="published" class="form-checkbox h-5 w-5 text-gray-800" checked>
							<span class="ml-2 text-sm text-gray-700">Published</span>
						</label>
					</div>
				</div>
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700">Excerpt</label>
				<textarea name="excerpt" rows="3" class="mt-1 block w-full rounded border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800">Explore the latest trends and technologies that are shaping the future of web development.</textarea>
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700">Content</label>
				<textarea name="content" rows="10" class="mt-1 block w-full rounded border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800">(Full article content goes here...)\n\nArtificial Intelligence is no longer a buzzword...</textarea>
			</div>

			<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
				<div>
					<label class="block text-sm font-medium text-gray-700">Featured Image (URL)</label>
					<input type="url" name="image_url" value="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=1200&h=600&fit=crop" class="mt-1 block w-full rounded border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800">
				</div>
				<div>
					<label class="block text-sm font-medium text-gray-700">Tags (comma separated)</label>
					<input type="text" name="tags" value="web development, technology, trends" class="mt-1 block w-full rounded border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800">
				</div>
			</div>

			<div class="flex items-center gap-3">
				<button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded font-semibold">Save Changes</button>
				<a href="/admin/posts" class="text-sm text-gray-600">Cancel</a>
			</div>
		</form>
	</div>
</div>

@endsection
