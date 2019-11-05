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
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">SN.</th>
                  <th>Title</th>
                  <th>Created at</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                {{--  {{dd($data['rows'])}}   --}}
             @foreach($data['rows'] as $row)
                <tr>
                  <td>1.</td>
                  <td>{{ $row->title }}</td>
                  <td>{{ $row->created_at }}</td>
                  <td>
                  @if($row->status == 1)
                  <span>Active</span>
                  @else
                  <span>Inactive</span>
                  @endif
                  </td>
                  <td></td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
            {{-- <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
            </div> --}}
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
    </section>
    <!-- /.content -->
@endsection