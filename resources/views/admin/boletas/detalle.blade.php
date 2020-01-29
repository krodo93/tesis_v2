@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        COMPLETAR BOLETA
    </div>

    <div class="card-body">
        @if(session('tarifa'))
            <div class="alert alert-danger" role="alert">
              {{ session('tarifa') }}
            </div>
        @endif
        <form action="{{ route("admin.boletas.completar") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$id}}">
            <div class="row">
                <div class="col">
                    <div class="form-group {{ $errors->has('factura') ? 'has-error' : '' }}">
                        <label for="factura">FACTURA</label>
                        <input type="text" id="factura" name="factura" class="form-control" value="{{ old('factura', isset($boleta) ? $boleta->factura : '') }}">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                        <label for="descripcion">TURNO</label>
                        {{ Form::select('turno',['DIURNO' => 'DIURNO','NOCTURNO' => 'NOCTURNO'], $boleta->turno, ['class' => 'form-control'])}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group {{ $errors->has('placa') ? 'has-error' : '' }}">
                        <label for="placa">CAMIONES</label>
                        {{ Form::select('camion_id', $camiones, $boleta->camion_id, ['placeholder' => 'Seleccione un camion...','class' => 'form-control'])}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group {{ $errors->has('conductor_id') ? 'has-error' : '' }}">
                        <label for="placa">CONDUCTORES</label>
                        {{ Form::select('conductor_id', $conductores, $boleta->conductor_id, ['placeholder' => 'Seleccione un conductor...','class' => 'form-control'])}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group {{ $errors->has('notas') ? 'has-error' : '' }}">
                        <label for="notas">NOTAS</label>
                        <textarea type="text" id="notas" name="notas" class="form-control">{{ $boleta->notas}}</textarea>
                    </div>
                </div>
            </div>
            
            <table class="table table-sm table-border">
                <thead>
                    <tr>
                        <th>PESADA</th>
                        <th>PESO (KG)</th>
                        <th>FECHA/HORA</th>
                    </tr>
                    <tr>
                        <td>#1</td>
                        <td>
                            <input type="number" class="form-control" name="pesada_1_peso">
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    
                </thead>
            </table>
            <div>
                <input class="btn btn-primary" type="submit" value="COMPLETAR">
            </div>
        </form>
    </div>
</div>

@endsection