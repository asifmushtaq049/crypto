@extends('front.layouts.app')

@section("main")
<section>

  <div class="container item">
    <div class="section-header">
      <h2>{{$data['post']->title}}</h2>
    </div>
      <div class="row">
        <div class="col-lg-12 content">
            <div class="meta">
              Posted by <a href="/profile/{{$data['post']->user->id}}">{{$data['post']->user->name}}</a> at {{$data['post']->created_at}}
            </div>
            <div class="single-content">
              {{$data['post']->detail}}
            </div>
        </div>

        <div class="col-lg-12 content clear">
          @auth
          @if(Session::has('flash_error'))
              <div class="alert alert-danger">
                  {{ Session::get('flash_error') }}
              </div>
          @endif
          <form class="review-form" action="{{route('comments.store')}}" method="post" id="comment-form">
            @csrf
            <h2>Leave a Review</h2>
            <div class="leave-review">
                <input type="hidden" name="post_id" value="{{$data['post']->id}}"/>
                <textarea name="text" required></textarea>
                <button type="submit" class="btn btn-primary pull-right">SUBMIT REVIEW</button>
            </div>
          </form>
          @endauth
          @guest
          <center>You must be <a href="/login">logged in</a> to leave a review.</center>
          @endguest
        </div>

        <div class="col-lg-12 content comments clear">
          @foreach($data['comments'] as $key => $comment)
          <div class="comment">
            <div class="comment-head">
              {{$comment->user->name}}
            </div>
            <div class="comment-text">
              {{$comment->text}}
            </div>
          </div>
          @endforeach
        </div>
      </div>
  </div>
</section><!-- #about -->

@endsection
