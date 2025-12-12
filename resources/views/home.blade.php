@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Welkom
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white shadow rounded-lg p-6 space-y-4">
            <p>
                Welkom op onze website. Hier vind je het laatste nieuws en antwoorden
                op veelgestelde vragen.
            </p>

            <div class="flex gap-4">
                <a href="{{ route('news.index') }}"
                   class="bg-black text-white font-bold px-4 py-2 rounded-lg hover:bg-gray-800">
                    Bekijk nieuws
                </a>

                <a href="{{ route('faq.index') }}"
                   class="bg-gray-200 text-gray-800 font-bold px-4 py-2 rounded-lg hover:bg-gray-300">
                    Veelgestelde vragen
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
