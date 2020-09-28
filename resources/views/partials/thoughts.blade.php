<div id="colorlib-testimony" class="testimony-img" style="background-image: url(images/img_bg_2.jpg); margin-bottom: 4em;" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 center-heading text-center colorlib-heading animate-box">
				<h1 class="heading-big">What says</h1>
				<h2>@lang('messages.what_says')</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="testimony-flex">
					@foreach($thoughts as $th)
					<div class="one-fifth animate-box">
						<span class="icon"><i class="icon-quotes-left"></i></span>
						<div class="testimony-wrap">
							<blockquote>
								<p>{{ $th->{'text_'.\App::getLocale()} }}</p>
							</blockquote>
							<div class="desc">
								<div class="figure-img"></div>
								<h3>{{ $th->{'author_'.\App::getLocale()} }}</h3>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>