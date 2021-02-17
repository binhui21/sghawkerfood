@extends('layouts.app')
<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/welcome.js') }}"></script>

@section('content')

<div class="container">
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-4">
      <H2 id="welcome">Welcome to SGHawkerFood</H2>
    </div>
    <div class="col-sm-2">
    </div>
    <div class="col-sm-2" >
      <h3>Weather</h3>
      <span id="weather" inline-flex></span>
      <span>, </span>
      <span id="temp" inline-flex></span>
      <span>&#8451;</span>  
    </div>
  </div>
</div>
      
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
          <a href="{{ route('review', $post->id) }}" class="btn btn-primary">See Reviews</a>
        </div>
      </div>
    </div> 
  </div>                 
@endforeach

@endsection