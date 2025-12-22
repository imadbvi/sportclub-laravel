<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel Sport Club') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased text-gray-800 bg-gray-50">

    <!-- Navigation Overlay -->
    <div class="absolute top-0 right-0 p-6 z-20">
        @if (Route::has('login'))
            <nav class="flex gap-4">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-white hover:text-yellow-400 transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-white hover:text-yellow-400 transition">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="font-semibold text-white hover:text-yellow-400 transition">Register</a>
                    @endif
                @endauth
            </nav>
        @endif
    </div>

    <!-- Hero Section -->
    <div class="relative bg-blue-900 overflow-hidden h-screen flex items-center justify-center">
        {{-- Background Image Placeholder (CSS Gradient for now or generic pattern) --}}
        <div class="absolute inset-0 bg-gradient-to-br from-blue-900 to-black opacity-90 z-0"></div>

        {{-- Decorative Circles --}}
        <div
            class="absolute -top-24 -left-24 w-96 h-96 bg-blue-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob">
        </div>
        <div
            class="absolute top-0 -right-4 w-72 h-72 bg-purple-500 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000">
        </div>

        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
            {{-- Logo or Icon --}}
            <div class="flex justify-center mb-6">
                <svg class="w-20 h-20 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
            </div>

            <h1 class="text-5xl md:text-7xl font-extrabold text-white tracking-tight mb-4 drop-shadow-lg">
                Laravel <span class="text-yellow-400">Sport Club</span>
            </h1>

            <p class="mt-4 text-xl md:text-2xl text-blue-100 max-w-2xl mx-auto leading-relaxed">
                De plek voor al je sportnieuws, wedstrijdschema's en team updates. Sluit je aan bij de kampioenen!
            </p>

            <div class="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('news.index') }}"
                    class="px-8 py-4 bg-yellow-400 hover:bg-yellow-300 text-blue-900 font-bold rounded-full text-lg shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                    Bekijk Nieuws
                </a>
                <a href="{{ route('faq.index') }}"
                    class="px-8 py-4 border-2 border-white text-white font-bold rounded-full text-lg hover:bg-white hover:text-blue-900 transition transform hover:-translate-y-1">
                    Veelgestelde Vragen
                </a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="py-24 bg-white relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Waarom onze club?
                </h2>
                <p class="mt-4 text-lg text-gray-500">
                    Wij bieden meer dan alleen trainingen. Wij bieden een community.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                {{-- Feature 1 --}}
                <div class="p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Teamgeist</h3>
                    <p class="text-gray-600">Samen trainen, samen winnen. Onze teams zijn hecht en gemotiveerd.</p>
                </div>

                {{-- Feature 2 --}}
                <div class="p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Laatste Nieuws</h3>
                    <p class="text-gray-600">Blijf op de hoogte van alle wedstrijden, evenementen en uitslagen via onze
                        nieuwspagina.</p>
                </div>

                {{-- Feature 3 --}}
                <div class="p-8 bg-gray-50 rounded-2xl border border-gray-100 hover:shadow-lg transition">
                    <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center mb-6">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Support</h3>
                    <p class="text-gray-600">Heb je vragen? Check onze uitgebreide FAQ sectie of neem contact met ons
                        op.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center">
            <div class="mb-4 md:mb-0">
                <p>&copy; {{ date('Y') }} Laravel Sport Club. Alle rechten voorbehouden.</p>
            </div>
            <div class="flex space-x-6">
                <a href="#" class="text-gray-400 hover:text-white transition">Privacy</a>
                <a href="#" class="text-gray-400 hover:text-white transition">Voorwaarden</a>
                <a href="{{ route('contact.index') }}" class="text-gray-400 hover:text-white transition">Contact</a>
            </div>
        </div>
    </footer>


</body>

</html>