@extends('layouts.index')

@section('content')
<div class="colorlib-blog page_posts">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				@foreach($posts as $post)
	         <div class="block-21 d-flex animate-box">
	            <a href="#" class="blog-img" style="background-image: url({{ $post->image }});"></a>
	            <div class="text">
	               <h3 class="heading"><a href="{{ route('viewPost', ['id'=>$post->id]) }}">{{  $post->{'title_'.\App::getLocale()} }}</a></h3>
	               <p>{{ $post->{'desc_'.\App::getLocale()} }}</p>
	               <div class="meta">
	                  <div><a href="#"><span class="icon-calendar"></span> {{ $post->created_at->format('M d, Y') }}</a></div>
	                  <div><a href="#"><span class="icon-user2"></span> {{ $post->user->school->name }}</a></div>
	                  <div><a href="#"><span class="icon-chat"></span> {{ $post->view }}</a></div>
	               </div>
	            </div>
	         </div>
	       		@endforeach
			</div>
			<!-- SIDEBAR: start -->
			@include('layouts.sidebar')
		</div>
	</div>
</div>

@include('partials.message')
@stop