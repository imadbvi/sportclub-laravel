@extends('layouts.app')

@section('title', $news->title)

@section('content')
    <h1>{{ $news->title }}</h1>

    <p>{{ $news->content }}</p>

    @if($news->image)
        <img src="{{ asset('storage/' . $news->image) }}" 
             alt="nieuws afbeelding"
             style="max-width:400px; margin-top:20px;">
    @endif

    <br><br>
    <a href="{{ route('news.index') }}" class="btn btn-secondary">← Terug naar overzicht</a>
@endsection
