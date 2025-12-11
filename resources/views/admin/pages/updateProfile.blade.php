@extends('admin.layout.admin')

@section('title', 'Update Profile')

@section('content')
<div class="max-w-3xl mx-auto">
	<div class="bg-white p-6 rounded shadow border border-gray-200">
		<h2 class="text-2xl font-bold mb-4">Update Profile</h2>
		<form action="#" method="POST" class="space-y-4">
			@csrf
			<div>
				<label class="block text-sm font-medium text-gray-700">Full name</label>
				<input type="text" name="name" value="Admin User" class="mt-1 block w-full rounded border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800">
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700">Email</label>
				<input type="email" name="email" value="admin@example.com" class="mt-1 block w-full rounded border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800">
			</div>

			<div>
				<label class="block text-sm font-medium text-gray-700">About (Bio)</label>
				<textarea name="about" rows="5" class="mt-1 block w-full rounded border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800">Full-stack developer, content manager, and community organizer. Passionate about web technologies, tutorials, and developer experience.</textarea>
				<p class="text-xs text-gray-500 mt-2">Write a short bio that will appear on your public profile.</p>
			</div>

			<div class="flex items-center gap-3">
				<button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded font-semibold">Save Profile</button>
				<a href="/admin/profile" class="text-sm text-gray-600">Cancel</a>
			</div>
		</form>
	</div>
</div>
@endsection
