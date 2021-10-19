<!-- Photo Field -->
<div class="form-group">
    {!! Form::label('photo', __('models/mealCreators.fields.photo').':') !!}
    <b><img onerror="this.src={{asset('uploads/images/original/default.png')}}" src="{{$mealCreator->photo_original_path}}" alt="{{$mealCreator->name}}" width="300"></b>
</div>

<!-- logo Field -->
<div class="form-group">
    {!! Form::label('logo', __('models/mealCreators.fields.logo').':') !!}
    <b><img onerror="this.src={{asset('uploads/images/original/default.png')}}" src="{{$mealCreator->logo_original_path}}" alt="{{$mealCreator->name}}" width="100"></b>
</div>

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/mealCreators.fields.id').':') !!}
    <b>{{ $mealCreator->id }}</b>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/mealCreators.fields.name').':') !!}
    <b>{{ $mealCreator->name }}</b>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('models/mealCreators.fields.email').':') !!}
    <b>{{ $mealCreator->admin->email ?? '' }}</b>
</div>


<!-- Address Field -->
<div class="form-group">
    {!! Form::label('address', __('models/mealCreators.fields.address').':') !!}
    <b>{{ $mealCreator->address }}</b>
</div>


<!-- Latitude Field -->
<div class="form-group">
    {!! Form::label('latitude', __('models/mealCreators.fields.latitude').':') !!}
    <b>{{ $mealCreator->latitude }}</b>
</div>


<!-- Longitude Field -->
<div class="form-group">
    {!! Form::label('longitude', __('models/mealCreators.fields.longitude').':') !!}
    <b>{{ $mealCreator->longitude }}</b>
</div>



<!-- Delivery From Field -->
<div class="form-group">
    {!! Form::label('delivery_from', __('models/mealCreators.fields.delivery_from').':') !!}
    <b>{{ $mealCreator->delivery_from }}</b>
</div>


<!-- Delivery To Field -->
<div class="form-group">
    {!! Form::label('delivery_to', __('models/mealCreators.fields.delivery_to').':') !!}
    <b>{{ $mealCreator->delivery_to }}</b>
</div>


<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('models/mealCreators.fields.status').':') !!}
    <b>{{ $mealCreator->admin->status ? __('lang.active') : __('lang.inactive') }}</b>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/mealCreators.fields.created_at').':') !!}
    <b>{{ $mealCreator->created_at }}</b>
</div>


<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/mealCreators.fields.updated_at').':') !!}
    <b>{{ $mealCreator->updated_at }}</b>
</div>


