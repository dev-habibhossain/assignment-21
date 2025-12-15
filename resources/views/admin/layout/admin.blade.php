<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @stack('styles')
    <style>
        /* Define a Deep Charcoal and Blue Accent theme */
        :root {
            --sidebar-bg: #111827; /* Deep Charcoal (bg-gray-900) */
            --sidebar-text: #f3f4f6; /* Very light Gray */
            --sidebar-active: #3b82f6; /* Bright Blue accent */
            --header-bg: #ffffff;
            --main-bg: #f9fafb; /* Soft Off-White */
        }
        
        body {
            background-color: var(--main-bg);
        }

        /* Custom class for active sidebar links */
        .sidebar-link {
            transition: all 0.15s ease-in-out;
            border-left: 4px solid transparent;
        }
        .sidebar-link:hover {
            background-color: #1f2937; /* Slightly lighter charcoal for hover */
        }
        /* Active link styling */
        .sidebar-link.active {
            background-color: #1f2937; 
            color: var(--sidebar-active);
            border-left-color: var(--sidebar-active);
            font-weight: 600;
        }
    </style>
</head>
<body class="text-gray-900">

   {{-- 💡 Data Retrieval Logic for the Profile Display 💡 --}}
    @php
        // 1. Get the user ID from the session as requested
        $currentUserId = session('user_id'); 
        $sessionUser = null;
        
        if ($currentUserId) {
            // NOTE: Ensure your AuthorUser model is correctly namespaced here
            try {
                $sessionUser = \App\Models\AuthorUser::find($currentUserId);
            } catch (\Throwable $e) {
                $sessionUser = null; 
            }
        }
        
        // 2. Set display variables with fallbacks
        $userName = $sessionUser->name ?? 'Guest';
        $userRole = $sessionUser->role ?? 'Author'; 
        // Assuming a route named 'admin.profile' exists for the profile page
        $profileRoute = route('admin.profile'); 
        
        // 3. Determine Avatar URL, prioritizing stored file or URL
        $userImage = $sessionUser->image ?? null; 
        $avatarUrl = null;

        if ($userImage) {
            // Check if the path is an external URL
            if (str_starts_with($userImage, 'http')) {
                $avatarUrl = $userImage;
            } 
            // Check if the path is a local storage path (DBlink setup)
            else if (Storage::disk('public')->exists($userImage)) {
                // Use asset('storage/...') for local files linked via storage:link
                $avatarUrl = asset('storage/' . $userImage); 
            }
        }
        
        // 4. Fallback to auto-generated avatar if no image is found or path is invalid
        if (!$avatarUrl) {
            $avatarUrl = "https://ui-avatars.com/api/?name=" . urlencode($userName) . "&background=3b82f6&color=fff&size=256&bold=true";
        }
    @endphp

    {{-- ... rest of the HTML layout remains the same ... --}}

    <div class="min-h-screen flex">
        
        <aside class="w-64 bg-gray-900 text-gray-100 flex-shrink-0 admin-sidebar hidden md:block border-r border-gray-900">
            <div class="p-6 h-20 flex items-center border-b border-gray-700">
                <a href="/admin/dashboard" class="text-xl font-extrabold tracking-wider text-white">Blog Console</a>
            </div>
            
            <nav class="p-4">
                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3 px-3">Main Menu</h3>
                <ul class="space-y-1">
                    
                    <li><a href="/admin/dashboard" class="sidebar-link block px-3 py-3 rounded-md text-gray-200 
                        {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <span class="mr-2 text-xl">🏠</span> Dashboard
                    </a></li>
                    
                    <li><a href="/admin/dashboard/posts" class="sidebar-link block px-3 py-3 rounded-md text-gray-200
                        {{ request()->is('admin/dashboard/posts*') ? 'active' : '' }}">
                        <span class="mr-2 text-xl">📝</span> Posts
                    </a></li>
                    
                    <li><a href="/admin/dashboard/categories" class="sidebar-link block px-3 py-3 rounded-md text-gray-200
                        {{ request()->is('admin/dashboard/categories*') ? 'active' : '' }}">
                        <span class="mr-2 text-xl">🏷️</span> Categories
                    </a></li>
                    
                    <li><a href="/admin/dashboard/profile" class="sidebar-link block px-3 py-3 rounded-md text-gray-200
                        {{ request()->is('admin/dashboard/profile*') ? 'active' : '' }}">
                        <span class="mr-2 text-xl">👤</span> Profile
                    </a></li>
                </ul>

                <h3 class="text-xs font-bold text-gray-400 uppercase tracking-wider mt-8 mb-3 px-3">Actions</h3>
                <ul class="space-y-1">
                    <li><a href="/" class="sidebar-link block px-3 py-3 rounded-md text-green-400 hover:text-green-300">
                        <span class="mr-2 text-xl">🌐</span> View Live Site
                    </a></li>
                    <li><a href="{{ route('custom.logout') }}" class="sidebar-link block px-3 py-3 rounded-md text-red-400 hover:text-red-300">
                        <span class="mr-2 text-xl">🚪</span> Logout
                    </a></li>
                </ul>
            </nav>
        </aside>

        <div class="flex-1 flex flex-col overflow-hidden">
            
            <header class="h-20 sticky top-0 z-40 bg-white shadow-sm border-b border-gray-200 flex items-center justify-between px-6">
                
                <h2 class="text-xl font-semibold text-gray-900">@yield('title', 'Dashboard Overview')</h2> 
                
                <div class="flex items-center">
                    
                    {{-- 🌟 DYNAMIC PROFILE DISPLAY 🌟 --}}
                    <a href="{{ $profileRoute }}" class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-100 transition duration-150">
                        
                        {{-- 1. Profile Picture/Avatar --}}
                        <div class="w-10 h-10 rounded-full overflow-hidden bg-blue-100 border-2 border-white shadow-sm">
                            <img src="{{ $avatarUrl }}" 
                                 alt="{{ $userName }}" 
                                 class="w-full h-full object-cover">
                        </div>
                        
                        {{-- 2. User Name and Role --}}
                        <div class="hidden sm:flex flex-col items-start leading-tight">
                            <span class="font-semibold text-gray-800 text-sm">
                                {{ $userName }}
                            </span>
                            <span class="text-xs text-gray-500">
                                {{ $userRole }}
                            </span>
                        </div>
                        
                        {{-- 3. Profile Indicator --}}
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        
                    </a>
                    
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto p-4 sm:p-6">
                @yield('content')
            </main>
            
            <footer class="text-center py-3 text-xs text-gray-500 border-t border-gray-200 bg-white">
                &copy; 2025 Blog Admin Console. Built with Laravel & Tailwind.
            </footer>
        </div>
    </div>

    @stack('scripts')
</body>
</html>