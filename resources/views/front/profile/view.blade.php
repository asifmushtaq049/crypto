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
  						{{$data['user']->name}}
  					</div>
  					<div class="profile-usertitle-job">
  						{{$data['user']->email}}
  					</div>
  				</div>
  				<!-- END SIDEBAR USER TITLE -->
  				<!-- SIDEBAR BUTTONS -->
          <div class="profile-userbuttons">
            <form action="" method="post">
              @csrf
              @if(Auth::check())
                @if(Auth::user()->isFollowing($data['user']->id))
      					<button type="submit" class="btn btn-success btn-sm">UnFollow</button>
                @else
                <button type="submit" class="btn btn-primary btn-sm twitter-color">@Follow</button>
                @endif
              @else
              <a href="/login" class="btn btn-primary btn-sm twitter-color">Login to Follow</a>
              @endif
            </form>
  				</div>
  				<!-- END SIDEBAR BUTTONS -->

  			</div>
  		</div>
  		<div class="col-md-9">
          <div class="profile-content">
            <h2>Posts</h2>
                @foreach($data['posts'] as $key => $value)
                  <div class="box">
                    <h4 class="title"><a href="/posts/{{$value->id}}">{{ $value -> title}}</a></h4>
                    <p class="description">{{ str_limit($value -> detail, $limit = 100, $end = '...') }}</p>
                    <p class="pull-right"><a href="/posts/{{$value->id}}">Read more...</a></p>
                  </div>
                @endforeach
          </div>
  		</div>
  	</div>
  </div>
</section>

@endsection
