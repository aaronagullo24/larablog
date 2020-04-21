@extends('dashboard.post.master')

@section('content')

@include('dashboard.parciales.validation-error')
<form action="{{route("category.update",$category->id)}}" method="POST">

    @method('PUT')

    @include('dashboard.category._form')
</form>
@endsection