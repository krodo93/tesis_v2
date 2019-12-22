@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        DETALLE DE CONDUCTOR
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        LICENCIA
                    </th>
                    <td>
                        {{ $conductore->licencia }}
                    </td>
                </tr>
                 <tr>
                    <th>
                        TELEFONO
                    </th>
                    <td>
                        {{ $conductore->telefono }}
                    </td>
                </tr>
                 <tr>
                    <th>
                        DIRECCION
                    </th>
                    <td>
                        {{ $conductore->direccion }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection