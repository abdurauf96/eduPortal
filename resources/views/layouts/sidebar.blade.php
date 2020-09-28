<div class="col-md-4 animate-box">
	<div class="sidebar">
		<div class="side">
			<h3 class="sidebar-heading">@lang('messages.latest_post')</h3>
			@foreach($posts as $post)
			<div class="f-blog">
				<a href="blog.html" class="blog-img" style="background-image: url({{ $post->image  }});">
				</a>
				<div class="desc">
					<p class="admin"><span>{{ $post->created_at->format('d M, Y') }}</span></p>
					<h2><a href="{{ route('viewPost', ['id'=>$post->id]) }}">{{ $post->{'title_'.\App::getLocale()} }}</a></h2>
					<p>{{ $post->{'desc_'.\App::getLocale()} }}</p>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>