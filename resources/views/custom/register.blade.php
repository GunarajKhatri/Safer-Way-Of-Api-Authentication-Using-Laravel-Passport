@extends('custom.layout')

@section('title')
Register
@endsection

@section('content')
  <img src="https://uxwing.com/wp-content/themes/uxwing/download/12-people-gesture/signup.png" class="card-img-top" alt="..." style="
  width: 100px;height:100px;margin-left:36%;margin-top:8px;
  ">
  <div class="card-body">
  <h5 class="card-title fw-bold text-center text-primary">Create your Account</h5>
  <form method="POST" action="{{route('register')}}">
  @csrf
  <div class="mb-1">
    <label for="InputUsername" class="form-label fs-5">Username</label>
    <input type="text" class="form-control" id="username" name="username">
    @error('username')
    <span class="text-danger" role="alert">
      <strong>{{ $message }}</strong>
  </span>
  @enderror
  </div>
  <div class="mb-1">
    <label for="InputEmail1" class="form-label fs-5">Email address</label>
    <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" name="email">
    <div id="email" class="form-text">We'll never share your email with anyone else.</div>
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

<button type="submit" class="btn btn-lg btn-primary fw-bold text-white col-lg-12">Register</button>

 
</form>
</div>
@endsection
  
  
