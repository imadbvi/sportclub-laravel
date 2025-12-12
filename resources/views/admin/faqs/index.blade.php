@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        FAQ
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <a href="{{ route('faqs.create') }}"
           class="bg-black text-white font-bold px-4 py-2 rounded-lg shadow hover:bg-gray-800 transition inline-block mb-4">
            + Nieuwe FAQ
        </a>

        <div class="bg-white shadow rounded-lg p-6">
    @if($faqs->isEmpty())
        <p>Er zijn nog geen FAQ’s.</p>
    @else
        <div class="space-y-4">
            @foreach($faqs as $faq)
                <div class="border rounded-lg p-4">
                    <p class="font-bold">{{ $faq->question }}</p>
                    <p class="mt-2 text-gray-700">{{ $faq->answer }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>


    </div>
</div>
@endsection
