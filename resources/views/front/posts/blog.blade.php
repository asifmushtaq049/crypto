@extends('front.layouts.app')

@section("main")
<section id="services">
  <div class="container">
    <div class="section-header">
      <h2>BLOG</h2>
    </div>
    <div class="row">
      @foreach($posts as $key => $value)
      <div class="col-lg-6">
        <div class="box wow fadeInLeft">
          <div class="icon m-10"><img src="https://www.cryptocompare.com/media/30001977/antminer-x3.png?anchor=center&mode=crop&width=100&height=100" /></div>
          <h4 class="title"><a href="/posts/{{$value->id}}">{{ $value -> title}}</a></h4>
          <p class="description">{{ str_limit($value -> detail, $limit = 100, $end = '...') }}</p>
          <p class="pull-right"><a href="/posts/{{$value->id}}">Read more...</a></p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section><!-- #services -->

@endsection
