@extends('admin.layout.admin')

@section('title', 'Edit Category: ' . $category->name)

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">Edit Category: {{ $category->name }}</h1>
        <p class="text-gray-600 mt-2">Update the category details and image.</p>
    </div>

    {{-- Validation Error Display --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Whoops!</strong>
            <span class="block sm:inline">There were some problems with your input.</span>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-800 rounded-md hover:bg-gray-200 transition">← Back to categories</a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            {{-- FORM ACTION FIX: Use PUT method and update route --}}
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="categoryName" class="block text-sm font-medium text-gray-700">Category Name</label>
                    <input id="categoryName" name="name" type="text" 
                           value="{{ old('name', $category->name) }}" 
                           placeholder="e.g., Technology" 
                           class="mt-1 block w-full rounded-md border-gray-200 shadow-sm px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200" required>
                </div>

                <div>
                    <label for="categoryDescription" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="categoryDescription" name="description" rows="3" placeholder="Brief description of the category" 
                              class="mt-1 block w-full rounded-md border-gray-200 px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200">{{ old('description', $category->description) }}</textarea>
                </div>

                <div>
                    @php
                        // Check if the current image is a URL or a stored path
                        $imageUrl = (strpos($category->image, 'http') === 0) ? $category->image : '';
                    @endphp
                    <label for="categoryImage" class="block text-sm font-medium text-gray-700">Category Image (URL)</label>
                    <input id="categoryImage" name="image_url" type="url" 
                           value="{{ old('image_url', $imageUrl) }}" 
                           placeholder="https://..." 
                           class="mt-1 block w-full rounded-md border-gray-200 px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200">

                    <div class="mt-3">
                        <div class="relative border-2 border-dashed border-gray-200 rounded-md p-4 hover:border-gray-300 transition cursor-pointer" onclick="document.getElementById('categoryImageFile').click()">
                            <input type="file" id="categoryImageFile" name="image_file" class="hidden" accept="image/*" onchange="previewCategoryImageFile(this)">
                            <div class="text-sm text-gray-600">Or upload a new image file (click to choose)</div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3 mt-2">
                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-gray-900 text-white rounded-md font-semibold hover:bg-black transition">Save Changes</button>
                    <a href="{{ route('admin.categories.index') }}" class="text-sm text-gray-600 hover:text-gray-900">Cancel</a>
                </div>
            </form>
        </div>

        <aside class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Live Preview</h3>
            <div class="space-y-4">
                <div class="rounded-md overflow-hidden border border-gray-200">
                    @php
                        // Set initial preview image from stored path or URL
                        $currentImage = (strpos($category->image, 'http') === 0) 
                            ? $category->image 
                            : ($category->image ? asset('storage/' . $category->image) : 'https://via.placeholder.com/300x200?text=Category+Image');
                    @endphp
                    <img id="categoryPreviewImage" src="{{ $currentImage }}" 
                         alt="Preview Image" 
                         class="w-full h-32 object-cover"
                         onerror="this.onerror=null;this.src='https://via.placeholder.com/300x200?text=Category+Image';">
                         
                    <div class="p-4">
                        <h4 id="categoryPreviewName" class="text-lg font-bold text-gray-900">{{ $category->name }}</h4>
                        <p id="categoryPreviewDescription" class="text-sm text-gray-600 mt-2">{{ $category->description }}</p>
                    </div>
                </div>
                <div class="text-xs text-gray-500">
                    Tip: Using a file upload will clear the URL field.
                </div>
            </div>
        </aside>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Update preview elements as the user types (reused from create page)
const categoryName = document.getElementById('categoryName');
const categoryDescription = document.getElementById('categoryDescription');
const categoryImageUrl = document.getElementById('categoryImage');
const defaultPlaceholder = 'https://via.placeholder.com/300x200?text=Category+Image';

if (categoryName) {
    categoryName.addEventListener('input', function() {
        const el = document.getElementById('categoryPreviewName');
        if (el) el.textContent = this.value || 'Category Name';
    });
}

if (categoryDescription) {
    categoryDescription.addEventListener('input', function() {
        const el = document.getElementById('categoryPreviewDescription');
        if (el) el.textContent = this.value || 'Category description will appear here.';
    });
}

if (categoryImageUrl) {
    categoryImageUrl.addEventListener('input', function() {
        const img = document.getElementById('categoryPreviewImage');
        if (img && this.value) img.src = this.value;
        else if (img) img.src = defaultPlaceholder;
    });
}

function previewCategoryImageFile(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.getElementById('categoryPreviewImage');
            if (img) img.src = e.target.result;
            if (categoryImageUrl) categoryImageUrl.value = ''; // Clear URL field when file is chosen
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush