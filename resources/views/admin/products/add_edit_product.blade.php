@extends('admin.layout.layout')
@section('content') 
@php use App\Models\Color; @endphp
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

              <form id="productForm" name="productForm" 
                @if (empty($product['id']))
                  action="{{url('admin/add-edit-product')}}"                  
                @else
                  action="{{url('admin/add-edit-product/'.$product['id'])}}"
                @endif 
                method="post" enctype="multipart/form-data">

                @csrf
                
                <div class="card-body">
                  <div class="form-group">
                    <label for="categoryID">Select Category *</label>
                    <select name="categoryID" class="form-control">
                      <option value="">Select</option>                        
                      @foreach ($getCategories as $cat)                 {{-- one category level --}}               
                        <option @if (!empty(@old('categoryID')) && $cat->id == @old('categoryID')) selected="" @elseif(!empty($product['category_id'] && $product['category_id'] == $cat->id)) selected="" @endif value="{{$cat->id}}" style="font-weight: bold;">{{$cat->category_name}}</option>
                        {{-- cek jika subcategories ada/tidak, sila rujuk Category model --}}
                        @if (!empty($cat->subcategories))
                          @foreach ($cat->subcategories as $subcat)     {{-- sub category --}}
                            <option @if (!empty(@old('categoryID')) && $subcat->id == @old('categoryID')) selected="" @elseif(!empty($product['category_id'] && $product['category_id'] == $subcat->id)) selected="" @endif value="{{$subcat->id}}" style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&raquo;{{$subcat->category_name}}</option>
                            @if (!empty($subcat->subcategories))        {{-- sub sub category --}}
                              @foreach ($subcat->subcategories as $subsubcat)
                                <option @if (!empty(@old('categoryID')) && $subsubcat->id == @old('categoryID')) selected="" @elseif(!empty($product['category_id'] && $product['category_id'] == $subsubcat->id)) selected="" @endif value="{{$subsubcat->id}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&raquo;{{$subsubcat->category_name}}</option>
                              @endforeach
                            @endif
                          @endforeach
                        @endif
                      @endforeach
                    </select>                      
                  </div>

                  <div class="form-group">
                    <label for="prodbrand_id">Brand</label>                      
                    <select class="form-control" name="prodbrand_id" id="prodbrand_id">
                      <option value="">Select</option>                      
                      @foreach ($getBrands as $brd )                       
                        <option value="{{$brd->id}}" 
                          @if(!empty($product['brand_id'] && $product['brand_id'] == $brd->id)) 
                            {{"selected"}} 
                          @endif>
                          {{$brd->brand_name}}
                        </option>                                                  
                      @endforeach
                    </select>
                  </div>                    

                  <div class="form-group">
                    <label for="prodname">Product Name *</label>
                    <input type="text" class="form-control" id="prodname" name="prodname" placeholder="Enter Product Name" @if (!empty($product['product_name'])) value="{{$product['product_name']}}" @else value="{{@old('prodname')}}" @endif>                    
                  </div>
                  <div class="form-group">
                    <label for="prodcode">Product Code *</label>
                    <input type="text" class="form-control" id="prodcode" name="prodcode" placeholder="Enter Product Code" @if (!empty($product['product_code'])) value="{{$product['product_code']}}" @else value="{{@old('prodcode')}}" @endif>                    
                  </div>
                  <div class="form-group">
                    <label for="prodcolor">Product Color *</label>
                    <input type="text" class="form-control" id="prodcolor" name="prodcolor" placeholder="Enter Product Color" @if (!empty($product['product_color'])) value="{{$product['product_color']}}" @else value="{{@old('prodcolor')}}" @endif>                    
                  </div>

                  <div class="form-group">
                    @php $familyColors = Color::colors(); @endphp
                    <label for="familycolor">Family Color *</label>                      
                    <select class="form-control" name="familycolor" id="familycolor">
                      <option value="">Select</option>
                      @foreach ($familyColors as $color)
                          <option value="{{$color['color_name']}}" 
                            @if (!empty(@old('familycolor')) && @old('familycolor') == $color['color_name']) 
                              {{"selected"}} 
                            @elseif(!empty($product['family_color'] && $product['family_color'] == $color['color_name'])) 
                              {{"selected"}} 
                            @endif>{{$color->color_name}}                          
                          </option>
                      @endforeach
                    </select>
                  </div>
                  
                  <div class="form-group">
                    <label for="groupcode">Group Code</label>
                    <input type="text" class="form-control" id="groupcode" name="groupcode" placeholder="Enter Group Code" @if (!empty($product['group_code'])) value="{{$product['group_code']}}" @else value="{{@old('groupcode')}}" @endif>                    
                  </div>
                  <div class="form-group">
                    <label for="prodprice">Product Price *</label>
                    <input type="text" class="form-control" id="prodprice" name="prodprice" placeholder="Enter Product Price" @if (!empty($product['product_price'])) value="{{$product['product_price']}}" @else value="{{@old('prodprice')}}" @endif>                    
                  </div>
                  <div class="form-group">
                    <label for="proddiscount">Product Discount (%)</label>
                    <input type="text" class="form-control" id="proddiscount" name="proddiscount" placeholder="Enter Product Discount (%)" @if (!empty($product['product_discount'])) value="{{$product['product_discount']}}" @else value="{{@old('proddiscount')}}" @endif>                    
                  </div>
                  <div class="form-group">
                    <label for="prodweight">Product Weight</label>
                    <input type="text" class="form-control" id="prodweight" name="prodweight" placeholder="Enter Product Weight" @if (!empty($product['product_weight'])) value="{{$product['product_weight']}}" @else value="{{@old('prodweight')}}" @endif>                    
                  </div>

                  <div class="form-group">
                    <label for="prodimages">Product Images (Recommend Size: 1040 x 1200)</label>
                    <input type="file" class="form-control" id="prodimages" name="prodimages[]" multiple>
                    <table cellpadding="4" cellspacing="4" border="1" style="margin:10px">
                      <tr>
                        @foreach ($product['images'] as $image)
                          <td style="background-color:#f9f9f9">
                            <a href="{{ url('front/images/products/large/'.$image['image']) }}" target="_blank">
                              <img src="{{ asset('front/images/products/small/'.$image['image']) }}" style="width:60px;">  {{---small image as thumbnail--}}
                            </a>&nbsp;
                            <input type="hidden" id="img" name="img[]" value="{{$image['image']}}" style="width: 160px">
                            <input type="text" id="imgsort" name="imgsort[]" value="{{$image['image_sort']}}" style="width: 30px">
                            <a href="javascript:void(0)" record="product-image" recordid="{{$image->id}}" class="confirmDeleteImage" title="Delete Product Image" style="color:#3f6ed3;">
                              <i class="fas fa-trash"></i>
                            </a>
                          </td>
                        @endforeach
                      </tr>
                    </table> 
                  </div>

                  @if (count($product['attributes']) > 0)
                    <div class="form-group">
                      <label>Added Attributes</label>
                      <table style="background-color: #52585E; width:100%;" cellpadding="5" border="0">                      
                        <tr style="text-align: center">
                          <th>#</th>
                          <th>Size</th>
                          <th>SKU</th>
                          <th>Price (RM)</th>
                          <th>Stock</th>
                          <th>Actions</th>
                        </tr>                    
                        @foreach ($product['attributes'] as $attribute)
                          <input type="hidden" name="attributeID[]" value="{{$attribute['id']}}">
                          <tr>
                            <td style="text-align: center">{{$loop->iteration}}</td>
                            <td style="text-align: center">{{$attribute['size']}}</td>
                            <td style="text-align: center">{{$attribute['sku']}}</td>
                            <td style="text-align: center">
                              <input type="number" style="width:80px;" name="attr_price[]" value="{{$attribute['price']}}">
                            </td>
                            <td style="text-align: center">
                              <input type="number" style="width:80px;" name="attr_stock[]" value="{{$attribute['stock']}}">
                            </td>                            
                            <td style="text-align: center">
                              @if ($attribute->status == 1)
                                {{-- Please refer to custom.js on layout for updateAttributeStatus --}}
                                <a href="javascript:void(0)" class="updateAttributeStatus" id="attribute-{{$attribute->id}}" attribute_id="{{$attribute->id}}" style="color:#f9f9f9">
                                  <i class="fas fa-toggle-on" status="Active"></i>
                                </a>                            
                              @else
                                <a href="javascript:void(0)" class="updateAttributeStatus" id="attribute-{{$attribute->id}}" attribute_id="{{$attribute->id}}" style="color: grey">
                                  <i class="fas fa-toggle-off" status="Inactive"></i>
                                </a>
                              @endif
                              &nbsp;&nbsp;                                      
                              {{-- for SweetAlert2 --}}
                              <a href="javascript:void(0)" record="attribute" recordid="{{$attribute->id}}" name="{{$attribute->size}} Attribute" class="confirmDeleteAttribute" title="Delete Attribute" style="color:#007bff">
                                <i class="fas fa-trash" style="color:#f9f9f9"></i>
                              </a>
                            </td>
                          </tr>
                        @endforeach                      
                      </table>
                    </div>
                  @endif

                  <div class="form-group">
                    <label>Add Attributes</label>
                    <div class="field_wrapper">
                        <div>
                            <input type="text" id="size" name="size[]" placeholder="Size" style="width: 120px">
                            <input type="text" id="sku" name="sku[]" placeholder="SKU" style="width: 120px">
                            <input type="text" id="price" name="price[]" placeholder="Price" style="width: 120px">
                            <input type="text" id="stock" name="stock[]" placeholder="Stock" style="width: 120px">&nbsp;&nbsp;
                            <a href="javascript:void(0);" class="add_button" title="Add field">&nbsp;<i class="fas fa-plus-circle" style="color: #f9f9f9"></i></a>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="prodvideo">Product Video (Recommend Size: Less than 2MB)</label>
                    <input type="file" class="form-control" id="prodvideo" name="prodvideo"> 
                    @if (!empty($product['product_video']))
                      <a href="" style="text-decoration:none !important; color:#ccc" data-toggle="modal" data-target="#modalproductvideo" onclick="enableAutoplay()">
                        <i class="fas fa-laptop"></i>
                      </a>
                      &nbsp; | &nbsp;
                      <a href="javascript:void(0)" record="product-video" recordid="{{$product->id}}" name="{{$product->product_name}} Product" class="confirmDeleteVideo" title="Delete Product Video" style="color:#ccc">
                        <i class="fas fa-trash-alt"></i>
                      </a>                     
                    @endif                                          
                  </div>

                  <div class="form-group">
                    <label for="fabric">Fabric</label>                      
                    <select class="form-control" name="fabric" id="fabric">
                      <option value="">Select</option>                      
                      @foreach ($productsFilters['fabricArray'] as $fa )                       
                        <option value="{{$fa}}" 
                          @if (!empty(@old('fabric')) && @old('fabric')==$fa) 
                            {{"selected"}} 
                          @elseif(!empty($product['fabric'] && $product['fabric'] == $fa)) 
                            {{"selected"}} 
                          @endif>{{$fa}}
                        </option>                                                  
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="sleeve">Sleeve</label>                      
                    <select class="form-control" name="sleeve" id="sleeve">
                      <option value="">Select</option>
                      @foreach ($productsFilters['sleeveArray'] as $sleeve )
                        <option value="{{$sleeve}}" 
                          @if (!empty(@old('sleeve')) && @old('sleeve')==$sleeve) 
                            {{"selected"}} 
                          @elseif(!empty($product['sleeve'] && $product['sleeve'] == $sleeve)) 
                            {{"selected"}} 
                          @endif>{{$sleeve}}
                        </option>                                                  
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="pattern">Pattern</label>                      
                    <select class="form-control" name="pattern" id="pattern">
                      <option value="">Select</option>
                      @foreach ($productsFilters['patternArray'] as $pattern )
                        <option value="{{$pattern}}" 
                          @if (!empty(@old('pattern')) && @old('pattern')==$pattern) 
                            {{"selected"}} 
                          @elseif(!empty($product['pattern'] && $product['pattern'] == $pattern)) 
                            {{"selected"}}
                          @endif>{{$pattern}}
                        </option>                                                  
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="fit">Fit</label>                      
                    <select class="form-control" name="fit" id="fit">
                      <option value="">Select</option>
                      @foreach ($productsFilters['fitArray'] as $fit )
                        <option value="{{$fit}}" 
                          @if (!empty(@old('fit')) && @old('fit')==$fit) 
                            {{"selected"}} 
                          @elseif(!empty($product['fit'] && $product['fit'] == $fit)) 
                            {{"selected"}} 
                          @endif>{{$fit}}
                        </option>                                                  
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="occasion">Occasion</label>                      
                    <select class="form-control" name="occasion" id="occasion">
                      <option value="">Select</option>
                      @foreach ($productsFilters['occasionArray'] as $occasion )
                        <option value="{{$occasion}}" 
                          @if (!empty(@old('occasion')) && @old('occasion')==$occasion) 
                            {{"selected"}} 
                          @elseif(!empty($product['occasion'] && $product['occasion'] == $occasion)) 
                            {{"selected"}} 
                          @endif>{{$occasion}}
                        </option>                                                  
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="descr">Description</label>
                    <textarea class="form-control" name="descr" id="descr" rows="3" placeholder="Enter Description">@if (!empty($product['description'])) {{$product['description']}} @else {{@old('descr')}} @endif</textarea>                                       
                  </div>
                  <div class="form-group">
                    <label for="washcare">Wash Care</label>
                    <textarea class="form-control" name="washcare" id="washcare" rows="3" placeholder="Enter Wash Care">@if (!empty($product['wash_care'])) {{$product['wash_care']}} @else {{@old('washcare')}} @endif</textarea>                                                                         
                  </div>
                  <div class="form-group">
                    <label for="searchkeywords">Search Keywords</label>
                    <textarea class="form-control" id="searchkeywords" name="searchkeywords" rows="3" placeholder="Enter Search Keywords">@if (!empty($product['search_keywords'])) {{$product['search_keywords']}} @else {{@old('searchkeywords')}} @endif</textarea>                      
                  <div class="form-group">
                    <label for="metatitle">Meta Title</label>
                    <input type="text" class="form-control" id="metatitle" name="metatitle" placeholder="Enter Meta Title" @if (!empty($product['meta_title'])) value="{{$product['meta_title']}}" @else value="{{@old('metatitle')}}" @endif>
                  </div>
                  <div class="form-group">
                    <label for="metadesc">Meta Description</label>
                    <input type="text" class="form-control" id="metadesc" name="metadesc" placeholder="Enter Meta Description" @if (!empty($product['meta_description'])) value="{{$product['meta_description']}}" @else value="{{@old('metadesc')}}" @endif>
                  </div>
                  <div class="form-group">
                    <label for="metakeys">Meta Keywords</label>
                    <input type="text" class="form-control" id="metakeys" name="metakeys" placeholder="Enter Meta Keywords" @if (!empty($product['meta_keywords'])) value="{{$product['meta_keywords']}}" @else value="{{@old('metakeys')}}" @endif>
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="isfeatured" name="isfeatured" value="Yes" 
                      @if (!empty($product['is_featured'] && $product['is_featured'] == "Yes")) {{"checked"}} @endif>
                      <label class="form-check-label">Featured Item</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="isbestseller" name="isbestseller" value="Yes" 
                      @if (!empty($product['is_bestseller'] && $product['is_bestseller'] == "Yes")) {{"checked"}} @endif>
                      <label class="form-check-label">Best Seller</label>
                    </div>
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

<!-- Start Modal Product Video -->   
  @include('admin.products.modalproductvideo')   
<!-- End Modal Product Video -->

@endsection