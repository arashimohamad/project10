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
              <div class="col-6">
                
                @include('admin.includes.messages')

                <form id="bannerForm" name="bannerForm" 
                  @if (empty($banner['id']))
                    action="{{url('admin/add-edit-banner')}}"                  
                  @else
                    action="{{url('admin/add-edit-banner/'.$banner['id'])}}"
                  @endif 
                  method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="bannertype">Banner Type*</label>
                      <select class="form-control" name="bannertype" id="bannertype">
                        <option value="">Select</option>
                        <option @if (!empty($banner['type']) && $banner['type'] == 'Slider') selected @endif value="Slider">Slider</option>
                        <option @if (!empty($banner['type']) && $banner['type'] == 'Fix') selected @endif value="Fix">Fix</option>
                        {{-- the reason is to use Fix as a common value because the image column is not the same. So it will be managed in another way --}}
                      </select>                      
                    </div>
                    <div class="form-group">
                      <label for="bannerimage">Banner Image</label>
                      <input type="file" class="form-control" id="bannerimage" name="bannerimage">                     
                      @if (!empty($banner['image']))
                        <br>
                        <a href="{{url('/front/images/banners/'. $banner['image'])}}" target="_blank">
                          <img style="width: 80px; margin: 10px" src="{{URL::asset('/front/images/banners/'. $banner['image'])}}">
                        </a>                       
                        <input type="hidden" name="hidden_image" value="{{$banner['image']}}">
                        <a href="javascript:void(0)" record="banner-image" recordid="{{$banner->id}}" name="{{$banner->image}}" class="confirmDeleteImage" title="Delete Banner Image" style="color:#007bff">
                          <i class="fas fa-trash" style="color: white"></i>
                        </a>
                      @endif
                    </div>                                        
                    <div class="form-group">
                      <label for="bannertitle">Banner Title</label>
                      <input type="text" class="form-control" id="bannertitle" name="bannertitle" placeholder="Enter Banner Title" @if (!empty($banner['title'])) value="{{$banner['title']}}" @else value="{{old('bannertitle')}}" @endif> 
                    </div>
                    <div class="form-group">
                      <label for="banneralt">Banner Alt</label>
                      <input type="text" class="form-control" id="banneralt" name="banneralt" placeholder="Enter Banner Alt" @if (!empty($banner['alt'])) value="{{$banner['alt']}}" @else value="{{old('banneralt')}}" @endif> 
                    </div>
                    <div class="form-group">
                      <label for="bannerlink">Banner Link</label>
                      <input type="text" class="form-control" id="bannerlink" name="bannerlink" placeholder="Enter Banner Link" @if (!empty($banner['link'])) value="{{$banner['link']}}" @else value="{{old('bannerlink')}}" @endif> 
                    </div>
                    <div class="form-group">
                      <label for="bannersort">Banner Sort</label>
                      <input type="number" class="form-control" id="bannersort" name="bannersort" placeholder="Enter Banner Sort" @if (!empty($banner['sort'])) value="{{$banner['sort']}}" @else value="{{old('bannersort')}}" @endif> 
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