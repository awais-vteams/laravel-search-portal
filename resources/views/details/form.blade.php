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

        <div class="custom-file">
            {{ Form::file('images[]', ['class' => 'custom-file-input', 'id' => 'fileimages', 'multiple', 'accept' => 'image/*']) }}
            <label class="custom-file-label" for="fileimages">Choose images</label>
        </div>
    </div>
    <div class="mt-5">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>