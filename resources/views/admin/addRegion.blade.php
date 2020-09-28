@extends('admin.layout')

@section('content')
<div class="col-md-6">
  <div class="box box-info">
    <div class="box-header with-border">
      <h3 class="box-title">Новый регион</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{ route('saveRegion') }}" method="post">
      @csrf
      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Названия региона (UZ)</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name_uz"  placeholder="Viloyat nomi...">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Названия региона (RU)</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name_ru"  placeholder="Viloyat nomi...">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Названия региона (EN)</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="name_en"  placeholder="Viloyat nomi...">
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