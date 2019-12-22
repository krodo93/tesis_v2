@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        DETALLE DE EMPRESA
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        NOMBRE
                    </th>
                    <td>
                        {{ $empresa->nombre }}
                    </td>
                </tr>
                 <tr>
                    <th>
                        TELEFONO
                    </th>
                    <td>
                        {{ $empresa->telefono }}
                    </td>
                </tr>
                 <tr>
                    <th>
                        DIRECCION
                    </th>
                    <td>
                        {{ $empresa->direccion }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection