@extends('admin.layout')

@section('content')

<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Messages</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Number</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($messages as $msg)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $msg->phone }}</td>
                  <td> <a class="btn btn-danger" href="{{ route('messages', ['id'=>$msg->id]) }}">delete</a></td>
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