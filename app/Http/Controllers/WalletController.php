<?php

namespace App\Http\Controllers;

use App\Wallet;
use App\WalletComment;
use App\WalletRating;
use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Session;

class WalletController extends Controller
{
    //
    public function index()
    {
        //
        $wallets = Wallet::all();
        return view('admin.wallet.all')->with('wallets', $wallets);
    }

    public function front()
    {
        //
        $wallets = Wallet::orderBy('created_at','desc')->get();
        return view('front.wallet.wallet')->with('wallets', $wallets);
    }

    public function top()
    {
        $wallets = Wallet::select(DB::raw('wallets.*, count(wallet_ratings.id) as aggregate'))
            ->leftJoin('wallet_ratings', 'wallet_ratings.wallet_id', '=', 'wallets.id')
            ->groupBy('wallets.id')
            ->orderBy('aggregate', 'desc')
            ->limit(10)
            ->get();

        return view('front.wallet.wallet')->with('wallets', $wallets);
    }

    public function detail($id){
      $wallet = Wallet::find($id);
      $comments = WalletComment::where('wallet_id', $id)->orderBy('created_at', 'desc')->get();
      return view('front.wallet.wallet_detail')->with('data', ['wallet'=>$wallet, 'comments'=>$comments]);
    }

    public function create(){
      return view('admin.wallet.create');
    }

    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation

        $rules = array(
            'name'       => 'required',
            'website'      => 'required',
            'coins'      => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            Session::flash('flash_error', 'Fill all * fields!');
            return redirect()->back();
        } else {
            // store



            $post = new Wallet;
            $post->name       = Input::get('name');
            $post->detail      = Input::get('detail');
            $post->coins      = Input::get('coins');
            if (Input::has('image')) {
              $image = Input::file('image');
              $name = str_slug($request->name.$image->getRealPath()).'.'.$image->getClientOriginalExtension();
              $destinationPath = public_path('/img/wallets');
              $imagePath = $destinationPath. "/".  $name;
              $image->move($destinationPath, $name);
              $post->image = "/img/wallets/".$name;
            }
            $post->website      = Input::get('website');
            $post->user_id = auth()->user()->id;
            $post->save();

            Session::flash('flash_message', 'Successfully Added!');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $wallet = Wallet::find($id);
        return view('admin.wallet.edit')->with('wallet',$wallet);
    }


    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'website'      => 'required',
            'coins'      => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            Session::flash('flash_error', 'Fill all * fields!');
            return redirect()->back();
        } else {
            // store

            // $post = new Equipment;
            $post = Wallet::find($id);
            $post->name       = Input::get('name');
            $post->detail      = Input::get('detail');
            $post->coins      = Input::get('coins');
            if (Input::has('image')) {
              $image = Input::file('image');
              $name = str_slug($request->name.$image->getRealPath()).'.'.$image->getClientOriginalExtension();
              $destinationPath = public_path('/img/wallets');
              $imagePath = $destinationPath. "/".  $name;
              $image->move($destinationPath, $name);
              $post->image = "/img/wallets/".$name;
            }
            $post->website      = Input::get('website');
            $post->user_id = auth()->user()->id;
            $post->update();

            // redirect
            Session::flash('flash_message', 'Successfully Updated!');
            return redirect()->back();
        }
    }

    public function destroy($id)
     {
         Wallet::find($id)->delete();
         return redirect()->back();
     }

     public function comment(Request $request, $id){
       // read more on validation at http://laravel.com/docs/validation
       if(Input::has('wishadd')){
         $wish = new WishList;
         $wish->wallet_id = $id;
         $wish->user_id = auth()->user()->id;
         $wish->save();
         return redirect()->back();
       }
       else if(Input::has('wishadded')){
         $wish = WishList::where('wallet_id',$id)->where('user_id', auth()->user()->id);
         $wish->delete();
         return redirect()->back();
       }
       else{
         $rules = array(
             'text'      => 'required'
           );

         $validator = Validator::make(Input::all(), $rules);

         // process the login
         if ($validator->fails()) {
             Session::flash('flash_error', 'Make sure comment and rating');
             return redirect()->back();
         } else {
           $comment = new WalletComment;
           $comment->text = $request->get('text');
           $comment->wallet_id = $id;
           $comment->user_id = auth()->user()->id;
           $comment->save();

           $rating = new WalletRating;
           $rating->stars = $request->get('stars');
           $rating->wallet_comment_id = $comment->id;
           $rating->wallet_id = $id;
           $rating->user_id = auth()->user()->id;
           $rating->save();
           return redirect()->back();
         }
       }
     }
}
