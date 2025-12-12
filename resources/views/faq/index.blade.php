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
            <div class="max-w-xl mx-auto mb-12 relative">
                <input type="text" placeholder="Zoek een vraag..."
                    class="w-full px-5 py-4 rounded-full border border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition pl-12 text-gray-700">
                <svg class="w-6 h-6 text-gray-400 absolute left-4 top-4" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            @if($faqs->isEmpty())
                {{-- Better Empty State --}}
                <div class="text-center py-16 bg-white rounded-2xl shadow-sm border border-gray-100">
                    <div class="bg-blue-50 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-10 h-10 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Nog geen vragen</h3>
                    <p class="text-gray-500 mb-8 max-w-sm mx-auto">De lijst met veelgestelde vragen is momenteel nog leeg. Kom
                        later terug of stel je vraag direct.</p>
                    <a href="#"
                        class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                        Contact opnemen
                    </a>
                </div>
            @else
                <div class="space-y-6">
                    @foreach($faqs as $faq)
                        <div
                            class="bg-white shadow-md rounded-xl p-6 hover:shadow-lg transition cursor-pointer border-l-4 border-blue-500">
                            <h3 class="font-bold text-lg text-gray-900 mb-2">{{ $faq->question }}</h3>
                            <p class="text-gray-600">{{ $faq->answer }}</p>
                        </div>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
@endsection