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

                <form id="categoryForm" name="categoryForm" 
                  @if (empty($category['id']))
                    action="{{url('admin/add-edit-cms-page')}}"                  
                  @else
                    action="{{url('admin/add-edit-cms-page/'.$category['id'])}}"
                  @endif 
                  method="post">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="category_name">Category Name*</label>
                      <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category Name" @if (!empty($category['category_name'])) value="{{$category['category_name']}}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="url">URL*</label>
                      <input type="text" class="form-control" id="url" name="url" placeholder="Enter Page URL" @if (!empty($category['url'])) value="{{$category['url']}}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="description">Description*</label>
                      <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Page Description">@if (!empty($category['description'])) {{$category['description']}} @endif</textarea>
                    </div>
                    <div class="form-group">
                      <label for="metatitle">Meta Title</label>
                      <input type="text" class="form-control" id="metatitle" name="metatitle" placeholder="Enter Meta Title" @if (!empty($category['meta_title'])) value="{{$category['meta_title']}}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="metadesc">Meta Description</label>
                      <input type="text" class="form-control" id="metadesc" name="metadesc" placeholder="Enter Meta Description" @if (!empty($category['meta_description'])) value="{{$category['meta_description']}}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="metakey">Meta Keywords</label>
                      <input type="text" class="form-control" id="metakey" name="metakey" placeholder="Enter Meta Keywords" @if (!empty($category['meta_keywords'])) value="{{$category['meta_keywords']}}" @endif>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
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