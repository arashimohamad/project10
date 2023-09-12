@extends('admin.layout.layout')
@section('content')    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Banners</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Banners</li>
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
          <div class="col-12">

            @include('admin.includes.messages')
            
            <div class="card">
              @if ($bannersModule['edit_access'] == 1 || $bannersModule['full_access'] == 1)
                <div class="card-header">
                  <h3 class="card-title">Banners</h3> 
                  <a href="{{url('admin/add-edit-banner')}}" class="btn btn-primary btn-block" style="max-width: 150px; float:right; display:inline-block">Add Banner</a>               
                </div>
              @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table id="banners" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Image</th>                      
                      <th>Type</th>
                      <th>Link</th>
                      <th>Title</th>
                      @if ($bannersModule['edit_access'] == 1 || $bannersModule['full_access'] == 1)
                        <th>Actions</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($banners as $bnr)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                          @if (!empty($bnr->image)) 
                            <a href="{{url('/front/images/banners/'. $bnr->image)}}" target="_blank">
                              <img style="width: 180px" src="{{asset('front/images/banners/'. $bnr->image)}}">
                            </a>
                          @else
                            No Image
                          @endif
                        </td>
                        <td>{{$bnr->type}}</td>
                        <td>{{$bnr->link}}</td>
                        <td>{{$bnr->title}}</td>                       
                        @if ($bannersModule['edit_access'] == 1 || $bannersModule['full_access'] == 1)
                          <td>
                            @if ($bannersModule['edit_access'] == 1 || $bannersModule['full_access'] == 1)
                              @if ($bnr->status == 1)
                                {{-- Please refer to custom.js on layout for updateBannerstatus --}}
                                <a href="javascript:void(0)" class="updateBannerStatus" id="banner-{{$bnr->id}}" banner_id="{{$bnr->id}}" style="color:#007bff">
                                  <i class="fas fa-toggle-on" status="Active"></i>
                                </a>                            
                              @else
                                <a href="javascript:void(0)" class="updateBannerStatus" id="banner-{{$bnr->id}}" banner_id="{{$bnr->id}}" style="color: grey">
                                  <i class="fas fa-toggle-off" status="Inactive"></i>
                                </a>
                              @endif
                              &nbsp;&nbsp;                            
                            @endif
                            @if ($bannersModule['edit_access'] == 1 || $bannersModule['full_access'] == 1)
                              <a href="{{url('admin/add-edit-banner/'.$bnr->id)}}" style="color:#007bff"><i class="fas fa-edit"></i></a>
                              &nbsp;&nbsp;
                            @endif
                            @if ($bannersModule['full_access'] == 1)
                              {{-- for SweetAlert2 --}}
                              <a href="javascript:void(0)" record="banner" recordid="{{$bnr->id}}" name="{{$bnr->title}} Banner" class="confirmDelete" title="Delete Banner" style="color:#007bff">
                                <i class="fas fa-trash"></i>
                              </a>
                            @endif
                          </td>
                        @endif
                      </tr> 
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Image</th>                      
                      <th>Type</th>
                      <th>Link</th>
                      <th>Title</th>                     
                      @if ($bannersModule['edit_access'] == 1 || $bannersModule['full_access'] == 1)
                        <th>Actions</th>
                      @endif
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection