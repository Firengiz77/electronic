@extends('admin.layout.master')

@section('container')

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Blog</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">

        <!-- Basic with Icons -->
        <div class="col-lg-12">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between" style="display: flex;align-items: baseline;flex-direction: row;justify-content: space-between;">
              <h5 class="mb-0">Add Blog</h5>
              <div class="lang">
                <a href="az" class="btn btn-success {{ app()->isLocale('az') ? 'active' : '' }}">Az</a>
                <a href="en" class="btn btn-success {{ app()->isLocale('en') ? 'active' : '' }}">En</a>
            </div>
            </div>
            <div class="card-body">
              @if(session()->has('message'))
              <div class="alert alert-success">
                  {{ session()->get('message') }}
              </div>
          @endif

              <form method="POST" enctype="multipart/form-data" action="{{ route('admin.blog_add') }}">
                @csrf

                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
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
                <div class="row mb-3 translate">
                  <label class="col-sm-12 form-label" for="basic-icon-default-phone">Name</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-phone2" class="input-group-text"
                        ><i class="bx bx-phone"></i
                      ></span>
                      <input type="hidden" name="name" value='{"az":"","en":""}'>
                      <input
                      type="text"

                      id="basic-icon-default-company"
                      class="form-control"
                      placeholder="Name"
                      aria-describedby="basic-icon-default-company2"
                    />
                    </div>
                  </div>
                </div>
                <div class="row mb-3 translate">
                  <label class="col-sm-12 col-form-label" for="basic-icon-default-company">Title</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"
                        ><i class="bx bx-buildings"></i
                      ></span>
                      <input type="hidden" name="title" value='{"az":"","en":""}'>
                      <input
                        type="text"

                        id="basic-icon-default-company"
                        class="form-control"
                        placeholder="Title"
                        aria-describedby="basic-icon-default-company2"
                      />
                    </div>
                  </div>
                </div>
                <div class="row mb-3 translate">
                  <label class="col-sm-12 col-form-label" for="basic-icon-default-email">Desc</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                      <input type="hidden" name="desc" value='{"az":"","en":""}'>
                      <input
                        type="text"
                        id="basic-icon-default-email"
                        class="form-control"
                        placeholder="Desc"
                        aria-describedby="basic-icon-default-email2"
                      />
                    </div>
                  </div>
                </div>

                <div class="row mb-3 translate">
                  <label class="col-sm-12 form-label" for="basic-icon-default-phone">Author</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-phone2" class="input-group-text"
                        ><i class='bx bx-time' ></i></span>
                        <input type="hidden" name="author" value='{"az":"","en":""}'>
                      <input
                        type="text"
                        id="basic-icon-default-phone"
                        class="form-control phone-mask"
                        placeholder="Author"
                        aria-describedby="basic-icon-default-phone2"
                      />
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-12 col-form-label" for="basic-icon-default-company"> Slug </label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"
                        >
                        <i class='bx bxl-facebook'></i>
                      </span>
                      <input
                        type="text"
                        name="slug"
                        id="basic-icon-default-company"
                        class="form-control"
                        placeholder="Slug"
                        aria-describedby="basic-icon-default-company2"
                      />
                    </div>
                  </div>
                </div>

                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Add</button>
                  </div>
                </div>

              </form>
            </div>
          </div>
        </div>


      </div>
    </div>
    <!-- / Content -->


<script src="{{ asset('/admin/js/file-upload.js') }}"></script>
<script src="{{ asset('/admin/js/translate.js') }}"></script>
<script src="{{ asset('/admin/vendors/ckeditor.js') }}"></script>
<script src="{{ asset('/admin/js/cketditor.js') }}"></script>
<script src="{{ asset('/admin/js/swal.js') }}"></script>
@endsection
