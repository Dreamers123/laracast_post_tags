@extends('layouts.master')

@section('title')

<div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
    <div class="col-md-6 px-0">
        <h1 class="display-4 font-italic">{{ $post->title }}</h1>
        <p class="lead my-3">{{ $post->body }}</p>
        <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Continue reading...</a></p>
    </div>
</div>
@if(count($post->tags))
    <ul>
        @foreach($post->tags as $tag)
        <li>
           <a href="/posts/tags/{{ $tag->name }}"> #{{ $tag->name }}</a>
        </li>
            @endforeach

    </ul>
@endif

<hr>
 <div class="col-md-8">
    <h1>Make a Comment</h1>

    <form action="/posts/{{$post->id}}/comments" method="POST">

        {{ csrf_field() }}

         <div class="form-group">
            <label for="body"></label>
            <textarea id="body" class="form-control" name="body" required></textarea>
         </div>

        <button type="submit" class="btn btn-default">Publish</button>

        @include('layouts.errors')

    </form>

<hr>

    <ul class="list-group">
    @foreach($post->comments as $comments)

    <li class="list-group-item">
      <p> {{ $comments->body }}<span class="float-right"> {{ $comments->created_at->diffForHumans() }}</span>

          <a href="#" class="pull-right"></a>
        </p>
    </li>
</ul>

@endforeach
 </div>

@endsection