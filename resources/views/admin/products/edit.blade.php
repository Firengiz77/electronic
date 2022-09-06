@extends('admin.layout.master')

@section('container')


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->


            <div class="container-xxl flex-grow-1 container-p-y">
                <div style="display: flex;align-items: baseline;flex-direction: row;justify-content: space-between;">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Product </h4>

              <div class="lang">
                <a href="az" class="btn btn-success {{ app()->isLocale('az') ? 'active' : '' }}">Az</a>
                <a href="en" class="btn btn-success {{ app()->isLocale('en') ? 'active' : '' }}">En</a>
            </div>
                </div>


              <!-- Examples -->
              <div class="row mb-5">

                <div class="col-md-4 col-lg-2 mb-3 card-body">
                    @if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  @endif
                    <form enctype="multipart/form-data" id="formAccountSettings" method="POST" action="{{ route('admin.blog_update',$blog->id) }}">
                        @csrf
                                <img
                                    src="{{  (!empty($product->thumbnail)? url('uploads/products/'.$product->thumbnail):asset('/admin/assets/img/avatars/1.png')  )}}"
                                    alt="user-avatar"
                                class="d-block rounded"
                                height="150"
                                width="150"
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

                               <div class="mb-3 col-md-12 translate">
                                <label for="alt" class="form-label">Name</label>
                                  <input type="hidden" name="name" value="{{ $blog->name }}">

                                <input
                                  class="form-control"
                                  type="text"
                                  id="alt"
                                  placeholder="{!! json_decode($blog['name'])->{app()->getLocale()} !!}"
                                />
                              </div>
                              <div class="mb-3 col-md-12 translate">
                                <label for="title" class="form-label">Title</label>
                                <input type="hidden" name="title" value="{{ $blog->title }}">
                                <input
                                  class="form-control"
                                  type="text"
                                  id="title"
                                  placeholder="{!! json_decode($blog['title'])->{app()->getLocale()} !!}"
                                />
                              </div>
                              <div class="mb-3 col-md-12 translate">
                                <label for="" class="form-label">Desc</label>
                                <input type="hidden" name="desc" value="{{ $blog->desc }}">
                                <textarea
                                  class="form-control"
                                  id="editor"
                                  >{{ $blog->translate('desc', app()->getLocale()) }}</textarea>
                              </div>
                              <div class="mb-3 col-md-12 translate">
                                <label for="author" class="form-label">Author</label>
                                <input type="hidden" name="author" value="{{ $blog->author }}">
                                <input
                                  class="form-control"
                                  type="text"
                                  id="author"
                                  placeholder="{!! json_decode($blog['author'])->{app()->getLocale()} !!}"
                                />
                              </div>
                              <div class="mb-3 col-md-12">
                                <label for="alt" class="form-label">Slug</label>
                                <input
                                  class="form-control"
                                  type="text"
                                  id="alt"
                                  name="slug"
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

<script src="{{ asset('/admin/js/file-upload.js') }}"></script>
<script src="{{ asset('/admin/js/translate.js') }}"></script>
<script src="{{ asset('/admin/vendors/ckeditor/ckeditor.js') }}"></script>
          <script src="{{ asset('/admin/assets/js/cketditor.js') }}"></script>

@endsection
