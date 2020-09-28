@extends('layouts.index')

@section('content')
<div class="colorlib-event vacancy" >
    <div class="container">
        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default2">
            @lang('messages.ishbor')
        </button>
        <div class="modal fade" id="modal-default2">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">@lang('messages.elon')</h4>
                    </div>
                    <form action="/jobs" method="post">
                    <div class="modal-body">
                        @csrf
                        <label for="">@lang('messages.eduname')</label>
                        <input class="form-control fish" type="text" required name="idora">

                        <label for="">@lang('messages.vacantname')</label>
                        <input class="form-control age" type="text" required name="prof">

                        <label for="">@lang('messages.maosh')</label>
                        <input class="form-control prof" type="text" required name="summa">

                        <label for="">@lang('messages.phone')</label>
                        <input class="form-control info" type="text" required name="phone">
                            
                        <label for="">@lang('messages.xudud')</label>
                        <input class="form-control region" type="text" required name="region">

                        <label for="">@lang('messages.descr')</label>
                        <input class="form-control phone" type="text" required name="desc">
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">@lang('messages.cancel')</button>
                        <input type="submit" value="@lang('messages.send')" class="btn btn-info sub">
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
            @lang('messages.ishkerak')
        </button>
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">@lang('messages.elon')</h4>
                </div>
                <form action="/jobseeker" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    
                    @csrf
                        <label for="">@lang('messages.ismi')</label>
                        <input class="form-control fish" type="text" name="fio" placeholder="" required>

                        <label for="">@lang('messages.yoshi')</label>
                        <input class="form-control age" type="text" name="age" required>

                        <label for="">@lang('messages.prof')</label>
                        <input class="form-control prof" type="text" name="prof" required>

                        <label for="">@lang('messages.info')</label>
                        <input class="form-control info" name="info" type="text">
                        
                        <label for="">@lang('messages.xudud')</label>
                        <input class="form-control region" name="region" type="text">

                        <label for="">@lang('messages.phone')</label>
                        <input class="form-control phone" name="phone" type="text">
                        <label for="">@lang('messages.resume')</label>
                        <input class="form-control resume" name="resume" type="file">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">@lang('messages.cancel')</button>
                    <input type="submit" value="@lang('messages.send')" class="btn btn-primary sub">
                </div>
            </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        @foreach ($jobs as $job)
                        <div class="event-entry animate-box">
                            <div class="desc">
                            <p class="meta"><span class="day">{{ $job->created_at->format('d') }}</span>
                                <span class="month">{{ $job->created_at->format('M') }}</span></p>
                                <p class="organizer"><b>@lang('messages.tashkilot'):</b> <span>{{ $job->idora }}</span>
                                    &nbsp &nbsp&nbsp&nbsp<b>@lang('messages.xudud'):</b> <span>{{ $job->addres }}</span>
                                </p>
                            <h2><a href="#">@lang('messages.vacantname'): {{ $job->job_name }}</a></h2>
                                <p><b>@lang('messages.maosh')</b>: {{ $job->summa }}</p>
                                <p><b>@lang('messages.forcontact'):</b>{{ $job->phone }}</p>
                            
                            </div>
                            <div class="location">
                                <span class="icon"><i class="icon-map"></i></span>
                            <p>@lang('messages.descr'): {{ $job->description }}</p>
                            </div>
                        </div>
                        @if ($loop->iteration==5)
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        {{ $jobs->links() }}
    </div>
</div>
@endsection

