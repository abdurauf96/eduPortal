@extends('admin.layout')

@section('content')

 <section class="content">
  <div class="row">
    <!-- left column -->
    <div class="col-md-6">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Tahrirlash</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
       <form role="form" action="{{ route('editSchool', ['id'=>$school->id]) }}" method="post" enctype="multipart/form-data">
            	@csrf
            	 
              <div class="box-body">
                <div class="form-group {{ $errors->has('name')? 'has-error' : ''}} ">
                  <label >Nomi</label>
                  <input type="text" value="{{ $school->name }}" class="form-control" name="name" placeholder="Enter name">
                  @if($errors->has('name')) 
                  	<span class="help-block">maydon to'ldirilishi shart</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('description')? 'has-error' : ''}}">
                  <label>O'quv markazi haqida qisqacha</label>
                  <textarea name="description" class="form-control" rows="3" placeholder="Enter ...">{{ $school->description }}</textarea>
                  @if($errors->has('description')) 
                  	<span class="help-block">maydon to'ldirilishi shart</span>
                  @endif
                </div>
                <div class="form-group">
                  @foreach($courses as $course)
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="courses[]" 
                        @foreach($school->courses as $c )
                          @if($c->id==$course->id) checked @endif
                        @endforeach
                      value="{{ $course->id }}">
                     {{ $course->name_uz }}
                    </label>
                  </div>
                  @endforeach
                
                </div>
                <div class="form-group ">
                  <label>Viloyat</label>
                  <select class="form-control getDist" name="region" >
                    @foreach($regions as $region)
                    <option @if($school->region_id==$region->id) selected @endif value="{{ $region->id }}">{{ $region->{'name_'.\App::getLocale() } }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Tuman</label>
                  <select class="form-control" name="district" id="district">
                    @foreach($districts as $district)
                    <option @if($district->id==$school->district_id) selected @endif  value="{{ $district->id }}" >{{ $district->{'name_'.\App::getLocale()} }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group {{ $errors->has('addres')? 'has-error' : ''}}">
                  <label >Manzil</label>
                  <input type="text" value="{{ $school->addres }}" class="form-control" name="addres" placeholder="Enter addres">
                  @if($errors->has('addres')) 
                  	<span class="help-block">maydon to'ldirilishi shart</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                  <label >Telefon</label>
                  <input type="text" class="form-control" value="{{ $school->phone }}" name="phone" placeholder="Enter name">
                  @if($errors->has('phone')) 
                  	<span class="help-block">maydon to'ldirilishi shart</span>
                  @endif
                </div>
                <div class="form-group {{ $errors->has('email')? 'has-error' : ''}}">
                  <label >Pochta</label>
                  <input type="email" class="form-control" value="{{ $school->email }}" name="email" placeholder="Enter email">
                  @if($errors->has('email')) 
                  	<span class="help-block">maydon to'ldirilishi shart</span>
                  @endif
                </div>
                <div class="form-group">
                  <label >Web sayt</label>
                  <input type="text" name="site" class="form-control" value="{{ $school->site }}"  placeholder="Enter name">
                </div>
                <div class="form-group">
                  <label>telegram kanal</label>
                  <input type="text" class="form-control" placeholder="Enter channel" name="channel" value="{{ $school->channel }}">
                </div>
                <div class="form-group {{ $errors->has('email')? 'has-error' : ''}}">
                  <label for="exampleInputFile">Rasm</label>
                  <input type="hidden" value="{{ $school->image }}" name="old_image"> 
                  <input type="file"  id="exampleInputFile" name="new_image">
                  <img style="width: 300px;" src="{{ $school->image }}" alt="">
                  @if($errors->has('email')) 
                  	<span class="help-block">rasm tanlanishi shart</span>
                  @endif
                </div>
                
                <div class="form-group">
                  <label>Status</label><br>
                  <label for="top">top</label>
                  <input type="radio" value="top" name="status" {{ $school->status=='top' ? 'checked' : ' '}}>
                  <label for="">none</label>
                  <input type="radio" value="none" name="status" {{ $school->status=='none' ? 'checked' : ' '}}>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Saqlash</button>
              </div>
            </form>
      </div>
      <!-- /.box -->
  </div>
  <!-- /.row -->
</section>

@endsection