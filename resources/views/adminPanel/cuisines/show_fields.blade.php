<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/cuisines.fields.id').':') !!}
    <b>{{ $cuisine->id }}</b>
</div>


<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/cuisines.fields.name').':') !!}
    <b>{{ $cuisine->name }}</b>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/cuisines.fields.created_at').':') !!}
    <b>{{ $cuisine->created_at }}</b>
</div>


<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/cuisines.fields.updated_at').':') !!}
    <b>{{ $cuisine->updated_at }}</b>
</div>


