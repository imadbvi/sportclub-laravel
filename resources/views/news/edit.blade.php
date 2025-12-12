@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Nieuws bewerken
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Titel</label>
                        <input type="text" name="title" class="w-full border p-2 rounded"
                            value="{{ old('title', $news->title) }}">
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Publicatiedatum</label>
                        <input type="date" name="published_at" class="w-full border p-2 rounded"
                            value="{{ old('published_at', $news->published_at ? $news->published_at->format('Y-m-d') : '') }}">
                        @error('published_at')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Inhoud</label>
                        <textarea name="content" class="w-full border p-2 rounded"
                            rows="5">{{ old('content', $news->content) }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Huidige afbeelding</label>
                        @if($news->image)
                            <img src="{{ asset('storage/' . $news->image) }}" class="h-32 mb-4 rounded shadow">
                        @else
                            <p class="text-gray-500">Geen afbeelding</p>
                        @endif
                    </div>

                    <div class="mb-6">
                        <label class="block font-semibold mb-1">Nieuwe afbeelding (optioneel)</label>
                        <input type="file" name="image">
                    </div>

                    <button type="submit"
                        class="bg-black text-white font-bold px-6 py-3 rounded-lg shadow hover:bg-gray-800 transition-all">
                        Opslaan
                    </button>

                </form>

            </div>
        </div>
    </div>
@endsection