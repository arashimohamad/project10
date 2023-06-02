@extends('admin.layout.layout')
@section('content')    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Subadmins</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Subadmins</li>
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
              <div class="card-header">
                <h3 class="card-title">Sub Admins</h3>
                <a href="{{url('admin/add-edit-subadmin')}}" class="btn btn-primary btn-block" style="max-width: 150px; float:right; display:inline-block">Add Sub Admins</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="subadmins" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Type</th>
                      <th>Created On</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($subadmins as $sa)
                      {{-- Option 1 - $CmsPages = CmsPage::get(); --}}
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$sa->name}}</td>
                        <td>{{$sa->mobile}}</td>
                        <td>{{$sa->email}}</td>
                        <td>{{$sa->type}}</td>
                        <td>{{date("j F Y, g:i a", strtotime($sa->created_at))}}</td>
                        <td>                 
                          @if ($sa->status == 1)
                            {{-- Please refer to custom.js on layout for updateSubadminStatus --}}
                            <a href="javascript:void(0)" class="updateSubadminStatus" id="subadmin-{{$sa->id}}" subadmin_id="{{$sa->id}}" style="color:#007bff">
                              <i class="fas fa-toggle-on" status="Active"></i>
                            </a>                            
                          @else
                            <a href="javascript:void(0)" class="updateSubadminStatus" id="subadmin-{{$sa->id}}" subadmin_id="{{$sa->id}}" style="color: grey">
                              <i class="fas fa-toggle-off" status="Inactive"></i>
                            </a>
                          @endif
                          &nbsp;&nbsp;
                          <a href="{{url('admin/add-edit-subadmin/'.$sa->id)}}" style="color:#007bff"><i class="fas fa-edit"></i></a>
                          &nbsp;&nbsp;
                          {{-- for SweetAlert2 --}}
                          <a href="javascript:void(0)" record="subadmin" recordid="{{$sa->id}}" name="Subadmin {{$sa->name}}" class="confirmDelete" title="Delete Subadmin" style="color:#007bff">
                          <i class="fas fa-trash"></i>
                          </a>
                          {{-- for normal alert
                          <a class="confirmDelete" name="CMS Page" title="Delete CMS Page" href="{{url('admin/delete-edit-cms-page/'.$page->id)}}" style="color:#007bff">
                          <i class="fas fa-trash"></i>
                          </a> --}}
                          &nbsp;&nbsp;
                          <a href="{{url('admin/update-role/'.$sa->id)}}" style="color:#007bff"><i class="fas fa-unlock"></i></a>
                        </td>
                      </tr> 

                      {{-- Option 2 - $CmsPages = CmsPage::get()->toArray();
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$sa['title']}}</td>
                        <td>{{$sa['url']}}</td>
                        <td>{{$sa['created_at']}}</td>
                        <td></td>
                      </tr>  --}}

                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Type</th>
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