@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Nieuw nieuwsbericht
    </h2>
@endsection

@section('content')

<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-xl sm:rounded-lg">

            <h1 class="text-2xl font-bold mb-4">Maak een nieuwsbericht</h1>

            <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label class="block font-semibold mb-1">Titel</label>
                    <input type="text" name="title" class="w-full border-gray-300 rounded" required>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-1">Inhoud</label>
                    <textarea name="content" class="w-full border-gray-300 rounded" rows="4" required></textarea>
                </div>

                <div class="mb-4">
                    <label class="block font-semibold mb-1">Afbeelding (optioneel)</label>
                    <input type="file" name="image" accept="image/*">
                </div>

                <button class="bg-blue-600 text-white px-4 py-2 rounded">
                    Opslaan
                </button>

                <a href="{{ route('news.index') }}" 
                   class="ml-4 text-gray-600 hover:underline">
                    Annuleren
                </a>
            </form>

        </div>
    </div>
</div>

@endsection
