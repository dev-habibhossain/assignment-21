@extends('admin.layout.admin')

@section('title')
    {{ isset($banner) && $isEdit ? 'Update Banner' : 'Add Banner' }}
@endsection

@section('content')
<div class="min-h-screen bg-gray-50 p-6">
    <div class="max-w-4xl mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">{{ isset($banner) && $isEdit ? 'Update Banner' : 'Add Banner' }}</h1>
            <p class="text-gray-600 mt-2">{{ isset($banner) && $isEdit ? 'Edit your website banner details' : 'Create a new banner for your website' }}</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-md p-8">
            <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($banner) && $isEdit)
                    @method('PUT')
                @endif

                <!-- Banner Image Preview -->
                @if(isset($banner) && $banner)
                    <div class="mb-8">
                        <label class="block text-sm font-semibold text-gray-700 mb-4">Current Banner Image</label>
                        <div class="relative rounded-lg overflow-hidden border border-gray-300 h-48">
                            <img id="imagePreview" src="{{ $banner['image'] }}" alt="Banner" class="w-full h-full object-cover">
                        </div>
                    </div>
                @endif

                <!-- Image Upload Field -->
                <div class="mb-8">
                    <label for="image" class="block text-sm font-semibold text-gray-700 mb-2">Banner Image {{ isset($banner) && $isEdit ? '(Leave empty to keep current)' : '' }}</label>
                    <div class="relative border-2 border-dashed border-gray-300 rounded-lg p-6 hover:border-gray-400 transition cursor-pointer" onclick="document.getElementById('imageInput').click()">
                        <input type="file" id="imageInput" name="image" class="hidden" accept="image/*" onchange="previewImage(this)">
                        <div class="text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20a4 4 0 004 4h24a4 4 0 004-4V20m-6-8l-3.172-3.172a4 4 0 00-5.656 0L28 8m0 0L16 20m12-12v12m0 0v4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <p class="mt-2 text-sm font-medium text-gray-700">Click to upload or drag and drop</p>
                            <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF up to 5MB</p>
                        </div>
                    </div>
                </div>

                <!-- Heading Field -->
                <div class="mb-8">
                    <label for="heading" class="block text-sm font-semibold text-gray-700 mb-2">Banner Heading (H1)</label>
                    <input 
                        type="text" 
                        id="heading" 
                        name="heading" 
                        value="{{ isset($banner) && $banner ? $banner['heading'] : '' }}"
                        placeholder="e.g., Welcome to Our Blog"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        required>
                    <p class="text-xs text-gray-500 mt-1">Main heading that appears on the banner</p>
                </div>

                <!-- Subheading Field -->
                <div class="mb-8">
                    <label for="subheading" class="block text-sm font-semibold text-gray-700 mb-2">Banner Subheading (Subtitle)</label>
                    <textarea 
                        id="subheading" 
                        name="subheading" 
                        placeholder="e.g., Explore amazing stories and insights"
                        rows="3"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                    >{{ isset($banner) && $banner ? $banner['subheading'] : '' }}</textarea>
                    <p class="text-xs text-gray-500 mt-1">Secondary text displayed under the heading</p>
                </div>

                <!-- Preview Section -->
                <div class="mb-8 p-6 bg-blue-50 rounded-lg border border-blue-200">
                    <h3 class="text-sm font-semibold text-gray-700 mb-4">Preview</h3>
                    <div id="bannerPreview" class="relative rounded-lg overflow-hidden h-64 bg-gray-200 flex items-center justify-center text-center" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <div class="text-white px-6 z-10">
                            <h1 id="previewHeading" class="text-4xl font-bold mb-4">{{ isset($banner) && $banner ? $banner['heading'] : 'Your Heading Here' }}</h1>
                            <p id="previewSubheading" class="text-xl text-white text-opacity-90">{{ isset($banner) && $banner ? $banner['subheading'] : 'Your subheading here' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-4">
                    <button type="submit" class="px-8 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition duration-200">
                        {{ isset($banner) && $isEdit ? 'Update Banner' : 'Create Banner' }}
                    </button>
                    <a href="{{ route('admin.home') }}" class="px-8 py-3 bg-gray-300 text-gray-800 font-semibold rounded-lg hover:bg-gray-400 transition duration-200">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('imagePreview');
            if (preview) {
                preview.src = e.target.result;
            } else {
                // Create preview if it doesn't exist
                const previewDiv = document.createElement('div');
                previewDiv.className = 'mb-8';
                previewDiv.innerHTML = '<label class="block text-sm font-semibold text-gray-700 mb-4">Banner Preview</label>' +
                    '<div class="relative rounded-lg overflow-hidden border border-gray-300 h-48">' +
                    '<img id="imagePreview" src="' + e.target.result + '" alt="Preview" class="w-full h-full object-cover">' +
                    '</div>';
                document.querySelector('form').insertBefore(previewDiv, document.querySelector('form').firstChild.nextSibling);
            }
        };
        reader.readAsDataURL(input.files[0]);
    }
}

// Update preview on heading change
document.getElementById('heading').addEventListener('input', function() {
    document.getElementById('previewHeading').textContent = this.value || 'Your Heading Here';
});

// Update preview on subheading change
document.getElementById('subheading').addEventListener('input', function() {
    document.getElementById('previewSubheading').textContent = this.value || 'Your subheading here';
});
</script>
@endsection
