@extends('layouts.auth')

@section('login-tittle')
Register - BlogHub
@endsection

@section('content')
<div class="relative min-h-screen bg-cover bg-center flex items-center justify-center py-12 px-4" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=1200&h=800&fit=crop'); background-attachment: fixed;">
    
    <div class="w-full max-w-md">
        <div class="bg-white rounded shadow-lg p-8 backdrop-filter backdrop-blur-sm">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-2">Create Account</h1>
            <p class="text-center text-gray-600 mb-8">Join our community of writers and readers</p>

            <form class="space-y-5" action="/register" method="POST">
                @csrf
                <!-- Full Name -->
                <div>
                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Full Name</label>
                    <input 
                        type="text" 
                        id="name" 
                        name="name"
                        placeholder="John Doe"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-gray-800 focus:ring-1 focus:ring-gray-800 transition"
                    >
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email"
                        placeholder="you@example.com"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-gray-800 focus:ring-1 focus:ring-gray-800 transition"
                    >
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-semibold text-gray-700 mb-2">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password"
                        placeholder="••••••••"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-gray-800 focus:ring-1 focus:ring-gray-800 transition"
                    >
                    <p class="text-xs text-gray-600 mt-1">Must be at least 8 characters</p>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="confirm" class="block text-sm font-semibold text-gray-700 mb-2">Confirm Password</label>
                    <input 
                        type="password" 
                        id="confirm" 
                        name="confirm_password"
                        placeholder="••••••••"
                        required
                        class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:border-gray-800 focus:ring-1 focus:ring-gray-800 transition"
                    >
                </div>

                <!-- Terms -->
                <label class="flex items-start">
                    <input type="checkbox" class="w-4 h-4 border border-gray-300 rounded mt-1 focus:ring-gray-800">
                    <span class="ml-2 text-sm text-gray-600">I agree to the <a href="#" class="text-gray-700 font-semibold hover:text-gray-900">Terms of Service</a> and <a href="#" class="text-gray-700 font-semibold hover:text-gray-900">Privacy Policy</a></span>
                </label>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-gray-800 text-white font-semibold py-2 rounded hover:bg-gray-900 transition"
                >
                    Create Account
                </button>
            </form>

            <!-- Sign In Link -->
            <p class="text-center text-gray-600 mt-6">
                Already have an account? 
                <a href="/login" class="text-gray-800 font-semibold hover:text-gray-900">Sign in</a>
            </p>
        </div>
    </div>
</div>
@endsection