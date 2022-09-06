@extends('admin.layout.master')

@section('container')

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Product</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">

        <!-- Basic with Icons -->
        <div class="col-lg-12">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between" style="display: flex;align-items: baseline;flex-direction: row;justify-content: space-between;">
              <h5 class="mb-0">Add Product</h5>

            </div>
              <div class="lang">
                  <a href="az" class="btn btn-success {{ app()->isLocale('az') ? 'active' : '' }}">Az</a>
                  <a href="en" class="btn btn-success {{ app()->isLocale('en') ? 'active' : '' }}">En</a>
              </div>
            <div class="card-body">
              @if(session()->has('message'))
              <div class="alert alert-success">
                  {{ session()->get('message') }}
              </div>
          @endif

              <form method="POST" enctype="multipart/form-data" action="{{ route('admin.products_add') }}">
                @csrf

                  <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                      <span class="d-none d-sm-block">Upload new photo</span>
                      <i class="bx bx-upload d-block d-sm-none"></i>
                      <input
                          type="file"
                          id="upload"
                          class="account-file-input"
                          hidden
                          name="thumbnail"
                          accept="image/png,image/jpeg,image/svg,image/jpg"
                      />
                  </label>


                  <div class="row mb-3">
                      <select id="largeSelect" name="cat_id" class="form-select form-select-lg">
                          <option value="0">Select Category :</option>
                          @foreach($categories as $category)
                              <option value="{{ $category->id }}" > {!! json_decode($category['name'])->{app()->getLocale()} !!} </option>
                          @endforeach

                      </select>
                  </div>
                  <div class="row mb-3">
                      <select id="largeSelect" name="color_id" class="form-select form-select-lg">
                          <option value="0">Select Color :</option>
                          @foreach($colors as $color)
                              <option value="{{ $color->id }}" > {!! json_decode($color['name'])->{app()->getLocale()} !!} </option>
                          @endforeach
                      </select>
                  </div>
                  <div class="row mb-3">
                      <select id="largeSelect" name="size_id" class="form-select form-select-lg">
                          <option value="0">Select Size :</option>
                          @foreach($sizes as $size)
                              <option value="{{ $size->id }}" > {!! json_decode($size['size'])->{app()->getLocale()} !!} </option>
                          @endforeach

                      </select>
                  </div>

                  <div class="row mb-3">
                      <div class="form-check form-check-inline mt-3">
                          <input class="form-check-input" type="checkbox" name="on_stock" id="inlineCheckbox1" value="1">
                          <label class="form-check-label" for="inlineCheckbox1">On Stock</label>
                      </div>
                  </div>

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
                  <div class="row mb-3">
                      <label class="col-sm-12 form-label" for="basic-icon-default-phone">Slug</label>
                      <div class="col-sm-10">
                          <div class="input-group input-group-merge">
                      <span id="basic-icon-default-phone2" class="input-group-text"
                      ><i class="bx bx-phone"></i
                          ></span>
                              <input
                                  type="text"
                                  id="basic-icon-default-company"
                                  class="form-control"
                                  placeholder="Slug"
                                  name="slug"
                                  aria-describedby="basic-icon-default-company2"
                              />
                          </div>
                      </div>
                  </div>
                  <div class="row mb-3">
                      <label class="col-sm-12 form-label" for="basic-icon-default-phone">Price</label>
                      <div class="col-sm-10">
                          <div class="input-group input-group-merge">
                      <span id="basic-icon-default-phone2" class="input-group-text"
                      ><i class="bx bx-phone"></i
                          ></span>
                              <input
                                  type="text"
                                  id="basic-icon-default-company"
                                  class="form-control"
                                  placeholder="Price"
                                  name="price"
                                  aria-describedby="basic-icon-default-company2"
                              />
                          </div>
                      </div>
                  </div>

                  <div class="row mb-3 col-md-12 translate">
                      <label for="" class="col-sm-12 form-label" >Desc</label>
                      <div class="col-sm-10">
                          <div class="input-group input-group-merge">
                      <input type="hidden" name="desc" value='{"az":"","en":""}'>
                      <textarea
                          class="form-control"
                          id="editor"
                         ></textarea>
                       </div>
                      </div>
                  </div>




                  <label for="images">

                      <input
                          type="file"
                          id="upload"
                          class="account-file-input"
                          name="images[]"
                          multiple
                          accept="image/png,image/jpeg,image/svg,image/jpg"
                      />
                  </label>


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

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="{{ asset('/admin/js/file-upload.js') }}"></script>
<script src="{{ asset('/admin/js/translate.js') }}"></script>
      <script src="{{ asset('/admin/vendors/ckeditor/ckeditor.js') }}"></script>
      <script src="{{ asset('/admin/assets/js/cketditor.js') }}"></script>
      <script src="{{ asset('/admin/js/swal.js') }}"></script>
@endsection
