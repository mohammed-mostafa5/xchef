<!--begin::Search Form-->
<div class="mb-7">
    <div class="row align-items-center">
        <div class="col-lg-9 col-xl-8">
            <div class="row align-items-center">
                <div class="col-md-4 my-2 my-md-0">
                    <div class="input-icon">
                        <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" />
                        <span><i class="flaticon2-search-1 text-muted"></i></span>
                    </div>
                </div>
                <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">@lang('lang.status'):</label>
                        <select class="form-control" id="kt_datatable_search_status">
                            <option value="">@lang('lang.all')</option>
                            <option value="1">@lang('lang.active')</option>
                            <option value="0">@lang('lang.inactive')</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Search Form-->
<!--begin: Datatable-->
<table class="datatable datatable-bordered datatable-head-custom table-hover" id="kt_datatable">
    <thead>
        <tr>
            <th>@lang('models/mealCreators.fields.logo')</th>
            <th>@lang('models/mealCreators.fields.name')</th>
            <th>@lang('models/mealCreators.fields.email')</th>
            <th>@lang('models/mealCreators.fields.address')</th>
            <th>@lang('models/mealCreators.fields.delivery_from')</th>
            <th>@lang('models/mealCreators.fields.delivery_to')</th>
            <th>@lang('models/mealCreators.fields.status')</th>
            <th>@lang('crud.action')</th>
        </tr>
    </thead>
    <tbody>
        @foreach($mealCreators as $mealCreator)
        <tr>
            <td><img src="{{$mealCreator->logo_original_path}}" width="60" onerror="this.src='{{asset('uploads/images/original/default.png')}}'" /></td>
            <td>{{ $mealCreator->name }}</td>
            <td>{{ $mealCreator->admin->email ?? '' }}</td>
            <td>{{ $mealCreator->address }}</td>
            <td>{{ $mealCreator->delivery_from }}  Min</td>
            <td>{{ $mealCreator->delivery_to }}  Min</td>
            <td>{{ $mealCreator->admin->status ?? '' }}</td>
            <td nowrap>
                {!! Form::open(['route' => ['adminPanel.mealCreators.destroy', $mealCreator->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    @can('mealCreators view')
                    <a href="{{ route('adminPanel.mealCreators.show', [$mealCreator->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                    @endcan
                    @can('mealCreators edit')
                    <a href="{{ route('adminPanel.mealCreators.edit', [$mealCreator->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                    @endcan
                    @can('mealCreators destroy')
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => 'return confirm("'.__('crud.are_you_sure').'")']) !!}
                    @endcan
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<!--end: Datatable-->
