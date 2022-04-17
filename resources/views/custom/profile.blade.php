@extends('custom.layout')

@section('content')
<ul>
    <li class="fw-bold">Name:{{ $user->username }}</li>
    <li class="fw-bold">Email:{{ $user->email }}</li>
</ul>
<form action="{{ route('admin.logout') }}" method="post">
    @csrf
    <button type="submit" class="btn btn-primary text-white fw-bold">Logout</button>
</form>


@endsection