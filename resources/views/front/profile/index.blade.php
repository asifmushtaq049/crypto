@extends('front.layouts.app')


@section("main")
<section>
  <div class="container">
    <div class="section-header">
      <h2>Profile</h2>
    </div>
      <div class="row profile">
  		<div class="col-md-3">
  			<div class="profile-sidebar">
  				<!-- SIDEBAR USERPIC -->
  				<!-- <div class="profile-userpic">
  					<img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
  				</div> -->
  				<!-- END SIDEBAR USERPIC -->
          <!-- <image> -->
            

            <div class="l-md-12 centered">
              <img id="img" src="{{Auth::user()->image}}"class="mx-auto rounded-circle" width="200" height="200" class="row" />
              
              
            </div>

  				<!-- SIDEBAR USER TITLE -->
  				<div class="profile-usertitle">
  					<div class="profile-usertitle-name">
  						{{Auth::user()->name}}
  					</div>
  					<div class="profile-usertitle-job">
  						{{Auth::user()->email}}
  					</div>
  				</div>
  				<!-- END SIDEBAR USER TITLE -->
  				<!-- SIDEBAR BUTTONS -->
          <!-- <div class="profile-userbuttons">
  					<button type="button" class="btn btn-primary btn-sm twitter-color">Follow</button>
  				</div> -->
  				<!-- END SIDEBAR BUTTONS -->
  				<!-- SIDEBAR MENU -->
          <div class="profile-usermenu">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item @yield('home')">
                <a class="nav-link" href="/profile"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item @yield('following')">
                <a class="nav-link" href="/profile/following"><i class="fa fa-user"></i> Following <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item @yield('followers')">
                <a class="nav-link" href="/profile/followers"><i class="fa fa-user"></i> My Followers <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item @yield('setting')">
                <a class="nav-link" href="/profile/setting"><i class="fa fa-cog"></i> Setting</a>
              </li>
              <li class="nav-item @yield('password')">
                <a class="nav-link" href="/profile/password"><i class="fa fa-key"></i> Change Password</a>
              </li>

            </ul>
          </div>
  				<!-- END MENU -->
  			</div>
  		</div>
  		<div class="col-md-9">
          <div class="profile-content">
		            @yield('profile-content')
          </div>
  		</div>
  	</div>
  </div>
</section>
<script src="{{ asset("js/app.js") }}"></script>
<script>
function readURL(input) {

  if (input.files && input.files[0]) {
    if(input.files[0].size <= 0){
      alert("File should not be empty");
      $('#image').val("");
      return;
    }
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#img').attr('src', e.target.result);
      $('#img').attr('width', 200);
      $('#img').attr('height', 150);
      $('#img').show();
    }
    reader.readAsDataURL(input.files[0]);
  }else{

  }
}

$("#image").change(function() {
  readURL(this);
});
</script>

@endsection
