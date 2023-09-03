@extends('admin.layout.layout')
@section('content')    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Brands</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Brands</li>
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
              {{-- @if ($brandsModule['edit_access'] == 1 || $brandsModule['full_access'] == 1) --}}
                <div class="card-header">
                  <h3 class="card-title">Brands</h3> 
                  <a href="{{url('admin/add-edit-brand')}}" class="btn btn-primary btn-block" style="max-width: 150px; float:right; display:inline-block">Add Brand</a>               
                </div>
              {{-- @endif --}}
              <!-- /.card-header -->
              <div class="card-body">
                <table id="brands" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>URL</th>
                      <th>Created On</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($brands as $brd)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$brd->brand_name}}</td>
                        <td>{{$brd->url}}</td>
                        <td>{{date("j F Y, g:i a", strtotime($brd->created_at))}}</td>
                        <td>
                          {{-- @if ($brandsModule['edit_access'] == 1 || $brandsModule['full_access'] == 1) --}}
                            @if ($brd->status == 1)
                              {{-- Please refer to custom.js on layout for updateBrandStatus --}}
                              <a href="javascript:void(0)" class="updateBrandStatus" id="brand-{{$brd->id}}" brand_id="{{$brd->id}}" style="color:#007bff">
                                <i class="fas fa-toggle-on" status="Active"></i>
                              </a>                            
                            @else
                              <a href="javascript:void(0)" class="updateBrandStatus" id="brand-{{$brd->id}}" brand_id="{{$brd->id}}" style="color: grey">
                                <i class="fas fa-toggle-off" status="Inactive"></i>
                              </a>
                            @endif
                            &nbsp;&nbsp;                            
                          {{-- @endif --}}
                          {{-- @if ($brandsModule['edit_access'] == 1 || $brandsModule['full_access'] == 1) --}}
                            <a href="{{url('admin/add-edit-brand/'.$brd->id)}}" style="color:#007bff"><i class="fas fa-edit"></i></a>
                            &nbsp;&nbsp;
                          {{-- @endif
                          @if ($brandsModule['full_access'] == 1) --}}
                            {{-- for SweetAlert2 --}}
                            <a href="javascript:void(0)" record="brand" recordid="{{$brd->id}}" name="{{$brd->brand_name}} Brand" class="confirmDelete" title="Delete Brand" style="color:#007bff">
                              <i class="fas fa-trash"></i>
                            </a>
                          {{-- @endif --}}
                        </td>
                      </tr> 
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>URL</th>
                      <th>Created On</th>
                      <th>Actions</th>
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