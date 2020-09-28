@extends('admin.layout')

@section('content')

 <div class="col-md-6">
	<div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">kategoriyalar</h3>
      </div>
      <table class="table table-bordered table-striped dataTable">
         <tr>
           <td>T/R</td>
           <td>Name (UZ)</td>
           <td>Name (RU)</td>
           <td>Name (EN)</td>
           <td>Action</td>
         </tr>
         @foreach($thoughts as $th)
         <tr>
         	<td>{{ $loop->iteration }}</td>
         	<td>{{ $th->text_uz }}</td>
          <td>{{ $th->text_ru }}</td>
          <td>{{ $th->text_en }}</td>
         	<td>
         		<a class="btn btn-info" href="{{ route('editThought', ['id'=>$th->id]) }}">edit</a>
         	</td>
         </tr>
         @endforeach
      </table>
  </div>
 </div>

 <div class="col-md-6">
  
  <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Aforizm qo'shish</h3>
      </div>
      <form class="form-horizontal" action="{{ route('thoughts') }}" method="post" >
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name (UZ)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="text_uz" placeholder="name...">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name (RU)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="text_ru" placeholder="name...">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name (EN)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="text_en" placeholder="name...">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Author uz</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="author_uz" placeholder="name...">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Author ru</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="author_ru" placeholder="name...">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Author en</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="author_en" placeholder="name...">
            </div>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-info pull-right">Qo'shish</button>
        </div>
      </form>
    </div>
 </div>
@stop