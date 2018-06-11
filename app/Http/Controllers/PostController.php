<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Session;



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
        $posts = Post::where('type','post')->orderBy("created_at","desc")->get();
        return view('front.posts.all')->with('posts', $posts);
    }

    public function all()
    {
        //
        $posts = Post::orderBy('created_at','desc')->get();
        return view('admin.article.all')->with('posts', $posts);
    }

    public function blog(){
      $posts = Post::where('type','blog')->orderBy("created_at","desc")->get();
      return view('front.posts.blog')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (!Auth::check()) {
          return redirect('/login');
        }
        return view('front.posts.create');
    }

    public function admin_create()
    {
        return view('admin.article.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required',
            'detail'      => 'required'
          );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            Session::flash('flash_error', 'Fill all fields!');
            return redirect()->back();
        } else {
            // store
            $post = new Post;
            $post->title       = Input::get('title');
            $post->detail      = Input::get('detail');
            if(auth()->user()->isAdmin()){
              if(Input::has('type')){
                $post->type      = 'post';
              }else{
                $post->type      = 'blog';
              }
            }else{
              $post->type      = 'post';
            }
            $post->user_id = auth()->user()->id;
            $post->save();

            // redirect
            Session::flash('flash_message', 'Successfully created Post!');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        // dd($post);
        $comments = Post::find($id)->comments()->orderBy("created_at","desc")->get();

        // $comments = Comment::where('post_id', '=', $id)->get();;
        // dd($comments);
        return view('front.posts.single')->with('data', ['post'=>$post, 'comments'=>$comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id){
       $post = Post::find($id);
       return view('front.posts.edit')->with('post',$post);
     }

     public function admin_edit($id)
     {
         $post = Post::find($id);
         return view('admin.article.edit')->with('article',$post);
     }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $rules = array(
            'title'       => 'required',
            'detail'      => 'required'
          );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            Session::flash('flash_error', 'Fill all fields!');
            return redirect()->back();
        } else {
            $post = Post::find($id);
            $post->title       = Input::get('title');
            $post->detail      = Input::get('detail');
            $post->update();
            Session::flash('flash_message', 'Successfully Updated!');
            return redirect()->back();
        }
    }
    public function admin_update(Request $request, $id)
    {
        $rules = array(
            'title'       => 'required',
            'detail'      => 'required'
          );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            Session::flash('flash_error', 'Fill all fields!');
            return redirect()->back();
        } else {
            $post = Post::find($id);
            $post->title       = Input::get('title');
            $post->detail      = Input::get('detail');
            $post->update();
            Session::flash('flash_message', 'Successfully Updated!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function destroy($id)
     {
         $post = Post::find($id);
         if($post->user_id == auth()->user()->id){
           $post->delete();
         }
         return redirect()->back();
     }

    public function admin_destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->back();
    }

}
