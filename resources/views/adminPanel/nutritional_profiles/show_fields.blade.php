<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/nutritionalProfiles.fields.id').':') !!}
    <b>{{ $nutritionalProfile->id }}</b>
</div>


<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/nutritionalProfiles.fields.name').':') !!}
    <b>{{ $nutritionalProfile->name }}</b>
</div>


<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('models/nutritionalProfiles.fields.status').':') !!}
    <b>{{ $nutritionalProfile->status }}</b>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/nutritionalProfiles.fields.created_at').':') !!}
    <b>{{ $nutritionalProfile->created_at }}</b>
</div>


<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/nutritionalProfiles.fields.updated_at').':') !!}
    <b>{{ $nutritionalProfile->updated_at }}</b>
</div>


