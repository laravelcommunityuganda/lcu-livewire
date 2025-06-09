<section class="relative bg-gradient-to-br from-red-600 via-red-700 to-red-800 overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="absolute inset-0">
        <svg class="absolute bottom-0 left-0 right-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f9fafb" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,112C672,96,768,96,864,112C960,128,1056,160,1152,176C1248,192,1344,192,1392,192L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                {{ $title }}
            </h1>
            <p class="text-xl md:text-2xl text-red-100 mb-8 max-w-3xl mx-auto">
                {{ $subtitle }}
            </p>
            @if(isset($cta))
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    {{ $cta }}
                </div>
            @endif
        </div>
    </div>
</section>