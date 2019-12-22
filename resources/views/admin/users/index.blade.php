@extends('layouts.admin')
@section('content')
@can('user_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.users.create") }}">
            NUEVO USUARIO
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        LISTADO DE USUARIOS
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
                        EMAIL
                    </th>
                    
                    <th>
                        {{ trans('global.user.fields.roles') }}
                    </th>
                    <th>
                        ACCIONES
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                <tr data-entry-id="{{ $user->id }}">
                   
                    <td>
                        {{ $user->name ?? '' }}
                    </td>
                    <td>
                        {{ $user->email ?? '' }}
                    </td>
                    
                    <td>
                        @foreach($user->roles as $key => $item)
                        <span class="badge badge-info">{{ $item->title }}</span>
                        @endforeach
                    </td>
                    <td>
                        @can('user_show')
                        <a class="btn btn-primary" href="{{ route('admin.users.show', $user->id) }}">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        @endcan
                        @can('user_edit')
                        <a class="btn btn-warning" href="{{ route('admin.users.edit', $user->id) }}">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        @endcan
                        @can('user_delete')
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button class="btn btn-danger" type="submit">
                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                            </button>
                        </form>
                        @endcan
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
        url: "{{ route('admin.users.massDestroy') }}",
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


$('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection