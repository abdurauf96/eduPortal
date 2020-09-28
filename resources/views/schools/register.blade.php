@extends('layouts.index')

@section('content')
<div class="container user_register">
	<div class="col-md-6">
		 <div class="box box-primary">
		 	@if(session('flash'))
		 	<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> error!</h4>
          {{ session('flash') }}
      </div>
      @endif
            <div class="box-header with-border">
              <h3 class="box-title">@lang('messages.register_school')</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="/save_school" method="post" enctype="multipart/form-data">
            	@csrf
            	<input type="hidden" name="user_id" value="{{ \Auth::user()->id }}"> 
              <div class="box-body">
                <div class="form-group {{ $errors->has('name')? 'has-error' : ''}} ">
                  <label >@lang('messages.name_school')</label>
                  <input type="text" value="{{ old('name') }}" class="form-control" name="name" placeholder="Enter name">
                  @if($errors->has('name')) 
                  	<span class="help-block">@lang('messages.required')</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('description')? 'has-error' : ''}}">
                  <label>@lang('messages.desc_school')</label>
                  <textarea name="description" class="form-control" rows="3" placeholder="Enter ...">{{ old('description') }}</textarea>
                  @if($errors->has('description')) 
                  	<span class="help-block">@lang('messages.required')</span>
                  @endif
                </div>
                <div class="form-group">
                  <div class="fancy-collapse-panel">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      @foreach($categories as $category)
                          <div class="panel panel-default">
                               <div class="panel-heading" role="tab" id="heading{{ $loop->iteration }}">
                                   <h4 class="panel-title">
                                       <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapse{{ $loop->iteration }}">{{ $category->{'name_'.\App::getLocale()} }}
                                       </a>
                                   </h4>
                               </div>
                               <div id="collapse{{ $loop->iteration }}" class="panel-collapse collapse " role="tabpanel" aria-labelledby="heading{{ $loop->iteration }}">
                                   <div class="panel-body">
                                      <div class="row">
                                        <div class="col-md-12">
                                          <div class="bosh__wrapper">
                                            <div class="row">
                                              @foreach($category->courses as $course)
                                                <div class="bosh__item col-md-3 col-xs-6">
                                                    <label >
                                                        <input type="checkbox" value="{{ $course->id }}" name="courses[]" class="checkbox" >
                                                        <div class="check"></div>
                                                        {{ $course->{'name_'.\App::getLocale()} }}</label>
                                                </div>
                                                @if($loop->iteration%4==0)
                                                </div>
                                                <div class="row">
                                                @endif
                                              @endforeach
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                   </div>
                               </div>
                          </div>
                      @endforeach
                      </div>
                </div>
                
                </div>
                <div class="form-group ">
                  <label>@lang('messages.region')</label>
                  <select class="form-control getDist" name="region" >
                    @foreach($regions as $region)
                    <option value="{{ $region->id }}">{{ $region->{'name_'.\App::getLocale()} }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>@lang('messages.district')</label>
                  <select class="form-control" name="district" id="district">
                    <option >@lang('messages.district')</option>
                  </select>
                </div>
                <div class="form-group {{ $errors->has('addres')? 'has-error' : ''}}">
                  <label >@lang('messages.addres')</label>
                  <input type="text" value="{{ old('addres') }}" class="form-control" name="addres" placeholder="Enter addres">
                  @if($errors->has('addres')) 
                  	<span class="help-block">@lang('messages.required')</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('phone')? 'has-error' : ''}}">
                  <label >@lang('messages.phone')</label>
                  <input type="text" class="form-control" value="{{ old('phone') }}" name="phone" placeholder="Enter name">
                  @if($errors->has('phone')) 
                  	<span class="help-block">@lang('messages.required')</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('email')? 'has-error' : ''}}">
                  <label >Email</label>
                  <input type="email" class="form-control" value="{{ old('email') }}" name="email" placeholder="Enter email">
                  @if($errors->has('email')) 
                  	<span class="help-block">@lang('messages.required')</span>
                  @endif
                </div>
                <div class="form-group">
                  <label >@lang('messages.site')</label>
                  <input type="text" name="site" class="form-control"  placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label>@lang('messages.tg')</label>
                  <input type="text" class="form-control" placeholder="Enter channel" name="channel">
                </div>
                <div class="form-group {{ $errors->has('email')? 'has-error' : ''}}">
                  <label for="exampleInputFile">@lang('messages.image')</label>
                  <input type="file"  id="exampleInputFile" name="image">
                  @if($errors->has('email')) 
                  	<span class="help-block">@lang('messages.required')</span>
                  @endif
                </div>
              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('messages.save')</button>
              </div>
            </form>
         </div>
	</div>
</div>

@stop