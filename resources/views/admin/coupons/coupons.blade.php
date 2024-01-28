@extends('admin.layout.layout')
@section('content')    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Coupons</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">Coupons</li>
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
                <h3 class="card-title">Coupons</h3>
                @if ($couponsModule['edit_access'] == 1 || $couponsModule['full_access'] == 1)
                  <a href="{{url('admin/add-edit-coupon')}}" class="btn btn-primary btn-block" style="max-width: 150px; float:right; display:inline-block">Add Coupons</a>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="coupons" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Code</th>
                      <th>Coupon Type</th>
                      <th>Amount</th>
                      <th>Expiry Date</th>
                      @if ($couponsModule['edit_access'] == 1 || $couponsModule['full_access'] == 1)
                        <th>Actions</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($coupons as $cpn)
                      {{-- Option 1 - $CmsPages = CmsPage::get(); --}}
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$cpn->coupon_code}}</td>
                        <td>{{$cpn->coupon_type}}</td>
                        <td>
                          @if ($cpn->amount_type == "Percentage")
                            {{$cpn->amount}}%  
                          @else
                            RM{{$cpn->amount}}                              
                          @endif
                        </td>
                        <td>{{date("j F Y, g:i a", strtotime($cpn->expiry_date))}}</td>
                        @if ($couponsModule['edit_access'] == 1 || $couponsModule['full_access'] == 1)
                          <td>                 

                            @if ($couponsModule['edit_access'] == 1 || $couponsModule['full_access'] == 1)
                              @if ($cpn->status == 1)
                                {{-- Please refer to custom.js on layout for updateCouponStatus --}}
                                <a href="javascript:void(0)" class="updateCouponStatus" id="coupon-{{$cpn->id}}" coupon_id="{{$cpn->id}}" style="color:#007bff">
                                  <i class="fas fa-toggle-on" status="Active"></i>
                                </a>                            
                              @else
                                <a href="javascript:void(0)" class="updateCouponStatus" id="coupon-{{$cpn->id}}" coupon_id="{{$cpn->id}}" style="color: grey">
                                  <i class="fas fa-toggle-off" status="Inactive"></i>
                                </a>
                              @endif
                              &nbsp;&nbsp;                            
                              <a href="{{url('admin/add-edit-coupon/'.$cpn->id)}}" style="color:#007bff"><i class="fas fa-edit"></i></a>
                              &nbsp;&nbsp;
                            @endif
                            @if ($couponsModule['full_access'] == 1)
                              {{-- for SweetAlert2 --}}
                              <a href="javascript:void(0)" record="coupon" recordid="{{$cpn->id}}" name="{{$cpn->coupon_code}} Coupon" class="confirmDelete" title="Delete Coupon" style="color:#007bff">
                              <i class="fas fa-trash"></i>
                              </a>
                              {{-- for normal alert
                              <a class="confirmDelete" name="CMS Page" title="Delete CMS Page" href="{{url('admin/delete-edit-cms-page/'.$cpn->id)}}" style="color:#007bff">
                              <i class="fas fa-trash"></i>
                              </a> --}}
                            @endif
                            
                          </td>
                        @endif
                      </tr> 

                      {{-- Option 2 - $CmsPages = CmsPage::get()->toArray();
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$page['title']}}</td>
                        <td>{{$page['url']}}</td>
                        <td>{{$page['created_at']}}</td>
                        <td></td>
                      </tr>  --}}

                    @endforeach
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Code</th>
                      <th>Coupon Type</th>
                      <th>Amount</th>
                      <th>Expiry Date</th>
                      @if ($couponsModule['edit_access'] == 1 || $couponsModule['full_access'] == 1)
                        <th>Actions</th>
                      @endif
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