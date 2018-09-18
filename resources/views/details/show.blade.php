@extends('layouts.app')

@section('template_title')
    {{ $category->name }}
@endsection

@section('content')

    <section class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="col-lg-12">
                    <div class="float-left">
                        <h4>{{ __($category->name) }}</h4>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="col-lg-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ __($category->name) }}
                    </div>
                    <div class="form-group">
                        <strong>Description:</strong>
                        {{ __($category->description) }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection