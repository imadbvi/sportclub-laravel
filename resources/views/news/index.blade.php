@extends('layouts.app')

@section('title', 'Nieuws')

@section('content')
    <h1>Nieuws</h1>

    <a href="{{ route('news.create') }}" class="btn btn-primary">Nieuw bericht maken</a>

    <ul style="margin-top:20px;">
        @foreach ($news as $item)
            <li>
                <a href="{{ route('news.show', $item) }}">
                    <strong>{{ $item->title }}</strong>
                </a>
            </li>
        @endforeach
    </ul>
@endsection
