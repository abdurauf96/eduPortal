<div class="colorlib-classes">
	<div class="container">
		<div class="row">
			<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
				<h1 class="heading-big">@lang('messages.books')</h1>
				<h2>@lang('messages.top_books')</h2>
			</div>
		</div>
		<div class="row">
			@foreach($top_books as $book)
			<div class="col-md-4 animate-box book_box" >
				<div class="classes">
					<div class="classes-img" style="background-image: url({{ $book->image  }});">
					</div>
					<div class="wrap">
						<div class="desc">
							<span class="teacher">@lang('messages.category'): {{ $book->category->{'name_'.\App::getLocale()} }}</span>
							<h3><a href="#">{{ $book->name }}</a></h3>
						</div>
						<div class="pricing">
							<a class="btn btn-info" href="{{ $book->book }}">@lang('messages.download')</a>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>	
</div>