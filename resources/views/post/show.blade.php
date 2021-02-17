@extends('layouts.app')
<script src="{{ mix('js/app.js') }}"></script>
@section('content')

@if(session()->get('deleted'))
  <div class="alert alert-success">
    {{ session()->get('deleted') }}
  </div>
@endif

@if(session('jsAlert'))
  <div class="alert alert-success">
    {{ session('jsAlert') }}
  </div>
@endif

@foreach($posts as $post)
  <div class="posts m-2" style="float:left">
    <div class="card border border-primary">
      <div class="card-deck mx-1" style="width: 20rem">
        <div class="card-body">
            <div class="embed-responsive embed-responsive-4by3">
                <img alt="Card image cap" class="card-img-top embed-responsive-item" src="/storage/{{$post->image}}" />
            </div>               
            <h5 class="card-title bg-light text-dark fw-bold p-2" style="height: 60px">{{$post->stallname}}</h5>
            <p class="card-text" style="height: 80px">{{$post->caption}}</p>
            <p>Area: {{$post->area}}</p>
            <p>Category: {{$post->category}}</p>
            <p style="height: 60px">Address: <a href="https://www.google.com/maps/place/{{ $post->address }}" target="_blank">{{ $post->address }}</a></p>
            <p>Open: {{$post->timeopen}}</p>
            <p>Close: {{$post->timeclose}}</p>
            <div class="d-flex flex-row">
            <form action="{{ route('post.destroy', $post->id)}}" enctype="multipart/form-data" method="POST"> 
              @method('DELETE')
              @csrf
              <input type="hidden" name="id" value="{{ $post->id }}">
              <button type="submit" class="btn btn-primary m-1">Delete</button>
              </form>
              <form action="{{ route('post.edit',$post->id)}}" enctype="multipart/form-data" method="edit"> 
              @csrf
              <input type="hidden" name="id" value="{{ $post->id }}">
              <button type="submit" class="btn btn-primary m-1">Edit</button>
            </form> 
          </div>
        </div>
      </div>
    </div> 
  </div>                 
@endforeach
@endsection