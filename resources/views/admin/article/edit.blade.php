@extends('admin.layouts.dashboard')

@section('page_heading','Edit Article')

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
                  <label>Title *</label>
                  <input class="form-control" name="title" value="{{$article->title}}">
              </div>

              <div class="form-group clear">
                  <label for="tx">Detail *</label>
                  <textarea id="tx" class="form-control" rows="7" name="detail">{{$article->detail}}</textarea>
              </div>
              <button type="submit" class="btn btn-primary">Update Article</button>
          </form>
        </div>

    </div>
</div>


@endsection
