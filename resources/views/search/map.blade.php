@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="p-3">
            <div class="col-md-12">
                <div class="">
                    <div class="">
                        <h2>{{ __('Search Locator') }}</h2>
                    </div>
                    <div class="">
                        <form action="{{ route('search-map') }}">
                            <input value="{{ $q }}" type="text" name="q" id="q" placeholder="Search Restaurants, Schools, Doctors ..." class="form-control-lg full-width">
                            <div class="form-group mt-2">
                                <label for="radiusSelect">Radius:</label>
                                <select id="radiusSelect" label="Radius">
                                    <option value="50">50 kms</option>
                                    <option value="30">30 kms</option>
                                    <option value="20">20 kms</option>
                                    <option value="10" selected>10 kms</option>
                                </select>
                            </div>
                            <div class="font-italic text-black-50">About {{--{!! $data->count() !!}--}} results found.</div>
                        </form>
                    </div>
                </div>
                <div class="row pl-3 pt-5">
                    <div id="map" style="width: 100%; height: 700px"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="//maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}&callback=initMap" async defer></script>
    <script>
        var map;
        var markers = [];
        var infoWindow;
        var locationSelect;

        function initMap() {
            var center = {lat : 31.5204, lng: 74.3587};
            map = new google.maps.Map(document.getElementById('map'), {
                center: center,
                zoom: 11,
                mapTypeId: 'roadmap',
                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU}
            });
            infoWindow = new google.maps.InfoWindow();
        }
    </script>
@endsection