@extends('author.layout.admin')

@section('title', 'Update Blog')

@section('content')
<div class="max-w-6xl mx-auto">
	<div class="mb-8">
		<h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">Edit Blog Post</h1>
		<p class="text-gray-600 mt-2">Make changes and preview how the post will appear on the site.</p>
	</div>

	<div class="flex items-center justify-between mb-6">
		<div class="flex items-center gap-3">
			<a href="/admin/posts" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-800 rounded-md hover:bg-gray-200 transition">← Back to posts</a>
			<form action="#" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
				@csrf
				@method('DELETE')
				<button class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">Delete Post</button>
			</form>
		</div>
	</div>

	<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
		<div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-100">
			<form action="/admin/posts/1" method="POST" enctype="multipart/form-data" class="space-y-6">
				@csrf
				@method('PUT')

				<div>
					<label for="updatePostTitle" class="block text-sm font-medium text-gray-700">Title</label>
					<input id="updatePostTitle" name="title" type="text" value="The Future of Web Development" placeholder="e.g., The Future of Web Development" class="mt-1 block w-full rounded-md border-gray-200 shadow-sm px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200" required>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
					<div>
						<label for="updatePostCategory" class="block text-sm font-medium text-gray-700">Category</label>
						<select id="updatePostCategory" name="category" class="mt-1 block w-full rounded-md border-gray-200 px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200">
							<option value="Technology" selected>Technology</option>
							<option value="Lifestyle">Lifestyle</option>
							<option value="Travel">Travel</option>
							<option value="Food">Food</option>
							<option value="Business">Business</option>
						</select>
					</div>

					<div>
						<label class="block text-sm font-medium text-gray-700">Status</label>
						<div class="mt-1 flex items-center gap-4">
							<label class="inline-flex items-center cursor-pointer">
								<input type="checkbox" name="published" class="h-5 w-5 text-gray-800 rounded" checked>
								<span class="ml-2 text-sm text-gray-700">Published</span>
							</label>
							<span class="text-xs text-gray-500">Toggle to publish or unpublish</span>
						</div>
					</div>
				</div>

				<div>
					<label for="updatePostExcerpt" class="block text-sm font-medium text-gray-700">Excerpt</label>
					<textarea id="updatePostExcerpt" name="excerpt" rows="3" placeholder="Short summary for list views" class="mt-1 block w-full rounded-md border-gray-200 px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200">Explore the latest trends and technologies that are shaping the future of web development.</textarea>
				</div>

				<div>
					<label for="updateContent" class="block text-sm font-medium text-gray-700">Content</label>
					<textarea id="updateContent" name="content" rows="10" placeholder="Write your full article here..." class="mt-1 block w-full rounded-md border-gray-200 px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200">(Full article content goes here...)

Artificial Intelligence is no longer a buzzword...</textarea>
				</div>

				<div class="grid grid-cols-1 md:grid-cols-2 gap-4">
					<div>
						<label for="updatePostImage" class="block text-sm font-medium text-gray-700">Featured Image (URL)</label>
						<input id="updatePostImage" name="image_url" type="url" value="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=1200&h=600&fit=crop" placeholder="https://..." class="mt-1 block w-full rounded-md border-gray-200 px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200">

						<div class="mt-3">
							<div class="relative border-2 border-dashed border-gray-200 rounded-md p-4 hover:border-gray-300 transition cursor-pointer" onclick="document.getElementById('updatePostImageFile').click()">
								<input type="file" id="updatePostImageFile" name="image_file" class="hidden" accept="image/*" onchange="previewUpdatePostImageFile(this)">
								<div class="text-sm text-gray-600">Or upload an image file (click to choose)</div>
							</div>
						</div>
					</div>

					<div>
						<label for="updatePostTags" class="block text-sm font-medium text-gray-700">Tags</label>
						<input id="updatePostTags" name="tags" type="text" value="web development, technology, trends" placeholder="tag1, tag2, tag3" class="mt-1 block w-full rounded-md border-gray-200 px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200">
						<p class="text-xs text-gray-500 mt-2">Comma-separated tags</p>
					</div>
				</div>

				<div class="flex items-center gap-3 mt-2">
					<button type="submit" class="inline-flex items-center px-6 py-3 bg-gray-900 text-white rounded-md font-semibold hover:bg-black transition">Save Changes</button>
					<a href="/admin/posts" class="text-sm text-gray-600 hover:text-gray-900">Cancel</a>
				</div>
			</form>
		</div>

		<!-- Preview Column -->
		<aside class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
			<h3 class="text-lg font-semibold text-gray-800 mb-4">Live Preview</h3>
			<div class="space-y-4">
				<div class="rounded-md overflow-hidden border border-gray-200">
					<img id="updatePreviewImage" src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=1200&h=600&fit=crop" alt="Preview Image" class="w-full h-44 object-cover">
					<div class="p-4">
						<div class="mb-3">
							<span id="updatePreviewCategory" class="inline-block px-3 py-1 bg-gray-100 text-gray-700 text-xs font-semibold rounded-full">Technology</span>
						</div>
						<h4 id="updatePreviewTitle" class="text-xl font-bold text-gray-900">The Future of Web Development</h4>
						<p id="updatePreviewExcerpt" class="text-sm text-gray-600 mt-2">Explore the latest trends and technologies that are shaping the future of web development.</p>
					</div>
				</div>

				<div class="text-xs text-gray-500">
					Tip: Use an image of at least 1200×600 for best results.
				</div>
			</div>
		</aside>
	</div>
</div>

@endsection

@push('scripts')
<script>
// Update preview elements as the user types
const updateTitle = document.getElementById('updatePostTitle');
const updateExcerpt = document.getElementById('updatePostExcerpt');
const updateCategory = document.getElementById('updatePostCategory');
const updateImageUrl = document.getElementById('updatePostImage');

function safeText(el, fallback) {
	return el && el.value ? el.value : fallback;
}

if (updateTitle) {
	updateTitle.addEventListener('input', function() {
		const el = document.getElementById('updatePreviewTitle');
		if (el) el.textContent = this.value || 'Your Post Title Here';
	});
}

if (updateExcerpt) {
	updateExcerpt.addEventListener('input', function() {
		const el = document.getElementById('updatePreviewExcerpt');
		if (el) el.textContent = this.value || 'Your post excerpt will appear here';
	});
}

if (updateCategory) {
	updateCategory.addEventListener('change', function() {
		const el = document.getElementById('updatePreviewCategory');
		if (el) el.textContent = this.value || 'Category';
	});
}

if (updateImageUrl) {
	updateImageUrl.addEventListener('input', function() {
		const img = document.getElementById('updatePreviewImage');
		if (img && this.value) img.src = this.value;
	});
}

function previewUpdatePostImageFile(input) {
	if (input.files && input.files[0]) {
		const reader = new FileReader();
		reader.onload = function(e) {
			const img = document.getElementById('updatePreviewImage');
			if (img) img.src = e.target.result;
			if (updateImageUrl) updateImageUrl.value = '';
		};
		reader.readAsDataURL(input.files[0]);
	}
}
</script>
@endpush
