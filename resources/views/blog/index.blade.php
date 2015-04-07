@extends('app')

@section('content')
    <h1>Blog</h1>

    @foreach($posts as $post)
        <div>
            <h2>{{{ $post->getTitle() }}}</h2>
            <p>{{{ $post->getBody() }}}</p>
            <hr />
        </div>
    @endforeach
@endsection