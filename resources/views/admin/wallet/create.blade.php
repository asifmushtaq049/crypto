@extends('admin.layouts.dashboard')

@section('page_heading','Add Wallet')

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
                    <label>Wallet Name *</label>
                    <input class="form-control" placeholder="Enter Wallet Name" name="name">
                </div>

                <div class="form-group">
                    <label for="tx">Supported Coins *</label>
                    <input class="form-control" placeholder="BTC,ETH separated by commas" name="coins">
                </div>
                <div class="form-group clear">
                    <label for="tx">Website</label>
                    <input class="form-control" name="website">
                </div>
                <div class="form-group clear">
                    <label for="tx">Wallet Detail</label>
                    <textarea id="tx" class="form-control" rows="7" name="detail"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Wallet</button>
                <button type="reset" class="btn btn-default">Reset Form</button>
            </form>
        </div>

    </div>
</div>


@endsection
