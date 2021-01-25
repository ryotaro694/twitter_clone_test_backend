<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\Tweet;

class UserController extends Controller
{
    public function getAuth(Request $request){
        return view("user.login");
    }
    public function postAuth(Request $request){
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email' => $email,'password' => $password])){
            $user_id = Auth::id();
            $items = tweet::all();
            return view("tweet.index",["user_id" => $user_id,"items" => $items]);
        } else {
            return redirect("user.login");
        }
    }
}
