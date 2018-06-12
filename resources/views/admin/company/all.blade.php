@extends('admin.layouts.dashboard')

@section('css')
<link rel="stylesheet" href="{{ asset('vendor/datatables-plugins/dataTables.bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/datatables-responsive/dataTables.responsive.css') }}">
@endsection

@section('page_heading','Companies')

@section('section')

    <div class="col-sm-12">
      <div class="row">
              <div class="col-lg-12">
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <a href='/admin/company/create' class="btn btn-primary">Add New</a>
                      </div>
                      <!-- /.panel-heading -->
                      <div class="panel-body">
                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                              <thead>
                                  <tr>
                                      <th>Image</th>
                                      <th>Name</th>
                                      <th>Location</th>
                                      <th>Action</th>
                                  </tr>
                              </thead>
                              <tbody>

                                  @foreach($companies as $key => $value)
                                  <tr class="odd gradeX">
                                    <td><img src="{{$value->image}}" width="80" height="80" /></td>
                                      <td>{{$value->name}}</td>
                                      <td>{{$value->location}}</td>
                                      <th>
                                        <form action="{{ action('CompanyController@destroy', [$value->id]) }}" method="POST" class="inline">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <a class="btn btn-primary" href="{{ action('CompanyController@edit', [$value->id]) }}">Edit</a>
                                        <input type="submit" class="btn btn-danger inline" value="Delete"/>
                                        </form>
                                      </th>

                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                          <!-- /.table-responsive -->
                      </div>
                      <!-- /.panel-body -->
                  </div>
                  <!-- /.panel -->
              </div>
              <!-- /.col-lg-12 -->
          </div>
          <!-- /.row -->
    </div>
    <!-- /.col-sm-12 -->

@endsection

@section('script')
<script src="{{ asset("vendor/datatables/js/jquery.dataTables.min.js") }}"></script>
<script src="{{ asset("vendor/datatables-plugins/dataTables.bootstrap.min.js") }}"></script>
<script src="{{ asset("vendor/datatables-responsive/dataTables.responsive.js") }}"></script>
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>
@endsection
