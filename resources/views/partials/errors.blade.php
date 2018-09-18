@if(session()->has('errors'))
    <div class="alert alert-danger">
        <h5><i class="material-icons">error</i> Oops! Something went wrong!</h5>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif