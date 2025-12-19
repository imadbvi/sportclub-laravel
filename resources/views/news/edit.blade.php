@extends('layouts.app')

@section('content')
    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ route('news.index') }}"
                    class="inline-flex items-center text-gray-500 hover:text-gray-700 transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Terug naar overzicht
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-xl rounded-2xl">
                <div class="p-8">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-4">Nieuwsbericht bewerken</h2>

                    <form action="{{ route('news.update', $news) }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf
                        @method('PUT')

                        {{-- Titel --}}
                        <div>
                            <label class="block font-medium text-gray-700 mb-1">Titel</label>
                            <input type="text" name="title"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition duration-200"
                                value="{{ old('title', $news->title) }}">
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Publicatiedatum --}}
                        <div>
                            <label class="block font-medium text-gray-700 mb-1">Publicatiedatum</label>
                            <input type="date" name="published_at"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition duration-200"
                                value="{{ old('published_at', $news->published_at ? $news->published_at->format('Y-m-d') : '') }}">
                            @error('published_at')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Inhoud --}}
                        <div>
                            <label class="block font-medium text-gray-700 mb-1">Inhoud</label>
                            <textarea name="content" rows="6"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 transition duration-200">{{ old('content', $news->content) }}</textarea>
                            @error('content')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Afbeelding Huidig --}}
                        @if($news->image)
                            <div>
                                <label class="block font-medium text-gray-700 mb-2">Huidige afbeelding</label>
                                <div class="relative w-full h-48 rounded-lg overflow-hidden shadow-md">
                                    <img src="{{ asset('storage/' . $news->image) }}" class="w-full h-full object-cover">
                                </div>
                            </div>
                        @endif

                        {{-- Afbeelding Nieuw --}}
                        <div>
                            <label class="block font-medium text-gray-700 mb-2">
                                {{ $news->image ? 'Nieuwe afbeelding uploaden (vervangt huidige)' : 'Afbeelding uploaden (optioneel)' }}
                            </label>
                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100 transition duration-200">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                            </path>
                                        </svg>
                                        <p class="text-sm text-gray-500"><span class="font-semibold">Klik om te
                                                uploaden</span> of sleep een bestand</p>
                                        <p class="text-xs text-gray-500">PNG, JPG of GIF (MAX. 2MB)</p>
                                    </div>
                                    <input id="dropzone-file" name="image" type="file" class="hidden" />
                                </label>
                            </div>
                        </div>

                        {{-- Submit Button --}}
                        <div class="pt-4">
                            <button type="submit" style="background-color: black; color: white;"
                                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-bold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition duration-200 transform hover:scale-[1.02]">
                                Wijzigingen Opslaan
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('dropzone-file').addEventListener('change', function (e) {
                const fileName = e.target.files[0]?.name;
                if (fileName) {
                    const textElement = this.parentElement.querySelector('p.text-sm');
                    textElement.innerHTML = `<span class="font-semibold text-blue-600">${fileName}</span> geselecteerd`;
                }
            });
        </script>
    </div>
@endsection