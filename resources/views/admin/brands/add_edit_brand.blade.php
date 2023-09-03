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

                <form id="brandForm" name="brandForm" 
                  @if (empty($brand['id']))
                    action="{{url('admin/add-edit-brand')}}"                  
                  @else
                    action="{{url('admin/add-edit-brand/'.$brand['id'])}}"
                  @endif 
                  method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="bdname">Brand Name*</label>
                      <input type="text" class="form-control" id="bdname" name="bdname" placeholder="Enter Brand Name" @if (!empty($brand['brand_name'])) value="{{$brand['brand_name']}}" @else value="{{old('bdname')}}" @endif> 
                    </div>
                    <div class="form-group">
                      <label for="bdimage">Brand Image</label>
                      <input type="file" class="form-control" id="bdimage" name="bdimage">                     
                      @if (!empty($brand['brand_image']))
                        <br>
                        <a href="{{url('/front/images/brands/'. $brand['brand_image'])}}" target="_blank">
                          <img style="width: 80px; margin: 10px" src="{{URL::asset('/front/images/brands/'. $brand['brand_image'])}}">
                        </a>                       
                        <input type="hidden" name="hidden_image" value="{{$brand['brand_image']}}">
                        <a href="javascript:void(0)" record="brand-image" recordid="{{$brand->id}}" name="{{$brand->brand_image}}" class="confirmDeleteImage" title="Delete Brand Image" style="color:#007bff">
                          <i class="fas fa-trash" style="color: white"></i>
                        </a>
                      @endif
                    </div>                    
                    <div class="form-group">
                      <label for="bdlogo">Brand Logo</label>
                      <input type="file" class="form-control" id="bdlogo" name="bdlogo">                     
                      @if (!empty($brand['brand_logo']))
                        <br>
                        <a href="{{url('/front/images/brands/'. $brand['brand_logo'])}}" target="_blank">
                          <img style="width: 80px; margin: 10px" src="{{URL::asset('/front/images/brands/'. $brand['brand_logo'])}}">
                        </a>                       
                        <input type="hidden" name="hidden_logo" value="{{$brand['brand_logo']}}">
                        <a href="javascript:void(0)" record="brand-logo" recordid="{{$brand->id}}" name="{{$brand->brand_logo}}" class="confirmDeleteImage" title="Delete Brand Logo" style="color:#007bff">
                          <i class="fas fa-trash" style="color: white"></i>
                        </a>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="bddiscount">Brand Discount</label>
                      <input type="text" class="form-control" id="bddiscount" name="bddiscount" placeholder="Enter Brand Discount" @if (!empty($brand['brand_discount'])) value="{{$brand['brand_discount']}}" @else value="{{old('bddiscount')}}" @endif>                    
                    </div>
                    <div class="form-group">
                      <label for="url">Brand URL*</label>
                      <input type="text" class="form-control" id="url" name="url" placeholder="Enter Brand URL" @if (!empty($brand['url'])) value="{{$brand['url']}}" @else value="{{old('url')}}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="description">Brand Description*</label>
                      <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Brand Description">@if (!empty($brand['description'])) {{$brand['description']}} @else {{old('description')}} @endif</textarea>
                    </div>
                    <div class="form-group">
                      <label for="metatitle">Meta Title</label>
                      <input type="text" class="form-control" id="metatitle" name="metatitle" placeholder="Enter Meta Title" @if (!empty($brand['meta_title'])) value="{{$brand['meta_title']}}" @else value="{{old('metatitle')}}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="metadesc">Meta Description</label>
                      <input type="text" class="form-control" id="metadesc" name="metadesc" placeholder="Enter Meta Description" @if (!empty($brand['meta_description'])) value="{{$brand['meta_description']}}" @else value="{{old('metadesc')}}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="metakey">Meta Keywords</label>
                      <input type="text" class="form-control" id="metakey" name="metakey" placeholder="Enter Meta Keywords" @if (!empty($brand['meta_keywords'])) value="{{$brand['meta_keywords']}}" @else value="{{old('metakey')}}" @endif>
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