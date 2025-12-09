@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Nieuws
    </h2>
@endsection

@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

        <a href="{{ route('news.create') }}"
   class="bg-black text-white font-bold px-4 py-2 rounded-lg shadow hover:bg-gray-800 transition inline-block mb-4">
    + Nieuw bericht
</a>


            <ul class="mt-4 space-y-2">
                @foreach ($news as $item)
                    <li>
                        <a href="{{ route('news.show', $item) }}" class="text-blue-600 hover:underline">
                            <strong>{{ $item->title }}</strong>
                        </a>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>

@endsection
