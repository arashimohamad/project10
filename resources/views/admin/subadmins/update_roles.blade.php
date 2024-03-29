@extends('admin.layout.layout')
@section('content')    
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Subadmins</h1>
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
            {{-- <h3 class="card-title">{!!$subadminAccount!!}</h3> --}}
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

                <form id="subadminPermissionForm" name="subadminPermissionForm" action="{{url('admin/update-role/'.$id)}}" method="post" enctype="multipart/form-data">
                  @csrf
                  
                  {{-- check if subadminRoles data is coming or not --}}
                  @if (!empty($subadminRoles))
                    @foreach ($subadminRoles as $role)                   
                      
                      @if ($role->module == "cms_pages")
                        @if ($role->view_access == 1)
                          @php $viewCMSPages = "checked" @endphp
                        @else
                          @php $viewCMSPages = "" @endphp
                        @endif
                        @if ($role->edit_access == 1)
                          @php $editCMSPages = "checked" @endphp
                        @else
                          @php $editCMSPages = "" @endphp
                        @endif
                        @if ($role->full_access == 1)
                          @php $fullCMSPages = "checked" @endphp
                        @else
                          @php $fullCMSPages = "" @endphp
                        @endif
                      @endif

                      @if ($role->module == "categories")
                        @if ($role->view_access == 1)
                          @php $viewCategories = "checked" @endphp
                        @else
                          @php $viewCategories = "" @endphp
                        @endif
                        @if ($role->edit_access == 1)
                          @php $editCategories = "checked" @endphp
                        @else
                          @php $editCategories = "" @endphp
                        @endif
                        @if ($role->full_access == 1)
                          @php $fullCategories = "checked" @endphp
                        @else
                          @php $fullCategories = "" @endphp
                        @endif
                      @endif 
                      
                      @if ($role->module == "products")
                        @if ($role->view_access == 1)
                          @php $viewProducts = "checked" @endphp
                        @else
                          @php $viewProducts = "" @endphp
                        @endif
                        @if ($role->edit_access == 1)
                          @php $editProducts = "checked" @endphp
                        @else
                          @php $editProducts = "" @endphp
                        @endif
                        @if ($role->full_access == 1)
                          @php $fullProducts = "checked" @endphp
                        @else
                          @php $fullProducts = "" @endphp
                        @endif
                      @endif      

                      @if ($role->module == "brands")
                        @if ($role->view_access == 1)
                          @php $viewBrands = "checked" @endphp
                        @else
                          @php $viewBrands = "" @endphp
                        @endif
                        @if ($role->edit_access == 1)
                          @php $editBrands = "checked" @endphp
                        @else
                          @php $editBrands = "" @endphp
                        @endif
                        @if ($role->full_access == 1)
                          @php $fullBrands = "checked" @endphp
                        @else
                          @php $fullBrands = "" @endphp
                        @endif
                      @endif 
                      
                      @if ($role->module == "coupons")
                        @if ($role->view_access == 1)
                          @php $viewCoupons = "checked" @endphp
                        @else
                          @php $viewCoupons = "" @endphp
                        @endif
                        @if ($role->edit_access == 1)
                          @php $editCoupons = "checked" @endphp
                        @else
                          @php $editCoupons = "" @endphp
                        @endif
                        @if ($role->full_access == 1)
                          @php $fullCoupons = "checked" @endphp
                        @else
                          @php $fullCoupons = "" @endphp
                        @endif
                      @endif
                    
                    @endforeach                    
                  @endif

                  <div class="card-body">
                    <input type="hidden" name="subadmin_id" value="{{$id}}">
                    
                    <div class="form-group col-md-6">
                      <label for="cms_pages">CMS Pages:&nbsp;&nbsp;&nbsp;</label>
                      <input type="checkbox" name="cms_pages[view]" value="1" @isset($viewCMSPages) {{$viewCMSPages}} @endisset>&nbsp;View Access
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="cms_pages[edit]" value="1" @isset($editCMSPages) {{$editCMSPages}} @endisset>&nbsp;View/Edit Access
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="cms_pages[full]" value="1" @isset($fullCMSPages) {{$fullCMSPages}} @endisset>&nbsp;Full Access
                    </div>
                    
                    <div class="form-group col-md-6">
                      <label for="categories">Categories:&nbsp;&nbsp;&nbsp;</label>
                      <input type="checkbox" name="categories[view]" value="1" @isset($viewCategories) {{$viewCategories}} @endisset>&nbsp;View Access
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="categories[edit]" value="1" @isset($editCategories) {{$editCategories}} @endisset>&nbsp;View/Edit Access
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="categories[full]" value="1" @isset($fullCategories) {{$fullCategories}} @endisset>&nbsp;Full Access
                    </div> 

                    <div class="form-group col-md-6">
                      <label for="products">Products:&nbsp;&nbsp;&nbsp;</label>
                      <input type="checkbox" name="products[view]" value="1" @isset($viewProducts) {{$viewProducts}} @endisset>&nbsp;View Access
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="products[edit]" value="1" @isset($editProducts) {{$editProducts}} @endisset>&nbsp;View/Edit Access
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="products[full]" value="1" @isset($fullProducts) {{$fullProducts}} @endisset>&nbsp;Full Access
                    </div> 

                    <div class="form-group col-md-6">
                      <label for="brands">Brands:&nbsp;&nbsp;&nbsp;</label>
                      <input type="checkbox" name="brands[view]" value="1" @isset($viewBrands) {{$viewBrands}} @endisset>&nbsp;View Access
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="brands[edit]" value="1" @isset($editBrands) {{$editBrands}} @endisset>&nbsp;View/Edit Access
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="brands[full]" value="1" @isset($fullBrands) {{$fullBrands}} @endisset>&nbsp;Full Access
                    </div> 

                    <div class="form-group col-md-6">
                      <label for="coupons">Coupons:&nbsp;&nbsp;&nbsp;</label>
                      <input type="checkbox" name="coupons[view]" value="1" @isset($viewCoupons) {{$viewCoupons}} @endisset>&nbsp;View Access
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="coupons[edit]" value="1" @isset($editCoupons) {{$editCoupons}} @endisset>&nbsp;View/Edit Access
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="checkbox" name="coupons[full]" value="1" @isset($fullCoupons) {{$fullCoupons}} @endisset>&nbsp;Full Access
                    </div>
                    
                    <div class="form-group col-md-6">
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