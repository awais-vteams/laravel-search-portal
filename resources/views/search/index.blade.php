@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="p-3">
            <div class="col-md-12">
                <div class="">
                    <div class="">
                        <h2>{{ __('Search Results') }}</h2>
                    </div>
                    <div class="">
                        <form action="{{ route('search') }}">
                            <input value="{{ $q }}" type="text" name="q" id="q" placeholder="Search Restaurants, Schools, Doctors ..." class="form-control-lg full-width">
                            <div class="font-italic text-black-50">About {!! $data->count() !!} results found.</div>
                        </form>
                    </div>
                </div>
                <div class="row pl-3 pt-5">
                    @foreach ($data as $items)
                        <div class="col-md-3 mb-4">
                            <a href="{{ route('details.show', ['id' => $items->userCategory->id]) }}">
                                <div class="card">
                                    @if($items->images->count())
                                        <img class="card-img-top" src="{{ $CImage->getImagePath($items->images[0]->path) }}" alt="Image">
                                    @endif
                                    <div class="card-body">
                                        <div class="">
                                            <div class="text-body"><strong>{!! $items->userCategory->category->name !!}</strong></div>
                                            <span>{!! $items->name  !!}</span>
                                            <p class="text-body">{!! str_limit($items->userCategory->category->description) !!}</p>
                                        </div>
                                        <div class="">
                                            @foreach($items->tags as $tag)
                                                <span class="badge badge badge-info">{!! $tag->name !!}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                {{ $data->links() }}
            </div>
        </div>
    </div>
@endsection
