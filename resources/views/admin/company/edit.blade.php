@extends('admin.layouts.dashboard')

@section('page_heading','Edit Company')

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
              <input type="hidden" name="_method" value="PUT">
                <div class="form-group">
                    <label>Company Name *</label>
                    <input value="{{$company->name}}" class="form-control" placeholder="Enter Company Name" name="name">
                </div>

                <div class="form-group">
                    <label for="tx">Location *</label>
                    <input value="{{$company->location}}" class="form-control" placeholder="Enter Company Location" name="location">
                </div>
                <div class="form-group ">
                    <label for="tx">Website</label>
                    <input value="{{$company->website}}" class="form-control" name="website">
                </div>
                <div class="form-group clear">
                    <label for="tx">Company Detail</label>
                    <textarea id="tx" class="form-control" rows="7" name="detail">{{$company->detail}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update Company</button>
            </form>
        </div>

    </div>
</div>


@endsection
