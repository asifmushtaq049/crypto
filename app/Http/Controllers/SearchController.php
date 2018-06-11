<?php

namespace App\Http\Controllers;

use App\Post;
use App\Wallet;
use App\Company;
use App\Equipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class SearchController extends Controller
{
    //
    public function search(Request $request){
      $type = Input::get('type');
      $search = Input::get('search');

      if($type=="Posts"){
        $posts = Post::where('title', 'LIKE','%' . $search. '%')->orderBy("created_at","desc")->get();
        return view('front.posts.all')->with('posts', $posts);
      }
      if($type=="Wallets"){
        $wallets = Wallet::where('name', 'LIKE','%' . $search. '%')->orderBy('created_at','desc')->get();
        return view('front.wallet.wallet')->with('wallets', $wallets);
      }
      if($type=="Companies"){
        $companies = Company::where('name', 'LIKE','%' . $search. '%')->orderBy('created_at','desc')->get();
        return view('front.mining.company')->with('companies', $companies);
      }
      if($type=="Equipments"){
        $equipments = Equipment::where('name', 'LIKE','%' . $search. '%')->orderBy('created_at','desc')->get();
        return view('front.mining.equipment')->with('equipments', $equipments);
      }
    }
}
