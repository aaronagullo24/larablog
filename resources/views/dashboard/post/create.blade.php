
@extends('dashboard.post.master')

@section('content')

@include('dashboard.post.parciales.validation-error')
<form action="{{route("post.store")}}" method="POST">
@include('dashboard.post._form')
</form>
@endsection