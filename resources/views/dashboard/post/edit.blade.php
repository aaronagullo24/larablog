@extends('dashboard.post.master')

@section('content')

@include('dashboard.post.parciales.validation-error')
<form action="{{route("post.update",$post->id)}}" method="POST">

    @method('PUT')

    @include('dashboard.post._form')
</form>
@endsection