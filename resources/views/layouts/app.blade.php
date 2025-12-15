<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Welcome to BlogHub')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Define a core color palette for the public site */
        :root {
            --primary-blue: #2563eb; /* Blue-600 */
            --primary-dark: #1e40af; /* Blue-800 */
            --accent-gray: #f3f4f6; /* Gray-100 */
        }
        
        /* Apply a clean font stack for better typography */
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
            background-color: #ffffff;
        }
    </style>
    @stack('styles')
</head>
<body class="text-gray-900 antialiased min-h-screen flex flex-col">
    <nav class="sticky top-0 z-50 bg-white shadow-sm border-b border-gray-100">
        {{-- Increased vertical padding (h-20 approx) --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            
            {{-- Logo --}}
            <a href="/" class="text-3xl font-extrabold text-gray-900 tracking-tight">BlogHub</a>
            
            {{-- Nav Links --}}
            <div class="hidden md:flex gap-8">
                <a href="/" class="text-gray-700 hover:text-blue-600 font-medium text-lg transition duration-200">Home</a>
                <a href="/blogs" class="text-gray-700 hover:text-blue-600 font-medium text-lg transition duration-200">Blog</a>
                <a href="/categories" class="text-gray-700 hover:text-blue-600 font-medium text-lg transition duration-200">Categories</a>
                {{-- Optional: Add a subtle button for a key resource --}}
                <a href="/about" class="text-gray-700 hover:text-blue-600 font-medium text-lg transition duration-200">About</a>
            </div>
            
            {{-- Auth Buttons (Clear Visual Hierarchy) --}}
            @if (session()->has('user_id'))
            <div class="flex gap-4 items-center">
                 {{-- Placeholder for User Avatar/Name when logged in --}}
                 <a href="{{ route('admin.home') }}" class="text-gray-700 hover:text-blue-600 font-semibold transition">Dashboard</a>
                 <a href="{{route('custom.logout')}}" class="px-5 py-2.5 text-white bg-red-600 rounded-lg hover:bg-red-700 transition font-semibold shadow-md">Logout</a>
            </div>
            @else
            <div class="flex gap-3 items-center">
                {{-- Secondary Action (Login) --}}
                <a href="/login" class="px-5 py-2.5 text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-50 transition font-semibold">
                    Login
                </a>
                {{-- Primary Action (Sign Up) --}}
                <a href="/register" class="px-5 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold shadow-lg shadow-blue-200/50">
                    Get Started
                </a>
            </div>
            @endif
        </div>
    </nav>

    <main class="flex-1">
        @yield('content')
   </main>

    <footer class="bg-gray-800 text-gray-300 py-12 px-4 mt-auto">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-8 mb-10">
                
                {{-- Column 1: Logo & Mission --}}
                <div class="col-span-2 md:col-span-1">
                    <h4 class="text-xl font-extrabold text-white mb-3">BlogHub</h4>
                    <p class="text-sm text-gray-400">
                        The center for great ideas and insightful articles.
                    </p>
                </div>
                
                {{-- Column 2: Quick Links --}}
                <div>
                    <h4 class="font-semibold text-white mb-4">Explore</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="/" class="hover:text-white transition">Home</a></li>
                        <li><a href="/blogs" class="hover:text-white transition">All Posts</a></li>
                        <li><a href="/categories" class="hover:text-white transition">Topics</a></li>
                    </ul>
                </div>
                
                {{-- Column 3: Company --}}
                <div>
                    <h4 class="font-semibold text-white mb-4">Company</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="hover:text-white transition">About Us</a></li>
                        <li><a href="#" class="hover:text-white transition">Careers</a></li>
                        <li><a href="#" class="hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                
                {{-- Column 4: Legal --}}
                <div>
                    <h4 class="font-semibold text-white mb-4">Legal</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="hover:text-white transition">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-white transition">Terms of Service</a></li>
                    </ul>
                </div>
                
                {{-- Column 5: Social / Newsletter (Example) --}}
                <div class="col-span-2 md:col-span-1">
                    <h4 class="font-semibold text-white mb-4">Stay Connected</h4>
                    <p class="text-sm text-gray-400 mb-4">
                        Follow us on social media for updates.
                    </p>
                    <div class="flex gap-4 text-xl">
                        {{-- Social Icons Placeholder --}}
                        <a href="#" class="hover:text-white transition">T</a> 
                        <a href="#" class="hover:text-white transition">F</a>
                        <a href="#" class="hover:text-white transition">L</a>
                    </div>
                </div>
            </div>
            
            {{-- Copyright Strip (Subtle separation) --}}
            <div class="border-t border-gray-700 pt-6 text-center text-sm text-gray-500">
                <p>&copy; {{ date('Y') }} BlogHub. All rights reserved.</p>
            </div>
        </div>
    </footer>
    @stack('scripts')
</body>
</html>