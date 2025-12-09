@extends('layouts.app')

@section('title', 'Nieuws maken')

@section('content')
    <h1>Nieuw nieuwsbericht</h1>

    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="title">Titel:</label>
        <input type="text" name="title" id="title" required class="form-control">

        <label for="content" style="margin-top:15px;">Inhoud:</label>
        <textarea name="content" id="content" rows="5" required class="form-control"></textarea>

        <label for="image" style="margin-top:15px;">Afbeelding (optioneel):</label>
        <input type="file" name="image" id="image">

        <button type="submit" class="btn btn-success" style="margin-top:20px;">Opslaan</button>
    </form>
@endsection
