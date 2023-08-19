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
                    <label for="familycolor">Family Color *</label>                      
                    <select class="form-control" name="familycolor" id="familycolor">
                      <option value="">Select</option>
                      <option value="Black" @if (!empty(@old('familycolor')) && @old('familycolor')=="Black") {{"selected"}} @elseif(!empty($product['family_color'] && $product['family_color'] == "Black")) {{"selected"}} @endif>Black</option>
                      <option value="Blue" @if (!empty(@old('familycolor')) && @old('familycolor')=="Blue") {{"selected"}} @elseif(!empty($product['family_color'] && $product['family_color'] == "Blue")) {{"selected"}} @endif>Blue</option>
                      <option value="Green" @if (!empty(@old('familycolor')) && @old('familycolor')=="Green") {{"selected"}} @elseif(!empty($product['family_color'] && $product['family_color'] == "Green")) {{"selected"}} @endif>Green</option>
                      <option value="Grey" @if (!empty(@old('familycolor')) && @old('familycolor')=="Grey") {{"selected"}} @elseif(!empty($product['family_color'] && $product['family_color'] == "Grey")) {{"selected"}} @endif>Grey</option>
                      <option value="Golden" @if (!empty(@old('familycolor')) && @old('familycolor')=="Golden") {{"selected"}} @elseif(!empty($product['family_color'] && $product['family_color'] == "Golden")) {{"selected"}} @endif>Golden</option>
                      <option value="Orange" @if (!empty(@old('familycolor')) && @old('familycolor')=="Orange") {{"selected"}} @elseif(!empty($product['family_color'] && $product['family_color'] == "Orange")) {{"selected"}} @endif>Orange</option>
                      <option value="Red" @if (!empty(@old('familycolor')) && @old('familycolor')=="Red") {{"selected"}} @elseif(!empty($product['family_color'] && $product['family_color'] == "Red")) {{"selected"}} @endif>Red</option>
                      <option value="Silver" @if (!empty(@old('familycolor')) && @old('familycolor')=="Silver") {{"selected"}} @elseif(!empty($product['family_color'] && $product['family_color'] == "Silver")) {{"selected"}} @endif>Silver</option>
                      <option value="White" @if (!empty(@old('familycolor')) && @old('familycolor')=="White") {{"selected"}} @elseif(!empty($product['family_color'] && $product['family_color'] == "White")) {{"selected"}} @endif>White</option>
                      <option value="Yellow" @if (!empty(@old('familycolor')) && @old('familycolor')=="Yellow") {{"selected"}} @elseif(!empty($product['family_color'] && $product['family_color'] == "Yellow")) {{"selected"}} @endif>Yellow</option>
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
                    <label for="prodvideo">Product Video</label>
                    <input type="file" class="form-control" id="prodvideo" name="prodvideo"> 
                    @if (!empty($product['product_video']))
                      {{-- <a href="{{ url('front/videos/products/'.$product['product_video']) }}" target="_blank" style="color:#ccc">View TEST</a> --}}
                      <a href="" style="text-decoration:none !important; color:#ccc" data-toggle="modal" data-target="#modalproductvideo" onclick="enableAutoplay()"><i class="fa fa-eye"></i></a>
                      &nbsp; |&nbsp;
                      <a href="javascript:void(0)" record="product-video" recordid="{{$product->id}}" name="{{$product->product_name}} Product" class="confirmDeleteVideo" title="Delete Product Video" style="color:#ccc">
                        <i class="fa fa-trash-alt"></i>
                      </a>                     
                    @endif                                          
                  </div>
                  <div class="form-group">
                    <label for="fabric">Fabric</label>                      
                    <select class="form-control" name="fabric" id="fabric">
                      <option value="">Select</option>                      
                      @foreach ($productsFilters['fabricArray'] as $fa )                       
                        <option value="{{$fa}}" @if (!empty(@old('fabric')) && @old('fabric')==$fa) {{"selected"}} @elseif(!empty($product['fabric'] && $product['fabric'] == $fa)) {{"selected"}} @endif>{{$fa}}</option>                                                  
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="sleeve">Sleeve</label>                      
                    <select class="form-control" name="sleeve" id="sleeve">
                      <option value="">Select</option>
                      @foreach ($productsFilters['sleeveArray'] as $sleeve )
                        <option value="{{$sleeve}}" @if (!empty(@old('sleeve')) && @old('sleeve')==$sleeve) {{"selected"}} @elseif(!empty($product['sleeve'] && $product['sleeve'] == $sleeve)) {{"selected"}} @endif>{{$sleeve}}</option>                                                  
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="pattern">Pattern</label>                      
                    <select class="form-control" name="pattern" id="pattern">
                      <option value="">Select</option>
                      @foreach ($productsFilters['patternArray'] as $pattern )
                        <option value="{{$pattern}}" @if (!empty(@old('pattern')) && @old('pattern')==$pattern) {{"selected"}} @elseif(!empty($product['pattern'] && $product['pattern'] == $pattern)) {{"selected"}} @endif>{{$pattern}}</option>                                                  
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="fit">Fit</label>                      
                    <select class="form-control" name="fit" id="fit">
                      <option value="">Select</option>
                      @foreach ($productsFilters['fitArray'] as $fit )
                        <option value="{{$fit}}" @if (!empty(@old('fit')) && @old('fit')==$fit) {{"selected"}} @elseif(!empty($product['fit'] && $product['fit'] == $fit)) {{"selected"}} @endif>{{$fit}}</option>                                                  
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="occasion">Occasion</label>                      
                    <select class="form-control" name="occasion" id="occasion">
                      <option value="">Select</option>
                      @foreach ($productsFilters['occasionArray'] as $occasion )
                        <option value="{{$occasion}}" @if (!empty(@old('occasion')) && @old('occasion')==$occasion) {{"selected"}} @elseif(!empty($product['occasion'] && $product['occasion'] == $occasion)) {{"selected"}} @endif>{{$occasion}}</option>                                                  
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