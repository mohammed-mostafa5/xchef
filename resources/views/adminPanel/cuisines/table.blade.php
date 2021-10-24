<!--begin: Datatable-->
<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
    <thead>
        <tr>
            <th>@lang('models/cuisines.fields.name')</th>
            <th>@lang('models/cuisines.fields.status')</th>
            <th>@lang('crud.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($cuisines as $cuisine)
        <tr>
            <td>{{ $cuisine->name }}</td>
            <td>{{ $cuisine->status? __('lang.active'): __('lang.inactive') }}</td>
            <td nowrap>
                {!! Form::open(['route' => ['adminPanel.cuisines.destroy', $cuisine->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{-- @can('cuisines view')
                    <a href="{{ route('adminPanel.cuisines.show', [$cuisine->id]) }}" class='btn btn-sm btn-shadow mx-1 btn-transparent-success'><i class="fa fa-eye"></i></a>
                    @endcan --}}
                    @can('cuisines edit')
                    <a href="{{ route('adminPanel.cuisines.edit', [$cuisine->id]) }}" class='btn btn-sm btn-shadow mx-1 btn-transparent-primary'><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('cuisines destroy')
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-shadow mx-1 btn-transparent-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!--end: Datatable-->
