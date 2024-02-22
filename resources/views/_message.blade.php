@if(!empty(session('error')))
<div class="alert alert-danger" role="alert">
    {{ session('error')}}
</div>
@endif

@if(!empty(session('succes')))
<div class="alert alert-success" role="alert">
    {{ session('succes')}}
</div>
@endif

@if(!empty(session('status')))
<div class="alert alert-success" role="alert">
    {{ session('status')}}
</div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
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
