@extends('layouts.index')

@section('content')
<div class="container page_view">
	<div class="col-md-12">
		 <div class="box box-primary">
		 	@if(session('flash'))
		 	<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h4><i class="icon fa fa-ban"></i> error!</h4>
          {{ session('flash') }}
      </div>
      @endif
            <div class="box-header with-border">
              <h3 class="box-title">@lang('messages.edit')</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('schoolEdit', ['id'=>$school->id]) }}" method="post" enctype="multipart/form-data">
            	@csrf
            	 
              <div class="box-body">
                <div class="form-group {{ $errors->has('name')? 'has-error' : ''}} ">
                  <label >@lang('messages.name_school')</label>
                  <input type="text" value="{{ $school->name }}" class="form-control" name="name" placeholder="Enter name">
                  @if($errors->has('name')) 
                  	<span class="help-block">@lang('messages.reqired')</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('description')? 'has-error' : ''}}">
                  <label>@lang('messages.desc_school')</label>
                  <textarea name="description" class="form-control" rows="3" placeholder="Enter ...">{{ $school->description }}</textarea>
                  @if($errors->has('description')) 
                  	<span class="help-block">@lang('messages.reqired')</span>
                  @endif
                </div>
                <div class="form-group">
                  <div class="box-primary">
                    <div class="box-header">
                      <i class="ion ion-clipboard"></i>
                      <h3 class="box-title">@lang('messages.courses')</h3>
                    </div>
                    <div class="box-body row">
                      <div class="col-md-4">
                        <ul class="todo-list">
                          @foreach($courses as $course)
                          <li>
                            <span class="handle">
                              <i class="fa fa-ellipsis-v"></i>
                              <i class="fa fa-ellipsis-v"></i>
                            </span>
                            <input type="checkbox" name="courses[]" 
                              @foreach($school->courses as $c )
                                @if($c->id==$course->id) checked @endif
                              @endforeach
                            value="{{ $course->id }}">
                            <span class="text">{{ $course->{'name_'.\App::getLocale()} }}</span>
                          </li>
                          @if($loop->iteration%15==0)
                          </ul>
                          </div>

                          <div class="col-md-4">
                          <ul class="todo-list">
                          @endif
                          
                          @endforeach
                        </ul>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <div class="form-group ">
                  <label>@lang('messages.region')</label>
                  <select class="form-control getDist" name="region" >
                    @foreach($regions as $region)
                    <option @if($school->region_id==$region->id) selected @endif value="{{ $region->id }}">{{ $region->{'name_'.\App::getLocale()} }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>@lang('messages.district')</label>
                  <select class="form-control" name="district" id="district">
                    <option value="{{ $school->district->id }}" >{{ $school->district->{'name_'.\App::getLocale()} }}</option>
                  </select>
                </div>
                <div class="form-group {{ $errors->has('addres')? 'has-error' : ''}}">
                  <label >@lang('messages.addres')</label>
                  <input type="text" value="{{ $school->addres }}" class="form-control" name="addres" placeholder="Enter addres">
                  @if($errors->has('addres')) 
                  	<span class="help-block">@lang('messages.reqired')</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                  <label >@lang('messages.phone')</label>
                  <input type="text" class="form-control" value="{{ $school->phone }}" name="phone" placeholder="Enter name">
                  @if($errors->has('phone')) 
                  	<span class="help-block">@lang('messages.reqired')</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('email')? 'has-error' : ''}}">
                  <label >Email</label>
                  <input type="email" class="form-control" value="{{ $school->email }}" name="email" placeholder="Enter email">
                  @if($errors->has('email')) 
                  	<span class="help-block">@lang('messages.reqired')</span>
                  @endif
                </div>
                <div class="form-group">
                  <label >@lang('messages.site')</label>
                  <input type="text" name="site" class="form-control" value="{{ $school->site }}"  placeholder="">
                </div>
                <div class="form-group">
                  <label>@lang('messages.tg')</label>
                  <input type="text" class="form-control" placeholder="Enter channel" name="channel" value="{{ $school->channel }}">
                </div>
                <div class="form-group {{ $errors->has('email')? 'has-error' : ''}}">
                  <label for="exampleInputFile">Rasm</label>
                  <input type="hidden" value="{{ $school->image }}" name="old_image"> 
                  <input type="file"  id="exampleInputFile" name="new_image">
                  <img style="width: 300px;" src="{{ $school->image }}" alt="">
                  @if($errors->has('email')) 
                  	<span class="help-block">@lang('messages.required')</span>
                  @endif
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">@lang('messages.update')</button>
              </div>
            </form>
         </div>
	</div>
</div>

@stop