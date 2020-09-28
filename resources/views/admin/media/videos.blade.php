@extends('admin.layout')

@section('content')

<div class="col-md-6">
	<div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Видеоуроки</h3>
      </div>
      <table class="table table-bordered table-striped dataTable">
         <tr>
           <td>T/R</td>
           <td>Title</td>
           <td>Category</td>
           <td>Link</td>
           <td>Action</td>
         </tr>
         @foreach($videos as $video)
         <tr>
         	<td>{{ $loop->iteration }}</td>
         	<td>{{ $video->title }}</td>
          <td>{{ $video->category->{'name_'.\App::getLocale()} }}</td>
          <td>{{ $video->link }}</td>
         	<td>
         		<a class="btn btn-danger" href="{{ route('deleteVideo', ['id'=>$video->id]) }}"><i class="fa fa-trash" ></i></a>
         	</td>
         </tr>
         @endforeach
      </table>
  </div>
</div>

<div class="col-md-6">
  <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Добавить новый</h3>
      </div> 
      <form class="form-horizontal" action="{{ route('videos') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label  class="col-sm-2 control-label">title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="title" placeholder="name..." required="">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Category</label>
            <div class="col-sm-10">
              <select name="category_id" id="" class="form-control">
                @foreach($categories as $cat)
                  <option value="{{ $cat->id }}">{{ $cat->{'name_'.\App::getLocale()} }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Link</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="link" required="">
            </div>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-info pull-right">Добавить</button>
        </div>
      </form>
  </div>
</div>
@stop