@extends('layouts.index')
@section('css')
 <link rel="stylesheet" href="/css/shablon/new.css">
@stop
@section('content')

<div class="colorlib-contact page_register">
  <div class="container"> 
    <div class="row">
      <div class="col-md-12">
        <h2> {{ $school->name }} </h2>
      </div>
      <form action="/save/register"  method="post" >
        @csrf
        <div class="col-md-6">
            <input type="hidden" value="{{ $school->id }}" name="school_id">
            <div class="row form-group">
              <div class="col-md-6">
                <label for="fname">@lang('messages.name')</label>
                <input type="text" id="fname" class="form-control" name="name" placeholder="Your name...">
              </div>
              <div class="col-md-6">
                <label for="lname">@lang('messages.sonname')</label> 
                <input type="text" id="lname" class="form-control" name="surname" placeholder="Surname...">
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-6">
                 <label for="email">@lang('messages.phone')</label>
                 <input type="text" class="form-control " id="phone" name="phone"  data-mask="">
              </div>
              <div class="col-md-6">
                <label>@lang('messages.born_year'):</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="age" class="form-control pull-right" id="datepicker">
                </div>
              </div>
            </div>
            <div class="row form-group">
              <div class="col-md-12">
                <label for="subject">@lang('messages.lesson_time')</label> <br>
                 <label>
                  <input type="radio" class="flat-red" value="8:00 - 12:00" name="time" >
                    8:00 - 12:00 &nbsp;
                  </label>
                  <label>
                  <input type="radio" class="flat-red"  value="13:00 - 16:00" name="time">
                    13:00 - 16:00&nbsp;
                  </label>
                  <label>
                    <input type="radio" class="flat-red" value="16:00 - 20:00" name="time" >
                      16:00 - 20:00&nbsp;
                    </label>
              </div>
            </div>
            <div class="form-group">
              <input type="submit" value="@lang('messages.sign')" class="btn btn-primary">
            </div> 
        </div>
        <div class="col-md-6">
          <div class="col-md-12">
            <div class="box-primary">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">@lang('messages.what_course')</h3>
                </div>
                <div class="box-body">
                  <ul class="todo-list">
                    @foreach($school->courses as $course)
                    <li>
                      <span class="handle">
                        <i class="fa fa-ellipsis-v"></i>
                        <i class="fa fa-ellipsis-v"></i>
                      </span>
                      <input type="checkbox" value="{{ $course->id }}" name="courses[]">
                      <span class="text">{{ $course->{'name_'.\App::getLocale()} }}</span>
                    </li>
                    @endforeach
                  </ul>
                </div>
            </div>
          </div>
        </div>
      </form> 
    </div>
  </div>
</div>
@endsection