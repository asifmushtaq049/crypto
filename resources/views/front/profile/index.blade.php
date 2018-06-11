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
  				<div class="profile-userpic">
  					<img src="http://keenthemes.com/preview/metronic/theme/assets/admin/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
  				</div>
  				<!-- END SIDEBAR USERPIC -->
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

@endsection
