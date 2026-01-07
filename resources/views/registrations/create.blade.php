@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-2xl text-blue-900 leading-tight">
        {{ __('Inschrijven voor Team') }}
    </h2>
@endsection

@section('content')
    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md rounded-xl max-w-lg mx-auto">
                <div class="p-6">
                    <p class="text-gray-600 mb-6">Meld je aan voor een team of activiteit.</p>

                    <form action="{{ route('registrations.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="team_id" class="block text-gray-700 text-sm font-bold mb-2">Selecteer Team</label>
                            <select name="team_id" id="team_id"
                                class="form-select w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="remarks" class="block text-gray-700 text-sm font-bold mb-2">Opmerkingen</label>
                            <textarea name="remarks" id="remarks" rows="3"
                                class="form-textarea w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                placeholder="Eventuele vragen of opmerkingen..."></textarea>
                        </div>

                        <button type="submit"
                            class="block w-full text-center px-4 py-2 bg-green-600 text-white font-semibold rounded-lg hover:bg-green-700 transition">
                            Inschrijven
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection