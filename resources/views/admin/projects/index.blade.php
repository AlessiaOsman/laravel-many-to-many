@extends('layouts.app')

@section('title', 'Projects')

@section('content')
    <header class="d-flex justify-content-between align-items-center mb-5">
        <h1>Progetti</h1>
        <a class="btn btn-primary" href="{{ route('adminprojects.create') }}"><i class="fa-solid fa-plus me-2"></i>Aggiungi
            progetto</a>
    </header>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Titolo</th>
                <th scope="col">Tipologia</th>
                <th scope="col">Tecnologia</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Creato il</th>
                <th scope="col">Url</th>
                <th scope="col">Slug</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>
                        <span style="background-color: {{ $project->type ? $project->type->color : '' }}"
                            class="badge">{{ $project->type ? $project->type->label : '-' }}</span>
                    </td>
                    <td>
                        @forelse ($project->technologies as $technology)
                            <span
                                class="badge rounded-pill text-bg-{{ $technology->color }}">{{ $technology->label }}</span>
                        @empty
                            Nessuna tecnologia presente
                        @endforelse
                    </td>
                    <td>{{ $project->contentTruncate('content') }}</td>
                    <td>{{ $project->getFormattedDate('created_at') }}</td>
                    <td><a href="{{ $project->url }}">{{ $project->url }}</a></td>
                    <td>{{ $project->slug }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="{{ route('adminprojects.show', $project) }}" class="btn btn-sm btn-primary"><i
                                    class="fa-solid fa-eye"></i></a>
                            <form action="{{ route('adminprojects.destroy', $project) }}" method="POST"
                                class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger "><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </form>
                            <a class="btn btn-warning btn-sm" href="{{ route('adminprojects.edit', $project) }}"><i
                                    class="fa-solid fa-pencil"></i></a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <th>Nessun progetto da mostrare</th>
                </tr>
            @endforelse

        </tbody>
    </table>

@endsection

@section('scripts')
    @vite('resources/js/delete_confirmation.js')
@endsection
