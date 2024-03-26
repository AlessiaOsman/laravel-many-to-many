@extends('layouts.app')

@section('title', 'Modifica Progetto')

@section('content')

<header>
    <h1 class="mb-5">Modifica Progetto</h1>
    @include('includes.projects.form')
</header>

@endsection

@section('scripts')
@vite('resources/js/image_preview.js')
@endsection