@extends('layouts.index')


@section('content')
<div class="colorlib-trainers page_books" >
	<div class="container">
		<section class="col-lg-12 connectedSortable">
			 <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>

              <h3 class="box-title">@lang('messages.choose_reg')</h3>
              <div class="col-md-12 block-search ">
                <div class="col-md-10 ">
                    <select name="region_id" id="reg_id" class="form-control search_region">
                        <option value="">@lang('messages.choose_reg')</option>
                        @foreach ($regions as $reg)
                        <option value="{{ $reg->id }}" > {{ $reg->{'name_'.\App::getLocale()} }} </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary btn-block get_univer">Qidiruv</button>
                </div>
               </div>
              
              <div class="box-tools pull-right">
                
              </div>
            </div>
            <div class="box-body col-md-12" id="result_univer">
              
             </div>
            </div>
            <div class="box-tools pull-right">
             
            </div>
          </div>
		</section>
	</div>
</div>

	@include('partials.message')

@endsection