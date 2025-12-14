<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    </style>
</head>
<body class="bg-white text-gray-900">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white border-b border-gray-200">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
            <div class="text-2xl font-bold text-gray-800">BlogHub</div>
            <div class="hidden md:flex gap-8">
                <a href="/" class="text-gray-700 hover:text-gray-900 font-semibold transition">Home</a>
                <a href="/blogs" class="text-gray-700 hover:text-gray-900 font-semibold transition">Blog</a>
                <a href="/categories" class="text-gray-700 hover:text-gray-900 font-semibold transition">Categories</a>
            </div>
            @if (session()->has('user_id'))
            <div class="flex gap-4">
                <button><a href="{{route('custom.logout')}}" class="px-4 py-2 text-gray-800 border border-gray-800 rounded hover:bg-gray-50 transition font-semibold">Logout</a></button>
            </div>
            @else
            <div class="flex gap-4">
                <a href="/login" class="px-4 py-2 text-gray-800 border border-gray-800 rounded hover:bg-gray-50 transition font-semibold">Login</a>
                <a href="/register" class="px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-900 transition font-semibold">Sign Up</a>
            </div>
            @endif
        </div>
    </nav>

    <!-- Main Content -->
   @yield('content')

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-100 py-12 px-4">
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
</body>
</html>
