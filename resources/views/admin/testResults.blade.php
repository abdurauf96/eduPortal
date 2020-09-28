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
           <td>Title</td>
           <td>Region</td>
           <td>Action</td>
         </tr>
         @foreach($results as $result)
         <tr>
         	<td>{{ $loop->iteration }}</td>
         	<td>{{ $result->{'title_'.\App::getLocale()} }}</td>
          <td>{{ $result->region->{'name_'.\App::getLocale()} }}</td>
         	<td>
         		<a class="btn btn-danger" href=""> <i class="fa fa-trash"></i> </a>
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
      <form class="form-horizontal" action="{{ route('testResults') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label  class="col-sm-2 control-label">title uz</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="title_uz" placeholder="name..." required="">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">title ru</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title_ru" placeholder="name..." required="">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">title en</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="title_en" placeholder="name..." required="">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Region</label>
            <div class="col-sm-10">
              <select name="region_id" id="" class="form-control">
                @foreach($regions as $reg)
                  <option value="{{ $reg->id }}">{{ $reg->{'name_'.\App::getLocale()} }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Results</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="result" required="">
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