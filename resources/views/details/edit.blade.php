@extends('layouts.app')

@section('template_title')
    Update Details
@endsection

@section('content')

    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @include('partials.errors')

                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="POST" action="{{ route('details.update', $userCategories->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="">
                                <h4 class="sub-title">Update Details</h4>
                            </div>

                            @include('details.form',  [$userCategories, $categories])

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>

@endsection