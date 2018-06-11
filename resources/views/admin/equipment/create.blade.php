@extends('admin.layouts.dashboard')

@section('page_heading','Add Equipment')

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
            <form role="form" method="post">
              @csrf
                <div class="form-group">
                    <label>Equipment Name *</label>
                    <input class="form-control" placeholder="Enter Equipment Name" name="name">
                </div>
                <div class="col-md-3 form-group">
                    <label>Power</label>
                    <input class="form-control" name="power">
                </div>
                <div class="col-md-3 form-group">
                    <label>Hash Rate</label>
                    <input class="form-control" name="hash_rate">
                </div>
                <div class="col-md-3 form-group">
                    <label>Power Cost Per Day</label>
                    <input class="form-control" name="power_cost_per_day">
                </div>
                <div class="col-md-3 form-group">
                    <label>Return Per Day</label>
                    <input class="form-control" name="return_per_day">
                </div>
                <div class="col-md-3 form-group">
                    <label>Profit Ratio</label>
                    <input class="form-control" name="profit_ratio">
                </div>
                <div class="col-md-3 form-group">
                    <label>Payback Period</label>
                    <input class="form-control" name="payback_period">
                </div>
                <div class="col-md-3 form-group">
                    <label>Cost Per KH/s</label>
                    <input class="form-control" name="cost_per_kh_s">
                </div>
                <div class="col-md-3 form-group">
                    <label>Annual Return Percentage</label>
                    <input class="form-control" name="annual_return_percentage">
                </div>
                <div class="form-group clear">
                    <label for="tx">Coin *</label>
                    <input class="form-control" name="coin">
                </div>
                <div class="form-group clear">
                    <label for="tx">Price *</label>
                    <input class="form-control" name="price">
                </div>
                <div class="form-group clear">
                    <label for="tx">Equipment Detail</label>
                    <textarea id="tx" class="form-control" rows="7" name="detail"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Equipment</button>
                <button type="reset" class="btn btn-default">Reset Form</button>
            </form>
        </div>

    </div>
</div>


@endsection
