@extends('layouts.index')

@section('content')
<div class="container page_view">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">@lang('messages.posts')</h3>
          <a class="btn btn-primary" href="{{ route('userPostCreate') }}">@lang('messages.create')</a>
        </div>
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>T/r</th>
              <th>Title</th>
              <th>Description</th>
              <th>Author</th>
              <th>Image</th>
              <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $post->{'title_'.\App::getLocale()} }}</td>
              <td>{{ $post->{'desc_'.\App::getLocale()} }}</td>
              <td>{{ $post->user->school->name }}</td>
              <td><img class="post_img" src="{{ $post->image }}" alt=""> </td>
              <td>{{ $post->status }}</td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@stop