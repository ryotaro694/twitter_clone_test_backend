<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        $user_id = Auth::id();
        $items = tweet::all();
        return view('tweet.index',['items'=>$items,'user_id'=>$user_id]);
    }
    public function create(Request $request){
        $this->validate($request, tweet::$rules);
        $tweet = new tweet;
        $form = $request->all();
        unset($form['_token']);
        $tweet->fill($form)->save();
        return redirect('/');
    }
    public function edit(Request $request){
        $tweet = tweet::find($request->id);
        return view('tweet.edit',['form' => $tweet]);
    }
    public function update(Request $request){
        $this->validate($request, tweet::$rules);
        $tweet = tweet::find($request->tweet_id);
        $form = $request->all();
        unset($form['_token']);
        $tweet->fill($form)->save();
        return redirect('/');
    }
    public function delete(Request $request){
        $tweet = tweet::find($request->id);
        return view('tweet.delete',['form' => $tweet]);
    }
    public function remove(Request $request){
        $tweet = tweet::find($request->tweet_id)->delete();
        return redirect('/');
    }
}
