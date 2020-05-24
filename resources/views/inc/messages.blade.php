@if(count($errors) > 0) {{-- We use the Laravel variable of errors to check if there is any error in our request if it is display it if not sucess. --}}
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error')) {{-- If "we" create the error ourself and pass it in seasson --}}
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif