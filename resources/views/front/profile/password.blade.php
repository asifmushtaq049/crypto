@extends('front.profile.index')

@section("profile-content")

@section('password', 'active')
<h2>Change Password</h2>
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
<form method="POST">
    @csrf
    <div class="form-group row">
        <label for="password" class="col-sm-2 col-form-label text-md-right">Password</label>

        <div class="col-md-8">
            <input id="password" type="password" class="form-control" name="password" required autofocus>
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-2">
            <button type="submit" class="btn btn-primary">
                CHANGE PASSWORD
            </button>

        </div>
    </div>
</form>
@endsection
