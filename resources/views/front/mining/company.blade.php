@extends('front.layouts.app')

@section('css')
  <link href="http://dreyescat.github.io/bootstrap-rating/bower_components/fontawesome/css/font-awesome.css" rel="stylesheet">
  <link href="{{ asset('rating/bootstrap-rating.css') }}" rel="stylesheet">
@endsection

@section("main")
<section>

  <div class="container items company">
    <div class="section-header">
      <h2>COMPANIES</h2>
    </div>
    @foreach($companies as $key => $company)
      <div class="row">
          <div class="col-sm-2">
            <img src="{{$company->image}}" width="100" height="100" />
          </div>
          <div class="col-sm-3">
            Name <br />
            <span class="value">{{$company->name}}</span>
          </div>
          <div class="col-sm-2">
            Location<br/>
            <span class="value">{{$company->location}}</span>
          </div>
          <div class="col-sm-3">
            <input type="hidden" class="rating-tooltip-manual blue" data-filled="fa fa-star fa-2x rating-color" value="{{ number_format($company->rating ? $company->rating->avg('stars') : 0, 1, '.', ',') }}" data-empty="fa fa-star-o fa-2x" data-fractions="2" readonly/>
          </div>
          <div class="col-sm-2">
            <a href="/mining/company/{{$company->id}}" class="btn btn-info pull-right">READ MORE >></a>
          </div>
      </div>
      @endforeach

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
