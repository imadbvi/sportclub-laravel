@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<p>Welkom in het admin dashboard, {{ auth()->user()->name }}!</p>
@endsection
