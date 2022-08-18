@extends('admin.layout.master')

@section('container')


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->
          

            <div class="container-xxl flex-grow-1 container-p-y">
                <div style=" display: flex;align-items: baseline;flex-direction: column-reverse;">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Slider </h4>
                </div>
          

              <!-- Examples -->
              <div class="row mb-5">
                <div class="col-md-4 col-lg-2 mb-3 card-body" style="border:1px solid #a1acb8;border-radius:8px">
                    @if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  @endif
                    <form enctype="multipart/form-data" id="formAccountSettings" method="POST" action="{{ route('admin.blog_update',$blog->id) }}">
                        @csrf
                         <div class="d-flex align-items-start align-items-sm-center gap-4">
                       
                             <div class="button-wrapper">
                                <img
                                src="{{  (!empty($blog->image)? url('upload/slider_images/'.$blog->image):asset('/admin/assets/img/avatars/1.png')  )}}"
                                alt="user-avatar"
                                class="d-block rounded"
                                height="100"
                                width="100"
                                id="uploadedAvatar"
                              />
    
                               <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0" style="margin-top:16px">
                                 <span class="d-none d-sm-block">Upload new photo</span>
                                 <i class="bx bx-upload d-block d-sm-none"></i>
                                 <input
                                   type="file"
                                   id="upload"
                                   class="account-file-input"
                                   hidden
                                   name="image"
                                   accept="image/png,image/jpeg,image/svg,image/jpg"
                                 />
                               </label>

                               <div class="mb-3 col-md-6">
                                <label for="alt" class="form-label">Name</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  id="alt"
                                  name="alt"
                                  value="{{ $blog->alt }}"
                                  placeholder="{{ $blog->name }}"
                                />
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="alt" class="form-label">Title</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  id="alt"
                                  name="alt"
                                  value="{{ $blog->title }}"
                                  placeholder="{{ $blog->title }}"
                                />
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="alt" class="form-label">Desc</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  id="alt"
                                  name="alt"
                                  value="{{ $blog->desc }}"
                                  placeholder="{{ $blog->desc }}"
                                />
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="alt" class="form-label">Author</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  id="alt"
                                  name="alt"
                                  value="{{ $blog->author }}"
                                  placeholder="{{ $blog->author }}"
                                />
                              </div>
                              <div class="mb-3 col-md-6">
                                <label for="alt" class="form-label">Slug</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  id="alt"
                                  name="alt"
                                  value="{{ $blog->slug }}"
                                  placeholder="{{ $blog->slug }}"
                                />
                              </div>

                               <button type="submit" class="btn btn-outline-secondary account-image-reset mb-4">
                                 <i class="bx bx-reset d-block d-sm-none"></i>
                                 <span class="d-none d-sm-block">Edit</span>
                               </button>
     
                               <p class="text-muted mb-0">Allowed JPG, GIF, JPEG, SVG or PNG. Max size of 150K</p>
                             </div>
                           </div>
                            </form>
                  </div>

              </div>
              <!-- Examples -->

            </div>
            <!-- / Content -->


            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    
@endsection