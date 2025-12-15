@extends('layouts.app')


@section('title', 'About Us - BlogHub: Our Story and Mission')

@section('content')

<div class="bg-white">
    <section class="py-20 lg:py-32 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            
            <p class="text-sm font-semibold uppercase text-blue-600 tracking-wider mb-3">Our Vision</p>
            <h1 class="text-5xl lg:text-6xl font-extrabold text-gray-900 leading-tight mb-6">
                Fueling Knowledge and <span class="text-blue-600">Inspiring Action</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto mb-8">
                BlogHub was created to be the definitive source for in-depth analysis, actionable insights, and thought-provoking perspectives on the future of technology and personal development.
            </p>
            
            <a href="/blogs" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-full text-white bg-gray-900 hover:bg-gray-800 transition duration-300 shadow-lg">
                Start Reading Now
                <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
        </div>
    </section>

    <section class="py-20 lg:py-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-extrabold text-gray-900">Meet the Core Author</h2>
                <p class="mt-4 text-xl text-gray-600">The face behind the words and the vision for BlogHub.</p>
            </div>

            <div class="max-w-2xl mx-auto bg-white border border-gray-200 rounded-xl shadow-2xl overflow-hidden p-8">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8">
                    
                    <div class="flex-shrink-0">
                        
                        <img class="h-32 w-32 rounded-full object-cover shadow-lg border-4 border-white"
                             src="https://ui-avatars.com/api/?name=Jane+Doe&background=2563eb&color=fff&size=256&bold=true"
                             alt="Jane Doe, Lead Author">
                    </div>

                    <div class="text-center md:text-left">
                        <h3 class="text-2xl font-bold text-gray-900">Jane Doe</h3>
                        <p class="text-lg text-blue-600 font-semibold mb-3">Lead Technology Analyst & Founder</p>
                        
                        <p class="text-gray-700 leading-relaxed mb-4">
                            Jane has spent over ten years in the tech industry, specializing in AI development and cloud infrastructure. She started BlogHub to bridge the gap between complex engineering concepts and everyday business strategy. Her mission is to make advanced topics accessible and exciting.
                        </p>

                        <div class="flex justify-center md:justify-start space-x-4 mt-4">
                            <a href="#" class="text-gray-500 hover:text-gray-900 transition">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm4.18 7.37c-.31.14-.65.23-1.01.27.35-.21.6-.54.72-.94-.33.2-.69.34-1.07.41-.31-.33-.76-.53-1.25-.53-1.12 0-2.03.91-2.03 2.03 0 .16.02.32.05.47-1.68-.08-3.17-.89-4.17-2.11-.18.31-.28.67-.28 1.05 0 .7.35 1.32.88 1.68-.3-.01-.58-.09-.83-.23v.03c0 .99.7 1.81 1.63 2-.17.05-.34.08-.52.08-.13 0-.27-.01-.4-.04.26.81 1.01 1.4 1.9 1.42-.69.54-1.56.86-2.51.86-.16 0-.32-.01-.47-.03C5.75 16.58 7 17 8.35 17c10.35 0 16-8.58 16-16.14 0-.17 0-.33-.01-.5.7-.5 1.3-1.12 1.78-1.83-.64.28-1.33.47-2.05.57.73-.44 1.28-1.13 1.54-1.95z"/></svg>
                            </a>
                            <a href="#" class="text-gray-500 hover:text-gray-900 transition">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 3a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h14zM8 10v7h-3v-7h3zM6.5 8.25A1.75 1.75 0 118.25 6.5 1.75 1.75 0 016.5 8.25zM19 17h-3v-3.72c0-.98-.79-1.78-1.77-1.78s-1.77.79-1.77 1.78V17h-3v-7h3v.85c.42-.71 1.25-1.17 2.19-1.17 1.78 0 3.23 1.45 3.23 3.23V17z"/></svg>
                            </a>
                            <a href="mailto:jane.doe@bloghub.com" class="text-gray-500 hover:text-gray-900 transition">
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5-8-5h16zm0 12H4V8l8 5 8-5v10z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mt-16 pt-12 border-t border-gray-100">
                <div class="text-center">
                    <div class="text-4xl text-blue-600 mb-2">💡</div>
                    <h4 class="font-bold text-lg text-gray-900 mb-1">In-Depth Analysis</h4>
                    <p class="text-sm text-gray-500">We go beyond the headlines to give you the full context.</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl text-blue-600 mb-2">🎯</div>
                    <h4 class="font-bold text-lg text-gray-900 mb-1">Actionable Insights</h4>
                    <p class="text-sm text-gray-500">Tips and strategies you can implement right away.</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl text-blue-600 mb-2">🔒</div>
                    <h4 class="font-bold text-lg text-gray-900 mb-1">Built on Experience</h4>
                    <p class="text-sm text-gray-500">Content derived from years of industry expertise.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-900 py-16">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold text-white mb-4">Ready to Elevate Your Knowledge?</h2>
            <p class="text-lg text-gray-300 mb-6">Join our community and never miss an important update.</p>
            <a href="/register" class="px-8 py-3 bg-blue-600 text-white font-bold rounded-full hover:bg-blue-700 transition duration-300 shadow-xl">
                Create Your Free Account
            </a>
        </div>
    </section>
</div>

@endsection