@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Veelgestelde vragen
    </h2>
@endsection

@section('content')
<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

        @if($faqs->isEmpty())
            <p>Er zijn momenteel geen veelgestelde vragen.</p>
        @else
            <div class="space-y-6">
                @foreach($faqs as $faq)
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="font-bold text-lg">{{ $faq->question }}</h3>
                        <p class="mt-2 text-gray-700">{{ $faq->answer }}</p>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
</div>
@endsection
