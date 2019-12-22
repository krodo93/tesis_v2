@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        DETALLE DE CAMION
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        DESCRIPCION
                    </th>
                    <td>
                        {{ $camione->descripcion }}
                    </td>
                </tr>
                 <tr>
                    <th>
                        PLACA
                    </th>
                    <td>
                        {{ $camione->placa }}
                    </td>
                </tr>
                 <tr>
                    <th>
                        COLOR
                    </th>
                    <td>
                        {{ $camione->color }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection