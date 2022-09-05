@extends('admin.layout.master')

@section('container')

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Product Color</h4>
        <div class="lang">
            <a href="az" class="btn btn-success {{ app()->isLocale('az') ? 'active' : '' }}">Az</a>
            <a href="en" class="btn btn-success {{ app()->isLocale('en') ? 'active' : '' }}">En</a>
        </div>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">

        <!-- Basic with Icons -->
        <div class="col-lg-6">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Add Color</h5>
            </div>
            <div class="card-body">
              @if(session()->has('message'))
              <div class="alert alert-success">
                  {{ session()->get('message') }}
              </div>
          @endif

              <form method="POST" action="{{ route('admin.product_color_add') }}">
                @csrf
                <div class="row mb-3 translate">
                  <label class="col-sm-2 form-label" for="basic-icon-default-phone">Name</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-phone2" class="input-group-text"
                        ><i class="bx bx-palette"></i
                      ></span>
                        <input type="hidden" name="name" value='{"az":"","en":""}'>
                      <input
                        type="text"
                        id="basic-icon-default-phone"
                        class="form-control phone-mask"
                        placeholder="Name"

                        aria-describedby="basic-icon-default-phone2"
                      />
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Color</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class="bx bx-palette"></i></span>
                      <input
                        type="text"
                        id="basic-icon-default-email"
                        class="form-control"
                        placeholder="Color"
                        name="color"
                        aria-describedby="basic-icon-default-email2"
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



@foreach ($colors as $color )



        <div class="col-lg-6">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Edit Color</h5>
            </div>
            <div class="card-body">
              @if(session()->has('message'))
              <div class="alert alert-success">
                  {{ session()->get('message') }}
              </div>
          @endif

              <form method="post" action="{{ route('admin.product_color_update',$color->id) }}">
                @csrf
                <div class="row mb-3 translate">
                  <label class="col-sm-2 form-label" for="basic-icon-default-phone">Name</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-phone2" class="input-group-text"
                        ><i class="bx bx-palette"></i
                      ></span>
                        <input type="hidden" name="name" value='{{$color->name}}'>
                      <input
                        type="text"
                        id="basic-icon-default-phone"
                        class="form-control phone-mask"
                        placeholder="{!! json_decode($color['name'])->{app()->getLocale()} !!}"
                        aria-describedby="basic-icon-default-phone2"
                      />
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Color</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"
                        ><i class="bx bx-palette"></i
                      ></span>
                      <input
                        type="text"
                        name="color"
                        id="basic-icon-default-company"
                        class="form-control"
                        value="{{ $color->color }}"
                        placeholder="color"
                        aria-describedby="basic-icon-default-company2"
                      />
                    </div>
                  </div>
                </div>

                <div class="row justify-content-end">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>

                  </div>
                </div>
              </form>
              <a style="display: flex;flex-direction: row;justify-content: end;" href="{{ route('admin.product_color_delete',$color->id) }}" >  <button class="btn btn-danger">Delete Color</button></a>
            </div>
          </div>
        </div>

        @endforeach




      </div>
    </div>
    <!-- / Content -->

      <script src="{{ asset('/admin/js/translate.js') }}"></script>
      <script src="{{ asset('/admin/vendors/ckeditor/ckeditor.js') }}"></script>
      <script src="{{ asset('/admin/assets/js/cketditor.js') }}"></script>

@endsection
