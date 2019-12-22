@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        COMPLETAR BOLETA
    </div>

    <div class="card-body">
        <form action="{{ route("admin.boletas.completar") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$id}}">
            <div class="row">
                <div class="col">
                    <div class="form-group {{ $errors->has('factura') ? 'has-error' : '' }}">
                        <label for="factura">FACTURA</label>
                        <input type="text" id="factura" name="factura" class="form-control" value="{{ old('factura', isset($boleta) ? $boleta->factura : '') }}" disabled="true">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group {{ $errors->has('descripcion') ? 'has-error' : '' }}">
                        <label for="descripcion">TURNO</label>
                        {{ Form::select('turno',['DIURNO' => 'DIURNO','NOCTURNO' => 'NOCTURNO'], $boleta->turno, ['class' => 'form-control','disabled'])}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group {{ $errors->has('placa') ? 'has-error' : '' }}">
                        <label for="placa">CAMIONES</label>
                        {{ Form::select('camion_id', $camiones, $boleta->camion_id, ['placeholder' => 'Seleccione un camion...','class' => 'form-control','disabled'])}}
                    </div>
                </div>
                <div class="col">
                    <div class="form-group {{ $errors->has('conductor_id') ? 'has-error' : '' }}">
                        <label for="placa">CONDUCTORES</label>
                        {{ Form::select('conductor_id', $conductores, $boleta->conductor_id, ['placeholder' => 'Seleccione un conductor...','class' => 'form-control','disabled'])}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="form-group {{ $errors->has('notas') ? 'has-error' : '' }}">
                        <label for="notas">NOTAS</label>
                        <textarea type="text" id="notas" name="notas" class="form-control" disabled="true">{{ $boleta->notas}}</textarea>
                    </div>
                </div>
            </div>
            
            <table class="table table-sm table-border">
                <thead>
                    <tr>
                       
                        <th>PESO (KG)</th>
                        <th>PRECIO</th>
                        <th>TOTAL</th>
                        <th>FECHA/HORA</th>
                        <th>PESO NETO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($boleta_detalles as $item)
                    <tr>
                        <td>{{ $item->peso }}</td>
                        <td>${{ number_format($item->precio,2) }}</td>
                        <td>${{number_format($item->total,2) }}</td>
                        <td>{{ $item->pesada }}</td>
                        <td>{{ $item->peso }}</td>
                    </tr>
                   
                    @endforeach
                </tbody>
            </table>
            <div>
                <a href="/admin/boletas/{{ $boleta->id}}/detalle?imprimir=1" target="_blank" class="btn btn-primary">IMPRIMIR</a>
            </div>
        </form>
    </div>
</div>

@endsection