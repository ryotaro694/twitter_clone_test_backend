<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\tweet;
use App\Models\Favorite;
use App\Models\User;
use App\Models\Follower;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function show(Request $request){
        $userID = User::where('id',$request->user_id)->first();
        $items = tweet::where('user_id',$request->user_id)->get();
        return view('users.show',['items'=>$items,'userID'=>$userID]);
    }
    public function myprofile(){
        $myID = Auth::id();
        $userID = User::where('id',$myID)->first();
        $items = tweet::where('user_id',$myID)->get();
        return view('users.myprofile',['userID'=>$userID,'items'=>$items]);
    }

    public function edit(Request $request){
        $user = User::where('id',$request->user_id)->first();
        return view('users.edit',['user'=>$user]);
    }
    public function update(Request $request) {
        $user_form = $request->all();
        $user = Auth::user();
        $myID = Auth::id();
        unset($user_form['_token']);
        $user->fill($user_form)->save();
        return redirect('users/{{$myID}}/myprofile');
    }
}
