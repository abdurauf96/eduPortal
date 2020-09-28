@extends('admin.layout')

@section('content')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Статьи</h3>
        <a class="btn btn-primary" href="{{ route('posts.create') }}">Добавить</a>
      </div>
      <!-- /.box-header -->
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
            <th>Action</th>
          </tr>
          </thead>
          <tbody>
          @foreach($posts as $post)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $post->title_uz }}</td>
            <td>{{ $post->desc_uz }}</td>
            <td>{{ $post->user->school->name }}</td>
            <td><img src="{{ $post->image }}" alt=""> </td>
            <td>{{ $post->status }}</td>
            <td>
              <a class="btn btn-info" href="{{ route('posts.edit', ['id'=>$post->id]) }}"> <i class="fa fa-edit" ></i> </a>
              <form action="{{ route('posts.destroy', ['id'=>$post->id]) }}" method="post">
              <button class="btn btn-danger" ><i class="fa fa-trash" ></i></button>
              @csrf
              @method('delete')
              </form>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

  
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

@stop