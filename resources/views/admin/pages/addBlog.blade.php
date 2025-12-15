@extends('admin.layout.admin')

@section('title', 'Add Blog')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900">Create New Post</h1>
        <p class="text-gray-600 mt-2">Add a new blog post to your website</p>
    </div>
    <div class="bg-white p-8 rounded-lg shadow-md border border-gray-200">
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Post Title</label>
                {{-- ***FIX HERE: Added id="postTitle" for JavaScript preview*** --}}
                <input type="text" id="postTitle" name="title" value="{{ old('title') }}" placeholder="e.g., The Future of Web Development" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent" required>
                <p class="text-xs text-gray-500 mt-1">Main heading for your blog post</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                    {{-- Updated name to category_id and made it dynamic --}}
                    <select id="postCategory" name="category_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent" required>
                         <option value="" disabled selected>Select a Category</option>
                         @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Publish Status</label>
                    <div class="mt-1">
                        <label class="inline-flex items-center">
                            {{-- This input is used to set the published_date in the controller --}}
                            <input type="checkbox" name="published" class="form-checkbox h-5 w-5 text-gray-800" checked>
                            <span class="ml-2 text-sm text-gray-700">Publish immediately</span>
                        </label>
                    </div>
                </div>
            </div>

            <div>
                {{-- Form name 'excerpt' mapped to table 'summary' --}}
                <label class="block text-sm font-semibold text-gray-700 mb-2">Excerpt / Summary</label>
                <textarea id="postExcerpt" name="excerpt" rows="3" placeholder="Brief summary of your post" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent">{{ old('excerpt') }}</textarea>
                <p class="text-xs text-gray-500 mt-1">Short preview text shown in post listings</p>
            </div>

            <div>
                {{-- Form name 'full_desc' mapped to table 'full_desc' --}}
                <label class="block text-sm font-semibold text-gray-700 mb-2">Full Content</label>
                {{-- ***NOTE: Corrected old() helper to use 'full_desc' (as previously discussed)*** --}}
                <textarea name="full_desc" rows="10" placeholder="Write your full article content here..." class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent">{{ old('full_desc') }}</textarea>
                <p class="text-xs text-gray-500 mt-1">The main body of your blog post</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    {{-- Image Upload Section --}}
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Featured Image</label>
                    
                    {{-- File Upload Input --}}
                    <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 hover:border-gray-400 transition cursor-pointer" onclick="document.getElementById('postImageFile').click()">
                        <input type="file" id="postImageFile" name="image_file" class="hidden" accept="image/*" onchange="previewPostImageFile(this)">
                        <div class="text-sm text-gray-600 text-center">
                            Click to **upload** an image file (PNG, JPG, GIF)
                        </div>
                    </div>

                    {{-- Image URL Fallback Input --}}
                    <label class="block text-sm font-semibold text-gray-700 mt-4 mb-2">... or use Image URL</label>
                    <input type="url" id="postImage" name="image_url" value="{{ old('image_url') }}" placeholder="https://example.com/image.jpg" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent">
                    <p class="text-xs text-gray-500 mt-1">URL to your featured image</p>
                    
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tags</label>
                    <input type="text" name="tags" value="{{ old('tags') }}" placeholder="tag1, tag2, tag3" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent">
                    <p class="text-xs text-gray-500 mt-1">Comma-separated tags for categorization</p>
                </div>
            </div>

            <div class="p-6 bg-gray-50 rounded-lg border border-gray-200">
                <h3 class="text-sm font-semibold text-gray-700 mb-4">Post Preview</h3>
                <div class="bg-white rounded-lg border border-gray-300 overflow-hidden">
                    <img id="previewImage" src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=1200&h=600&fit=crop" alt="Post" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="mb-2">
                            <span id="previewCategory" class="inline-block px-3 py-1 bg-gray-200 text-gray-700 text-xs font-semibold rounded-full">Technology</span>
                        </div>
                        <h4 id="previewTitle" class="text-xl font-bold text-gray-900 mb-2">The Future of Web Development</h4>
                        <p id="previewExcerpt" class="text-sm text-gray-600">Explore the latest trends and technologies that are shaping the future of web development.</p>
                    </div>
                </div>
            </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="px-8 py-3 bg-gray-800 text-white rounded-lg font-semibold hover:bg-gray-900 transition">
                Create Post
            </button>
            <a href="{{ route('admin.posts.index') }}" class="px-8 py-3 bg-gray-200 text-gray-800 rounded-lg font-semibold hover:bg-gray-300 transition">
                Cancel
            </a>
        </div>
        </form>
    </div>
</div>

<script>
// Update preview on title change
document.getElementById('postTitle').addEventListener('input', function() {
    document.getElementById('previewTitle').textContent = this.value || 'Your Post Title Here';
});

// Update preview on excerpt change (using 'postExcerpt' id)
document.getElementById('postExcerpt').addEventListener('input', function() {
    document.getElementById('previewExcerpt').textContent = this.value || 'Your post excerpt will appear here';
});

// Update preview on category change (Updated to show selected text, not the ID)
document.getElementById('postCategory').addEventListener('change', function() {
    const selectedText = this.options[this.selectedIndex].text;
    document.getElementById('previewCategory').textContent = selectedText || 'Category';
});

// Update preview on image URL change (using 'postImage' id)
document.getElementById('postImage').addEventListener('input', function() {
    const img = document.getElementById('previewImage');
    img.src = this.value || 'https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=1200&h=600&fit=crop';
});

// Handle file input preview for addBlog (using 'postImageFile' id)
function previewPostImageFile(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImage').src = e.target.result;
            // Clear the URL field to prioritize the file path in the controller logic
            document.getElementById('postImage').value = ''; 
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection