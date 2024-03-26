@extends('layouts.app')

@section('title', 'Modifica Categoria')

@section('content')

<header>
    <h1 class="mb-5">Modifica Categoria</h1>
</header>
    <form action="{{route('admintypes.update', $type)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="label" class="form-label">Nome della categoria</label>
                    <input type="text"
                        class="form-control @error('label') is-invalid
                      @elseif (old('label', '')) is-valid 
                    @enderror"
                        id="label" name="label" value="{{ old('label', $type->label) }}">
                    @error('label')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="color" class="form-label">Nome della categoria</label>
                    <input type="color"
                        class="form-control @error('color') is-invalid
                      @elseif (old('color', '')) is-valid 
                    @enderror"
                        id="color" name="color" value="{{ old('color', $type->color) }}">
                    @error('label')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('admintypes.index') }}" class="btn btn-primary"><i
                    class="fa-solid fa-arrow-left me-2"></i>Torna indietro</a>
            <div class="align-items-center d-flex gap-2">
                <button class="btn btn-secondary" type="reset"><i class="fa-solid fa-eraser me-2"></i>Svuota i campi</button>
                <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk me-2"></i>Salva</button>
        
            </div>
        </div>
    </form>


@endsection
