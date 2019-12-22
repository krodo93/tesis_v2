@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       NUEVA BOLETA
    </div>

    <div class="card-body">
        <form action="{{ route("admin.boletas.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('factura') ? 'has-error' : '' }}">
                <label for="factura">FACTURA</label>
                <input type="text" id="factura" name="factura" class="form-control" value="{{ old('factura', isset($camion) ? $camion->factura : '') }}">
            </div>
             <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                <label for="descripcion">TURNO</label>
                {{ Form::select('turno',['DIURNO' => 'DIURNO','NOCTURNO' => 'NOCTURNO'], null, ['class' => 'form-control'])}}
            </div>
            
            <div class="form-group {{ $errors->has('conductor_id') ? 'has-error' : '' }}">
                <label for="placa">CONDUCTORES</label>
                {{ Form::select('conductor_id', $conductores, null, ['placeholder' => 'Seleccione un conductor...','class' => 'form-control'])}}
            </div>
            <div class="form-group {{ $errors->has('placa') ? 'has-error' : '' }}">
                <label for="placa">PLACA</label>
                {{ Form::select('camion_id', $camiones, null, ['placeholder' => 'Ingrese el No de placa...','class' => 'form-control'])}}
            </div>
            <div class="form-group {{ $errors->has('notas') ? 'has-error' : '' }}">
                <label for="notas">NOTAS</label>
                <textarea type="text" id="notas" name="notas" class="form-control"></textarea>
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="GUARDAR">
            </div>
        </form>
    </div>
</div>

@endsection