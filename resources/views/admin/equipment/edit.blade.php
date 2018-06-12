@extends('admin.layouts.dashboard')

@section('page_heading','Edit Equipment')

@section('section')

<div class="col-sm-12">
    <div class="row">
        <div class="col-lg-10 margin-bottom-20">
          @if(Session::has('flash_message'))
              <div class="alert alert-success">
                  {{ Session::get('flash_message') }}
              </div>
          @endif
          @if(Session::has('flash_error'))
              <div class="alert alert-danger">
                  {{ Session::get('flash_error') }}
              </div>
          @endif
            <form role="form" method="post" enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label>Equipment Name *</label>
                    <input value="{{$equipment->name}}" class="form-control" placeholder="Enter Equipment Name" name="name">
                </div>
                <div class="col-md-3 form-group">
                    <label>Power</label>
                    <input value="{{$equipment->power}}" class="form-control" name="power">
                </div>
                <div class="col-md-3 form-group">
                    <label>Hash Rate</label>
                    <input value="{{$equipment->hash_rate}}" class="form-control" name="hash_rate">
                </div>
                <div class="col-md-3 form-group">
                    <label>Power Cost Per Day</label>
                    <input value="{{$equipment->power_cost_per_day}}" class="form-control" name="power_cost_per_day">
                </div>
                <div class="col-md-3 form-group">
                    <label>Return Per Day</label>
                    <input value="{{$equipment->return_per_day}}" class="form-control" name="return_per_day">
                </div>
                <div class="col-md-3 form-group">
                    <label>Profit Ratio</label>
                    <input value="{{$equipment->profit_ratio}}" class="form-control" name="profit_ratio">
                </div>
                <div class="col-md-3 form-group">
                    <label>Payback Period</label>
                    <input value="{{$equipment->payback_period}}" class="form-control" name="payback_period">
                </div>
                <div class="col-md-3 form-group">
                    <label>Cost Per KH/s</label>
                    <input value="{{$equipment->cost_per_kh_s}}" class="form-control" name="cost_per_kh_s">
                </div>
                <div class="col-md-3 form-group">
                    <label>Annual Return Percentage</label>
                    <input value="{{$equipment->annual_return_percentage}}" class="form-control" name="annual_return_percentage">
                </div>
                <div class="form-group clear">
                    <label for="tx">Coin *</label>
                    <input value="{{$equipment->coin}}" class="form-control" name="coin">
                </div>
                <div class="form-group clear">
                    <label for="tx">Price *</label>
                    <input value="{{$equipment->price}}" class="form-control" name="price">
                </div>
                <div class="form-group clear">
                    <label for="tx">Equipment Detail</label>
                    <textarea id="tx" class="form-control" rows="7" name="detail">{{$equipment->detail}}</textarea>
                </div>
                <div class="form-group">
                  <label for="image">Equipment Image</label>
                  <input type="file" class="form-control" name="image" id="image" accept="image/gif, image/jpeg, image/png, image/JPEG, image/jpg, image/PNG" />
                  <img id="img" src="{{$equipment->image}}" width="200" height="150" class="row" />
                </div>
                <button type="submit" class="btn btn-primary">Update Equipment</button>
            </form>
            <br />
        </div>
    </div>
</div>


@endsection
