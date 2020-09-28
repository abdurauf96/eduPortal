@extends('admin.layout')

@section('content')

 <div class="col-md-6">
	<div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Категории</h3>
      </div>
      <table class="table table-bordered table-striped dataTable">
         <tr>
           <td>T/R</td>
           <td>Name (UZ)</td>
           <td>Name (RU)</td>
           <td>Name (EN)</td>
           <td>Action</td>
         </tr>
         @foreach($categories as $category)
         <tr>
         	<td>{{ $loop->iteration }}</td>
         	<td>{{ $category->name_uz }}</td>
          <td>{{ $category->name_ru }}</td>
          <td>{{ $category->name_en }}</td>
         	<td>
         		<a class="btn btn-danger" href="{{ route('deleteCategory', ['id'=>$category->id]) }}">delete</a>
         	</td>
         </tr>
         @endforeach
      </table>
  </div>
 </div>

 <div class="col-md-6">
  
  <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Новая категория</h3>
      </div>
      <form class="form-horizontal" action="{{ route('categories') }}" method="post" >
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name (UZ)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name_uz" placeholder="name...">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name (RU)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name_ru" placeholder="name...">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name (EN)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name_en" placeholder="name...">
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