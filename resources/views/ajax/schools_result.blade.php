<div class="row">
  <div class="col-md-12 colorlib-heading center-heading text-center animate-box">
    <h1 class="heading-big">@lang('messages.search_res')</h1>
    <h2>@lang('messages.results'): {{ count($schools) }}</h2>
  </div>
</div>
<div class="row">
  @foreach($schools as $school)
  <div class="col-md-4 animate-box book_box" >
    <div class="classes">
      <div class="classes-img" style="background-image: url({{ $school->image  }});">
      </div>
      <div class="wrap">
        <div class="desc">
          <span class="teacher">@lang('messages.region'): {{ $school->region->{'name_'.\App::getLocale()} }}</span>
          <h3><a href="#">{{ $school->name }}</a></h3>
        </div>
        <div class="pricing">
          <a class="btn btn-info" href="{{ route('userRegistration', ['id'=>$school->id]) }}">@lang('messages.sign')</a>
          <a class="btn btn-info" href="{{ route('viewSchool', ['id'=>$school->id]) }}">@lang('messages.view')</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>