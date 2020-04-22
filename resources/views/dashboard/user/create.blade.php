
@extends('dashboard.post.master')

@section('content')

@include('dashboard.parciales.validation-error')
<form action="{{route("user.store")}}" method="POST">
@include('dashboard.user._form',['pasw'=>false])
</form>
@endsection