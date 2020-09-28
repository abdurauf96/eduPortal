@extends('layouts.index')

@section('content')
<div class="container page_view">
  <section class="content">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">@lang('messages.add_post')</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{ route('userPostCreate')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body col-md-6">
              <div class="form-group">
                <label >@lang('messages.title_uz')</label>
                <input type="text" class="form-control" name="title_uz" placeholder="Enter title">
              </div>
              <div class="form-group">
                <label >@lang('messages.title_ru')</label>
                <input type="text" class="form-control" name="title_ru" placeholder="Enter title">
              </div>
              <div class="form-group">
                <label >@lang('messages.title_en')</label>
                <input type="text" class="form-control" name="title_en" placeholder="Enter title">
              </div>

              <div class="form-group">
                <label >@lang('messages.desc_uz')</label>
                <input type="text" class="form-control" name="desc_uz" placeholder="Enter title">
              </div>
              <div class="form-group">
                <label >@lang('messages.desc_ru')</label>
                <input type="text" class="form-control" name="desc_ru" placeholder="Enter title">
              </div>
              <div class="form-group">
                <label >@lang('messages.desc_en')</label>
                <input type="text" class="form-control" name="desc_en" placeholder="Enter title">
              </div>
            </div>
            <div class="box-body col-md-6">
              <div class="form-group">
                <label >@lang('messages.body_uz')</label>
                <textarea class="form-control" name="body_uz" placeholder="Enter body"></textarea>
              </div>
              <div class="form-group">
                <label >@lang('messages.body_ru')</label>
                <textarea class="form-control" name="body_ru" placeholder="Enter body"></textarea>
              </div>
              <div class="form-group">
                <label >@lang('messages.body_en')</label>
                <textarea class="form-control" name="body_en" placeholder="Enter body"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">@lang('messages.image')</label>
                <input type="file" name="image">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">для абитуриентов</label>
                <input type="checkbox" name="abi">
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">@lang('messages.create')</button>
            </div>
          </form>
        </div>
       
      </div>
     
    </div>
    <!-- /.row -->
  </section>
</div>
@stop