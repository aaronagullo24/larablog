@extends('dashboard.post.master')

@section('content')

@include('dashboard.parciales.validation-error')
<form action="{{route("user.update",$user->id)}}" method="POST">

    @method('PUT')

    @include('dashboard.user._form',['pasw'=>false])
</form>
@endsection