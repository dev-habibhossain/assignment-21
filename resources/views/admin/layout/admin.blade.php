<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', 'Admin Panel')</title>
	<script src="https://cdn.tailwindcss.com"></script>
	@stack('styles')
	<style>
		/* small helper for admin layout */
		.admin-sidebar { min-height: 100vh; }
	</style>
</head>
<body class="bg-gray-100 text-gray-800">
	<div class="min-h-screen flex">
		<!-- Sidebar -->
		<aside class="admin-sidebar w-64 bg-white border-r border-gray-200 hidden md:block">
			<div class="p-6">
				<a href="/admin" class="text-2xl font-bold text-gray-900">Admin</a>
			</div>
			<nav class="px-4 pb-8">
				<ul class="space-y-1">
					<li><a href="/admin/dashboard" class="block px-4 py-2 rounded hover:bg-gray-50">Dashboard</a></li>
					<li><a href="/admin/posts" class="block px-4 py-2 rounded hover:bg-gray-50">Posts</a></li>
					<li><a href="/admin/categories" class="block px-4 py-2 rounded hover:bg-gray-50">Categories</a></li>
					<li><a href="/admin/users" class="block px-4 py-2 rounded hover:bg-gray-50">Users</a></li>
					<li><a href="/" class="block px-4 py-2 rounded hover:bg-gray-50">View Site</a></li>
				</ul>
			</nav>
		</aside>

		<!-- Main -->
		<div class="flex-1">
			<!-- Topbar -->
			<header class="bg-white border-b border-gray-200">
				<div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
					<div class="flex items-center gap-4">
						<button id="sidebarToggle" class="md:hidden px-2 py-1 rounded bg-gray-100">Menu</button>
						<h1 class="text-lg font-semibold">@yield('title', 'Admin Panel')</h1>
					</div>
					<div class="flex items-center gap-4">
						<span class="text-sm text-gray-600">Signed in as <strong>{{ auth()->user()->name ?? 'Admin' }}</strong></span>
						<a href="/logout" class="px-3 py-1 rounded bg-gray-800 text-white text-sm">Logout</a>
					</div>
				</div>
			</header>

			<!-- Content area -->
			<main class="p-6">
				@yield('content')
			</main>

			<!-- Footer -->
			<footer class="bg-white border-t border-gray-200 mt-8">
				<div class="max-w-6xl mx-auto px-4 py-6 text-sm text-gray-600 text-center">
					&copy; {{ date('Y') }} BlogHub Admin
				</div>
			</footer>
		</div>
	</div>

	@stack('scripts')
</body>
</html>

