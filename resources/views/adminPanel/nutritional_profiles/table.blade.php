<!--begin: Datatable-->
<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
    <thead>
        <tr>
            <th>@lang('models/nutritionalProfiles.fields.name')</th>
            <th>@lang('models/nutritionalProfiles.fields.status')</th>
            <th>@lang('crud.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($nutritionalProfiles as $nutritionalProfile)
        <tr>
            <td>{{ $nutritionalProfile->name }}</td>
            <td>{{ $nutritionalProfile->status ? __('lang.active') : __('lang.inactive') }}</td>
            <td nowrap>
                {!! Form::open(['route' => ['adminPanel.nutritionalProfiles.destroy', $nutritionalProfile->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    {{-- @can('nutritionalProfiles view')
                    <a href="{{ route('adminPanel.nutritionalProfiles.show', [$nutritionalProfile->id]) }}" class='btn btn-sm btn-shadow mx-1 btn-transparent-success'><i class="fa fa-eye"></i></a>
                    @endcan --}}
                    @can('nutritionalProfiles edit')
                    <a href="{{ route('adminPanel.nutritionalProfiles.edit', [$nutritionalProfile->id]) }}" class='btn btn-sm btn-shadow mx-1 btn-transparent-primary'><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('nutritionalProfiles destroy')
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
