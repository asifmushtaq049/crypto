<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // $apiKey = "7F5aewoSQw31NrQM";
      // $apiSecret = "bULy3XSySaUYXb0F4PbLbV1aL7Rhilax";
      // $configuration = Configuration::apiKey($apiKey, $apiSecret);
      // $client = Client::create($configuration);
      // $buyPrice = $client->getBuyPrice('ETH-USD');
      // // $buyPrice = $client->getBuyPrice('BTC-USD');
      // echo $buyPrice->getAmount()."<br />";
      // echo $buyPrice->getCurrency();
      // // var_dump($buyPrice);
      // // var_dump($currencies);
      // // foreach($currencies as $key => $value){
      // //   foreach($value as $cId => $currency){
      // //     echo $cId . " " . $currency . "<br />";
      // //   }
      // // }
      return view('front.layouts.main');
    }
}
