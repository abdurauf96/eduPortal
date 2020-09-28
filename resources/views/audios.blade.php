@extends('layouts.index')

@section('content')
<div class="colorlib-trainers page_books" >
	<div class="container">
		<section class="col-lg-12 connectedSortable">
			 <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
              <h3 class="box-title">@lang('messages.sort') </h3>
              <div class="btn-group">
                <a href="/{{Request::path()}}?sort=asc" type="button" class="btn btn-default">A-Z</a>
                
                <a href="/{{Request::path()}}?sort=desc" type="button" class="btn btn-default">Z-A</a>
              </div>
              
            </div>
            <div class="box-body col-md-6">
              <ul class="todo-list">
                @foreach($audios as $audio)
                <li>
                  <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                   </span>
                
                  <a href="{{ $audio->audio }}"><span class="text">{{ $audio->name }}</span></a>
                  <small class="label label-info"><i class="fa fa-clock-o"></i>mp3</small>
                  <div class="tools">
                    <a href="{{ $audio->audio }}"><i class="fa fa-download">@lang('messages.download')</i></a>
                    
                  </div>
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
              {{ $audios->links() }}
            </div>
          </div>
		</section>
	</div>
</div>

	@include('partials.message')
@endsection