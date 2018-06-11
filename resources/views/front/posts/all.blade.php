@extends('front.layouts.app')

@section("main")
<section id="services">
  <div class="container">
    <div class="section-header">
      <h2>POSTS</h2>
    </div>
    <div class="row">
      <div class="col-md-12">
        @foreach($posts as $key => $value)
        <div class="col-lg-12">
          <div class="box wow fadeInLeft">
            <h4 class="title"><a href="/posts/{{$value->id}}">{{ $value -> title}}</a></h4>
            <p class="description">{{ str_limit($value -> detail, $limit = 100, $end = '...') }}</p>
            <p class="pull-right"><a href="/posts/{{$value->id}}">Read more...</a></p>
          </div>
        </div>
        @endforeach
    </div>

    </div>

  </div>
</section><!-- #about -->

@endsection
