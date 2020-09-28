@extends('layouts.index')

@section('content')
<div class="container box ">
  @if($school)
  <section class="invoice page_view">
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> {{ $school->name }}
            <small class="pull-right">
              <a class="btn btn-primary" href="{{ route('schoolEdit', ['id'=>$school->id]) }}">@lang('messages.edit')</a>
              <a class="btn btn-primary" href="{{ route('userPosts') }}">@lang('messages.posts')</a>
            </small>
          </h2>
        </div>
      </div>
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <address>
             <strong>@lang('messages.school_desc')</strong><br>
            {{ $school->description }} <br>
            <strong>@lang('messages.region')</strong><br>
            {{ $school->region->{'name_'.\App::getLocale()} }}<br>
            <strong>@lang('messages.district')</strong><br>
            {{ $school->district->{'name_'.\App::getLocale()} }}<br>
            <strong>@lang('messages.addres')</strong><br>
            {{ $school->addres }}<br> 
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          
          <address>
            <strong>@lang('messages.phone')</strong><br>
            Telefon{{ $school->phone }} <br>
            <strong>Email</strong><br>
            {{ $school->email }} <br>
             <strong>@lang('messages.site')</strong><br>
            {{ $school->site }}<br>
             <strong>@lang('messages.tg')</strong><br>
            {{ $school->channel }}<br>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col school_image">
          <img src="{{ $school->image }}" alt="">
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>T/r</th>
              <th>@lang('messages.courses')</th>
            </tr>
            </thead>
            <tbody>
              @foreach($school->courses as $course)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $course->{'name_'.\App::getLocale() } }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
  </section>
  @else
  <section class="invoice page_view">
    
  <a class="btn btn-primary" href="/school/register">register now</a>
   </section>
  @endif
</div>
@endsection
