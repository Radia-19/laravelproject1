@if(session('okMsg'))
    <p class="alert alert-success mt-5 ">{{ session('okMsg') }}</p>
@endif
@if(session('errMsg'))
    <p class="alert alert-success mt-5">{{ session('errMsg') }}</p>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
