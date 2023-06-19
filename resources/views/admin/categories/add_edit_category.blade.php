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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
                    action="{{url('admin/add-edit-category')}}"                  
                  @else
                    action="{{url('admin/add-edit-category/'.$category['id'])}}"
                  @endif 
                  method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="catname">Category Name*</label>
                      <input type="text" class="form-control" id="catname" name="catname" placeholder="Enter Category Name">
                    </div>
                    <div class="form-group">
                      <label for="catimage">Category Image*</label>
                      <input type="file" class="form-control" id="catimage" name="catimage">
                    </div>
                    <div class="form-group">
                      <label for="catdiscount">Category Discount*</label>
                      <input type="text" class="form-control" id="catdiscount" name="catdiscount" placeholder="Enter Category Discount">
                    </div>
                    <div class="form-group">
                      <label for="url">Category URL*</label>
                      <input type="text" class="form-control" id="url" name="url" placeholder="Enter Category URL" @if (!empty($category['url'])) value="{{$category['url']}}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="description">Description*</label>
                      <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Category Description"></textarea>
                    </div>
                    <div class="form-group">
                      <label for="metatitle">Meta Title</label>
                      <input type="text" class="form-control" id="metatitle" name="metatitle" placeholder="Enter Meta Title">
                    </div>
                    <div class="form-group">
                      <label for="metadesc">Meta Description</label>
                      <input type="text" class="form-control" id="metadesc" name="metadesc" placeholder="Enter Meta Description">
                    </div>
                    <div class="form-group">
                      <label for="metakey">Meta Keywords</label>
                      <input type="text" class="form-control" id="metakey" name="metakey" placeholder="Enter Meta Keywords">
                    </div>
                    <div class="form-group">
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