@extends('front.profile.index')

@section("profile-content")

<h2>New Notifications</h2>
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <tbody>
        @foreach(Auth::user()->notifications as $key => $value)
        <tr class="odd gradeX">
          <td><a href="/profile/{{$value->user->id}}">{{$value->user->name}}</a> Posted a new Post
            <a href="/posts/{{$value->post->id}}">{{$value->post->title}}</a> at {{$value->created_at}}
            <span style="display:none;">{{$value->is_new = false}}{{$value->save()}}</span>
          </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
