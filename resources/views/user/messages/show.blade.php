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
                <a href="{{ route('user.messages.index') }}"
                    class="text-blue-600 hover:text-blue-800 flex items-center gap-2 transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Terug naar Mijn Berichten
                </a>
            </div>

            <div class="space-y-6">
                <div class="bg-white shadow sm:rounded-lg p-6 border-l-4 border-blue-500">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-lg font-bold text-gray-900">{{ $message->subject }}</h3>
                        <span class="text-xs text-gray-500">{{ $message->created_at->format('d-m-Y H:i') }}</span>
                    </div>
                    <p class="text-gray-800 whitespace-pre-line">{{ $message->message }}</p>
                </div>

                @foreach($message->replies as $reply)
                    <div class="flex {{ $reply->user_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                        <div
                            class="max-w-xl {{ $reply->user_id === auth()->id() ? 'bg-blue-100 text-blue-900' : 'bg-gray-100 text-gray-900' }} rounded-lg p-4 shadow-sm">
                            <div class="flex justify-between items-center mb-1 text-xs opacity-75 gap-4">
                                <span class="font-semibold">{{ $reply->user->name ?? 'Onbekend' }}</span>
                                <span>{{ $reply->created_at->format('d-m-Y H:i') }}</span>
                            </div>
                            <p class="whitespace-pre-line">{{ $reply->message }}</p>
                        </div>
                    </div>
                @endforeach

                @if($message->admin_reply && $message->replies->isEmpty())
                    <div class="flex justify-start">
                        <div class="max-w-xl bg-green-50 text-green-900 border border-green-200 rounded-lg p-4 shadow-sm">
                            <div class="flex justify-between items-center mb-1 text-xs opacity-75 gap-4">
                                <span class="font-semibold text-green-700">Beheerder</span>
                                <span>{{ $message->replied_at?->format('d-m-Y H:i') }}</span>
                            </div>
                            <p class="whitespace-pre-line">{{ $message->admin_reply }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Reply Form -->
            <div class="mt-8 pt-6 border-t">
                <form action="{{ route('user.messages.reply', $message) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Reageer</label>
                        <textarea name="message" id="message" rows="3"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Schrijf een reactie..." required></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow transition">
                            Verstuur
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection