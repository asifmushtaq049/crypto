@extends('front.layouts.app')

@section('css')
  <link href="http://dreyescat.github.io/bootstrap-rating/bower_components/fontawesome/css/font-awesome.css" rel="stylesheet">
  <link href="{{ asset('rating/bootstrap-rating.css') }}" rel="stylesheet">
@endsection

@section("main")
<section>

  <div class="container items">
    <div class="section-header">
      <h2>EQUIPMENTS</h2>
    </div>
    @foreach($equipments as $key => $equipment)
      <div class="row">
          <div class="col-lg-12 name">
            <h2>{{$equipment->name}} <a href="/mining/equipment/{{$equipment->id}}" class="btn btn-info pull-right">READ MORE >></a></h2>
          </div>
          <div class="col-sm first">
            <img src="https://www.cryptocompare.com/media/30001977/antminer-x3.png?anchor=center&mode=crop&width=100&height=100" />
          </div>
          <div class="col-sm">
            Price<br/>
            <span class="value">$ {{$equipment->price}}</span>
          </div>
          <div class="col-sm">
            Hash Rate<br/>
            <span class="value">{{$equipment->hash_rate}} KH/s</span>
          </div>
          <div class="col-sm">
            Coin<br/>
              <span class="value">{{$equipment->coin}}</span>
          </div>
          <div class="col-sm">
            Profit Ratio<br/>
              <span class="value">{{$equipment->profit_ratio}}</span>
          </div>
          <div class="col-sm">
            <input type="hidden" class="rating-tooltip-manual blue" data-filled="fa fa-star fa-2x rating-color" value="{{ number_format($equipment->rating ? $equipment->rating->avg('stars') : 0, 1, '.', ',') }}" data-empty="fa fa-star-o fa-2x" data-fractions="2" readonly/>
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
