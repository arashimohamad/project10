@extends('admin.layout.layout')
@section('content')    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          {{-- <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col --> --}}
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    @include('admin.includes.messages')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-tasks"></i></span>
              <a href="{{ url('admin/categories') }}" style="color:white">
                <div class="info-box-content">
                  <span class="info-box-text">Categories</span>
                  <span class="info-box-number">
                    {{$categoriesCount}}
                    <small></small>
                  </span>
                </a>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-th-list"></i></span>
              <a href="{{ url('admin/brands') }}" style="color:white">
                <div class="info-box-content">
                  <span class="info-box-text">Brands</span>
                  <span class="info-box-number">{{$brandsCount}}</span>
                </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tshirt"></i></span>
              <a href="{{ url('admin/products') }}" style="color:white">
                <div class="info-box-content">
                  <span class="info-box-text">Product</span>
                  <span class="info-box-number">{{$productsCount}}</span>
                </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
              <a href="{{ url('admin/users') }}" style="color:white">
                <div class="info-box-content">
                  <span class="info-box-text">Users</span>
                  <span class="info-box-number">{{$usersCount}}</span>
                </div>
              </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection