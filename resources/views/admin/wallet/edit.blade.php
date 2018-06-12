@extends('admin.layouts.dashboard')

@section('page_heading','Edit Wallet')

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
            <form role="form" method="post"  enctype="multipart/form-data">
              @csrf
              <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label>Wallet Name *</label>
                    <input value="{{$wallet->name}}" class="form-control" placeholder="Enter Wallet Name" name="name">
                </div>

                <div class="form-group">
                    <label for="tx">Supported Coins *</label>
                    <input value="{{$wallet->coins}}" class="form-control" placeholder="BTC,ETH separated by commas" name="coins">
                </div>
                <div class="form-group clear">
                    <label for="tx">Website</label>
                    <input value="{{$wallet->website}}" class="form-control" name="website">
                </div>
                <div class="form-group clear">
                    <label for="tx">Wallet Detail</label>
                    <textarea id="tx" class="form-control" rows="7" name="detail">{{$wallet->detail}}</textarea>
                </div>
                <div class="form-group">
                  <label for="image">Wallet Image</label>
                  <input type="file" class="form-control" name="image" id="image" accept="image/gif, image/jpeg, image/png, image/JPEG, image/jpg, image/PNG" />
                  <img id="img" src="{{$wallet->image}}" width="200" height="150" class="row" />
                </div>
                <button type="submit" class="btn btn-primary">Update Wallet</button>
            </form>
        </div>

    </div>
</div>


@endsection
