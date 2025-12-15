@extends('layouts.app')

@section('title', 'Blog - BlogHub: Our Story and Mission')
@section('content')
<!-- Hero Section -->
<div class="relative bg-cover bg-center h-80" style="background-image: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('https://images.unsplash.com/photo-1517694712202-14dd9538aa97?w=1200&h=400&fit=crop');">
    <div class="absolute inset-0 flex items-end">
        <div class="container mx-auto px-4 pb-10">
            <span class="inline-block text-white text-sm font-semibold mb-3 border-b-2 border-white pb-1">Technology</span>
            <h1 class="text-5xl font-bold text-white mb-4">The Future of Web Development</h1>
            <div class="flex items-center gap-6 text-white">
                <div class="flex items-center gap-3">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=40&h=40&fit=crop" alt="Author" class="w-10 h-10 rounded-full">
                    <div>
                        <p class="font-semibold">John Doe</p>
                        <p class="text-sm text-gray-200">Tech Writer</p>
                    </div>
                </div>
                <span class="text-gray-200">•</span>
                <span>Dec 10, 2025</span>
                <span class="text-gray-200">•</span>
                <span>8 min read</span>
            </div>
        </div>
    </div>
</div>

<!-- Article Content -->
<div class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <!-- Main Article -->
            <div class="lg:col-span-2">
                <article class="prose prose-lg max-w-none text-gray-700">
                    <p class="text-xl leading-relaxed mb-6">
                        The landscape of web development is undergoing a profound transformation. As we move further into 2025, developers are embracing new paradigms, tools, and methodologies that promise to revolutionize how we build for the web. This comprehensive guide explores the key trends that are shaping the future of web development.
                    </p>

                    <h2 class="text-3xl font-bold text-gray-800 mt-10 mb-4">1. AI-Powered Development</h2>
                    <p class="leading-relaxed mb-6">
                        Artificial Intelligence is no longer a buzzword in web development—it's becoming an essential tool. From code completion to automated testing, AI is streamlining the development process. GitHub Copilot and similar tools are helping developers write code faster and with fewer bugs. We're also seeing AI being used for more complex tasks like generating entire components and optimizing performance.
                    </p>

                    <h2 class="text-3xl font-bold text-gray-800 mt-10 mb-4">2. Server Components and Edge Computing</h2>
                    <p class="leading-relaxed mb-6">
                        The rise of server components, particularly popularized by frameworks like Next.js and Remix, is changing how we think about client-server architecture. Combined with edge computing, these technologies allow us to process data closer to the user, resulting in faster applications and better user experiences. This shift represents a move away from the purely client-side rendering paradigm that dominated the past decade.
                    </p>

                    <h2 class="text-3xl font-bold text-gray-800 mt-10 mb-4">3. TypeScript Dominance</h2>
                    <p class="leading-relaxed mb-6">
                        TypeScript has become the de facto standard for modern web development. Its strong type system and excellent tooling support have made it the preferred choice for teams building large-scale applications. Even projects that started with JavaScript are increasingly migrating to TypeScript for better maintainability and developer experience.
                    </p>

                    <h2 class="text-3xl font-bold text-gray-800 mt-10 mb-4">4. Modern CSS and Styling Solutions</h2>
                    <p class="leading-relaxed mb-6">
                        CSS continues to evolve with new features like container queries and cascade layers gaining browser support. Utility-first CSS frameworks like Tailwind CSS have fundamentally changed how developers approach styling. These approaches provide better scalability, maintainability, and performance compared to traditional CSS methodologies.
                    </p>

                    <h2 class="text-3xl font-bold text-gray-800 mt-10 mb-4">5. Web Performance as a Priority</h2>
                    <p class="leading-relaxed mb-6">
                        Performance has become a first-class concern in modern web development. Core Web Vitals, introduced by Google, have set clear metrics for what constitutes good performance. Developers are increasingly focusing on metrics like Largest Contentful Paint (LCP), First Input Delay (FID), and Cumulative Layout Shift (CLS).
                    </p>

                    <h2 class="text-3xl font-bold text-gray-800 mt-10 mb-4">Conclusion</h2>
                    <p class="leading-relaxed mb-6">
                        The future of web development is exciting and full of possibilities. By staying updated with these trends and continuously learning, developers can build better, faster, and more maintainable applications. The key is to embrace change while maintaining a solid understanding of fundamental principles.
                    </p>
                </article>

                <!-- Article Meta -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <div class="flex flex-wrap gap-3">
                        <span class="inline-block bg-gray-100 px-4 py-2 rounded text-gray-700 text-sm font-semibold">#WebDevelopment</span>
                        <span class="inline-block bg-gray-100 px-4 py-2 rounded text-gray-700 text-sm font-semibold">#Technology</span>
                        <span class="inline-block bg-gray-100 px-4 py-2 rounded text-gray-700 text-sm font-semibold">#JavaScript</span>
                        <span class="inline-block bg-gray-100 px-4 py-2 rounded text-gray-700 text-sm font-semibold">#Trends2025</span>
                    </div>
                </div>

                <!-- Share Section -->
                <div class="mt-8 p-6 bg-gray-50 rounded border border-gray-200">
                    <h3 class="font-bold text-gray-800 mb-4">Share this article</h3>
                    <div class="flex gap-4">
                        <button class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100 transition font-semibold text-gray-700">Twitter</button>
                        <button class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100 transition font-semibold text-gray-700">LinkedIn</button>
                        <button class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100 transition font-semibold text-gray-700">Facebook</button>
                        <button class="px-4 py-2 border border-gray-300 rounded hover:bg-gray-100 transition font-semibold text-gray-700">Copy Link</button>
                    </div>
                </div>

                <!-- Related Articles -->
                <div class="mt-12 pt-8 border-t border-gray-200">
                    <h3 class="text-2xl font-bold text-gray-800 mb-6">Related Articles</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <article class="border border-gray-200 rounded shadow-sm hover:shadow-md transition overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1505228395891-9a51e7e86e81?w=400&h=200&fit=crop" alt="Article" class="w-full h-40 object-cover">
                            <div class="p-4">
                                <span class="text-gray-600 text-sm font-semibold border-b-2 border-gray-800 pb-1">Lifestyle</span>
                                <h4 class="font-bold text-gray-800 mt-2 mb-2">Healthy Living Tips</h4>
                                <p class="text-gray-600 text-sm mb-4">Discover simple yet effective ways to improve your health.</p>
                                <a href="#" class="text-gray-800 font-semibold hover:text-gray-600 transition">Read More →</a>
                            </div>
                        </article>
                        <article class="border border-gray-200 rounded shadow-sm hover:shadow-md transition overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1488646953014-85cb44e25828?w=400&h=200&fit=crop" alt="Article" class="w-full h-40 object-cover">
                            <div class="p-4">
                                <span class="text-gray-600 text-sm font-semibold border-b-2 border-gray-800 pb-1">Travel</span>
                                <h4 class="font-bold text-gray-800 mt-2 mb-2">Best Travel Destinations</h4>
                                <p class="text-gray-600 text-sm mb-4">Uncover hidden gems and must-visit destinations.</p>
                                <a href="#" class="text-gray-800 font-semibold hover:text-gray-600 transition">Read More →</a>
                            </div>
                        </article>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Author Card -->
                <div class="bg-gray-50 p-6 rounded border border-gray-200 mb-8 text-center sticky top-24">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=150&h=150&fit=crop" alt="Author" class="w-20 h-20 rounded-full mx-auto mb-4">
                    <h4 class="font-bold text-gray-800 text-lg mb-1">John Doe</h4>
                    <p class="text-gray-600 text-sm mb-4">Full-stack developer and tech enthusiast passionate about sharing knowledge with the community.</p>
                    <button class="w-full px-4 py-2 bg-gray-800 text-white rounded hover:bg-gray-900 transition font-semibold">Follow</button>
                </div>

                <!-- Table of Contents -->
                <div class="bg-gray-50 p-6 rounded border border-gray-200 mb-8">
                    <h3 class="font-bold text-gray-800 mb-4 text-lg">Table of Contents</h3>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="text-gray-700 hover:text-gray-900 transition">1. AI-Powered Development</a></li>
                        <li><a href="#" class="text-gray-700 hover:text-gray-900 transition">2. Server Components and Edge Computing</a></li>
                        <li><a href="#" class="text-gray-700 hover:text-gray-900 transition">3. TypeScript Dominance</a></li>
                        <li><a href="#" class="text-gray-700 hover:text-gray-900 transition">4. Modern CSS and Styling Solutions</a></li>
                        <li><a href="#" class="text-gray-700 hover:text-gray-900 transition">5. Web Performance as a Priority</a></li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div class="bg-gray-800 text-white p-6 rounded">
                    <h3 class="font-bold text-lg mb-2">Subscribe to Newsletter</h3>
                    <p class="text-gray-300 text-sm mb-4">Get the latest articles delivered to your inbox every week.</p>
                    <input type="email" placeholder="Your email" class="w-full px-4 py-2 rounded text-gray-800 mb-3 focus:outline-none">
                    <button class="w-full px-4 py-2 bg-white text-gray-800 rounded hover:bg-gray-100 transition font-semibold">Subscribe</button>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
