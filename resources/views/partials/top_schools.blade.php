<div class="colorlib-classes">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
				<h1 class="heading-big">@lang('messages.top_schools')</h1>
				<h2>@lang('messages.top_schools')</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 animate-box">
				<div class="owl-carousel">
					@foreach($top_schools as $school)
					<div class="item book_box">
						<a href="school/{{ $school->id }}">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ $school->image  }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<span class="teacher">@lang('messages.region'): &nbsp{{ $school->region->{'name_'.\App::getLocale()} }}</span>
								<h3><a href="{{ route('viewSchool', $school->id) }}">{{ $school->name }}</a></h3>
								</div>
								<div class="pricing">
									<a class="btn btn-info" href="{{ route('userRegistration', ['id'=>$school->id]) }}">@lang('messages.sign')</a>
								</div>
							</div>
						</div>
						</a>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>	
</div>