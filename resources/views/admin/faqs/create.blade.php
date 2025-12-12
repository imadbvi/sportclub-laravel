@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Nieuwe FAQ
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white shadow rounded-lg p-6">
            <form>
                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">
                        Vraag
                    </label>
                    <input type="text"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                </div>

                <div class="mb-4">
                    <label class="block font-medium text-sm text-gray-700">
                        Antwoord
                    </label>
                    <textarea
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm"
                        rows="5"></textarea>
                </div>

                <button type="submit"
                        class="bg-black text-white font-bold px-4 py-2 rounded-lg shadow hover:bg-gray-800 transition">
                    Opslaan
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
