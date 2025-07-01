<div class="bg-indigo-700">
    <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">
            Laravel Community Uganda
        </h1>
        <p class="mt-6 max-w-3xl mx-auto text-xl text-indigo-100">
            Empowering Ugandan developers by enhancing their skills in Laravel PHP and modern web technologies.
        </p>
        <div class="mt-10 space-x-4">
            @guest
                <a href="{{ route('register') }}"
                    class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-indigo-700 bg-white hover:bg-indigo-50">
                    Join Us
                </a>
            @endguest
            <a href="{{ route('about') }}"
                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-800 bg-opacity-60 hover:bg-opacity-70">
                Learn More
            </a>
        </div>
    </div>
</div>
