@extends('layouts.index')

@section('content')
	@include('partials.about')

	<div class="colorlib-about">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<h3>@lang('messages.about_project')</h3>
					<p>@lang('messages.sub_about')</p>
				</div>
				<div class="col-md-6">
					<div class="fancy-collapse-panel">
                	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                     <div class="panel panel-default">
                         <div class="panel-heading" role="tab" id="headingOne">
                             <h4 class="panel-title">
                                 <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">@lang('messages.title1')
                                 </a>
                             </h4>
                         </div>
                         <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                             <div class="panel-body">
                                 <div class="row">
						      		<div class="col-md-12">
						      			<p>@lang('messages.body1')</p>
						      		</div>
						      	</div>
                             </div>
                         </div>
                     </div>
                     <div class="panel panel-default">
                         <div class="panel-heading" role="tab" id="headingTwo">
                             <h4 class="panel-title">
                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">@lang('messages.title2')
                                 </a>
                             </h4>
                         </div>
                         <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                             <div class="panel-body">
								<ul>
									@lang('messages.body2')
								</ul>
                                 
                             </div>
                         </div>
                     </div>
                     <div class="panel panel-default">
                         <div class="panel-heading" role="tab" id="headingThree">
                             <h4 class="panel-title">
                                 <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">@lang('messages.title3')
                                 </a>
                             </h4>
                         </div>
                         <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                             <div class="panel-body">
                                 <ul>
                                    @lang('messages.body3')
                                </ul>	
                             </div>
                         </div>
                     </div>
                  </div>
              </div>
				</div>
			</div>
		</div>
	</div>

	@include('partials.message')
@endsection