@extends('admin.layout.layout')
@section('content')    
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- BOOTSTRAP DUALLISTBOX -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">{{$title}}</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                
                @include('admin.includes.messages')

                <form id="subadminForm" name="subadminForm" 
                  @if (empty($subadmindata['id']))
                    action="{{url('admin/add-edit-subadmin')}}"                  
                  @else
                    action="{{url('admin/add-edit-subadmin/'.$subadmindata['id'])}}"
                  @endif 
                  method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">                                       
                    <div class="form-group col-md-6">
                      <label for="email">Email</label>
                      <input @if ($subadmindata['id'] != "") disabled style="background-color: #666666" @else required @endif type="email" class="form-control" id="email" name="email" placeholder="Enter Email" @if (!empty($subadmindata['email'])) value="{{$subadmindata['email']}}" @endif>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" @if (!empty($subadmindata['password'])) value="{{$subadmindata['password']}}" @endif>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="name">Name*</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" @if (!empty($subadmindata['name'])) value="{{$subadmindata['name']}}" @else value="{{old('name').$subadmindata['name']}}" @endif>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="mobile">Mobile*</label>
                      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile" @if (!empty($subadmindata['mobile'])) value="{{$subadmindata['mobile']}}" @endif>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="image">Photo</label>
                      <input type="file" class="form-control" id="image" name="image">
                      @if (!empty($subadmindata['image'])) 
                        <br><img style="width: 16%;" src="{{URL::asset('/admin/photos/'.$subadmindata['image'])}}">
                        <input type="hidden" name="current_image" value="{{$subadmindata['image']}}">
                      {{-- <a href="{{url('admin/photos/'.Auth::guard('admin')->user()->image)}}" target="_blank">View Photo</a> --}}
                      @endif
                    </div>   
                    <div class="form-group col-md-6">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </form>
                <!-- /.form-group -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection