<div>
    {{$message}}

    @foreach ($posts as $post)
        {{$post->id}}
    @endforeach
</div>