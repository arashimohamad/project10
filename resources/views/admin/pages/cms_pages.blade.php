@extends('admin.layout.layout')
@section('content')    
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">CMS Pages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">CMS Pages</li>
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
                <h3 class="card-title">CMS Pages</h3>
                @if ($pagesModule['edit_access'] == 1 || $pagesModule['full_access'] == 1)
                  <a href="{{url('admin/add-edit-cms-page')}}" class="btn btn-primary btn-block" style="max-width: 150px; float:right; display:inline-block">Add CMS Page</a>
                @endif
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="cmspages" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>URL</th>
                      <th>Created On</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($CmsPages as $page)
                      {{-- Option 1 - $CmsPages = CmsPage::get(); --}}
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$page->title}}</td>
                        <td>{{$page->url}}</td>
                        <td>{{date("j F Y, g:i a", strtotime($page->created_at))}}</td>
                        <td>                 

                          @if ($pagesModule['edit_access'] == 1 || $pagesModule['full_access'] == 1)
                            @if ($page->status == 1)
                              {{-- Please refer to custom.js on layout for updateCmsPageStatus --}}
                              <a href="javascript:void(0)" class="updateCmsPageStatus" id="page-{{$page->id}}" page_id="{{$page->id}}" style="color:#007bff">
                                <i class="fas fa-toggle-on" status="Active"></i>
                              </a>                            
                            @else
                              <a href="javascript:void(0)" class="updateCmsPageStatus" id="page-{{$page->id}}" page_id="{{$page->id}}" style="color: grey">
                                <i class="fas fa-toggle-off" status="Inactive"></i>
                              </a>
                            @endif
                            &nbsp;&nbsp;                            
                            <a href="{{url('admin/add-edit-cms-page/'.$page->id)}}" style="color:#007bff"><i class="fas fa-edit"></i></a>
                            &nbsp;&nbsp;
                          @endif
                          @if ($pagesModule['full_access'] == 1)
                            {{-- for SweetAlert2 --}}
                            <a href="javascript:void(0)" record="cms-page" recordid="{{$page->id}}" name="{{$page->title}} Page" class="confirmDelete" title="Delete CMS Page" style="color:#007bff">
                            <i class="fas fa-trash"></i>
                            </a>
                            {{-- for normal alert
                            <a class="confirmDelete" name="CMS Page" title="Delete CMS Page" href="{{url('admin/delete-edit-cms-page/'.$page->id)}}" style="color:#007bff">
                            <i class="fas fa-trash"></i>
                            </a> --}}
                          @endif
                          
                        </td>
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
                      <th>Title</th>
                      <th>URL</th>
                      <th>Created On</th>
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