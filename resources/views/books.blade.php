@extends('layouts.index')

@section('content')
<div class="colorlib-trainers page_books" >
	<div class="container">
		<section class="col-lg-12 connectedSortable">
			 <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">@lang('messages.sort')</h3>
              <div class="btn-group">
                <a href="/{{Request::path()}}?sort=asc" type="button" class="btn btn-default">A-Z</a>
                
                <a href="/{{Request::path()}}?sort=desc" type="button" class="btn btn-default">Z-A</a>
              </div>
              <div class="box-tools pull-right">
                
              </div>
            </div>
            <div class="box-body col-md-6">
              <ul class="todo-list">
                @foreach($books as $book)
                <li>
                  <span class="handle">
                        {{-- <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i> --}}
                        <img src="/img/book.png" alt="">
                  </span>
                  <a href="{{ $book->book }}"><span class="text">{{ $book->name }}.</span></a>
                  <small >
                  @if(pathinfo($book->book, PATHINFO_EXTENSION) == 'pdf')<img class="ext" src="/img/pdf.png" alt="">
                  @elseif(pathinfo($book->book, PATHINFO_EXTENSION) == 'rar')
                  <img class="ext" src="/img/rar.png" alt="">
                  @elseif(pathinfo($book->book, PATHINFO_EXTENSION) == 'zip')
                  <img class="ext" src="/img/zip.png" alt="">
                  @else
                  <img class="ext" src="/img/word.jpg" alt="">
                  @endif
                 </small>
                  
                </li>
                @if($loop->iteration%20==0)
            	</ul>
            	</div>
            	<div class="col-md-6 box-body">
            		<ul class="todo-list">
            		@endif
               	@endforeach
              </ul>
             </div>
            </div>
            <div class="box-tools pull-right">
              {{ $books->links() }}
            </div>
          </div>
		</section>
	</div>
</div>

	@include('partials.message')
@endsection