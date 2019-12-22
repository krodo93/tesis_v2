@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
  <div class="col-lg-12">
    <a class="btn btn-success" href="{{ route("admin.empresas.create") }}">
      NUEVA EMPRESA
    </a>
  </div>
</div>
<div class="card">
  <div class="card-header">
   LISTADO DE EMPRESAS
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class=" table table-bordered table-striped table-hover datatable">
        <thead>
          <tr>

            <th>
              NOMBRE
            </th>
            <th>
              TELEFONO
            </th>
            <th>
              DIRECCION
            </th>
            <th>
              ACCIONES
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($empresas as $key => $empresa)
          <tr>
            
            <td>
              {{ $empresa->nombre ?? '' }}
            </td>
            <td>
              {{ $empresa->telefono ?? '' }}
            </td>
            <td>
              {{ $empresa->direccion ?? '' }}
            </td>
            <td>
              <a class="btn  btn-info" href="{{ route('admin.empresas.show', $empresa->id) }}">
                <i class="fa fa-eye" aria-hidden="true"></i>
              </a>
              <a class="btn  btn-warning" href="{{ route('admin.empresas.edit', $empresa->id) }}">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
              </a>
              <form action="{{ route('admin.empresas.destroy', $empresa->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button class="btn btn-danger" type="submit">
                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                </button>
              </form>
              
              
              
            </td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@section('scripts')
@parent
<script>
  $(function () {
    let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
    let deleteButton = {
      text: deleteButtonTrans,
      url: "{{ route('admin.permissions.massDestroy') }}",
      className: 'btn-danger',
      action: function (e, dt, node, config) {
        var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
        });

        if (ids.length === 0) {
          alert('{{ trans('global.datatables.zero_selected') }}')

          return
        }

        if (confirm('{{ trans('global.areYouSure') }}')) {
          $.ajax({
            headers: {'x-csrf-token': _token},
            method: 'POST',
            url: config.url,
            data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
        }
      }
    }
    let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    @can('permission_delete')
    dtButtons.push(deleteButton)
    @endcan

    $('.datatable').DataTable()
  })

</script>
@endsection
@endsection