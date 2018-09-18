@extends('layouts.app')

@section('template_title')
    Details
@endsection

@section('content')

    <section class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                @include('partials.errors')

                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="POST" action="{{ route('details.store') }}"  role="form" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="">
                                <h4 class="sub-title">Details</h4>
                            </div>

                            @include('details.form', [$userCategories])

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </section>

@endsection