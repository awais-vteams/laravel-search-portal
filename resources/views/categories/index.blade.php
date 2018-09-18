@extends('layouts.app')

@section('template_title')
    Categories
@endsection

@section('content')

<section class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <div>
                            <span id="card_title">
                                {{ __('Categories') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('categories.create') }}" class="btn btn-primary float-right"  data-placement="left">
                                  {{ __('Create New Category') }}
                                </a>
                              </div>
                        </div>
                    </div>

                    @include('partials.errors')

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <caption>
                                    <div class="float-right">{{ 'Rows: ' . $categories->count() }}</div>
                                    {!! $categories->links() !!}
                                </caption>
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->description }}</td>
                                                <td class="text-right">
                                                    <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                                                        <a class="btn btn-primary" href="{{ route('categories.show',$category->id) }}"><i class="material-icons">visibility</i></a>
                                                        <a class="btn btn-warning" href="{{ route('categories.edit',$category->id) }}"><i class="material-icons">edit</i></a>
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