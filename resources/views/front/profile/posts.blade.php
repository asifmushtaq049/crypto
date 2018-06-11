@extends('front.profile.index')
@section('home', 'active')

@section("profile-content")

<h2>Posts <a href='/posts/create' class="btn btn-primary pull-right">Add New</a></h2>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th width="70%">Title</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $key => $value)
        <tr class="odd gradeX">
            <td><a href="/posts/{{$value->id}}" style="color:#007bff;">{{ $value -> title}}</a></td>
            <th>
              <form action="{{ action('PostController@destroy', [$value->id]) }}" method="POST" class="inline">
              <input type="hidden" name="_method" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <a class="btn btn-primary" href="{{ action('PostController@edit', [$value->id]) }}">Edit</a>
              <input type="submit" class="btn btn-danger inline" value="Delete"/>
              </form>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
