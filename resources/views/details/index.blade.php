@extends('layouts.app')

@section('template_title')
    Your Submission
@endsection

@section('content')

<section class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <div>
                            <span id="card_title">
                                {{ __('Your Submission') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('details.create') }}" class="btn btn-primary float-right"  data-placement="left">
                                  {{ __('Submit New') }}
                                </a>
                              </div>
                        </div>
                    </div>

                    @include('partials.errors')

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <caption>
                                    <div class="float-right">{{ 'Rows: ' . $userCategories->count() }}</div>
                                    {!! $userCategories->links() !!}
                                </caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Type</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($userCategories as $category)
                                            <tr>
                                                <td>{{ $category->category->name }}</td>
                                                <td>{{ $category->details->name }}</td>
                                                <td>{{ $category->details->description }}</td>
                                                <td class="text-right">
                                                    <form action="{{ route('details.destroy',$category->id) }}" method="POST">
                                                        <a class="btn btn-primary" href="{{ route('details.show',$category->id) }}"><i class="material-icons">visibility</i></a>
                                                        <a class="btn btn-warning" href="{{ route('details.edit',$category->id) }}"><i class="material-icons">edit</i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i class="material-icons">delete</i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection