@extends('admin.layout')

@section('content')

 <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Tahrirlash</h3>
      </div>
      <form class="form-horizontal" action="{{ route('editThought', ['id'=>$thought->id]) }}" method="post">
        @csrf
        
        <div class="box-body">
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name (uzb)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ $thought->text_uz }}" name="text_uz" placeholder="name...">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name(rus)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ $thought->text_ru }}" name="text_ru" placeholder="name...">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name(ENG)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ $thought->text_en }}" name="text_en" placeholder="name...">
            </div>
          </div>
           <div class="form-group">
            <label  class="col-sm-2 control-label">Author(uz)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ $thought->author_uz }}" name="author_uz" placeholder="name...">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Author(ru)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ $thought->author_ru }}" name="author_ru" placeholder="name...">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Author(ENG)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ $thought->author_en }}" name="author_en" placeholder="name...">
            </div>
          </div>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-info pull-right">Update</button>
        </div>
      </form>
    </div>
 </div>
@stop