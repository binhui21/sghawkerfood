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

<div class="container">
  <div class="card m-2" style="width: 24rem">
    <div class="card-deck mx-1" style="width: 20rem">
      <div class="card-body">
        <div class="embed-responsive embed-responsive-4by3">
          <img alt="Card image cap" class="card-img-top embed-responsive-item" src="/storage/{{$profile->image}}" />
        </div>               
        <h5 class="card-title bg-light text-dark fw-bold p-2" style="height: 60px">Hello {{$profile->description}}</h5>
        <p class="card-text" style="height: 20px">You have {{$reviewscount}} reviews</p>
        <a href="/profile/edit" class="btn btn-primary">Edit profile</a>
      </div>
    </div>
  </div>

  @foreach($reviews as $review)
  <div class="posts ml-2" style="float:left">
    <div class="card border border-primary">
      <div class="card-deck mx-1" style="width: 20rem">
        <div class="card-body">
          <div class="embed-responsive embed-responsive-4by3">
            <img alt="Card image cap" class="card-img-top embed-responsive-item" src="/storage/{{$review->image}}" />
          </div>               
          <h5 class="card-title bg-light text-dark fw-bold p-2" style="height: 60px">{{$review->title}}</h5>
          <p class="card-text" style="height: 70px">{{$review->caption}}</p>
          <p class="card-text" style="height: 10px">Rating: {{$review->rating}}</p>
          <div class="d-flex flex-row">
            <form action="{{ route('review.destroy',$review->id)}}" enctype="multipart/form-data" method="POST">
              @method('DELETE')
              @csrf
              <input type="hidden" name="id" value="{{ $review->id }}">
              <button type="submit" class="btn btn-primary m-1">Delete</button>
              </form>
              <form action="{{ route('review.edit',$review->id)}}" enctype="multipart/form-data" method="edit"> 
              @csrf
              <input type="hidden" name="id" value="{{ $review->id }}">
              <button type="submit" class="btn btn-primary m-1">Edit</button>
            </form> 
          </div>
        </div>
      </div>
    </div> 
  </div>                
  @endforeach
</div>
      
@endsection