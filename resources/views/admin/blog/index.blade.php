@extends('admin.layout.master')
@section('container')

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Blog</h4>
              <a href="{{ route('admin.blogs_add') }}"> Add Blog </a>

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">All Blog</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

     @foreach ($blogs as $blog )
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{!! json_decode($blog['name'])->{app()->getLocale()} !!}</strong></td>
                        <td>
                          <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                            <li
                              data-bs-toggle="tooltip"
                              data-popup="tooltip-custom"
                              data-bs-placement="top"
                              class="avatar avatar-xs pull-up"
                              title="Blog Image"
                            >
                              <img src="{{  (!empty($blog->image)? url('upload/blog_images/'.$blog->image):asset('/admin/assets/img/avatars/1.png')  )}}"alt="Avatar" class="rounded-circle" />
                            </li>
                         
                          
                          </ul>
                        </td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{!! json_decode($blog['title'])->{app()->getLocale()} !!}</strong></td>
                        <td>
                          <a href="{{ route('admin.blog_edit',$blog->id) }}" class="btn btn-outline-primary">Edit Blog</a>
                          <a href="{{ route('admin.blog_delete',$blog->id) }}" class="btn btn-outline-danger">Delete Blog</a>
                        </td>
                      </tr>
                   
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

              <hr class="my-5" />
            </div>
            <!-- / Content -->

      

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
     


        <script src="{{ asset('/admin/js/file-upload.js') }}"></script>
        <script src="{{ asset('/admin/js/translate.js') }}"></script>
    
@endsection