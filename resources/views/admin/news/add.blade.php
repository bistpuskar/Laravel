@extends('admin.layout.master')

@section('css')
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('public/admin-panel/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
@endsection

@section('content')   
<section class="content-header">
      <h1>
        <small></small>
      </h1>
      <ul class="breadcrumb">
        <li><a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> <a href="{{route('admin.news')}}">News</a></li>
         <li> <a href="{{route('admin.news.add')}}">Add News</a></li>
      </ul>
    </section>

    <!-- Main content -->  
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Add News</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php if(!isset($data['row'])){
             $url = route('admin.news.store');
              $name = 'Add'; 
            }else{
              $url = route('admin.news.update',$data['row']->id);
              $name = 'Edit';
            }
             ?> 
            <form method = "post" action="{{$url}}" class="form-horizontal" enctype="multipart/form-data">
                  {{ csrf_field() }}
               <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" value="@if(isset($data['row']->title)) 
                               {{$data['row']->title}} @endif" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 
                         <div class="form-group{{ $errors->has('writer') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Writer</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="writer" value="@if(isset($data['row']->writer)){{
                                $data['row']->writer}}  @endif" required autofocus>

                                @if ($errors->has('writer'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('writer') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('short_desc') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">Short Description</label>

                            <div class="col-md-6">
                                <textarea id="short_desc" class="form-control" name="short_desc"  required autofocus>@if(isset($data['row']->short_desc)){{$data['row']->short_desc }} @endif</textarea> 

                                @if ($errors->has('short_desc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('short_des') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('detail_desc') ? ' has-error' : '' }}">
                            <label  class="col-md-4 control-label">Detail Description</label>

                            <div class="col-md-6">
                                <textarea id="detail_desc" class="form-control" name="detail_desc" required autofocus>@if(isset($data['row']->detail_desc)){{$data['row']->detail_desc }} @endif</textarea> 

                                @if ($errors->has('detail_desc'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('detail _desc') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('published_date') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Published Date</label>

                            <div class="col-md-6">
                                <input id="datepicker"  type="text" class="form-control" name="published_date" value="@if(isset($data['row']->published_date)){{$data['row']->published_date}} @endif" required autofocus>

                                @if ($errors->has('published_date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('published_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('main_image') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Image</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="main_image[]" multiple value="" >
                                  @if(isset($data['row']->image))
                                  <img src="{{url('public/Images/News/'.$data['row']->image)}}" alt="" width="50">
                                  @endif
                                @if ($errors->has('main_image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('main_image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{$name}}</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
              <!-- /.row -->
              <!-- /input-group -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
@endsection

@section('js') 
<script src="{{asset('public/admin-panel/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('vendor/unisharp/laravel-ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('vendor/unisharp/laravel-ckeditor/adapters/jquery.js')}}"></script>

<script type="text/javascript">
  $(document).ready(function(){
 $('#datepicker').datepicker({
      format:'yyyy-mm-dd',autoclose: true
    })
  });

  $('textarea').ckeditor();
</script>
@endsection