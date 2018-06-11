@extends('front.profile.index')

@section("profile-content")
<section>
  <div class="container">
    <div class="row">

      <div class="col-lg-12 content">
        <h2>CREATE A POST</h2>
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        @if(Session::has('flash_error'))
            <div class="alert alert-danger">
                {{ Session::get('flash_error') }}
            </div>
        @endif
        {!! Form::open(array('method'=>'PUT','route' => ['posts.update', $post->id])) !!}
        <div class="form-group">
            {!! Form::label('title', 'Title:', ['class' => 'control-label']) !!}
            {!! Form::text('title', $post->title, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('detail', 'Description:', ['class' => 'control-label']) !!}
            {!! Form::textarea('detail', $post->detail, ['class' => 'form-control']) !!}
        </div>
        <input type="hidden" name="type" />
        {!! Form::submit('Update Post', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}
      </div>
    </div>

  </div>
</section><!-- #about -->

@endsection
