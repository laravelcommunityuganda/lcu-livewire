<x-layouts.custom.app title="Home - Laravel Community Uganda">
    <!-- Hero Section -->
    <x-partials.hero-section>
        <x-slot name="title">
            Welcome to Laravel Community Uganda
        </x-slot>
        <x-slot name="subtitle">
            Join Uganda's most vibrant Laravel developer community. Learn, grow, and build amazing things together.
        </x-slot>
        <x-slot name="cta">
            <a href="#" class="inline-flex items-center px-8 py-3 border border-transparent text-lg font-medium rounded-md text-red-700 bg-white hover:bg-gray-50 transition duration-150 ease-in-out">
                Join Community
            </a>
            <a href="#" class="inline-flex items-center px-8 py-3 border-2 border-white text-lg font-medium rounded-md text-white hover:bg-white hover:text-red-700 transition duration-150 ease-in-out">
                View Events
            </a>
        </x-slot>
    </x-partials.hero-section>

    <!-- Stats Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div class="bg-gray-50 rounded-lg p-6">
                    <div class="text-3xl font-bold text-red-600 mb-2">500+</div>
                    <div class="text-gray-600">Active Members</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-6">
                    <div class="text-3xl font-bold text-red-600 mb-2">50+</div>
                    <div class="text-gray-600">Events Hosted</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-6">
                    <div class="text-3xl font-bold text-red-600 mb-2">100+</div>
                    <div class="text-gray-600">Resources Shared</div>
                </div>
                <div class="bg-gray-50 rounded-lg p-6">
                    <div class="text-3xl font-bold text-red-600 mb-2">15+</div>
                    <div class="text-gray-600">Sponsors</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Events -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Upcoming Events</h2>
                <p class="text-xl text-gray-600">Don't miss out on our exciting upcoming events</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Event Card 1 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Laravel Workshop" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded">Workshop</span>
                            <span class="ml-2 text-sm text-gray-500">Jun 15, 2025</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Laravel 11 Deep Dive</h3>
                        <p class="text-gray-600 mb-4">Explore the latest features and improvements in Laravel 11 with hands-on examples.</p>
                        <a href="#" class="inline-flex items-center text-red-600 hover:text-red-800 font-medium">
                            Learn More
                            <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Event Card 2 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1517180102446-f3ece451e9d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Networking Event" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Networking</span>
                            <span class="ml-2 text-sm text-gray-500">Jun 22, 2025</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Developer Meetup</h3>
                        <p class="text-gray-600 mb-4">Connect with fellow Laravel developers, share experiences, and build lasting relationships.</p>
                        <a href="#" class="inline-flex items-center text-red-600 hover:text-red-800 font-medium">
                            Learn More
                            <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Event Card 3 -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" alt="Hackathon" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="flex items-center mb-2">
                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">Hackathon</span>
                            <span class="ml-2 text-sm text-gray-500">Jul 5-6, 2025</span>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Laravel Hackathon 2025</h3>
                        <p class="text-gray-600 mb-4">48 hours of coding, innovation, and fun. Build amazing Laravel applications and win prizes!</p>
                        <a href="#" class="inline-flex items-center text-red-600 hover:text-red-800 font-medium">
                            Learn More
                            <svg class="ml-1 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Community Features -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Why Join Our Community?</h2>
                <p class="text-xl text-gray-600">Discover the benefits of being part of Laravel Community Uganda</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Learn & Grow</h3>
                    <p class="text-gray-600">Access exclusive tutorials, workshops, and resources to enhance your Laravel skills.</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Network</h3>
                    <p class="text-gray-600">Connect with like-minded developers, mentors, and potential employers in Uganda.</p>
                </div>
                
                <div class="text-center">
                    <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Build & Share</h3>
                    <p class="text-gray-600">Collaborate on projects, share your knowledge, and contribute to the Laravel ecosystem.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sponsors Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Our Sponsors</h2>
                <p class="text-xl text-gray-600">Thank you to our amazing sponsors who make our community possible</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 items-center">
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <img src="https://via.placeholder.com/150x80/ef4444/ffffff?text=Sponsor+1" alt="Sponsor 1" class="w-full h-16 object-contain">
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <img src="https://via.placeholder.com/150x80/ef4444/ffffff?text=Sponsor+2" alt="Sponsor 2" class="w-full h-16 object-contain">
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <img src="https://via.placeholder.com/150x80/ef4444/ffffff?text=Sponsor+3" alt="Sponsor 3" class="w-full h-16 object-contain">
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <img src="https://via.placeholder.com/150x80/ef4444/ffffff?text=Sponsor+4" alt="Sponsor 4" class="w-full h-16 object-contain">
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-red-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Stay Updated</h2>
            <p class="text-xl text-red-100 mb-8">Get the latest news, events, and resources delivered to your inbox</p>
            
            <form class="max-w-md mx-auto flex gap-4">
                <input type="email" placeholder="Enter your email" class="flex-1 px-4 py-3 rounded-md border-0 focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-red-600">
                <button type="submit" class="px-6 py-3 bg-white text-red-600 font-medium rounded-md hover:bg-gray-100 transition duration-150 ease-in-out">
                    Subscribe
                </button>
            </form>
        </div>
    </section>
</x-layouts.custom.app>
