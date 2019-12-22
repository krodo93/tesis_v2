@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        REGISTRAR NUEVO CAMION
    </div>

    <div class="card-body">
        <form action="{{ route("admin.camiones.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('placa') ? 'has-error' : '' }}">
                <label for="placa">PLACA</label>
                <input type="text" id="placa" name="placa" class="form-control" value="{{ old('placa', isset($camion) ? $camion->placa : '') }}">
            </div>
             <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                <label for="descripcion">DESCRIPCION</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ old('descripcion', isset($camion) ? $camion->descripcion : '') }}">
            </div>
            <div class="form-group {{ $errors->has('placa') ? 'has-error' : '' }}">
                <label for="placa">MARCA</label>
                {{ Form::select('marca_id', $marcas, null, ['placeholder' => 'Seleccione una marca...','class' => 'form-control'])}}
            </div>
             <div class="form-group {{ $errors->has('color') ? 'has-error' : '' }}">
                <label for="color">COLOR</label>
                <input type="text" id="color" name="color" class="form-control" value="{{ old('color', isset($camion) ? $camion->color : '') }}">
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="GUARDAR">
            </div>
        </form>
    </div>
</div>

@endsection