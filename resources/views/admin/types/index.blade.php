@extends('layouts.app')

@section('title', 'Types')

@section('content')
    <header class="d-flex justify-content-between align-items-center mb-5">
        <h1>Tipologie</h1>
        <a class="btn btn-primary" href="{{route('admintypes.create')}}"><i
            class="fa-solid fa-plus me-2"></i>Aggiungi Tipologia</a>
    </header>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($types as $type)
                <tr>
                    <th scope="row">{{ $type->id }}</th>
                    <td> <h4><span style="background-color: {{$type->color}}" class="badge">{{$type->label}}</span></h4></td>
                    <td>
                        <div class="d-flex gap-2">
                        <form action="{{ route('admintypes.destroy', $type)}}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger "><i
                                    class="fa-solid fa-trash-can"></i></button>
                        </form>
                        <a class="btn btn-warning btn-sm" href="{{route('admintypes.edit', $type)}}"><i class="fa-solid fa-pencil"></i></a>
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
