@extends('admin.layout.admin')

@section('title', 'Update Profile')

@section('content')
<div class="max-w-3xl mx-auto">
	<!-- Page Header -->
	<div class="mb-8">
		<h1 class="text-4xl font-bold text-gray-900">Update Profile</h1>
		<p class="text-gray-600 mt-2">Edit your account details and bio</p>
	</div>
	<div class="bg-white p-8 rounded-lg shadow-md border border-gray-200">
		<form action="#" method="POST" class="space-y-6">
			@csrf
			<div>
				<label class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
				<input type="text" name="name" value="Admin User" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent">
				<p class="text-xs text-gray-500 mt-1">Your full name as displayed on your profile</p>
			</div>

			<div>
				<label class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
				<input type="email" name="email" value="admin@example.com" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent">
				<p class="text-xs text-gray-500 mt-1">Your email address used for login</p>
			</div>

			<div>
				<label class="block text-sm font-semibold text-gray-700 mb-2">About / Bio</label>
				<textarea name="about" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-800 focus:border-transparent">Full-stack developer, content manager, and community organizer. Passionate about web technologies, tutorials, and developer experience.</textarea>
				<p class="text-xs text-gray-500 mt-1">Write a short bio that will appear on your public profile (max 500 characters)</p>
			</div>

			<!-- Preview Section -->
			<div class="p-6 bg-gray-50 rounded-lg border border-gray-200">
				<h3 class="text-sm font-semibold text-gray-700 mb-4">Profile Preview</h3>
				<!-- Image upload area (like banner) -->
				<div class="mb-4">
					<label class="block text-sm font-semibold text-gray-700 mb-2">Profile Image</label>
					<div class="relative border-2 border-dashed border-gray-300 rounded-lg p-4 hover:border-gray-400 transition cursor-pointer" onclick="document.getElementById('profileImageInput').click()">
						<input type="file" id="profileImageInput" name="profile_image" class="hidden" accept="image/*" onchange="previewProfileImage(this)">
						<div class="flex items-center gap-4">
							<img id="profilePreviewImage" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=200&h=200&fit=crop" alt="Profile" class="w-24 h-24 rounded-full mb-0">
							<div class="text-sm text-gray-600">Click to upload or drag and drop a profile image.</div>
						</div>
					</div>
				</div>
				<div class="bg-white rounded-lg border border-gray-300 p-6">
					<div class="text-center">
						<h4 id="previewName" class="text-lg font-bold text-gray-900">Admin User</h4>
						<p id="previewBio" class="text-sm text-gray-600 mt-2">Full-stack developer, content manager, and community organizer. Passionate about web technologies, tutorials, and developer experience.</p>
					</div>
				</div>
			</div>

			<!-- Action Buttons -->
			<div class="flex gap-4">
				<button type="submit" class="px-8 py-3 bg-gray-800 text-white font-semibold rounded-lg hover:bg-gray-900 transition">
					Save Profile
				</button>
				<a href="/admin/profile" class="px-8 py-3 bg-gray-200 text-gray-800 font-semibold rounded-lg hover:bg-gray-300 transition">
					Cancel
				</a>
			</div>
		</form>
	</div>
</div>

<script>
// Update preview on name change
document.querySelector('input[name="name"]').addEventListener('input', function() {
	document.getElementById('previewName').textContent = this.value || 'Admin User';
});

// Update preview on bio change
document.querySelector('textarea[name="about"]').addEventListener('input', function() {
	document.getElementById('previewBio').textContent = this.value || 'Your bio here';
});

// Preview profile image when a file is chosen
function previewProfileImage(input) {
	if (input.files && input.files[0]) {
		const reader = new FileReader();
		reader.onload = function(e) {
			const img = document.getElementById('profilePreviewImage');
			if (img) img.src = e.target.result;
		};
		reader.readAsDataURL(input.files[0]);
	}
}
</script>
@endsection
