@extends('front.layouts.app')

@section("slider")
@include('front.sections.slider')
@endsection

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
@endsection

@section("main")
<section>
  <div class="container">
    <div className="Coinsprices">
    <div className = "container">
      <div className = "table-responsive">
              <table className = "table table-bordered table-hover header-fixed" id="currency_table">
                     <thead className="thead-dark">
                     <tr>
                          <th>#</th>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Marketing cap </th>
                          <th>Volum 24h </th>
                          <th>Circulating supply</th>
                          <th>24h Change  </th>
                          <th>Graph</th>
                      </tr>
                      </thead>
                      <tbody>

                      </tbody>
             </table>
         </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('script')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script>
$(document).ready(function(){
    $.getJSON("https://api.coinmarketcap.com/v1/ticker/?limit=150", function(data){
        var employee_data = '';
        $.each(data, function(key,value){
            employee_data+='<tr>';
            employee_data+='<td>'+value.symbol+'</td>';
            employee_data+='<td>'+value.name+'</td>';
            employee_data+='<td>'+value.price_usd+'</td>';
            employee_data+='<td>'+value.market_cap_usd+'</td>';
            employee_data+='<td>'+value.available_supply+'</td>'; //24h_volume_usd
            employee_data+='<td>'+value.available_supply+'</td>';
            employee_data+='<td>'+value.percent_change_24h+'</td>';
            employee_data+='<td>';

        });
        $('#currency_table').append(employee_data);

    })
});
</script>
@endsection
