@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $news->title }}
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white p-6 shadow-xl rounded-lg">

            <h1 class="text-3xl font-bold mb-4">{{ $news->title }}</h1>

            <p class="mb-6">{{ $news->content }}</p>

            @if($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" 
                     class="rounded shadow mb-6 h-64 object-cover">
            @endif

            <div class="flex gap-4">

                {{-- Bewerken --}}
                <a href="{{ route('news.edit', $news) }}"
   class="bg-black text-white font-bold px-4 py-2 rounded-lg shadow hover:bg-gray-800 transition">
   Bewerken
</a>


                {{-- Terug --}}
                <a href="{{ route('news.index') }}"
                   class="text-gray-700 hover:underline">
                   ← Terug naar overzicht
                </a>

            </div>

        </div>

    </div>
</div>
@endsection
