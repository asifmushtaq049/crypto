<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyComment;
use App\CompanyRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Session;

class CompanyController extends Controller
{
    //
    public function index()
    {
        //
        $companies = Company::orderBy('created_at','desc')->get();
        return view('admin.company.all')->with('companies', $companies);
    }

    public function front()
    {
        //
        $companies = Company::orderBy('created_at','desc')->get();
        return view('front.mining.company')->with('companies', $companies);
    }

    public function detail($id){
      $company = Company::find($id);
      $comments = CompanyComment::where('company_id', $id)->orderBy('created_at', 'desc')->get();
      return view('front.mining.company_detail')->with('data', ['company'=>$company, 'comments'=>$comments]);
    }

    public function create(){
      return view('admin.company.create');
    }

    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'location'      => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            Session::flash('flash_error', 'Fill all * fields!');
            return redirect()->back();
        } else {
            // store

            $post = new Company;
            $post->name       = Input::get('name');
            $post->detail      = Input::get('detail');
            $post->location      = Input::get('location');
            if (Input::has('image')) {
              $image = Input::file('image');
              $name = str_slug($request->name.$image->getRealPath()).'.'.$image->getClientOriginalExtension();
              $destinationPath = public_path('/img/companies');
              $imagePath = $destinationPath. "/".  $name;
              $image->move($destinationPath, $name);
              $post->image = "/img/companies/".$name;
            }
            $post->website      = Input::get('website');
            $post->user_id = auth()->user()->id;
            $post->save();

            // redirect
            Session::flash('flash_message', 'Successfully Added!');
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $company = Company::find($id);
        return view('admin.company.edit')->with('company',$company);
    }


    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'location'      => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            Session::flash('flash_error', 'Fill all * fields!');
            return redirect()->back();
        } else {
            // store

            // $post = new Equipment;
            $post = Company::find($id);
            $post->name       = Input::get('name');
            $post->detail      = Input::get('detail');
            $post->location      = Input::get('location');
            if (Input::has('image')) {
              $image = Input::file('image');
              $name = str_slug($request->name.$image->getRealPath()).'.'.$image->getClientOriginalExtension();
              $destinationPath = public_path('/img/companies');
              $imagePath = $destinationPath. "/".  $name;
              $image->move($destinationPath, $name);
              $post->image = "/img/companies/".$name;
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
         Company::find($id)->delete();
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
         $comment = new CompanyComment;
         $comment->text = $request->get('text');
         $comment->company_id = $id;
         $comment->user_id = auth()->user()->id;
         $comment->save();

         $rating = new CompanyRating;
         $rating->stars = $request->get('stars');
         $rating->company_comment_id = $comment->id;
         $rating->company_id = $id;
         $rating->user_id = auth()->user()->id;
         $rating->save();
         return redirect()->back();
       }
     }
}
