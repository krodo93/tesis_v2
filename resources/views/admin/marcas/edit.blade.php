@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        ACTUALIZAR MARCA CAMIONES
    </div>

    <div class="card-body">
        <form action="{{ route("admin.marcas.update", [$marca->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">NOMBRE</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', isset($marca) ? $marca->nombre : '') }}">
                @if($errors->has('nombre'))
                    <em class="invalid-feedback">
                        {{ $errors->first('nombre') }}
                    </em>
                @endif
                <p class="helper-block">
                   
                </p>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="ACTUALIZAR">
            </div>
        </form>
    </div>
</div>

@endsection