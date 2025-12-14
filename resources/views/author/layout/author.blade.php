<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', 'Author Panel')</title>
	<script src="https://cdn.tailwindcss.com"></script>
	@stack('styles')
	<style>
		:root {
			--primary: #3b82f6;
			--primary-dark: #1e40af;
			--accent: #f59e0b;
			--background: #ffffff;
			--foreground: #1f2937;
			--muted: #9ca3af;
			--border: #e5e7eb;
		}
		.admin-sidebar { min-height: 100vh; }
	</style>
</head>
<body class="bg-gray-50 text-gray-900">
	<div class="min-h-screen flex flex-col">
		<!-- Top Navigation Bar -->
		<nav class="sticky top-0 z-50 bg-white border-b border-gray-200">
			<div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
				<div class="flex items-center gap-6">
					<a href="/author" class="text-2xl font-bold text-gray-800">BlogHub Author</a>
				</div>
				<div class="flex items-center gap-6">
					<a href="/" class="text-gray-700 hover:text-gray-900 font-semibold transition">← Back to Site</a>
					<span class="text-sm text-gray-600">Welcome, <strong>{{ auth()->user()->name ?? 'Author' }}</strong></span>
					<a href="/logout" class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-900 transition font-semibold text-sm">Logout</a>
				</div>
			</div>
		</nav>

		<!-- Main Content with Sidebar -->
		<div class="flex flex-1">
			<!-- Sidebar -->
			<aside class="w-64 bg-white border-r border-gray-200 hidden md:block">
				<nav class="p-6">
					<h3 class="text-xs font-bold text-gray-500 uppercase tracking-wider mb-6">Menu</h3>
					<ul class="space-y-2">
						<li><a href="/author/dashboard" class="block px-4 py-3 rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition font-semibold">Dashboard</a></li>
						<li><a href="/author/posts" class="block px-4 py-3 rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition font-semibold">Posts</a></li>
						<li><a href="/author/categories" class="block px-4 py-3 rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition font-semibold">Categories</a></li>
						<li><a href="/author/profile" class="block px-4 py-3 rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition font-semibold">Profile</a></li>
						<li><hr class="my-3 border-gray-200"></li>
						<li><a href="/" class="block px-4 py-3 rounded text-gray-700 hover:bg-gray-100 hover:text-gray-900 transition font-semibold">View Site</a></li>
					</ul>
				</nav>
			</aside>

			<!-- Main Content -->
			<main class="flex-1 p-8">
				@yield('content')
			</main>
		</div>

		<!-- Footer -->
		<footer class="bg-gray-900 text-gray-100 py-12 px-4 mt-12">
			<div class="max-w-6xl mx-auto">
				<div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-8">
					<div>
						<h4 class="font-semibold mb-4">Product</h4>
						<ul class="space-y-2 text-sm text-gray-400">
							<li><a href="#" class="hover:text-white transition">Features</a></li>
							<li><a href="#" class="hover:text-white transition">Pricing</a></li>
							<li><a href="#" class="hover:text-white transition">Security</a></li>
						</ul>
					</div>
					<div>
						<h4 class="font-semibold mb-4">Company</h4>
						<ul class="space-y-2 text-sm text-gray-400">
							<li><a href="#" class="hover:text-white transition">About</a></li>
							<li><a href="#" class="hover:text-white transition">Blog</a></li>
							<li><a href="#" class="hover:text-white transition">Careers</a></li>
						</ul>
					</div>
					<div>
						<h4 class="font-semibold mb-4">Legal</h4>
						<ul class="space-y-2 text-sm text-gray-400">
							<li><a href="#" class="hover:text-white transition">Privacy</a></li>
							<li><a href="#" class="hover:text-white transition">Terms</a></li>
							<li><a href="#" class="hover:text-white transition">Contact</a></li>
						</ul>
					</div>
					<div>
						<h4 class="font-semibold mb-4">Social</h4>
						<ul class="space-y-2 text-sm text-gray-400">
							<li><a href="#" class="hover:text-white transition">Twitter</a></li>
							<li><a href="#" class="hover:text-white transition">GitHub</a></li>
							<li><a href="#" class="hover:text-white transition">LinkedIn</a></li>
						</ul>
					</div>
				</div>
				<div class="border-t border-gray-800 pt-8 text-center text-sm text-gray-400">
					<p>&copy; 2025 BlogHub. All rights reserved.</p>
				</div>
			</div>
		</footer>
	</div>

	@stack('scripts')
</body>
</html>

