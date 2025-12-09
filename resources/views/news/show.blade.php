@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $news->title }}
    </h2>
@endsection

@section('content')

<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-xl sm:rounded-lg">

            <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>

            <p class="mb-4 text-gray-700">
                {{ $news->content }}
            </p>

            @if ($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" 
                     alt="Nieuws afbeelding" 
                     class="rounded shadow w-full max-w-xl mb-6">
            @endif

            <a href="{{ route('news.index') }}" 
               class="text-blue-600 hover:underline">
                ← Terug naar overzicht
            </a>

        </div>
    </div>
</div>

@endsection
