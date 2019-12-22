@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        ACTUALIZAR EMPRESA
    </div>

    <div class="card-body">
        <form action="{{ route("admin.empresas.update",[$empresa->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
             @method('PUT')
            <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
                <label for="nombre">NOMBRE COMPLETO</label>
                <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', isset($empresa) ? $empresa->nombre : '') }}">
            </div>
             <div class="form-group {{ $errors->has('telefono') ? 'has-error' : '' }}">
                <label for="telefono">TELEFONO</label>
                <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono', isset($empresa) ? $empresa->telefono : '') }}">
            </div>
            <div class="form-group {{ $errors->has('direccion') ? 'has-error' : '' }}">
                <label for="direccion">DIRECCION</label>
                <input type="text" id="direccion" name="direccion" class="form-control" value="{{ old('direccion', isset($empresa) ? $empresa->direccion : '') }}">
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="ACTUALIZAR">
            </div>
        </form>
    </div>
</div>

@endsection