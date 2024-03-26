@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <header class="">
        <h1 class='text-center mb-5'>Scopri tutti i miei pogetti</h1>
        @if ($projects->hasPages())
            {{ $projects->links() }}
        @endif
    </header>
    @forelse ($projects as $project)
        
        <div class="card mb-3">
            <div class="row g-0">
            <div class="col-md-4">
            <img src="{{ $project->printImage() }}" class="img-fluid rounded-start" alt="{{ $project->title }}" style="width: 100%;">
            </div>
            <div class="col-md-8">
            <div class="card-body d-flex flex-column justify-content-between" style="height: 100%;">
                <div>
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text">{{ $project->contentTruncate('content') }}</p>
                    <span style="background-color: {{$project->type ? $project->type->color : ''}}" class="badge mb-2">{{ $project->type ? $project->type->label : '-' }}</span>
                    <p class="card-text mb-2"><small class="text-body-secondary"><a
                                href="{{ $project->url }}">{{ $project->url }}</a></small></p>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('guest.projects.show', $project->slug) }}" class="btn btn-primary"><i
                        class="fa-solid fa-eye me-2"></i>Vedi</a>
                </div>
            </div>
            </div>
            </div>
          </div>
    @empty
        <h1>Non ci sono progetti da visualizzare</h1>
    @endforelse
@endsection
