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
                      <input type="text" class="form-control" id="catname" name="catname" placeholder="Enter Category Name" @if (!empty($category['category_name'])) value="{{$category['category_name']}}" @else value="{{old('catname')}}" @endif> 
                    </div>
                    <div class="form-group">
                      <label for="getcat">Category Level (Parent Category)*</label>
                      <select name="parentID" class="form-control">
                        <option value="">Select</option>
                        <option value="0" @if ($category->parent_id == 0) selected="" @endif>Main Category</option>
                        @foreach ($getCategories as $cat)                 {{-- one category level --}}               
                          <option @if(isset($category->parent_id) && $category->parent_id == $cat->id) selected @endif value="{{$cat->id}}" style="font-weight: bold;">{{$cat->category_name}}</option>
                          {{-- cek jika subcategories ada/tidak, sila rujuk Category model --}}
                          @if (!empty($cat->subcategories))
                            @foreach ($cat->subcategories as $subcat)     {{-- sub category --}}
                              <option @if(isset($category->parent_id) && $category->parent_id == $subcat->id) selected @endif value="{{$subcat->id}}" style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&raquo;{{$subcat->category_name}}</option>
                              @if (!empty($subcat->subcategories))        {{-- sub sub category --}}
                                @foreach ($subcat->subcategories as $subsubcat)
                                  <option value="{{$subsubcat->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&raquo;{{$subsubcat->category_name}}</option>
                                @endforeach
                              @endif
                            @endforeach
                          @endif
                        @endforeach
                      </select>                      
                    </div>
                    <div class="form-group">
                      <label for="catimage">Category Image</label>
                      <input type="file" class="form-control" id="catimage" name="catimage">                     
                      @if (!empty($category['category_image']))
                        <br>
                        <a href="{{url('/front/images/categories/'. $category['category_image'])}}" target="_blank">
                          <img style="width: 80px; margin: 10px" src="{{URL::asset('/front/images/categories/'. $category['category_image'])}}">
                        </a>                       
                        <input type="hidden" name="hidden_image" value="{{$category['category_image']}}">
                        {{-- <a href="{{url('front/images/categories/'.Auth::guard('admin')->user()->image)}}" target="_blank">View Photo</a> --}}
                        <a href="javascript:void(0)" record="category-image" recordid="{{$category->id}}" name="{{$category->category_image}}" class="confirmDeleteImage" title="Delete Category Image" style="color:#007bff">
                          <i class="fas fa-trash" style="color: white"></i>
                        </a>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="catdiscount">Category Discount</label>
                      <input type="text" class="form-control" id="catdiscount" name="catdiscount" placeholder="Enter Category Discount" @if (!empty($category['category_discount'])) value="{{$category['category_discount']}}" @else value="{{old('catdiscount')}}" @endif>                    
                    </div>
                    <div class="form-group">
                      <label for="url">Category URL*</label>
                      <input type="text" class="form-control" id="url" name="url" placeholder="Enter Category URL" @if (!empty($category['url'])) value="{{$category['url']}}" @else value="{{old('url')}}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="description">Description*</label>
                      <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Category Description">@if (!empty($category['description'])) {{$category['description']}} @else {{old('description')}} @endif</textarea>
                    </div>
                    <div class="form-group">
                      <label for="metatitle">Meta Title</label>
                      <input type="text" class="form-control" id="metatitle" name="metatitle" placeholder="Enter Meta Title" @if (!empty($category['meta_title'])) value="{{$category['meta_title']}}" @else value="{{old('metatitle')}}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="metadesc">Meta Description</label>
                      <input type="text" class="form-control" id="metadesc" name="metadesc" placeholder="Enter Meta Description" @if (!empty($category['meta_description'])) value="{{$category['meta_description']}}" @else value="{{old('metadesc')}}" @endif>
                    </div>
                    <div class="form-group">
                      <label for="metakey">Meta Keywords</label>
                      <input type="text" class="form-control" id="metakey" name="metakey" placeholder="Enter Meta Keywords" @if (!empty($category['meta_keywords'])) value="{{$category['meta_keywords']}}" @else value="{{old('metakey')}}" @endif>
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