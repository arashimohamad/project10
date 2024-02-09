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

              <form id="couponForm" name="couponForm" 
                @if (empty($coupon['id']))
                  action="{{url('admin/add-edit-coupon')}}"                  
                @else
                  action="{{url('admin/add-edit-coupon/'.$coupon['id'])}}"
                @endif 
                method="post" enctype="multipart/form-data">

                @csrf
                
                <div class="card-body">
                  <div class="form-group">
                    <label for="coupon_option">Coupon Option *</label>&nbsp;&nbsp;
                    <input type="radio" id="AutomaticCoupon" name="coupon_option" value="Automatic" checked>&nbsp;Automatic&nbsp;&nbsp;                   
                    <input type="radio" id="ManualCoupon" name="coupon_option" value="Manual">&nbsp;Manual&nbsp;&nbsp;                    
                  </div>
                  <div class="form-group" style="display: none" id="couponField">
                    <label for="coupon_code">Coupon Code *</label>
                    <input type="text" class="form-control" id="coupon_code" name="coupon_code" placeholder="Enter Coupon Code">                    
                  </div>
                  <div class="form-group">
                    <label for="coupon_type">Coupon Type *</label>&nbsp;&nbsp;
                    <input type="radio" name="coupon_type" value="Single Time" checked>&nbsp;Single Time&nbsp;&nbsp;                   
                    <input type="radio" name="coupon_type" value="Multiple Times">&nbsp;Multiple Times&nbsp;&nbsp;                    
                  </div>
                  <div class="form-group">
                    <label for="coupon_amounttype">Amount Type *</label>&nbsp;&nbsp;
                    <input type="radio" name="coupon_amounttype" value="Percentage" checked>&nbsp;Percentage&nbsp;&nbsp;                   
                    <input type="radio" name="coupon_amounttype" value="Fixed">&nbsp;Fixed&nbsp;&nbsp;                    
                  </div>
                  <div class="form-group">
                    <label for="coupon_amount">Amount *</label>
                    <input type="text" class="form-control" id="coupon_amount" name="coupon_amount" placeholder="Enter Amount" value="{{@old('coupon_amount')}}">                    
                  </div>                  
                  <div class="form-group">
                    <label for="coupon_categories">Select Category *</label>
                    <select name="coupon_categories[]" multiple="" class="form-control">                       
                      @foreach ($getCategories as $cat)                 {{-- one category level --}}               
                        <option value="{{$cat->id}}" style="font-weight: bold;">{{$cat->category_name}}</option>
                        {{-- cek jika subcategories ada/tidak, sila rujuk Category model --}}
                        @if (!empty($cat->subcategories))
                          @foreach ($cat->subcategories as $subcat)     {{-- sub category --}}
                            <option value="{{$subcat->id}}" style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&raquo;{{$subcat->category_name}}</option>
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
                    <label for="coupon_brands">Brand</label>                      
                    <select class="form-control" name="coupon_brands[]" multiple="">                   
                      @foreach ($getBrands as $brand )                       
                        <option value="{{ $brand['id'] }}">{{$brand['brand_name']}}</option>                                                  
                      @endforeach
                    </select>
                  </div>                  
                  <div class="form-group">
                    <label for="coupon_users">Select User *</label>                      
                    <select class="form-control" name="coupon_users[]" multiple="">                   
                      @foreach ($getUsers as $user )                       
                        <option value="{{ $user['email'] }}">{{$user['email']}}</option>                                                  
                      @endforeach
                    </select>
                  </div>                  
                  <div class="form-group">
                    <label for="coupon_expirydate">Expiry Date *</label>
                    <input type="date" class="form-control" id="coupon_expirydate" name="coupon_expirydate" placeholder="Enter Expiry Date" value="">                    
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

<!-- Start Modal coupon Video -->   
  {{-- @include('admin.coupons.modalcouponvideo')    --}}
<!-- End Modal coupon Video -->

@endsection