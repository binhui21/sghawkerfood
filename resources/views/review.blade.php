@extends('layouts.app')
<script src="{{ mix('js/app.js') }}"></script>
@section('content')

@if(session()->get('deleted'))
    <div class="alert alert-success">
        {{ session()->get('deleted') }}
    </div>
@endif
<div class="container">
    @if(session('jsAlert'))
        <div class="alert alert-success">
            {{ session('jsAlert') }}
        </div>
    @endif
    
    <div class="row justify-content-center">
        <div class="container m-2 p-2" style="background-color:#b4e1f0">
            <div class="media">
                <img class="align-self-start mr-3 img-thumbnail" src="/storage/{{$postselect->image}}" width="200" height="200" alt="Generic placeholder image" >
                <div class="media-body">
                    <h4 class="mt-0 font-weight-bold">{{$postselect->stallname}}</h5>
                    <h5>{{$postselect->caption}}</h5>
                    <p>Address: <a href="https://www.google.com/maps/place/{{ $postselect->address }}" target="_blank">{{ $postselect->address }}</a></p>
                    <p>Open: {{$postselect->timeopen}}</p>
                    <p>Close: {{$postselect->timeclose}}</p>
                    <p>Rating: {{round($avg_rating,1)}} / 10</p>
                </div>   
            </div>
            <form action = "{{ route('review.create',$postselect->id)}}" enctype="multipart/form-data" method="createreview">
                <button type="submit" class="btn btn-primary m-1">Review stall</button>
            </form>  
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
              </div>
            </div>
          </div> 
        </div>                 
    @endforeach               
</div>

@endsection