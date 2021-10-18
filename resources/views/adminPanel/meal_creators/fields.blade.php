<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', __('models/mealCreators.fields.name').':') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('models/mealCreators.fields.email').':') !!}
    {!! Form::text('email', null, ['class' => 'form-control']) !!}
</div>

<!-- phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', __('models/mealCreators.fields.phone').':') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', __('models/admins.fields.password').':') !!}
    {!! Form::password('password', ['class' => 'form-control','minlength' => 6,'maxlength' => 191]) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password_confirmation', __('models/admins.fields.password_confirmation').':') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control','minlength' => 6,'maxlength' => 191]) !!}
</div>


<!-- bio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bio', __('models/mealCreators.fields.bio').':') !!}
    {!! Form::textarea('bio', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', __('models/mealCreators.fields.address').':') !!}
    {!! Form::textarea('address', null, ['class' => 'form-control']) !!}
</div>

<!-- Latitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('latitude', __('models/mealCreators.fields.latitude').':') !!}
    {!! Form::text('latitude', null, ['class' => 'form-control']) !!}
</div>

<!-- Longitude Field -->
<div class="form-group col-sm-6">
    {!! Form::label('longitude', __('models/mealCreators.fields.longitude').':') !!}
    {!! Form::text('longitude', null, ['class' => 'form-control']) !!}
</div>

    <!-- Photo -->
    <div class="form-group col-sm-6">
        {!! Form::label('photo', __('models/mealCreators.fields.photo').':') !!}
        <br>
        <div class="image-input image-input-outline" id="kt_image_3" style="background-image: url({{asset('uploads/images/original/default.png')}})">
            <div class="image-input-wrapper" style="background-image: url({{$mealCreator->photo_original_path ?? ''}})"></div>

            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change photo">
                <i class="fa fa-pen icon-sm text-muted"></i>
                <input type="file" name="photo" accept=".png, .jpg, .jpeg" />
                <input type="hidden" name="photo_remove" />
            </label>

            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel photo">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>

            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove photo">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>
        </div>
    </div>

    <!-- logo -->
    <div class="form-group col-sm-6">
        {!! Form::label('logo', __('models/mealCreators.fields.logo').':') !!}
        <br>
        <div class="image-input image-input-outline" id="kt_image_4" style="background-image: url({{asset('uploads/images/original/default.png')}})">
            <div class="image-input-wrapper" style="background-image: url({{$mealCreator->logo_original_path ?? ''}})"></div>

            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change logo">
                <i class="fa fa-pen icon-sm text-muted"></i>
                <input type="file" name="logo" accept=".png, .jpg, .jpeg" />
                <input type="hidden" name="logo_remove" />
            </label>

            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel logo">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>

            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove logo">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>
        </div>
    </div>



<!-- Delivery From Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_from', __('models/mealCreators.fields.delivery_from').':') !!}
    {!! Form::number('delivery_from', null, ['class' => 'form-control']) !!}
</div>

<!-- Delivery To Field -->
<div class="form-group col-sm-6">
    {!! Form::label('delivery_to', __('models/mealCreators.fields.delivery_to').':') !!}
    {!! Form::number('delivery_to', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', __('models/mealCreators.fields.status').':') !!}
    <div class="radio-inline">
        <label class="radio">
            {!! Form::radio('status', "1", 'Active') !!}
            <span></span>
            @lang('lang.active')
        </label>

        <label class="radio">
            {!! Form::radio('status', " 0", null) !!}
            <span></span>
            @lang('lang.inactive')
        </label>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit(__('crud.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('adminPanel.mealCreators.index') }}" class="btn btn-default">@lang('crud.cancel')</a>
</div>
