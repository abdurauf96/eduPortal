@extends('admin.layout')

@section('content')

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Barcha O'quv markazlari</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Nomi</th>
                  <th>Viloyat</th>
                  <th>Foydalanuvchi</th>
                  <th>Telefon</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($schools as $school)
                <tr>
                  <td>{{ $school->id }}</td>
                  <td>{{ $school->name }}</td>
                  <td>{{ $school->region->{'name_'.\App::getLocale() } }}</td>
                  <td>{{ $school->user->name }}</td>
                  <td>{{ $school->phone }}</td>
                  <td>{{ $school->status }}</td>
                  <td> <a class="btn btn-info" href="{{ route('editSchool', ['id'=>$school->id]) }}">Edit</a></td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

@stop