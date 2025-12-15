@extends('admin.layout.admin')

@section('title', 'Edit Blog Post')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="mb-8">
        {{-- Display actual title --}}
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">Edit Blog Post: {{ $blog->title }}</h1>
        <p class="text-gray-600 mt-2">Make changes and preview how the post will appear on the site.</p>
    </div>

    {{-- Validation Error Display --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Validation Error!</strong>
            <span class="block sm:inline">Please correct the following issues:</span>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.posts.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-800 rounded-md hover:bg-gray-200 transition">← Back to posts</a>
            
            {{-- DELETE FORM FIX: Use the named route and dynamic ID --}}
            <form action="{{ route('admin.posts.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                @csrf
                @method('DELETE')
                <button class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">Delete Post</button>
            </form>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            {{-- FORM ACTION FIX: Use the named route and dynamic ID --}}
            <form action="{{ route('admin.posts.update', $blog->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="updatePostTitle" class="block text-sm font-medium text-gray-700">Title</label>
                    {{-- DYNAMIC DATA: $blog->title --}}
                    <input id="updatePostTitle" name="title" type="text" 
                           value="{{ old('title', $blog->title) }}" 
                           placeholder="e.g., The Future of Web Development" 
                           class="mt-1 block w-full rounded-md border-gray-200 shadow-sm px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200" required>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="updatePostCategory" class="block text-sm font-medium text-gray-700">Category</label>
                        {{-- FORM NAME FIX: Changed name to 'category_id' --}}
                        <select id="updatePostCategory" name="category_id" class="mt-1 block w-full rounded-md border-gray-200 px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200">
                            <option value="" disabled>Select a Category</option>
                            {{-- DYNAMIC DATA: Loop through $categories and select current one --}}
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ old('category_id', $blog->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Status</label>
                        <div class="mt-1 flex items-center gap-4">
                            <label class="inline-flex items-center cursor-pointer">
                                {{-- DYNAMIC DATA: Check if published_date is NOT NULL --}}
                                <input type="checkbox" name="published" class="h-5 w-5 text-gray-800 rounded" 
                                       {{ old('published', $blog->published_date) ? 'checked' : '' }}>
                                <span class="ml-2 text-sm text-gray-700">Published</span>
                            </label>
                            <span class="text-xs text-gray-500">Toggle to publish or unpublish</span>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="updatePostExcerpt" class="block text-sm font-medium text-gray-700">Excerpt</label>
                    {{-- DYNAMIC DATA: $blog->summary (Mapped from 'excerpt' form field) --}}
                    <textarea id="updatePostExcerpt" name="excerpt" rows="3" placeholder="Short summary for list views" 
                              class="mt-1 block w-full rounded-md border-gray-200 px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200">{{ old('excerpt', $blog->summary) }}</textarea>
                </div>

                <div>
                    <label for="updateContent" class="block text-sm font-medium text-gray-700">Content</label>
                    {{-- FORM NAME FIX: Changed name to 'full_desc' --}}
                    {{-- DYNAMIC DATA: $blog->full_desc (Mapped from 'content' form field) --}}
                    <textarea id="updateContent" name="full_desc" rows="10" placeholder="Write your full article here..." 
                              class="mt-1 block w-full rounded-md border-gray-200 px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200">{{ old('full_desc', $blog->full_desc) }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="updatePostImage" class="block text-sm font-medium text-gray-700">Featured Image (URL)</label>
                        {{-- DYNAMIC DATA: $blog->image. Check if it's a URL or a file path --}}
                        <input id="updatePostImage" name="image_url" type="url" 
                               value="{{ old('image_url', (strpos($blog->image, 'http') === 0 ? $blog->image : '')) }}" 
                               placeholder="https://..." 
                               class="mt-1 block w-full rounded-md border-gray-200 px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200">

                        <div class="mt-3">
                            <div class="relative border-2 border-dashed border-gray-200 rounded-md p-4 hover:border-gray-300 transition cursor-pointer" onclick="document.getElementById('updatePostImageFile').click()">
                                <input type="file" id="updatePostImageFile" name="image_file" class="hidden" accept="image/*" onchange="previewUpdatePostImageFile(this)">
                                <div class="text-sm text-gray-600">Or upload an image file (click to choose)</div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="updatePostTags" class="block text-sm font-medium text-gray-700">Tags</label>
                        {{-- DYNAMIC DATA: $blog->tags --}}
                        <input id="updatePostTags" name="tags" type="text" 
                               value="{{ old('tags', $blog->tags) }}" 
                               placeholder="tag1, tag2, tag3" 
                               class="mt-1 block w-full rounded-md border-gray-200 px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200">
                        <p class="text-xs text-gray-500 mt-2">Comma-separated tags</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 mt-2">
                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-gray-900 text-white rounded-md font-semibold hover:bg-black transition">Save Changes</button>
                    <a href="{{ route('admin.posts.index') }}" class="text-sm text-gray-600 hover:text-gray-900">Cancel</a>
                </div>
            </form>
        </div>

        <aside class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Live Preview</h3>
            <div class="space-y-4">
                <div class="rounded-md overflow-hidden border border-gray-200">
                    {{-- DYNAMIC DATA: $blog->image for initial preview --}}
                    <img id="updatePreviewImage" 
                         src="{{ asset('storage/' . $blog->image) }}" 
                         onerror="this.onerror=null;this.src='https://via.placeholder.com/1200x600?text=No+Image';" 
                         alt="Preview Image" class="w-full h-44 object-cover">
                    <div class="p-4">
                        <div class="mb-3">
                            {{-- DYNAMIC DATA: $blog->category->name --}}
                            <span id="updatePreviewCategory" class="inline-block px-3 py-1 bg-gray-100 text-gray-700 text-xs font-semibold rounded-full">
                                {{ $blog->category->name ?? 'Category' }}
                            </span>
                        </div>
                        {{-- DYNAMIC DATA: $blog->title --}}
                        <h4 id="updatePreviewTitle" class="text-xl font-bold text-gray-900">{{ $blog->title }}</h4>
                        {{-- DYNAMIC DATA: $blog->summary --}}
                        <p id="updatePreviewExcerpt" class="text-sm text-gray-600 mt-2">{{ $blog->summary }}</p>
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
// Find the initial category name for the preview
const initialCategory = document.getElementById('updatePostCategory').options[document.getElementById('updatePostCategory').selectedIndex].text;
const previewCategoryEl = document.getElementById('updatePreviewCategory');
if (previewCategoryEl) {
    previewCategoryEl.textContent = initialCategory || 'Category';
}

// Update preview elements as the user types
const updateTitle = document.getElementById('updatePostTitle');
const updateExcerpt = document.getElementById('updatePostExcerpt');
const updateCategory = document.getElementById('updatePostCategory');
const updateImageUrl = document.getElementById('updatePostImage');
const defaultPlaceholderImage = 'https://via.placeholder.com/1200x600?text=No+Image';


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
        const selectedText = this.options[this.selectedIndex].text;
        const el = document.getElementById('updatePreviewCategory');
        if (el) el.textContent = selectedText || 'Category';
    });
}

if (updateImageUrl) {
    updateImageUrl.addEventListener('input', function() {
        const img = document.getElementById('updatePreviewImage');
        if (img) img.src = this.value || defaultPlaceholderImage;
    });
}

function previewUpdatePostImageFile(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.getElementById('updatePreviewImage');
            if (img) img.src = e.target.result;
            if (updateImageUrl) updateImageUrl.value = ''; // Clear URL field when file is chosen
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush