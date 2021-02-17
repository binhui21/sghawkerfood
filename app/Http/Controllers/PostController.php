<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data = request()->validate([
            'stallname' => 'required',
            'caption' => 'required',
            'postpic' => ['required', 'image'],
            'address' => 'required',
        ]);
        $user = Auth::user();
        $post = new Post();
        $imagePath = request('postpic')->store('uploads', 'public');
        $post->user_id = $user->id;
        $post->stallname = request('stallname');
        $post->caption = request('caption');
        $post->image = $imagePath;
        $post->area = request('area');
        $post->category = request('category');
        $post->address = request('address');
        $post->timeopen = request('timeopen');
        $post->timeclose = request('timeclose');
        $saved = $post->save();
        if ($saved) {
            return redirect('profile')->with('jsAlert', 'Post created.');
            return back()->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $post = Post::find('id');
        $destroyed = $post->each->delete();
        if ($destroyed) {
            return with('jsAlert', 'Post deleted.')->withInput();
        } else {
            return with('jsAlert', 'Post not deleted.')->withInput();
        }
    }

    public function postEdit()
    {
        $post_id = request('id');
        $post = Post::where('id', $post_id)->first();
        $imagePath = request('postpic')->store('uploads', 'public');
        $post->stallname = request('stallname');
        $post->caption = request('caption');
        $post->image = $imagePath;
        $post->area = request('area');
        $post->category = request('category');
        $post->address = request('address');
        $post->timeopen = request('timeopen');
        $post->timeclose = request('timeclose');
        $saved = $post->save();
        if ($saved) {
            return redirect('post/show')->with('jsAlert', 'Post edited.');
            return back()->withInput();
        }
    }

    public function show()
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();
        $posts = Post::where('user_id', $user->id)->orderBy('created_at')->get();
        $postscount = Post::where('user_id', $user->id)->count();
        return view('post.show', [
            'user' => $user,
            'profile' => $profile,
            'posts' => $posts,
            'postscount' => $postscount
        ]);
    }
}
