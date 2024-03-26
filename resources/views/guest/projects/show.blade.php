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
          <p class="card-text">{{ $project->content }}</p>
          <p class="card-text"><small class="text-body-secondary"><a
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
