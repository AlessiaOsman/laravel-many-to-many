@if ($project->exists)
    <form action="{{ route('adminprojects.update', $project) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
    @else
        <form action="{{ route('adminprojects.store') }}" method="POST" enctype="multipart/form-data">
@endif


@csrf

<div class="row mb-5">
    <div class="col-6">
        <div class="mb-3">
            <label for="title" class="form-label">Titolo del progetto</label>
            <input type="text"
                class="form-control @error('title') is-invalid
              @elseif (old('title', '')) is-valid 
            @enderror"
                id="title" name="title" value="{{ old('title', $project->title) }}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control " id="slug"
                value="{{ Str::slug(old('title', $project->title)) }}" disabled>
        </div>
    </div>
    <div class="col-12">
        <div class="mb-3">
            <label for="content" class="form-label">Descrizione</label>
            <textarea
                class="form-control @error('content') is-invalid
            @elseif (old('content', '')) is-valid 
          @enderror"
                id="content" name="content" rows="10">{{ old('content', $project->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="mb-3">
            <label for="url" class="form-label">Indirizzo http</label>
            <input type="url"
                class="form-control @error('url') is-invalid
            @elseif (old('url', '')) is-valid 
          @enderror"
                id="url" name="url" value="{{ old('url', $project->url) }}">
            @error('url')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="type_id" class="form-label">Seleziona tipologia</label>
            <select class="form-select @error('type_id') is-invalid
            @elseif (old('type_id', '')) is-valid 
          @enderror" name="type_id" id='type_id'>
                <option value="">Nessuna</option>
                @foreach ($types as $type )
                    <option value="{{$type->id}}" @if (old('type_id', $project->type?->id) == $type->id) selected @endif>{{$type->label}}</option>
                @endforeach
              </select>
        </div>
    </div>
    <div class="col-5">
        <div class="mb-3">
            <label for="image" class="form-label">Immagine</label>
            <div @class(['form-control', 'd-none' => !$project->image]) id='previous-image-field'>
                <button class="btn btn-outline-secondary" type="button" id="change-image-button">Cambia Immagine</button>
                <input type="text" class="form-control" value="{{ old('image', $project->image) }}" disabled>
              </div>
            <input type="file" class="form-control @if($project->image) d-none @endif @error('image') is-invalid @elseif (old('image', '')) is-valid @enderror" 
            name='image' id="image" >
        </div>
        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>   
        @else
            <div class="form-text">Carica un file immagine</div>         
        @enderror
    </div>
    <div class="col-1">
        <div class="mb-3">
            <img src="{{ old('image', $project->image) 
            ?  $project->printImage()
            : 'https://marcolanci.it/boolean/assets/placeholder.png' }}"
                class="img-fluid" alt="{{$project->image ? $project->title : 'preview'}}" id='preview'>
        </div>
    </div>

    <div class="col">
        <div class="mt-3">
            @foreach ( $technologies as $technology )
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="{{"tech-$technology->label"}}" name='technologies[]' value="{{$technology->id}}" 
                @if (in_array($technology->id, old('technologies', $prev_tech ?? []))) checked @endif>
                <label class="form-check-label" for="{{"tech-$technology->label"}}">{{$technology->label}}</label>
              </div>
            @endforeach    
        </div>
        @error('technologies')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>

</div>
<div class="d-flex align-items-center justify-content-between">
    <a href="{{ route('adminprojects.index') }}" class="btn btn-primary"><i
            class="fa-solid fa-arrow-left me-2"></i>Torna indietro</a>
    <div class="align-items-center d-flex gap-2">
        <button class="btn btn-secondary" type="reset"><i class="fa-solid fa-eraser me-2"></i>Svuota i campi</button>
        <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk me-2"></i>Salva</button>

    </div>
</div>
</form>
