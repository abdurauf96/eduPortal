@extends('admin.layout')

@section('content')

<div class="col-md-6">
 	
	<div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Аудиоуроки</h3>
      </div>
      <table class="table table-bordered table-striped dataTable">
         <tr>
           <td>T/R</td>
           <td>Name</td>
           <td>Kategoriyasi</td>
           <td>Action</td>
         </tr>
         @foreach($audios as $audio)
         <tr>
         	<td>{{ $loop->iteration }}</td>
         	<td>{{ $audio->name }}</td>
          <td>{{ $audio->category->{'name_'.\App::getLocale()} }}</td>
         	<td>
         		<a class="btn btn-danger" href="{{ route('deleteAudio', ['id'=>$audio->id]) }}"> <i class="fa fa-trash"></i> </a>
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
      <form class="form-horizontal" action="{{ route('audios') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label  class="col-sm-2 control-label">title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" placeholder="name..." required="">
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
            <label  class="col-sm-2 control-label">audio file</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="audio" required="">
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