<x-layouts.custom>
    <x-core.container>
        <div class="lg:text-center">
            <h2 class="text-base text-indigo-600 dark:text-indigo-400 font-semibold tracking-wide uppercase">About Us
            </h2>
            <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl">
                Laravel Community Uganda
            </p>
            <p class="mt-4 max-w-2xl text-xl text-gray-500 dark:text-gray-400 lg:mx-auto">
                {{ $mission }}
            </p>
        </div>

        <div class="mt-20">
            <div class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Our Goals</h3>
                    <ul class="space-y-4">
                        @foreach($goals as $goal)
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-indigo-500 dark:text-indigo-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">{{ $goal }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Core Values</h3>
                    <ul class="space-y-4">
                        @foreach($coreValues as $value)
                            <li class="flex items-start">
                                <svg class="flex-shrink-0 h-6 w-6 text-indigo-500 dark:text-indigo-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="ml-3 text-gray-700 dark:text-gray-300">{{ $value }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mt-6">
            <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                <h1 class="text-2xl font-bold mb-4 text-center">Welcome</h1>
                <p class="text-gray-600 dark:text-gray-400">
                    Welcome to the Laravel Community Uganda! We are a vibrant community of Laravel enthusiasts,
                    developers, and learners dedicated to sharing knowledge, resources, and support for all things
                    Laravel.
                </p>
                <p class="mt-4 text-gray-600 dark:text-gray-400">
                    Our mission is to foster a collaborative environment where members can connect, learn, and grow
                    together. Whether you are a beginner or an experienced developer, you will find valuable resources,
                    discussions, and events to enhance your Laravel journey.
                </p>
            </div>
        </div>
        <div class="mt-10 bg-indigo-50 dark:bg-gray-800 rounded-lg p-8">
            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Join Our Community</h3>
            <p class="text-gray-700 dark:text-gray-300 mb-6">
                Whether you're a beginner or an experienced Laravel developer, there's a place for you in our community.
                Join us to learn, share, and grow together.
            </p>
            <div class="space-x-4">
                <a href="#"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    Become a Member
                </a>
                <a href="#"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 dark:text-indigo-300 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-offset-gray-800">
                    Learn More
                </a>
            </div>
        </div>
    </x-core.container>
</x-layouts.custom>
