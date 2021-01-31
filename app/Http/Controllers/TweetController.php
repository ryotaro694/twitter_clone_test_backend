<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\tweet;
use App\Models\Favorite;
use Storage;
class TweetController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
        $user_id = Auth::id();
        $items = tweet::all();
        $favorite_number = Favorite::where('tweet_id',$request->id)->count();
        return view('tweet.index',['items'=>$items,'user_id'=>$user_id,'favorite_number'=>$favorite_number]);
    }

    public function create(Request $request){
        $this->validate($request, tweet::$rules);
        $tweets = new tweet;
        $tweets->tweet = $request->input('tweet');
        $tweets->user_id = Auth::id();
		$upload_image = $request->file('image_file');
		if($upload_image) {
			//アップロードされた画像を保存する
            $path = $upload_image->store('storage',"public");
            $tweets->image_file = $path;
        }
        $tweets->save();
        return back();
    }
    public function show(Request $request){
        $tweet = tweet::find($request->id);
        return view('tweet.show',['form' => $tweet]);
    }
    public function remove(Request $request){
        $tweet = tweet::find($request->id)->delete();
        return back();
    }
    public function favorite(tweet $tweet){
        $myuser = Auth::user();
        $myID = Auth::id();
        $is_favorite = $myuser->isFavorite($tweet->id,$myuser->id);
        if (!$is_favorite){
            Favorite::create([
                'user_id' => $myID,
                'tweet_id'=> $tweet->id
            ]);
            return back();
        } 
    }
    public function unfavorite(tweet $tweet) {
        $myuser = Auth::user();
        $myID = Auth::id();
        $is_favorite = $myuser->isFavorite($tweet->id,$myuser->id);
        if ($is_favorite){
            Favorite::where('user_id', $myID)->where('tweet_id',$tweet->id)->delete();
            return back();
        } 
    }
    public static function Favorite_number($tweet_id){
        return Favorite::where('tweet_id',$tweet_id)->count();
    }
}
