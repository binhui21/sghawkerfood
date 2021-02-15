@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4">
                <form action="{{ route('post.store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                     <div class="form-group row">
                        <label for="title">Stall Name</label>
                        <input class="form-control" type="text" name="stallname" id="stallname">
                    </div>
                    <div class="form-group row">
                        <label for="caption">Caption</label>
                        <input class="form-control" type="text" name="caption" id="caption">
                    </div>
                    <div class="form-group row">
                        <label for="postpic">Post a picture</label>
                        <input type="file" name="postpic" id="postpic">
                    </div>
                    <div class="form-group row">
                        <label for="area">Choose an area:</label>
                        <select id="area" name="area">
                            <option value="north">North</option>
                            <option value="south">South</option>
                            <option value="east">East</option>
                            <option value="west">West</option>
                            <option value="central">Central</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="category">Choose a category:</label>
                        <select id="category" name="category">
                            <option value="Chinese">Chinese</option>
                            <option value="Malay">Malay</option>
                            <option value="Indian">Indian</option>
                            <option value="Western">Western</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="address">Address</label>
                        <input class="form-control" type="text" name="address" id="address">
                    </div>
                    <div class="form-group row">
                        <label for="timeopen">Select an opening time:</label>
                        <input type="time" id="timeopen" name="timeopen">
                    </div>
                    <div class="form-group row">
                        <label for="timeclose">Select a closing time:</label>
                        <input type="time" id="timeclose" name="timeclose">
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