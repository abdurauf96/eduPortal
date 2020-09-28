@extends('admin.layout')

@section('content')

<section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Новая статья</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('posts.store')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="box-body col-md-6">
                <div class="form-group">
                  <label >Post title uz</label>
                  <input type="text" class="form-control" name="title_uz" placeholder="Enter title">
                </div>
                <div class="form-group">
                  <label >Post title ru</label>
                  <input type="text" class="form-control" name="title_ru" placeholder="Enter title">
                </div>
                <div class="form-group">
                  <label >Post title en</label>
                  <input type="text" class="form-control" name="title_en" placeholder="Enter title">
                </div>

                <div class="form-group">
                  <label >Post description uz</label>
                  <input type="text" class="form-control" name="desc_uz" placeholder="Enter title">
                </div>
                <div class="form-group">
                  <label >Post description ru</label>
                  <input type="text" class="form-control" name="desc_ru" placeholder="Enter title">
                </div>
                <div class="form-group">
                  <label >Post description en</label>
                  <input type="text" class="form-control" name="desc_en" placeholder="Enter title">
                </div>
              </div>
              <div class="box-body col-md-6">
                <div class="form-group">
                  <label >Post body uz</label>
                  <textarea class="form-control" name="body_uz" placeholder="Enter body"></textarea>
                </div>
                <div class="form-group">
                  <label >Post body ru</label>
                  <textarea class="form-control" name="body_ru" placeholder="Enter body"></textarea>
                </div>
                <div class="form-group">
                  <label >Post body en</label>
                  <textarea class="form-control" name="body_en" placeholder="Enter body"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" name="image">
                </div>
                 <label for="">Status</label>
                <div class="checkbox">
                  <label>
                    <input type="radio" name="status" value="active"> Active
                  </label>
                   <label>
                    <input type="radio" value="noactive" checked name="status"> No Active
                  </label>
                </div>
                <div class="form-group">
                  <label >для абитуриентов</label>
                  <input type="checkbox" name="abi">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Добавить</button>
              </div>
            </form>
          </div>
         
        </div>
       
      </div>
      <!-- /.row -->
    </section>
@stop