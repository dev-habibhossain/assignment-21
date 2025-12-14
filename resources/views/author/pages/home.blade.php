@extends('author.layout.admin')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900">Dashboard</h1>
        <p class="text-gray-600 mt-2">Welcome back! Here's an overview of your blog</p>
    </div>

    <!-- Summary widgets -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition">
            <h4 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Total Posts</h4>
            <div class="text-3xl font-bold text-gray-900 mt-2">128</div>
            <p class="text-sm text-gray-500 mt-2">+8% since last week</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition">
            <h4 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Categories</h4>
            <div class="text-3xl font-bold text-gray-900 mt-2">6</div>
            <p class="text-sm text-gray-500 mt-2">Across your blog</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition">
            <h4 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Subscribers</h4>
            <div class="text-3xl font-bold text-gray-900 mt-2">3,452</div>
            <p class="text-sm text-gray-500 mt-2">+2% since yesterday</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition">
            <h4 class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Comments</h4>
            <div class="text-3xl font-bold text-gray-900 mt-2">14</div>
            <p class="text-sm text-gray-500 mt-2">Pending review</p>
        </div>
    </div>

    <!-- Quick actions -->
    <div class="flex gap-4 mb-8">
        <a href="/admin/posts/create" class="px-6 py-3 bg-gray-800 text-white rounded-lg font-semibold hover:bg-gray-900 transition">+ New Post</a>
        <a href="/admin/banner" class="px-6 py-3 bg-white border border-gray-300 text-gray-800 rounded-lg hover:bg-gray-50 transition">Edit Banner</a>
        <a href="/admin/profile" class="px-6 py-3 bg-white border border-gray-300 text-gray-800 rounded-lg hover:bg-gray-50 transition">Profile</a>
    </div>

    <!-- Recent posts table -->
    <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-x-auto">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-bold text-gray-900">Recent Posts</h3>
        </div>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50 border-b border-gray-200">
                <tr>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wide">Title</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wide">Author</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wide">Category</th>
                    <th class="px-6 py-4 text-left text-xs font-bold text-gray-600 uppercase tracking-wide">Published</th>
                    <th class="px-6 py-4"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Fake rows -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">The Future of Web Development</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">John Doe</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Technology</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Dec 10, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                        <a href="/admin/posts/1/edit" class="text-gray-800 font-semibold hover:text-gray-900">Edit</a>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">Healthy Living Tips</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Sarah Williams</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Lifestyle</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Dec 8, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                        <a href="/admin/posts/2/edit" class="text-gray-800 font-semibold hover:text-gray-900">Edit</a>
                    </td>
                </tr>

                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">Best Travel Destinations</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Alex Martinez</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Travel</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Dec 5, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                        <a href="/admin/posts/3/edit" class="text-gray-800 font-semibold hover:text-gray-900">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Activity panel -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">
        <div class="col-span-2 bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <h3 class="font-bold text-lg text-gray-900 mb-4">Site Activity</h3>
            <ul class="space-y-4 text-sm text-gray-700">
                <li class="flex justify-between items-start border-b border-gray-100 pb-3">
                    <span>New comment on "The Future of Web Development"</span>
                    <span class="text-gray-500 text-xs">2h ago</span>
                </li>
                <li class="flex justify-between items-start border-b border-gray-100 pb-3">
                    <span>New subscriber: alice@example.com</span>
                    <span class="text-gray-500 text-xs">1d ago</span>
                </li>
                <li class="flex justify-between items-start">
                    <span>Post "Healthy Living Tips" published</span>
                    <span class="text-gray-500 text-xs">3d ago</span>
                </li>
            </ul>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
            <h3 class="font-bold text-lg text-gray-900 mb-4">Quick Stats</h3>
            <div class="space-y-4 text-sm text-gray-700">
                <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                    <span class="text-gray-600">Pageviews (24h)</span>
                    <strong class="text-gray-900">8,421</strong>
                </div>
                <div class="flex items-center justify-between border-b border-gray-100 pb-3">
                    <span class="text-gray-600">Unique visitors</span>
                    <strong class="text-gray-900">2,184</strong>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-gray-600">Bounce rate</span>
                    <strong class="text-gray-900">32%</strong>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
