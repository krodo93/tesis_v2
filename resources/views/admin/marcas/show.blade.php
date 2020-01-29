@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        DETALLE DE MARCA
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        MARCA
                    </th>
                    <td>
                        {{ $marca->nombre }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection