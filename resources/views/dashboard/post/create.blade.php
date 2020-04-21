
@extends('dashboard.post.master')

@section('content')

@include('dashboard.parciales.validation-error')
<form action="{{route("post.store")}}" method="POST">
@include('dashboard.post._form')
</form>
@endsection