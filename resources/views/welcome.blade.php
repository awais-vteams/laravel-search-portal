@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    {{ config('app.name', 'Laravel') }}
                </div>
                <div class="row">
                    <form action="{{ route('search') }}">
                        <input type="text" name="q" id="q" placeholder="Search Restaurants, Schools, Doctors ..." class="form-control-lg full-width">
                    </form>
                </div>

                <div class="row mt-5 justify-content-center">
                    <div class="col-md-2">
                        <a class="btn btn-primary btn-outline-primary btn-lg">Submit Yours</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
