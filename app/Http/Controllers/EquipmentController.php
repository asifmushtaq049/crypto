<?php

namespace App\Http\Controllers;

use App\Equipment;
use App\EquipmentComment;
use App\EquipmentRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Session;

class EquipmentController extends Controller
{
    //
    public function index()
    {
        //
        $equipments = Equipment::all();
        return view('admin.equipment.all')->with('equipments', $equipments);
    }

    public function front()
    {
        //
        $equipments = Equipment::orderBy('created_at','desc')->get();
        return view('front.mining.equipment')->with('equipments', $equipments);
    }

    public function detail($id){
      $equipment = Equipment::find($id);
      $comments = EquipmentComment::where('equipment_id', $id)->orderBy('created_at', 'desc')->get();
      return view('front.mining.equipment_detail')->with('data', ['equipment'=>$equipment, 'comments'=>$comments]);
    }

    public function create(){
      return view('admin.equipment.create');
    }
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'price'      => 'required',
            'coin'      => 'required'
          );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            Session::flash('flash_error', 'Fill all * fields!');
            return redirect()->back();
        } else {
            // store

            $post = new Equipment;
            $post->name       = Input::get('name');
            $post->detail      = Input::get('detail');
            $post->price      = Input::get('price');
            $post->coin      = Input::get('coin');
            $post->power      = Input::get('power');
            $post->hash_rate      = Input::get('hash_rate');
            $post->power_cost_per_day      = Input::get('power_cost_per_day');
            $post->return_per_day      = Input::get('return_per_day');
            $post->profit_ratio      = Input::get('profit_ratio');
            $post->payback_period      = Input::get('payback_period');
            $post->cost_per_kh_s      = Input::get('cost_per_kh_s');
            $post->annual_return_percentage      = Input::get('annual_return_percentage');
            $post->user_id = auth()->user()->id;
            $post->save();

            // redirect
            Session::flash('flash_message', 'Successfully Added!');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $equipment = Equipment::find($id);
        return view('admin.equipment.edit')->with('equipment',$equipment);
    }


    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'price'      => 'required',
            'coin'      => 'required'
          );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            Session::flash('flash_error', 'Fill all * fields!');
            return redirect()->back();
        } else {
            // store

            // $post = new Equipment;
            $post = Equipment::find($id);
            $post->name       = Input::get('name');
            $post->detail      = Input::get('detail');
            $post->price      = Input::get('price');
            $post->coin      = Input::get('coin');
            $post->power      = Input::get('power');
            $post->hash_rate      = Input::get('hash_rate');
            $post->power_cost_per_day      = Input::get('power_cost_per_day');
            $post->return_per_day      = Input::get('return_per_day');
            $post->profit_ratio      = Input::get('profit_ratio');
            $post->payback_period      = Input::get('payback_period');
            $post->cost_per_kh_s      = Input::get('cost_per_kh_s');
            $post->annual_return_percentage      = Input::get('annual_return_percentage');
            $post->user_id = auth()->user()->id;
            $post->update();

            // redirect
            Session::flash('flash_message', 'Successfully Updated!');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
       Equipment::find($id)->delete();
       return redirect()->back();
    }

    public function comment(Request $request, $id){
      // read more on validation at http://laravel.com/docs/validation
      $rules = array(
          'text'      => 'required'
        );

      $validator = Validator::make(Input::all(), $rules);

      // process the login
      if ($validator->fails()) {
          Session::flash('flash_error', 'Make sure comment and rating');
          return redirect()->back();
      } else {
        $comment = new EquipmentComment;
        $comment->text = $request->get('text');
        $comment->equipment_id = $id;
        $comment->user_id = auth()->user()->id;
        $comment->save();

        $rating = new EquipmentRating;
        $rating->stars = $request->get('stars');
        $rating->equipment_comment_id = $comment->id;
        $rating->equipment_id = $id;
        $rating->user_id = auth()->user()->id;
        $rating->save();
        return redirect()->back();
      }
    }
}
