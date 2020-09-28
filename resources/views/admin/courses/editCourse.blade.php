@extends('admin.layout')

@section('content')

 <div class="col-md-6">
    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Tahrirlash</h3>
      </div>
      <form class="form-horizontal" action="{{ route('updateCourse', ['id'=>$course->id]) }}" method="post">
        @csrf
        @method('PATCH')
        <div class="box-body">
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name (uzb)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ $course->name_uz }}" name="name_uz" placeholder="name...">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name(rus)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ $course->name_ru }}" name="name_ru" placeholder="name...">
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name(ENG)</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" value="{{ $course->name_en }}" name="name_en" placeholder="name...">
            </div>
          </div>
           <div class="form-group">
            <label  class="col-sm-2 control-label">Category </label>
            <div class="col-sm-10">
              <select name="category_id" class="form-control" id="">
                @foreach($categories as $category)
                <option value="{{ $category->id }}"> {{ $category->{'name_'.\App::getLocale()} }} </option>
                @endforeach
              </select>
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