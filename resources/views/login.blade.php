@extends('layouts.auth')

@section('login-tittle')
Login - BlogHub
@endsection

@section('content')
<div class="relative min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1499750310107-5fef28a66643?w=1200&h=800&fit=crop'); background-attachment: fixed;">
    
    <!-- Login Form Container -->
    <div class="w-full max-w-md mx-auto px-4">
        <div class="bg-white rounded shadow-lg p-8 backdrop-filter backdrop-blur-sm">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-2">Welcome Back</h1>
            <p class="text-center text-gray-600 mb-8">Sign in to your account to continue</p>

            <form class="space-y-6" action="/login" method="POST">
                @csrf
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
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" class="w-4 h-4 border border-gray-300 rounded focus:ring-gray-800">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                    <a href="#" class="text-sm text-gray-700 hover:text-gray-900 font-semibold">Forgot password?</a>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit" 
                    class="w-full bg-gray-800 text-white font-semibold py-2 rounded hover:bg-gray-900 transition"
                >
                    Sign In
                </button>
            </form>

            <!-- Divider -->
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">Or continue with</span>
                </div>
            </div>

            <!-- Social Login -->
            <div class="grid grid-cols-2 gap-4">
                <button type="button" class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-50 transition font-medium text-sm text-gray-700">
                    GitHub
                </button>
                <button type="button" class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-50 transition font-medium text-sm text-gray-700">
                    Google
                </button>
            </div>

            <!-- Sign Up Link -->
            <p class="text-center text-gray-600 mt-6">
                Don't have an account? 
                <a href="/register" class="text-gray-800 font-semibold hover:text-gray-900">Sign up</a>
            </p>
        </div>
    </div>
</div>
@endsection