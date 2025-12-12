@extends('admin.layout.admin')

@section('title', 'Add New Category')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900">Add New Category</h1>
        <p class="text-gray-600 mt-2">Create a new category with an image and description.</p>
    </div>

    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <a href="/admin/dashboard/categories" class="inline-flex items-center gap-2 px-4 py-2 bg-gray-100 text-gray-800 rounded-md hover:bg-gray-200 transition">← Back to categories</a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label for="categoryName" class="block text-sm font-medium text-gray-700">Category Name</label>
                    <input id="categoryName" name="name" type="text" placeholder="e.g., Technology" class="mt-1 block w-full rounded-md border-gray-200 shadow-sm px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200" required>
                </div>

                <div>
                    <label for="categoryDescription" class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea id="categoryDescription" name="description" rows="3" placeholder="Brief description of the category" class="mt-1 block w-full rounded-md border-gray-200 px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200"></textarea>
                </div>

                <div>
                    <label for="categoryImage" class="block text-sm font-medium text-gray-700">Category Image (URL)</label>
                    <input id="categoryImage" name="image_url" type="url" placeholder="https://..." class="mt-1 block w-full rounded-md border-gray-200 px-4 py-3 focus:border-gray-800 focus:ring-2 focus:ring-gray-200">

                    <div class="mt-3">
                        <div class="relative border-2 border-dashed border-gray-200 rounded-md p-4 hover:border-gray-300 transition cursor-pointer" onclick="document.getElementById('categoryImageFile').click()">
                            <input type="file" id="categoryImageFile" name="image_file" class="hidden" accept="image/*" onchange="previewCategoryImageFile(this)">
                            <div class="text-sm text-gray-600">Or upload an image file (click to choose)</div>
                        </div>
                    </div>
                </div>

                <div class="flex items-center gap-3 mt-2">
                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-gray-900 text-white rounded-md font-semibold hover:bg-black transition">Create Category</button>
                    <a href="/admin/dashboard/categories" class="text-sm text-gray-600 hover:text-gray-900">Cancel</a>
                </div>
            </form>
        </div>

        <!-- Preview Column -->
        <aside class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Live Preview</h3>
            <div class="space-y-4">
                <div class="rounded-md overflow-hidden border border-gray-200">
                    <img id="categoryPreviewImage" src="https://via.placeholder.com/300x200?text=Category+Image" alt="Preview Image" class="w-full h-32 object-cover">
                    <div class="p-4">
                        <h4 id="categoryPreviewName" class="text-lg font-bold text-gray-900">Category Name</h4>
                        <p id="categoryPreviewDescription" class="text-sm text-gray-600 mt-2">Category description will appear here.</p>
                    </div>
                </div>

                <div class="text-xs text-gray-500">
                    Tip: Use an image of at least 300×200 for best results.
                </div>
            </div>
        </aside>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Update preview elements as the user types
const categoryName = document.getElementById('categoryName');
const categoryDescription = document.getElementById('categoryDescription');
const categoryImageUrl = document.getElementById('categoryImage');

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
    });
}

function previewCategoryImageFile(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.getElementById('categoryPreviewImage');
            if (img) img.src = e.target.result;
            if (categoryImageUrl) categoryImageUrl.value = '';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
