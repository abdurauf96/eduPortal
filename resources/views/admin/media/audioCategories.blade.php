@extends('admin.layout')

@section('content')

<div class="col-md-6">
 	
	<div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Категории аудиоуроков</h3>
      </div>
      <table class="table table-bordered table-striped dataTable">
         <tr>
           <td>T/R</td>
           <td>Name uz</td>
           <td>Name ru</td>
           <td>Name en</td>
         </tr>
         @foreach($categories as $category)
         <tr>
         	<td>{{ $loop->iteration }}</td>
         	<td>{{ $category->name_uz }}</td>
          <td>{{ $category->name_ru }}</td>
          <td>{{ $category->name_en }}</td>
         </tr>
         @endforeach
      </table>
  </div>
</div>
<div class="col-md-6">
  <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Добавить новая</h3>
      </div>
      <form class="form-horizontal" action="{{ route('audioCategory') }}" method="post" >
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name uz</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name_uz" placeholder="name..." required="">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name ru</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name_ru" placeholder="name..." required="">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name en</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name_en" placeholder="name..." required="">
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