@extends('admin.layout.master')

@section('content')
    <!-- Main content -->
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