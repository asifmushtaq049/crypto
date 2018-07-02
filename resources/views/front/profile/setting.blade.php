@extends('front.profile.index')

@section("profile-content")

@section('setting', 'active')
<h2>Update Profile</h2>
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
<form method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="image" class="col-sm-4 col-form-label text-md-right">Image</label>
        <div class="col-md-6">
            <input type="file" class="form-control" name="image" id="image" accept="image/gif, image/jpeg, image/png, image/JPEG, image/jpg, image/PNG" />
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-4 col-form-label text-md-right">Name</label>
        <div class="col-md-6">
            <input id="name" type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required autofocus>
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control" name="email" value="{{Auth::user()->email}}" required>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                UPDATE PROFILE
            </button>

        </div>
    </div>
</form>
@endsection
