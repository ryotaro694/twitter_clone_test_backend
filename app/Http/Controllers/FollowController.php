<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\tweet;
use App\Models\Follower;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Auth;

class FollowController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request) {
        $myid = Auth::id();
        $all_users = User::where('id','!=',$myid)->get();
        $follow_count = Follower::where('following_id',$myid)->count();
        $follower_count = Follower::where('followed_id',$myid)->count();
        return view('users.index',['all_users'=>$all_users,'follow_count'=>$follow_count,'follower_count'=>$follower_count]);
    }

    public function follow(User $user) {
        $myuser = Auth::user();
        $is_following = $myuser->isFollowing($user->id);
        if (!$is_following){
            $myuser->follow($user->id);
            return back();
        } 
    }

    public function unfollow(User $user) {
        $myuser = Auth::user();
        $is_following = $myuser->isFollowing($user->id);
        if ($is_following){
            $myuser->unfollow($user->id);
            return back();
        } 
    }
    public function following(Request $request) {
        $myid = Auth::id();
        $all_users = User::where('id','!=',$myid)->get();
        return view('users.following',['all_users'=>$all_users]);
    }
    public function followed(Request $request) {
        $myid = Auth::id();
        $all_users = User::where('id','!=',$myid)->get();
        return view('users.followed',['all_users'=>$all_users]);
    }
}
