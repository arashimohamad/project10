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
              <div class="col-md-6">
                
                @include('admin.includes.messages')

                <form id="cmsForm" name="cmsForm" 
                  @if (empty($cmspage['id']))
                    action="{{url('admin/add-edit-cms-page')}}"                  
                  @else
                    action="{{url('admin/add-edit-cms-page/'.$cmspage['id'])}}"
                  @endif 
                  method="post">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="title">Title*</label>
                      <input type="text" class="form-control" id="title" name="title" placeholder="Enter Page Title" @if (!empty($cmspage['title'])) value="{{$cmspage['title']}}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="url">URL*</label>
                      <input type="text" class="form-control" id="url" name="url" placeholder="Enter Page URL" @if (!empty($cmspage['url'])) value="{{$cmspage['url']}}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="description">Description*</label>
                      <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Page Description">@if (!empty($cmspage['description'])) {{$cmspage['description']}} @endif</textarea>
                    </div>
                    <div class="form-group">
                      <label for="metatitle">Meta Title</label>
                      <input type="text" class="form-control" id="metatitle" name="metatitle" placeholder="Enter Meta Title" @if (!empty($cmspage['meta_title'])) value="{{$cmspage['meta_title']}}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="metadesc">Meta Description</label>
                      <input type="text" class="form-control" id="metadesc" name="metadesc" placeholder="Enter Meta Description" @if (!empty($cmspage['meta_description'])) value="{{$cmspage['meta_description']}}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="metakey">Meta Keywords</label>
                      <input type="text" class="form-control" id="metakey" name="metakey" placeholder="Enter Meta Keywords" @if (!empty($cmspage['meta_keywords'])) value="{{$cmspage['meta_keywords']}}" @endif>
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