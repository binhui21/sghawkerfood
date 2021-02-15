@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <form action="{{ route('review.store')}}" enctype="multipart/form-data" method="post">
                @csrf
                @if ($post_id == null)
                   <div>where my post</div>
                @endif
                <div class="form-group row">
                    <label for="title">Title</label>
                    <input class="form-control" type="text" name="title" id="title">
                </div>
                <div class="form-group row">
                    <label for="caption">Caption</label>
                    <input class="form-control" type="text" name="caption" id="caption">
                </div>
                <div class="form-group row">
                    <label for="reviewpic">Post a picture</label>
                    <input type="file" name="reviewpic" id="reviewpic">
                </div>
                <div class="form-group row">
                    <label for="rating">Rating (1 to 10)</label>
                    <input class="form-control" type="number" name="rating" id="rating" min="1" max="10">
                </div>
                <input class="form-control" type="hidden" name="post_id" id="post_id" value="{{$post_id}}">
                <div class="form-group row">
                    <button type="submit" class="btn btn-primary">Post!</button>
                </div>
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>
@endsection