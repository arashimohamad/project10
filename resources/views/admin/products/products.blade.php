@extends('admin.layout.layout')
@section('content')    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Products</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">

          @include('admin.includes.messages')
          
          <div class="card">
            
              <div class="card-header">
                <h3 class="card-title">Products</h3> 
                <a href="{{url('admin/add-edit-product')}}" class="btn btn-primary btn-block" style="max-width: 150px; float:right; display:inline-block">Add Product</a>               
              </div>
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="products" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Product Color</th>
                    <th>Category</th>
                    <th>Parent Category</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $prod)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$prod->product_name}}</td>
                      <td>{{$prod->product_code}}</td>
                      <td>{{$prod->product_color}}</td>
                      <td>{{$prod->category->category_name}}</td>
                      <td>
                        @isset($prod->category->parentcategory->category_name)
                          {{$prod->category->parentcategory->category_name}}                              
                        @endisset
                      </td>
                      <td>
                        
                          @if ($prod->status == 1)
                            {{-- Please refer to custom.js on layout for updateProductStatus --}}
                            <a href="javascript:void(0)" class="updateProductStatus" id="product-{{$prod->id}}" product_id="{{$prod->id}}" style="color:#007bff">
                              <i class="fas fa-toggle-on" status="Active"></i>
                            </a>                            
                          @else
                            <a href="javascript:void(0)" class="updateProductStatus" id="product-{{$prod->id}}" product_id="{{$prod->id}}" style="color: grey">
                              <i class="fas fa-toggle-off" status="Inactive"></i>
                            </a>
                          @endif
                          &nbsp;&nbsp;

                          <a href="{{url('admin/add-edit-product/'.$prod->id)}}" style="color:#007bff"><i class="fas fa-edit"></i></a>
                          &nbsp;&nbsp;                
                        
                          {{-- for SweetAlert2 --}}
                          <a href="javascript:void(0)" record="product" recordid="{{$prod->id}}" name="{{$prod->product_name}} Product" class="confirmDelete" title="Delete Product" style="color:#007bff">
                            <i class="fas fa-trash"></i>
                          </a>
                        
                      </td>
                    </tr> 
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Product Code</th>
                    <th>Product Color</th>
                    <th>Category</th>
                    <th>Parent Category</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection