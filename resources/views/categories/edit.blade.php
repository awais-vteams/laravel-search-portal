@extends('layouts.app')

@section('template_title')
    Update Category
@endsection

@section('content')

    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @include('partials.errors')

                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="POST" action="{{ route('categories.update', $category->id) }}"  role="form">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="">
                                <h4 class="sub-title">Update Category</h4>
                            </div>

                            @include('categories.form',  [$category])

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>

@endsection