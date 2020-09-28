@extends('layouts.index')

@section('content')
	
	<div class="colorlib-classes post_view">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="row row-pb-lg">
						<div class="col-md-12 animate-box">
							<div class="classes class-single">
								<div class="classes-img" style="background-image: url({{ $post->image  }});">
								</div>
								<div class="desc desc2">
									<h3>{{ $post->{'title_'.\App::getLocale()} }}</h3>
									<p>{{ $post->{'body_'.\App::getLocale()} }}</p>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- SIDEBAR: start -->
				@include('layouts.sidebar')
			</div>
		</div>	
	</div>
@include('partials.message')
@stop