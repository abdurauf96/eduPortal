@extends('layouts.index')

@section('content')
	 <div class="colorlib-search search_courses">
      <div class="container" >
        <div class="row">
          <div class="col-md-12 search-wrap ">
            <div class="search-wrap-2">
              <form method="post" class="colorlib-form">
                @csrf
                      <div class="newclass">
                <div class="newclass__item">
                <div class="form-group">
                  <!-- <label for="search">Search Course</label> -->
                  <div class="form-field">
                  <i class="icon icon-arrow-down3"></i>
                    <select name="region" id="region" class="form-control select">
                      <option value="">@lang('messages.choose_reg')</option>
                      @foreach($regions as $reg)
                      <option value="{{ $reg->id }}">{{ $reg->{'name_'.\App::getLocale()} }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                </div>
                <div class="newclass__item">
                  <div class="form-group">
                    <div class="form-field">
                    <i class="icon icon-arrow-down3"></i>
                    <select name="district" id="district" class="form-control select">
                      <option value="">@lang('messages.choose_dist')</option>
                      
                    </select>
                    </div>
                </div>
                </div>
                
                <div class="newclass__item">
                  <div class="form-group">
                  <!-- <label for="difficulty">Difficulty</label> -->
                  <div class="form-field">
                    <i class="icon icon-arrow-down3"></i>
                    <select name="people" id="categories" class="form-control select">
                    <option >@lang('messages.category')</option>
                    @foreach($cat_courses as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->{'name_'.\App::getLocale()} }}</option>
                    @endforeach
                    </select>
                  </div>
                  </div>
                </div>
                <div class="newclass__item">
                <div class="form-group">
                  <div class="form-field">
                  <i class="icon icon-arrow-down3"></i>
                  <select name="people" id="directions" class="form-control select" disabled="">
                    <option value="">@lang('messages.courses')</option>
                    
                  </select>
                  </div>
                </div>
                </div>
                <div class="newclass__item">
                <input type="submit" name="submit" id="submit" value="@lang('messages.search')" class="btn btn-primary btn-block view">
                </div>
                    </div>
                  </form>
                </div>
          </div>
        </div>
      </div>
    </div>
	<div class="colorlib-classes sign-up">
		<div class="container" id="result">
			<div class="row">
				<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
					<h1 class="heading-big">@lang('messages.our_schools')</h1>
					<h2>@lang('messages.our_schools')</h2>
				</div>
			</div>
			<div class="row">
				@foreach($schools as $school)
				<div class="col-md-4 animate-box">
					<div class="classes">
						<div class="classes-img" style="background-image: url({{ $school->image  }});">
						</div>
						<div class="wrap">
							<div class="desc">
								<span class="teacher">{{ $school->region->{'name_'.\App::getLocale()} }}</span>
								<h3><a href="#">{{ $school->name }}</a></h3>
							</div>
							<div class="pricing">
								<a class="btn btn-info" href="/user/register?school_id={{ $school->id }}"> @lang('messages.sign')</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>	
	</div>
@include('partials.message')
@stop