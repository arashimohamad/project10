@extends('admin.layout.layout')
@section('content')    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Update Admin Details</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Admin Details</h3>
              </div>
              <!-- /.card-header -->
              @include('admin.includes.messages')
              <!-- form start -->
              <form method="POST" action="{{url('admin/update-details')}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="admin_email">Email address</label>
                    <input class="form-control" id="admin_email" name="admin_email" value="{{Auth::guard('admin')->user()->email}}" style="background-color: #666" readonly>
                  </div>                  
                  <div class="form-group">
                    <label for="admin_name">Name</label>
                    <input type="text" class="form-control" id="admin_name" name="admin_name" placeholder="Your Name" value="{{Auth::guard('admin')->user()->name}}">
                  </div>
                  <div class="form-group">
                    <label for="admin_mobile">Mobile</label>
                    <input type="text" class="form-control" id="admin_mobile" name="admin_mobile" placeholder="Mobile" value="{{Auth::guard('admin')->user()->mobile}}">
                  </div>     
                  <div class="form-group">
                    <label for="admin_image">Photo</label>
                    <input type="file" class="form-control" id="admin_image" name="admin_image">
                    @if (!empty(Auth::guard('admin')->user()->image))
                      <br><img style="width: 16%;" src="{{URL::asset('/admin/photos/'.Auth::guard('admin')->user()->image)}}">
                      <input type="hidden" name="hidden_image" value="{{Auth::guard('admin')->user()->image}}">
                    {{-- <a href="{{url('admin/photos/'.Auth::guard('admin')->user()->image)}}" target="_blank">View Photo</a> --}}
                    @endif
                  </div>              
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection