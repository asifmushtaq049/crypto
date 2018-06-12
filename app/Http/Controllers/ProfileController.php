<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Session;

class ProfileController extends Controller
{
    //

    public function index(){
      $posts = Post::where('user_id', auth()->user()->id)->where('type','post')->orderBy("created_at","desc")->get();
      return view('front.profile.posts')->with('posts', $posts);
    }

    public function setting(){
      return view('front.profile.setting');
    }

    public function following(){
      return view('front.profile.following');
    }

    public function followers(){
      return view('front.profile.followers');
    }


    public function update(Request $request){
      $rules = array(
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255'
        );

      $validator = Validator::make(Input::all(), $rules);

      // process the login
      $found = User::where('email', Input::get('email'))->count();
      if(Input::get('email')===Auth::user()->email){
        $found = 0;
      }
      if ($found > 0) {
         Session::flash('flash_error', 'Email already registered!');
      }
      else if ($validator->fails()) {
          Session::flash('flash_error', 'Fill all fields');
          return redirect()->back();
      }else{
        $user = Auth::user();
        $user->name = Input::get('name');
        $user->email = Input::get('email');
        $user->update();
        Session::flash('flash_message', 'Profile Updated!');
        return view('front.profile.setting');
      }
    }

    public function password(){
      return view('front.profile.password');
    }

    public function update_password(Request $request){
      $rules = array(
        'password' => 'required|string|max:255',
        );

      $validator = Validator::make(Input::all(), $rules);
      if ($validator->fails()) {
          Session::flash('flash_error', 'Fill all fields');
          return redirect()->back();
      }else{
        $user = Auth::user();
        $user->password = Hash::make(Input::get('password'));
        $user->update();
        Session::flash('flash_message', 'Password Changed!');
        return view('front.profile.password');
      }

    }

    public function view($id){
      if(Auth::check()){
        if(Auth::user()->id == $id){
          return redirect("/profile");
        }
      }
      $user = User::find($id);
      $posts = Post::where('user_id', $id)->where('type','post')->orderBy("created_at","desc")->get();
      return view('front.profile.view')->with('data', ['user'=>$user, 'posts' => $posts]);
    }

    public function follow($id){
      if(auth()->user()->isFollowing($id)){
        $follower = Follower::where('follower_id', auth()->user()->id)->where('user_id', $id);
        $follower->delete();
        return redirect()->back();
      }
      $follower = new Follower;
      $follower->user_id = $id;
      $follower->follower_id = auth()->user()->id;
      if($follower->save()){
        return redirect()->back();
      }
    }
}
