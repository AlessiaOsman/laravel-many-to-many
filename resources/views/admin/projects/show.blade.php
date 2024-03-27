@extends('layouts.app')

@section('title', 'project')

@section('content')

    <div class="card mb-3">
        <div class="row g-0">
        <div class="col-md-4">
        <img src="{{ $project->printImage() }}" class="img-fluid rounded-start" alt="{{ $project->title }}" style="width: 100%;">
        </div>
        <div class="col-md-8">
        <div class="card-body d-flex flex-column justify-content-between" style="height: 100%;">
            <div>
                <h2 class="card-title">{{ $project->title }}</h2>
                <h4>Categoria: @if ($project->type) 
                    <span style="background-color: {{$project->type->color}}" class="badge text-bg-primary">{{$project->type->label}}</span>
                    @else
                    Nessuna
                    @endif</h4>
                    @forelse ($project->technologies as $technology )
                    <span class="badge rounded-pill text-bg-{{$technology->color}}">{{$technology->label}}</span>
                    @empty
                        <h4 class="mb-3">Nessuna tecnologia presente</h4>
                    @endforelse
                <p class="card-text">{{ $project->content }}</p>
                <p class="card-text mb-3"><small class="text-body-secondary"><a
                            href="{{ $project->url }}">{{ $project->url }}</a></small></p>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('adminprojects.index', $project) }}" class="btn btn-primary"><i
                        class="fa-solid fa-arrow-left me-2"></i>Torna indietro</a>
                <div class="d-flex align-items-center gap-2">
                    <form action="{{ route('adminprojects.destroy', $project) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger "><i
                                class="fa-solid fa-trash-can me-2"></i>Elimina</button>
                    </form>
                    <a class="btn btn-warning" href="{{ route('adminprojects.edit', $project) }}"><i
                            class="fa-solid fa-pencil me-2"></i>Modifica</a>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>
@endsection
@section('scripts')
    @vite('resources/js/delete_confirmation.js')
@endsection
