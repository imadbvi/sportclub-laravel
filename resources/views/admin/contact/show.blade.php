@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Bericht Details
    </h2>
@endsection

@section('content')
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6">
                <a href="{{ route('admin.contact.index') }}"
                    class="text-blue-600 hover:text-blue-800 flex items-center gap-2 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Terug naar Berichten
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="flex justify-between items-start mb-6 border-b pb-4">
                        <div>
                            <h3 class="text-2xl font-bold text-gray-900 mb-1">{{ $message->subject }}</h3>
                            <p class="text-sm text-gray-500">
                                Van: <span class="font-semibold text-gray-700">{{ $message->name }}</span>
                                ({{ $message->email }})
                            </p>
                        </div>
                        <div class="text-sm text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                            {{ $message->created_at?->format('d-m-Y H:i') ?? 'Datum onbekend' }}
                        </div>
                    </div>

                    <div class="prose max-w-none text-gray-800 whitespace-pre-line">
                        {{ $message->message }}
                    </div>

                    <div class="mt-8 pt-6 border-t flex justify-end">
                        <form action="{{ route('admin.contact.destroy', ['contact_message' => $message->id]) }}"
                            method="POST" onsubmit="return confirm('Weet je zeker dat je dit bericht wilt verwijderen?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded shadow transition">
                                Verwijderen
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection