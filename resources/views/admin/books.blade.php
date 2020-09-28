@extends('admin.layout')

@section('content')

<div class="col-md-6">
 	
	<div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Книги </h3>
      </div>
      <table class="table table-bordered table-striped dataTable">
         <tr>
           <td>T/R</td>
           <td>Name</td>
           <td>Category</td>
           <td>Action</td>
         </tr>
         @foreach($books as $book)
         <tr>
         	<td>{{ $loop->iteration }}</td>
         	<td>{{ $book->name }}</td>
          <td>{{ $book->category->{'name_'.\App::getLocale()} }}</td>
         	<td>
         		<a class="btn btn-danger" href="{{ route('deleteBook', ['id'=>$book->id]) }}">delete</a>
         	</td>
         </tr>
         @endforeach
      </table>
  </div>
</div>
<div class="col-md-6">
  <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Новая книга </h3>
      </div>
      <form class="form-horizontal" action="{{ route('books') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label  class="col-sm-2 control-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" placeholder="name..." required="">
            </div>
          </div>
          
          <div class="form-group">
            <label  class="col-sm-2 control-label">Category</label>
            <div class="col-sm-10">
              <select name="category_id" class="form-control">
                 @foreach($categories as $category)
                 <option value="{{ $category->id }}">{{ $category->{'name_'.\App::getLocale()} }}</option>
                 @endforeach
               </select>
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10">
              <label for="">Top</label>
              <input type="checkbox" value="top" name="status" >
              <label for="">None</label>
              <input type="checkbox" value="none" name="status">
            </div>
          
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Image</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="image" >
            </div>
          </div>
          <div class="form-group">
            <label  class="col-sm-2 control-label">Book</label>
            <div class="col-sm-10">
              <input type="file" class="form-control" name="book" required="">
            </div>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-info pull-right">Добавить</button>
        </div>
      </form>
  </div>
  {{ $books->links() }}
</div>
@stop