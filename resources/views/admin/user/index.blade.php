@extends('admin.layout.master')

@section('content')
    <!-- Main content -->
       <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ul class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> <a href="{{route('admin.user')}}">User</a></li>
      </ul>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Users List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">SN.</th>
                  <th>User Name </th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Email</th>
                  <th>Created at</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
             @foreach($data['rows'] as $sn=>$row)
                <tr>
                  <td>{{$sn+1}}</td>
                  <td>{{ $row->username }}</td>
                  <td>{{ $row->address }}</td>
                  <td>{{ $row->contact_no }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->created_at }}</td>
                  <td>
                  @if($row->status == 1)
                  <span class="label label-sm label-sucess">Active</span>
                  @else
                  <span class="label label-sm label-warning">Inactive</span>
                  @endif
                  </td>
                  <td></td>
                </tr>
                @endforeach
              </table>
            </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </section>
    <!-- /.content -->
@endsection