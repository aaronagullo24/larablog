<div>
    {{$message}}

    @foreach ($posts as $post)
        {{$post->id}}
    @endforeach
<ul>
    @foreach ($my_list('item4') as $item)
       <li> {{$item}} </li>
    @endforeach
</ul>
</div>