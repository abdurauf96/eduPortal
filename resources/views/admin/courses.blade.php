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
             <td>Kurs nomi (uz)</td>
             <td>Kurs nomi (ru)</td>
             <td>Kurs nomi (en)</td>
             <td>Action</td>
           </tr>
           @foreach($courses as $course)
           <tr>
            <td>{{ $course->id }}</td>
            <td>{{ $course->name_uz }}</td>
            <td>{{ $course->name_ru }}</td>
            <td>{{ $course->name_en }}</td>
            <td>
              <a class="btn btn-danger" href="{{ route('deleteCourse', ['id'=>$course->id]) }}">delete</a>
              <a class="btn btn-primary" href="{{ route('editCourse', ['id'=>$course->id]) }}">edit</a>
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
      <form class="form-horizontal" action="{{ route('courses') }}" method="post">
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