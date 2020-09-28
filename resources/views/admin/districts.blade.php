@extends('admin.layout')

@section('content')

 <div class="col-md-6">
 	
	<div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Tumanlar</h3>
          <a class="btn btn-info" href="{{ route('addDistrict') }}">Qo'shish</a>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
       <table class="table table-bordered table-striped dataTable">
         <tr>
           <td>id</td>
           <td>Viloyati</td>
           <td>Tuman</td>
           <td>Action</td>
         </tr>
         @foreach($districts as $district)
         <tr>
         	<td>{{ $district->id }}</td>
          <td>{{ $district->region->{'name_'.\App::getLocale()} }}</td>
         	<td>{{ $district->{'name_'.\App::getLocale()} }}</td>
         	<td>
         		<a class="btn btn-danger" href="">delete</a>
         	</td>
         </tr>
         @endforeach
       </table>
    </div>
 </div>
@stop