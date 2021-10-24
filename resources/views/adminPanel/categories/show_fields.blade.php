<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('models/categories.fields.id').':') !!}
    <b>{{ $category->id }}</b>
</div>


<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('models/categories.fields.name').':') !!}
    <b>{{ $category->name }}</b>
</div>


<!-- Brief Field -->
<div class="form-group">
    {!! Form::label('brief', __('models/categories.fields.brief').':') !!}
    <b>{{ $category->brief }}</b>
</div>


<!-- Icon Field -->
<div class="form-group">
    {!! Form::label('icon', __('models/categories.fields.icon').':') !!}
    <b>{{ $category->icon }}</b>
</div>


<!-- Parent Id Field -->
<div class="form-group">
    {!! Form::label('parent_id', __('models/categories.fields.parent_id').':') !!}
    <b>{{ $category->parent_id }}</b>
</div>


<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('models/categories.fields.status').':') !!}
    <b>{{ $category->status }}</b>
</div>


<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('models/categories.fields.created_at').':') !!}
    <b>{{ $category->created_at }}</b>
</div>


<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('models/categories.fields.updated_at').':') !!}
    <b>{{ $category->updated_at }}</b>
</div>


