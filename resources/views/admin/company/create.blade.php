@extends('admin.layouts.dashboard')

@section('page_heading','Add Company')

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
                <div class="form-group">
                    <label>Company Name *</label>
                    <input class="form-control" placeholder="Enter Company Name" name="name">
                </div>

                <div class="form-group">
                    <label for="tx">Location *</label>
                    <input class="form-control" placeholder="Enter Company Location" name="location">
                </div>
                <div class="form-group clear">
                    <label for="tx">Website</label>
                    <input class="form-control" name="website">
                </div>
                <div class="form-group clear">
                    <label for="tx">Company Detail</label>
                    <textarea id="tx" class="form-control" rows="7" name="detail"></textarea>
                </div>
                <div class="form-group">
                  <label for="image">Company Image</label>
                  <input type="file" class="form-control" name="image" id="image" accept="image/gif, image/jpeg, image/png, image/JPEG, image/jpg, image/PNG" />
                  <img id="img" width="200" height="150" class="row" />
                </div>
                <button type="submit" class="btn btn-primary">Add Company</button>
                <button type="reset" class="btn btn-default">Reset Form</button>
            </form>
        </div>

    </div>
</div>


@endsection
