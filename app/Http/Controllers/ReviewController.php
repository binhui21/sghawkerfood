<?php

namespace App\Http\Controllers;

use session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Post;
use App\Models\Review;

class ReviewController extends Controller
{
    public function destroy(Request $id)
    {
        $review = Review::find($id);
        $destroyed = $review->each->delete();
        if ($destroyed) {
            return redirect('profile')->with('jsAlert', 'Review deleted.');
            return back()->withInput();
        }
    }

    public function index($post_id)
    {
        //$user = Auth::user();
        //$profile = Profile::where('user_id', $user->id)->first();
        //$postsuser = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $postselect = Post::find($post_id);
        //$postscount = Post::where('user_id', $user->id)->count();
        $reviews = Review::where('post_id', $post_id)->orderBy('created_at')->get();
        $avg_rating = Review::where('post_id', $post_id)->avg('rating');
        return view('review', [
            //'profile' => $profile,
            'postselect' => $postselect,
            'post_id' => $post_id,
            'reviews' => $reviews,
            'avg_rating' => $avg_rating
        ]);
    }

    public function create($post_id)
    {
        return view('createReview', [
            'post_id' => $post_id
        ]);
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
            'post_id' => 'required',
            'title' => 'required',
            'caption' => 'required',
            'reviewpic' => ['required', 'image'],
            'rating' => 'required',
        ]);
        $user = Auth::user();
        $review = new Review();
        $imagePath = request('reviewpic')->store('uploads', 'public');
        $review->user_id = $user->id;
        $review->post_id = request('post_id');;
        $review->title = request('title');
        $review->caption = request('caption');
        $review->image = $imagePath;
        $review->rating = request('rating');

        $saved = $review->save();
        if ($saved) {
            return redirect('review/' . $review->post_id)->with('jsAlert', 'Review created.');
            return back()->withInput();
        }
    }

    public function edit(Review $review)
    {
        return view('editReview', [
            'review' => $review
        ]);
    }

    public function postEdit()
    {
        $reviewID = request('id');
        $review = Review::where('id', $reviewID)->first();
        $review->title = request('title');
        $review->caption = request('caption');
        $imagePath = request('reviewpic')->store('uploads', 'public');
        $review->rating = request('rating');
        $review->image = $imagePath;
        $saved = $review->save();
        if ($saved) {
            return redirect('profile')->with('jsAlert', 'Review edited.');
            return back()->withInput();
        }
    }
}
