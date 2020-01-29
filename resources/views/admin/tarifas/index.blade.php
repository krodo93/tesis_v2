@extends('layouts.admin')
@section('content')
<div style="margin-bottom: 10px;" class="row">
  <div class="col-lg-12">
    <a class="btn btn-success" href="{{ route("admin.tarifas.create") }}">
      NUEVA TARIFA
    </a>
  </div>
</div>
<div class="card">
  <div class="card-header">
    LISTADO DE TARIFAS
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class=" table table-bordered table-striped table-hover datatable">
        <thead>
          <tr>

            <th>
              PRECIO
            </th>
            <th>
              DESDE
            </th>
            <th>
              HASTA
            </th>
            <th>
             ACCIONES
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach($tarifas as $key => $tarifa)
          <tr>
            
            <td>
              {{ $tarifa->precio ?? '' }}
            </td>
            <td>
              {{ $tarifa->inicio ?? '' }}
            </td>
            <td>
              {{ $tarifa->fin ?? '' }}
            </td>
            <td>
              
              <a class="btn  btn-warning" href="{{ route('admin.tarifas.edit', $tarifa->id) }}">
               <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
             </a>
             <form action="{{ route('admin.tarifas.destroy', $tarifa->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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