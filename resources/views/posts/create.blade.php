@extends('layouts.master')

@section('body')

    <h1>Create a post</h1>
    <form action="/posts" method="POST">

        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea id="body" class="form-control" name="body" ></textarea>
        </div>

        <button type="submit" class="btn btn-default">Publish</button>


        @include('layouts.errors')

    </form>

@endsection
