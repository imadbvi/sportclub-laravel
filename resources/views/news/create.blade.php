@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Nieuws aanmaken
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Titel</label>
                        <input type="text" name="title" class="w-full border p-2 rounded" value="{{ old('title') }}">
                        @error('title')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Publicatiedatum</label>
                        <input type="date" name="published_at" class="w-full border p-2 rounded"
                            value="{{ old('published_at') }}">
                        @error('published_at')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Inhoud</label>
                        <textarea name="content" class="w-full border p-2 rounded" rows="5">{{ old('content') }}</textarea>
                        @error('content')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block font-semibold mb-1">Afbeelding (optioneel)</label>
                        <input type="file" name="image">
                    </div>

                    {{-- HIER is de knop --}}
                    <button type="submit"
                        class="bg-black text-white font-bold px-6 py-3 rounded-lg shadow hover:bg-gray-800 transition-all">
                        Opslaan
                    </button>




                </form>

            </div>
        </div>
    </div>
@endsection