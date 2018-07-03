@extends('front.layouts.app')

@section('css')
  <link href="http://dreyescat.github.io/bootstrap-rating/bower_components/fontawesome/css/font-awesome.css" rel="stylesheet">
  <link href="{{ asset('rating/bootstrap-rating.css') }}" rel="stylesheet">
@endsection

@section("main")
<section>

  <div class="container item">
    <div class="section-header">
      <h2>{{$data['wallet']->name}}
        <form action="" method="post" class="pull-right">
          @csrf
          @if(Auth::check())
            @if($data['wallet']->wishlist->where('wallet_id',4)->where('user_id', 1)->first())
              <button type="submit" name="wishadded" class="wishbtn"><i class="fa fa-heart wish-added"></i></button>
            @else
              <button type="submit" name="wishadd" class="wishbtn"><i class="fa fa-heart wish-add"></i></button>
            @endif
          @else
          <a href="/login" class="btn btn-primary btn-sm twitter-color"><i class="fa fa-heart"></i> Login to add wishlist</a>
          @endif
        </form>
      </h2>
    </div>
      <div class="row top-row">
        <div class="col-lg-4 top-data">
          <img src="{{$data['wallet']->image}}" width="100" height="100" />
        </div>
        <div class="col-lg-4 top-data">
          Coins<br />
          <span class="value">{{$data['wallet']->coins}}</span>
        </div>
        <div class="col-lg-4 rating-widget clear">
          <div class="widget">
            <div class="rating">{{ number_format($data['wallet']->rating ? $data['wallet']->rating->avg('stars') : 0, 1, '.', ',') }} avg</div>
            <div class="users">{{$data['wallet']->rating ? $data['wallet']->rating->count() : 0}} users rated</div>
            <div class="stars">
              <input type="hidden" class="rating-tooltip-manual blue" data-filled="fa fa-star fa-2x rating-color"
              value="{{ number_format($data['wallet']->rating ? $data['wallet']->rating->avg('stars') : 0, 1, '.', ',') }}" data-empty="fa fa-star-o fa-2x" data-fractions="2" readonly/>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 content">
            <h2>Detail</h2>
            <div class="single-content">
              {{$data['wallet']->detail}}
            </div>
        </div>

        <div class="col-lg-8 content clear">
          @auth
          @if(Session::has('flash_error'))
              <div class="alert alert-danger">
                  {{ Session::get('flash_error') }}
              </div>
          @endif
          <form class="review-form" method="post" id="comment-form">
            @csrf
            <h2>Leave a Review <input name="stars" value="2" type="hidden" class="rating-tooltip-manual blue pull-right" data-filled="fa fa-star fa-2x rating-color" data-empty="fa fa-star-o fa-2x" data-fractions="2"/></h2>
            <div class="leave-review">
                <textarea name="text" required></textarea>
                <button type="submit" class="btn btn-primary pull-right">SUBMIT REVIEW</button>
            </div>
          </form>
          @endauth
          @guest
          <center>You must be <a href="/login">logged in</a> to leave a review.</center>
          @endguest
        </div>

        <div class="col-lg-8 content comments clear">
          @foreach($data['comments'] as $key => $comment)
          <div class="comment">
            <div class="comment-head">
              <a href="/profile/{{$comment->user->id}}">{{$comment->user->name}}</a> <input readonly name="stars" value="{{$comment->rating->stars}}" type="hidden" class="rating-tooltip-manual blue pull-right" data-filled="fa fa-star fa-2x rating-color" data-empty="fa fa-star-o fa-2x" data-fractions="2"/>
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

@section('script')
<script type="text/javascript" src="http://dreyescat.github.io/bootstrap-rating/bower_components/jquery/dist/jquery.js"></script>
<script type="text/javascript" src="http://dreyescat.github.io/bootstrap-rating/bower_components/bootstrap/js/tooltip.js"></script>
<script src="{{ asset('rating/bootstrap-rating.js') }}"></script>
<script>
      $(function () {
        $('input.check').on('change', function () {
          alert('Rating: ' + $(this).val());
        });
        $('#programmatically-set').click(function () {
          $('#programmatically-rating').rating('rate', $('#programmatically-value').val());
        });
        $('#programmatically-get').click(function () {
          alert($('#programmatically-rating').rating('rate'));
        });
        $('#programmatically-reset').click(function () {
          $('#programmatically-rating').rating('rate', '');
        });
        $('.rating-tooltip').rating({
          extendSymbol: function (rate) {
            $(this).tooltip({
              container: 'body',
              placement: 'bottom',
              title: 'Rate ' + rate
            });
          }
        });
        $('.rating-tooltip-manual').rating({
          extendSymbol: function () {
            var title;
            $(this).tooltip({
              container: 'body',
              placement: 'bottom',
              trigger: 'manual',
              title: function () {
                return title;
              }
            });
            $(this).on('rating.rateenter', function (e, rate) {
              title = rate;
              $(this).tooltip('show');
            })
            .on('rating.rateleave', function () {
              $(this).tooltip('hide');
            });
          }
        });
        $('.rating').each(function () {
          $('<span class="label label-default"></span>')
            .text($(this).val() || ' ')
            .insertAfter(this);
        });
        $('.rating').on('change', function () {
          $(this).next('.label').text($(this).val());
        });
      });
    </script>
@endsection
