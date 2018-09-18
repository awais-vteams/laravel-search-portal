<div class="">
    <div class="">
        <div class="form-group}}">
            {{ Form::label('name') }}
            {{ Form::text('name', $category->name, ['class' => "form-control input-lg" . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Category Name']) }}
            {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group ">
            {{ Form::label('Description') }}
            {{ Form::textarea('description', $category->description, ['class' => 'form-control input-lg' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<p class="invalid-feedback">:message</p>') !!}
        </div>
    </div>
    <div class="">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>