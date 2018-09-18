@extends('layouts.app')

@section('template_title')
    Create Category
@endsection

@section('content')

    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @include('partials.errors')

                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="POST" action="{{ route('categories.store') }}"  role="form">
                            {{ csrf_field() }}
                            <div class="">
                                <h4 class="sub-title">Create Category</h4>
                            </div>

                            @include('categories.form', [$category])

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>

@endsection