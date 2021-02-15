@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form action="{{ route('post.postEdit', $post->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                    @if ($post == null)
                       <div>where my post</div>
                   @endif
                    <div class="form-group row">
                        <label for="title">Player</label>
                        <input class="form-control" type="text" name="title" id="title"
                        value="{{ $post->title }}">
                    </div>
                    <div class="form-group row">
                        <label for="caption">Description</label>
                        <input class="form-control" type="text" name="caption" id="caption"
                        value="{{ $post->caption }}">
                    </div>
                    <div class="form-group row">
                        <label for="postpic">Post a picture</label>
                        <input type="file" name="postpic" id="postpic">
                    </div>
                    <div class="form-group row">
                        <button type="submit" class="btn btn-primary">Post!</button>
                    </div>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>
@endsection