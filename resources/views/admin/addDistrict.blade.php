@extends('admin.layout')

@section('content')
<div class="col-md-6">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Новый город</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{ route('addDistrict') }}" method="post">
      @csrf
      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Название города UZB</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name_uz"  placeholder="Tuman nomi...">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Название города ENG</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name_en"  placeholder="Tuman nomi...">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Название города RUS</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name_ru"  placeholder="Tuman nomi...">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Регион города</label>

          <div class="col-sm-10">
           <select name="region_id" class="form-control">
             @foreach($regions as $region)
             <option value="{{ $region->id }}">{{ $region->{'name_'.\App::getLocale()} }}</option>
             @endforeach
           </select>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-info pull-right">Добавить</button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
</div>
@stop