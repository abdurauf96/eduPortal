@extends('admin.layout')

@section('content')

<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Quick Example</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="{{ route('posts.update', ['id'=>$post->id]) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('patch')
          <div class="box-body col-md-6">
            <div class="form-group">
              <label >Post title uz</label>
              <input type="text" class="form-control" value="{{ $post->title_uz }}" name="title_uz" placeholder="Enter title">
            </div>
            <div class="form-group">
              <label >Post title ru</label>
              <input type="text" class="form-control" value="{{ $post->title_ru }}" name="title_ru" placeholder="Enter title">
            </div>
            <div class="form-group">
              <label >Post title en</label>
              <input type="text" class="form-control" value="{{ $post->title_en }}" name="title_en" placeholder="Enter title">
            </div>

            <div class="form-group">
              <label >Post description uz</label>
              <input type="text" class="form-control" name="desc_uz" value="{{ $post->desc_uz }}" placeholder="Enter title">
            </div>
            <div class="form-group">
              <label >Post description ru</label>
              <input type="text" value="{{ $post->desc_ru }}" class="form-control" name="desc_ru" placeholder="Enter title">
            </div>
            <div class="form-group">
              <label >Post description en</label>
              <input type="text" class="form-control" value="{{ $post->desc_en }}" name="desc_en" placeholder="Enter title">
            </div>
          </div>
          <div class="box-body col-md-6">
            <div class="form-group">
              <label >Post body uz</label>
              <textarea class="form-control"  name="body_uz" placeholder="Enter body">{{ $post->body_uz }}</textarea>
            </div>
            <div class="form-group">
              <label >Post body ru</label>
              <textarea class="form-control"  name="body_ru" placeholder="Enter body">{{ $post->body_ru }}</textarea>
            </div>
            <div class="form-group">
              <label >Post body en</label>
              <textarea class="form-control" name="body_en" placeholder="Enter body">{{ $post->body_en }}</textarea>
            </div>
            <div class="form-group">
              <label for="exampleInputFile">Image</label>
              <input type="file" name="new_image">
            </div>
            <input type="hidden" value="{{ $post->image }}" name="image">
             <label for="">Status</label>
            <div class="checkbox">
              <label>
                <input type="radio" name="status" value="active"> Active
              </label>
               <label>
                <input type="radio" value="noactive" checked name="status"> No Active
              </label>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
     
    </div>
   
  </div>
  <!-- /.row -->
</section>
@stop