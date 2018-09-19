<div class="row">
    <div class="col">
        <div class="form-group">
            {{ Form::label('Category') }}
            {{ Form::select('category_id', $categories, $category->country_id, ['class' => 'form-control input-lg']) }}
        </div>

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
        <figure class="figure mt-3">
            <div id="preview"></div>
        </figure>
    </div>
    <div class="col">
        <h4>Location</h4>
        <div id="map"></div>
    </div>
</div>

<div class="mt-5">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

@section('script')
    <script type="text/javascript">
        function previewImages() {

            var $preview = $('#preview').empty();
            if (this.files) $.each(this.files, readAndPreview);

            function readAndPreview(i, file) {

                if (!/\.(jpe?g|png|gif)$/i.test(file.name)){
                    return alert(file.name +" is not an image");
                }

                var reader = new FileReader();

                $(reader).on("load", function() {
                    $preview.append($("<img/>", {src:this.result, class:'rounded img-thumbnail col-md-3 mr-2'}));
                });
                reader.readAsDataURL(file);
            }

        }

        $('.custom-file-input').on("change", previewImages);
    </script>
@endsection