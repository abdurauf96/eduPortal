@extends('admin.layout')

@section('content')

 <div class="col-md-6">
  	<div class="box box-info">
        <div class="box-header">
          <h3 class="box-title">Kurslar</h3>
        </div>
        <table class="table table-bordered table-striped dataTable">
           <tr>
             <td>id</td>
             <td>Category nomi (uz)</td>
             <td>Category nomi (ru)</td>
             <td>Category nomi (en)</td>
             <td>Action</td>
           </tr>
           @foreach($categories as $category)
           <tr>
            <td>{{  $loop->iteration }}</td>
            <td>{{ $category->name_uz }}</td>
            <td>{{ $category->name_ru }}</td>
            <td>{{ $category->name_en }}</td>
            <td>
              <a class="btn btn-danger" href="{{ route('deleteCourseCategory', ['id'=>$category->id]) }}">Delete</a>
             
            </td>
           </tr>
           @endforeach
        </table>
    </div>
 </div>

 <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Yangi qo'shish</h3>
      </div>
      <form class="form-horizontal" action="{{ route('courseCategories') }}" method="post">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name (uzb)</label>

            <div class="col-sm-10">
              <input type="text" class="form-control" name="name_uz" placeholder="name...">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name(rus)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name_ru" placeholder="name...">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name(ENG)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name_en" placeholder="name...">
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-info pull-right">Qo'shish</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
 </div>
@stop