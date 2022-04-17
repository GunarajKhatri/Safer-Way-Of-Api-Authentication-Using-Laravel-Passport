@extends('custom.layout')

@section('title')
Login
@endsection

@section('content')
  <img src="https://nuk.chultane5000.pw/img/627255.png" class="card-img-top" alt="..." style="
  width: 100px;height:100px;margin-left:36%;margin-top:8px;
  ">
  <div class="card-body">
  <h5 class="card-title fw-bold text-center text-primary">Login your Account</h5>
  <form method="POST" action="">
  @csrf
 
  <div class="mb-1">
    <label for="InputEmail1" class="form-label fs-5">Email address</label>
    <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" name="email">
    @error('email')
    <span class="text-danger" role="alert">
      <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>
  <div class="mb-3">
    <label for="InputPassword1" class="form-label fs-5">Password</label>
    <input type="password" class="form-control" id="InputPassword1" name="password">
    @error('password')
    <span class="text-danger" role="alert">
      <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div> 

<button type="submit" class="btn btn-lg btn-primary fw-bold text-white col-lg-12">Login</button>
</form>
</div>
@endsection
  
  
