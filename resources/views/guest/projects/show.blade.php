@extends('layouts.app')

@section('title', 'Progetti')

@section('content')
<div class="card mb-3">
  <div class="row g-0">
  <div class="col-md-4">
  <img src="{{ $project->printImage()}}" class="img-fluid rounded-start" alt="{{ $project->title }}" style="width: 100%;">
  </div>
  <div class="col-md-8">
  <div class="card-body d-flex flex-column justify-content-between" style="height: 100%;">
      <div>
          <h5 class="card-title">{{ $project->title }}</h5>
          <span style="background-color: {{$project->type ? $project->type->color : ''}}" class="badge mb-2">{{ $project->type ? $project->type->label : '-' }}</span>
          @forelse ($project->technologies as $technology )
          <span class="badge rounded-pill text-bg-{{$technology->color}}">{{$technology->label}}</span>
          @empty
              <h4 class="mb-3">Nessuna tecnologia presente</h4>
          @endforelse
          <p class="card-text">{{ $project->content }}</p>
          <p class="card-text mb-2"><small class="text-body-secondary"><a
                      href="{{ $project->url }}">{{ $project->url }}</a></small></p>
      </div>
      <div class="d-flex justify-content-between">
          <a href="{{ route('guest.home', $project) }}" class="btn btn-primary"><i
                  class="fa-solid fa-arrow-left me-2"></i>Torna indietro</a>
      </div>
  </div>
  </div>
  </div>
</div>
@endsection
