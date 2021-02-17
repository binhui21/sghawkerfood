@extends('layouts.app')
<script src="{{ mix('js/app.js') }}"></script>
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
                        <label for="title">Stall Name</label>
                        <input class="form-control" type="text" name="stallname" id="stallname"
                        value="{{ $post->stallname }}">
                    </div>
                    <div class="form-group row">
                        <label for="caption">Caption</label>
                        <input class="form-control" type="text" name="caption" id="caption"
                        value="{{ $post->caption }}">
                    </div>
                    <div class="form-group row">
                        <label for="postpic">Post a picture</label>
                        <input type="file" name="postpic" id="postpic">
                    </div>
                    <div class="form-group row">
                        <label for="area">Choose an area:</label>
                        <select id="area" name="area">
                            <option value="north" <?php echo ($post->area == "north")?"selected":""; ?>>North</option>
                            <option value="south" <?php echo ($post->area == "south")?"selected":""; ?>>South</option>
                            <option value="east" <?php echo ($post->area == "east")?"selected":""; ?>>East</option>
                            <option value="west" <?php echo ($post->area == "west")?"selected":""; ?>>West</option>
                            <option value="central" <?php echo ($post->area == "central")?"selected":""; ?>>Central</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="category">Choose a category:</label>
                        <select id="category" name="category">
                            <option value="Chinese" <?php echo ($post->category == "Chinese")?"selected":""; ?>>Chinese</option>
                            <option value="Malay" <?php echo ($post->category == "Malay")?"selected":""; ?>>Malay</option>
                            <option value="Indian" <?php echo ($post->category == "Indian")?"selected":""; ?>>Indian</option>
                            <option value="Western" <?php echo ($post->category == "Western")?"selected":""; ?>>Western</option>
                            <option value="Other" <?php echo ($post->category == "Other")?"selected":""; ?>>Other</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="address">Address</label>
                        <input class="form-control" type="text" name="address" id="address"
                        value="{{ $post->address }}">
                    </div>
                    <div class="form-group row">
                        <label for="timeopen">Select an opening time:</label>
                        <input type="time" id="timeopen" name="timeopen"
                        value="{{ $post->timeopen }}">
                    </div>
                    <div class="form-group row">
                        <label for="timeclose">Select a closing time:</label>
                        <input type="time" id="timeclose" name="timeclose"
                        value="{{ $post->timeclose }}">
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