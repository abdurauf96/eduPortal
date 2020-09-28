<div id="colorlib-subscribe" class="subs-img" style="background-image: url(/img/img_bg_2.jpg);" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center colorlib-heading animate-box">
				<h2>@lang('messages.contactus')</h2>
				<p>@lang('messages.suggest')</p>
			</div>
		</div>
		<div class="row animate-box">
			<div class="col-md-6 col-md-offset-3">
				<div class="row">
					<div class="col-md-12">
					<form class="form-inline qbstp-header-subscribe" method="post" action="{{ route('message') }}">
						@csrf
						<div class="col-three-forth">
							<div class="form-group">
								<input required="" type="text" name="phone" class="form-control" id="email" placeholder="@lang('messages.placehold')">
							</div>
						</div>
						<div class="col-one-third">
							<div class="form-group">
								<button type="submit" class="btn btn-primary">@lang('messages.send')</button>
							</div>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>