@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        REGISTRAR NUEVA MARCA
    </div>

    <div class="card-body">
        <form action="{{ route("admin.marcas.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">NOMBRE MARCA</label>
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
                <input class="btn btn-primary" type="submit" value="GUARDAR">
            </div>
        </form>
    </div>
</div>

@endsection