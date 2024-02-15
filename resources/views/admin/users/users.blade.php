@extends('admin.layout.layout')
@section('content')    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
              <!-- /.card-header -->
              <div class="card-body">
                <table id="users" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Postcode</th>
                      <th>Country</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Registered On</th>
                      @if ($usersModule['edit_access'] == 1 || $usersModule['full_access'] == 1)
                        <th width="1px">Actions</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $usr)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$usr->name}}</td>
                        <td>{{$usr->address}}</td>
                        <td>{{$usr->city}}</td>
                        <td>{{$usr->state}}</td>
                        <td>{{$usr->postcode}}</td>
                        <td>{{$usr->country}}</td>
                        <td>{{$usr->mobile}}</td>
                        <td>{{$usr->email}}</td>
                        <td>{{date("j F Y, g:i a", strtotime($usr->created_at))}}</td>
                        @if ($usersModule['edit_access'] == 1 || $usersModule['full_access'] == 1)
                          <td width="1px" align="center"> 
                            @if ($usersModule['edit_access'] == 1 || $usersModule['full_access'] == 1)
                              @if ($usr->status == 1)
                                {{-- Please refer to custom.js on layout for updateUserStatus --}}
                                <a href="javascript:void(0)" class="updateUserStatus" id="user-{{$usr->id}}" user_id="{{$usr->id}}" style="color:#007bff">
                                  <i class="fas fa-toggle-on" status="Active"></i>
                                </a>                            
                              @else
                                <a href="javascript:void(0)" class="updateUserStatus" id="user-{{$usr->id}}" user_id="{{$usr->id}}" style="color: grey">
                                  <i class="fas fa-toggle-off" status="Inactive"></i>
                                </a>
                              @endif
                              &nbsp;&nbsp;                            
                            @endif                            
                          </td>
                        @endif
                      </tr> 
                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>City</th>
                      <th>State</th>
                      <th>Postcode</th>
                      <th>Country</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Registered On</th>
                      @if ($usersModule['edit_access'] == 1 || $usersModule['full_access'] == 1)
                      <th width="1px" align="center">Actions</th>
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