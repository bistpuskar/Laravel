@extends('admin.layout.master')

@section('content')
   <section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ul class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> <a href="{{route('admin.category')}}">Category</a></li>
      </ul>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Category List</h3>
            </div>
            <!-- /.box-header -->
                @if (session()->has('sucess_message'))
            <div class="alert alert-dismissable alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>
                    {!! session()->get('sucess_message') !!}
                </strong>
            </div>
        @endif
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">SN.</th>
                  <th>Title</th>
                  <th>Created at</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
             @foreach($data['rows'] as $sn=>$row)
                <tr>
                  <td>{{$sn+1}}</td>
                  <td>{{ $row->title }}</td>
                  <td>{{ $row->created_at }}</td>
                  <td>
                  @if($row->status == 1)
                  <span class="label label-sm label-sucess">Active</span>
                  @else
                  <span class="label label-sm label-warning">Inactive</span>
                  @endif
                  </td>
                  <td>
                    <a href="{{ route('admin.category.edit',['id'=>$row->id])}}"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{{ route('admin.category.delete',['id'=>$row->id])}}"> <i class="glyphicon glyphicon-trash"></i></a>
                  </td>
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