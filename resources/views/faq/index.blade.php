@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Veelgestelde vragen
    </h2>
@endsection

@section('content')
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            {{-- Header / Intro --}}
            <div class="text-center mb-10">
                <h1 class="text-3xl font-bold text-blue-900 mb-4">Hoe kunnen we je helpen?</h1>
                <p class="text-gray-600 max-w-xl mx-auto">Bekijk onze categorieën en veelgestelde vragen. Staat je vraag er
                    niet tussen? Neem dan contact op met het bestuur.</p>
            </div>

            {{-- Search Bar (Visual Only for now) --}}
            {{-- Search Bar --}}
            <div class="max-w-xl mx-auto mb-12 relative">
                <form action="{{ route('faq.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Zoek een vraag..." value="{{ request('search') }}"
                        class="w-full px-5 py-4 rounded-full border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition pl-12 text-gray-700">
                    <button type="submit" class="absolute left-4 top-4 text-gray-400 hover:text-blue-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                    @if(request('search'))
                        <a href="{{ route('faq.index') }}"
                            class="absolute right-4 top-4 text-gray-400 hover:text-gray-600 text-sm font-semibold">
                            Wissen
                        </a>
                    @endif
                </form>
            </div>

            @if($categories->isEmpty())
                <div class="text-center py-16 bg-white rounded-2xl shadow-sm border border-gray-100">
                    <div class="bg-blue-50 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    
                    @if(request('search'))
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Geen resultaten gevonden</h3>
                        <p class="text-gray-500 mb-8 max-w-sm mx-auto">
                            We hebben geen antwoord kunnen vinden op je vraag: "<strong>{{ request('search') }}</strong>".
                            <br>Stel je vraag direct aan ons team.
                        </p>
                    @else
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Nog geen vragen</h3>
                        <p class="text-gray-500 mb-8 max-w-sm mx-auto">De lijst met veelgestelde vragen is momenteel nog leeg.</p>
                    @endif

                    <a href="{{ route('contact.index') }}"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                        Neem contact op
                    </a>
                </div>
            @else
                <div class="space-y-12">
                    @foreach($categories as $category)
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800 mb-6 pl-4 border-l-4 border-blue-500">{{ $category->name }}
                            </h2>
                            <div class="space-y-4">
                                @foreach($category->faqs as $faq)
                                    <div x-data="{ open: false }"
                                        class="bg-white shadow-sm rounded-lg overflow-hidden border border-gray-100">
                                        <button @click="open = !open"
                                            class="w-full text-left px-6 py-4 focus:outline-none hover:bg-gray-50 transition flex justify-between items-center">
                                            <span class="font-medium text-lg text-gray-900">{{ $faq->question }}</span>
                                            <svg class="w-5 h-5 text-gray-500 transform transition-transform duration-200"
                                                :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </button>
                                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                                            x-transition:enter-end="opacity-100 transform translate-y-0"
                                            class="px-6 pb-6 pt-2 text-gray-600 border-t border-gray-50">
                                            {{ $faq->answer }}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
@endsection