<div class="row">
    <div class="col">
        <div class="form-group">
            {{ Form::label('Category') }}
            {{ Form::select('category_id', $categories, $userCategories->category_id, ['class' => 'form-control input-lg']) }}
        </div>

        <div class="form-group}}">
            {{ Form::label('name') }}
            {{ Form::text('name', $userCategories->details->name, ['class' => "form-control input-lg" . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Category Name']) }}
            {!! $errors->first('name', '<p class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group ">
            {{ Form::label('Description') }}
            {{ Form::textarea('description', $userCategories->details->description, ['class' => 'form-control input-lg' . ($errors->has('description') ? ' is-invalid' : ''), 'placeholder' => 'Description']) }}
            {!! $errors->first('description', '<p class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="form-group}}">
            {{ Form::label('tags') }}
            {{ Form::text('tags', $userCategories->details->name, ['class' => "form-control input-lg" . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Tags', 'data-role' => 'tagsinput']) }}
            {!! $errors->first('tags', '<p class="invalid-feedback">:message</p>') !!}
        </div>

        <div class="custom-file">
            {{ Form::file('images[]', ['class' => 'custom-file-input', 'id' => 'fileimages', 'multiple', 'accept' => 'image/*']) }}
            <label class="custom-file-label" for="fileimages">Choose images</label>
        </div>

        <figure class="figure mt-3">
            <div id="preview">
                @foreach($userCategories->images as $image)
                    <img src="{{ asset('images/' . $image->path) }}" alt="image" class="rounded img-thumbnail col-md-3 mr-2">
                @endforeach
            </div>
        </figure>
    </div>
    <div class="col">
        <h4>Location</h4>
        <input id="pac-input" class="form-control input-lg" type="text" placeholder="Search">
        <div id="map"></div>
        {{ Form::hidden('lat', $userCategories->details->lat, ['id' => 'lat']) }}
        {{ Form::hidden('lng', $userCategories->details->lng, ['id' => 'lng']) }}
    </div>
</div>

<div class="mt-5">
    <button type="submit" class="btn btn-primary">Submit</button>
</div>

@section('script')
    <script src="//maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&libraries=places&callback=initAutocomplete" async defer></script>
    <script type="text/javascript">

        $('#pac-input').on('keypress', function(e) {
            if (e.keyCode == 13) {
                e.preventDefault();
            }
        });

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

        function initAutocomplete() {

            @if($userCategories->details->lat && $userCategories->details->lng)
            var center = {lat: {{ $userCategories->details->lat }}, lng: {{ $userCategories->details->lng }} };
            @else
            var center = {lat: 31.5204, lng: 74.3587};
            @endif

            var map = new google.maps.Map(document.getElementById('map'), {
                center: center,
                zoom: {{ ($userCategories->details->lat && $userCategories->details->lng) ? 15 : 11 }},
                mapTypeId: 'roadmap'
            });

            // Create the search box and link it to the UI element.
            var input = document.getElementById('pac-input');
            var searchBox = new google.maps.places.SearchBox(input);
            //map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

            // Bias the SearchBox results towards current map's viewport.
            map.addListener('bounds_changed', function() {
                searchBox.setBounds(map.getBounds());
            });
            var markers = [];

            @if($userCategories->details->lat && $userCategories->details->lng)
            markers.push(new google.maps.Marker({
                map: map,
                position: center,
                title:"{{ $userCategories->details->name }}"
            }));
            markers[0].setMap(map);
            @endif

            // Listen for the event fired when the user selects a prediction and retrieve
            // more details for that place.
            searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                    return;
                }

                // Clear out the old markers.
                markers.forEach(function(marker) {
                    marker.setMap(null);
                });
                markers = [];

                // For each place, get the icon, name and location.
                var bounds = new google.maps.LatLngBounds();
                places.forEach(function(place) {
                    if (!place.geometry) {
                        console.log("Returned place contains no geometry");
                        return;
                    }

                    $('#lat').val(place.geometry.location.lat());
                    $('#lng').val(place.geometry.location.lng());

                    var icon = {
                        url: place.icon,
                        size: new google.maps.Size(71, 71),
                        origin: new google.maps.Point(0, 0),
                        anchor: new google.maps.Point(17, 34),
                        scaledSize: new google.maps.Size(25, 25)
                    };

                    // Create a marker for each place.
                    markers.push(new google.maps.Marker({
                        map: map,
                        icon: icon,
                        title: place.name,
                        position: place.geometry.location
                    }));

                    if (place.geometry.viewport) {
                        // Only geocodes have viewport.
                        bounds.union(place.geometry.viewport);
                    } else {
                        bounds.extend(place.geometry.location);
                    }
                });
                map.fitBounds(bounds);
            });
        }

        $('.custom-file-input').on("change", previewImages);
    </script>
@endsection