@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        REGISTRAR NUEVO CONDUCTOR
    </div>

    <div class="card-body">
        <form action="{{ route("admin.conductores.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">NOMBRE COMPLETO</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', isset($conductor) ? $conductor->nombre : '') }}">
            </div>
             <div class="form-group {{ $errors->has('licencia') ? 'has-error' : '' }}">
                <label for="licencia">LICENCIA</label>
                <input type="text" id="licencia" name="licencia" class="form-control" value="{{ old('licencia', isset($licencia) ? $conductor->licencia : '') }}">
            </div>
             <div class="form-group {{ $errors->has('telefono') ? 'has-error' : '' }}">
                <label for="telefono">TELEFONO</label>
                <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono', isset($conductor) ? $conductor->telefono : '') }}">
            </div>
            <div class="form-group {{ $errors->has('direccion') ? 'has-error' : '' }}">
                <label for="direccion">DIRECCION</label>
                <input type="text" id="direccion" name="direccion" class="form-control" value="{{ old('direccion', isset($conductor) ? $conductor->direccion : '') }}">
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="GUARDAR">
            </div>
        </form>
    </div>
</div>

@endsection