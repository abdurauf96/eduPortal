@extends('layouts.index')

@section('content')
    @if(session('flash'))
    <div class="alert alert-danger">
        <p>{{ session('flash') }}</p>
    </div>
    @endif
    
    @include('partials.slider')
    <div class="colorlib-search">
      <div class="container">
        <div class="row">
          <div class="col-md-12 search-wrap">
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
                    <option >@lang('messages.categories')</option>
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
    <div class="colorlib-classes" id="hidden_block">
        <div class="container" id="result">
            
        </div>  
    </div>
    
    @include('partials.services')
    @include('partials.top_schools')
    @include('partials.about')
    @include('partials.thoughts')
    @include('partials.courses')
   {{--  @include('partials.posts') --}}
    @include('partials.message')
@stop