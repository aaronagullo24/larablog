
@extends('dashboard.post.master')

@section('content')

@include('dashboard.parciales.validation-error')
<form action="{{route("category.store")}}" method="POST">
@include('dashboard.category._form')
</form>
@endsection