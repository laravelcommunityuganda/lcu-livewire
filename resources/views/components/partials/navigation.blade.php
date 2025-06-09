<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home.index') }}" class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-xl">L</span>
                    </div>
                    <span class="text-xl font-bold text-gray-900">Laravel UG</span>
                </a>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="{{ route('home.index') }}" class="text-gray-900 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                        Home
                    </a>
                    <a href="{{ route('home.about') }}" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                        About Us
                    </a>
                    <a href="#" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                        Events
                    </a>
                    <a href="#" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                        Resources
                    </a>
                    <a href="#" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                        Blog
                    </a>
                    <a href="#" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                        Contact
                    </a>
                </div>
            </div>
            
            <!-- Auth Buttons -->
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6 space-x-3">
                    @auth
                        <div class="relative">
                            <button class="flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&color=7F9CF5&background=EBF4FF" alt="{{ auth()->user()->name }}">
                            </button>
                        </div>
                    @else
                        <a href="#" class="text-gray-700 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium">
                            Login
                        </a>
                        <a href="#" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium transition duration-150 ease-in-out">
                            Join Community
                        </a>
                    @endauth
                </div>
            </div>
            
            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button type="button" class="bg-gray-900 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>