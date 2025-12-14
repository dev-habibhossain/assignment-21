@extends('admin.layout.admin')

@section('title', 'Profile')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900">Admin Profile</h1>
        <p class="text-gray-600 mt-2">Manage your account information</p>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Profile Card -->
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <div class="flex flex-col items-center text-center">
                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=200&h=200&fit=crop" alt="Admin" class="w-28 h-28 rounded-full mb-4">
                <h2 class="text-xl font-bold text-gray-800">Admin User</h2>
                <p class="text-sm text-gray-500">Administrator</p>
                <p class="text-sm text-gray-600 mt-3">admin@example.com</p>
                <div class="mt-6 w-full">
                    <div class="grid grid-cols-3 gap-3 text-center">
                        <div>
                            <div class="text-2xl font-bold">128</div>
                            <div class="text-xs text-gray-500">Posts</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold">3,452</div>
                            <div class="text-xs text-gray-500">Subscribers</div>
                        </div>
                        <div>
                            <div class="text-2xl font-bold">14</div>
                            <div class="text-xs text-gray-500">Comments</div>
                        </div>
                    </div>
                </div>
                <a href="profile/edit" class="mt-6 inline-block px-6 py-2 bg-gray-800 text-white rounded-lg font-semibold hover:bg-gray-900 transition\">Edit Profile</a>
            </div>
        </div>

        <!-- Profile Edit Form -->
        <div class="lg:col-span-2 bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <h3 class="text-lg font-bold mb-4">Profile Details</h3>
            <form action="#" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Full name</label>
                        <input type="text" name="name" value="Admin User" class="mt-1 block w-full rounded border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="admin@example.com" class="mt-1 block w-full rounded border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Role</label>
                        <input type="text" name="role" value="Administrator" class="mt-1 block w-full rounded border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Location</label>
                        <input type="text" name="location" value="Remote" class="mt-1 block w-full rounded border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Bio</label>
                    <textarea name="bio" rows="4" class="mt-1 block w-full rounded border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800">Full-stack developer and content manager. Loves writing about technology and web development.</textarea>
                </div>

                <div class="flex items-center gap-3">
                    <button type="submit" class="px-6 py-2 bg-gray-800 text-white rounded-lg font-semibold hover:bg-gray-900 transition">Save Changes</button>
                    <a href="/admin" class="text-sm text-gray-600 hover:text-gray-900">Cancel</a>
                </div>
            </form>

            <!-- Change Password -->
            <div class="mt-8 border-t pt-6">
                <h4 class="font-bold mb-3">Change Password</h4>
                <form action="#" method="POST" class="space-y-4 max-w-md">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Current password</label>
                        <input type="password" name="current_password" class="mt-1 block w-full rounded border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">New password</label>
                        <input type="password" name="password" class="mt-1 block w-full rounded border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Confirm password</label>
                        <input type="password" name="password_confirmation" class="mt-1 block w-full rounded border-gray-300 focus:border-gray-800 focus:ring-1 focus:ring-gray-800">
                    </div>
                    <div>
                        <button type="submit" class="px-6 py-2 bg-gray-800 text-white rounded-lg font-semibold hover:bg-gray-900 transition">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
