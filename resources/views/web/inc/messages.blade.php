@if (session('sucess'))
  <div class="alert alert-sucess">
     {{session('sucess')}}
    </div>

@endif
@if ($errors->any())
  <div class="alert alert-danger">
    @foreach ($errors->all() as $error )
         <p>{{$error}}</p>
    @endforeach
    </div>

@endif
