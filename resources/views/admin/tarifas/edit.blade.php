@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        ACTUALIZAR TARIFA
    </div>

    <div class="card-body">
        <form action="{{ route("admin.tarifas.update", [$tarifa->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('precio') ? 'has-error' : '' }}">
                <label for="precio">PRECIO</label>
                <input type="text" id="precio" name="precio" class="form-control" value="{{ old('precio', isset($tarifa) ? $tarifa->precio : '') }}">
                @if($errors->has('precio'))
                    <em class="invalid-feedback">
                        {{ $errors->first('precio') }}
                    </em>
                @endif
                <p class="helper-block">
                   
                </p>
            </div>
            <div class="form-group {{ $errors->has('inicio') ? 'has-error' : '' }}">
                <label for="inicio">INICIO</label>
                <input type="date" id="inicio" name="inicio" class="form-control" value="{{ old('inicio', isset($tarifa) ? $tarifa->inicio : '') }}">
                @if($errors->has('inicio'))
                    <em class="invalid-feedback">
                        {{ $errors->first('inicio') }}
                    </em>
                @endif
                <p class="helper-block">
                   
                </p>
            </div>
            <div class="form-group {{ $errors->has('fin') ? 'has-error' : '' }}">
                <label for="fin">FIN</label>
                <input type="date" id="fin" name="fin" class="form-control" value="{{ old('fin', isset($tarifa) ? $tarifa->fin : '') }}">
                @if($errors->has('fin'))
                    <em class="invalid-feedback">
                        {{ $errors->first('fin') }}
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