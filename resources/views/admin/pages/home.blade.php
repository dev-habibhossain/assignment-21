@extends('admin.layout.admin')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Summary widgets -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-4 rounded shadow border border-gray-200">
            <h4 class="text-sm text-gray-500">Total Posts</h4>
            <div class="text-2xl font-bold text-gray-800">128</div>
            <p class="text-xs text-gray-400 mt-2">+8% since last week</p>
        </div>

        <div class="bg-white p-4 rounded shadow border border-gray-200">
            <h4 class="text-sm text-gray-500">Categories</h4>
            <div class="text-2xl font-bold text-gray-800">6</div>
            <p class="text-xs text-gray-400 mt-2">Static count</p>
        </div>

        <div class="bg-white p-4 rounded shadow border border-gray-200">
            <h4 class="text-sm text-gray-500">Subscribers</h4>
            <div class="text-2xl font-bold text-gray-800">3,452</div>
            <p class="text-xs text-gray-400 mt-2">+2% since yesterday</p>
        </div>

        <div class="bg-white p-4 rounded shadow border border-gray-200">
            <h4 class="text-sm text-gray-500">Pending Comments</h4>
            <div class="text-2xl font-bold text-gray-800">14</div>
            <p class="text-xs text-gray-400 mt-2">Requires review</p>
        </div>
    </div>

    <!-- Quick actions -->
    <div class="flex gap-4 mb-8">
        <a href="/admin/posts/create" class="px-4 py-2 bg-gray-800 text-white rounded font-semibold hover:bg-gray-900">New Post</a>
        <a href="/admin/categories" class="px-4 py-2 bg-white border border-gray-200 rounded hover:bg-gray-50">Manage Categories</a>
        <a href="/admin/users" class="px-4 py-2 bg-white border border-gray-200 rounded hover:bg-gray-50">Manage Users</a>
    </div>

    <!-- Recent posts table -->
    <div class="bg-white rounded shadow border border-gray-200 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Author</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Published</th>
                    <th class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- Fake rows -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">The Future of Web Development</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">John Doe</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Technology</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Dec 10, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                        <a href="/admin/posts/1/edit" class="text-gray-800 font-semibold">Edit</a>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">Healthy Living Tips</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Sarah Williams</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Lifestyle</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Dec 8, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                        <a href="/admin/posts/2/edit" class="text-gray-800 font-semibold">Edit</a>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">Best Travel Destinations</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Alex Martinez</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Travel</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">Dec 5, 2025</td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                        <a href="/admin/posts/3/edit" class="text-gray-800 font-semibold">Edit</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Activity panel -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-8">
        <div class="col-span-2 bg-white p-6 rounded shadow border border-gray-200">
            <h3 class="font-bold text-lg mb-4">Site Activity</h3>
            <ul class="space-y-3 text-sm text-gray-700">
                <li>New comment on "The Future of Web Development" — <span class="text-gray-500">2 hours ago</span></li>
                <li>New subscriber: alice@example.com — <span class="text-gray-500">1 day ago</span></li>
                <li>Post "Healthy Living Tips" published — <span class="text-gray-500">3 days ago</span></li>
            </ul>
        </div>

        <div class="bg-white p-6 rounded shadow border border-gray-200">
            <h3 class="font-bold text-lg mb-4">Quick Stats</h3>
            <div class="space-y-3 text-sm text-gray-700">
                <div class="flex items-center justify-between"><span>Pageviews (24h)</span><strong>8,421</strong></div>
                <div class="flex items-center justify-between"><span>Unique visitors</span><strong>2,184</strong></div>
                <div class="flex items-center justify-between"><span>Bounce rate</span><strong>32%</strong></div>
            </div>
        </div>
    </div>

</div>
@endsection
