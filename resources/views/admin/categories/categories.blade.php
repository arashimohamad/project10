@extends('admin.layout.layout')
@section('content')    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
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
              @if ($categoriesModule['edit_access'] == 1 || $categoriesModule['full_access'] == 1)
                <div class="card-header">
                  <h3 class="card-title">Categories</h3> 
                  <a href="{{url('admin/add-edit-category')}}" class="btn btn-primary btn-block" style="max-width: 150px; float:right; display:inline-block">Add Category</a>               
                </div>
              @endif
              <!-- /.card-header -->
              <div class="card-body">
                <table id="categories" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Parent Category</th>
                      <th>URL</th>
                      <th>Created On</th>
                      @if ($categoriesModule['edit_access'] == 1 || $categoriesModule['full_access'] == 1)
                        <th>Actions</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($categories as $cat)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cat->category_name}}</td>
                        <td>                          
                          {{-- Option 1 --}}
                          @isset($cat->parentcategory->category_name)
                            {{$cat->parentcategory->category_name}}                            
                          @endisset

                          {{-- Option 2 --}}
                          {{-- @isset($cat['parentcategory']['category_name'])
                            {{$cat['parentcategory']['category_name']}}                            
                          @endisset --}}
                        </td>
                        <td>{{$cat->url}}</td>
                        <td>{{date("j F Y, g:i a", strtotime($cat->created_at))}}</td>
                        @if ($categoriesModule['edit_access'] == 1 || $categoriesModule['full_access'] == 1)
                          <td>
                            @if ($categoriesModule['edit_access'] == 1 || $categoriesModule['full_access'] == 1)
                              @if ($cat->status == 1)
                                {{-- Please refer to custom.js on layout for updateCategoryStatus --}}
                                <a href="javascript:void(0)" class="updateCategoryStatus" id="category-{{$cat->id}}" category_id="{{$cat->id}}" style="color:#007bff">
                                  <i class="fas fa-toggle-on" status="Active"></i>
                                </a>                            
                              @else
                                <a href="javascript:void(0)" class="updateCategoryStatus" id="category-{{$cat->id}}" category_id="{{$cat->id}}" style="color: grey">
                                  <i class="fas fa-toggle-off" status="Inactive"></i>
                                </a>
                              @endif
                              &nbsp;&nbsp;                            
                            @endif
                            @if ($categoriesModule['edit_access'] == 1 || $categoriesModule['full_access'] == 1)
                              <a href="{{url('admin/add-edit-category/'.$cat->id)}}" style="color:#007bff"><i class="fas fa-edit"></i></a>
                              &nbsp;&nbsp;
                            @endif
                            @if ($categoriesModule['full_access'] == 1)
                              {{-- for SweetAlert2 --}}
                              <a href="javascript:void(0)" record="category" recordid="{{$cat->id}}" name="{{$cat->category_name}} Category" class="confirmDelete" title="Delete Category" style="color:#007bff">
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
                      <th>Name</th>
                      <th>Parent Category</th>
                      <th>URL</th>
                      <th>Created On</th>
                      @if ($categoriesModule['edit_access'] == 1 || $categoriesModule['full_access'] == 1)
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