<?php

namespace App\Http\Controllers;

use App\Company;
use App\Post;
use App\Equipment;
use App\Wallet;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
      $companies = Company::count();
      $posts = Post::count();
      $equipments = Equipment::count();
      $wallets = Wallet::count();
      return view('admin.home')->with('data', ['companies'=>$companies, 'posts'=>$posts, 'equipments'=>$equipments, 'wallets'=>$wallets]);
    }
}
