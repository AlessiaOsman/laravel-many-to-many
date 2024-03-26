@extends('layouts.app')

@section('title', 'Aggiungi Progetto')

@section('content')

<header>
    <h1 class="mb-5">Inserisci un nuovo progetto</h1>
    @include('includes.projects.form')
</header>

@endsection

@section('scripts')
<script>
   const titleField = getElementById('title');
   const slugField = getElementById('slug');
   titleField.addEventListener('blur', ()=>{
    slugField.value = titleField.value.trim().toLowerCase().split(' ').join('-');
   })
</script>
@vite('resources/js/image_preview.js')
@endsection