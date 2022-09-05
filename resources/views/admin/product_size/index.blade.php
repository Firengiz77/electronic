@extends('admin.layout.master')

@section('container')

    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Product Size</h4>
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
                            <h5 class="mb-0">Add Size</h5>
                        </div>
                        <div class="card-body">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('admin.product_size_add') }}">
                                @csrf
                                <div class="row mb-3 translate">
                                    <label class="col-sm-2 form-label" for="basic-icon-default-phone">Size</label>
                                    <div class="col-sm-10">
                                        <div class="input-group input-group-merge">
                      <span id="basic-icon-default-phone2" class="input-group-text"
                      ><i class="bx bx-bar-chart"></i
                          ></span>
                                            <input type="hidden" name="size" value='{"az":"","en":""}'>
                                            <input
                                                type="text"
                                                id="basic-icon-default-phone"
                                                class="form-control phone-mask"
                                                placeholder="Size"

                                                aria-describedby="basic-icon-default-phone2"
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



                @foreach ($sizes as $size )

                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header d-flex align-items-center justify-content-between">
                                <h5 class="mb-0">Edit Size</h5>
                            </div>
                            <div class="card-body">
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif

                                <form method="post" action="{{ route('admin.product_size_update',$size->id) }}">
                                    @csrf
                                    <div class="row mb-3 translate">
                                        <label class="col-sm-2 form-label" for="basic-icon-default-phone">Name</label>
                                        <div class="col-sm-10">
                                            <div class="input-group input-group-merge">
                      <span id="basic-icon-default-phone2" class="input-group-text"
                      ><i class="bx bx-bar-chart"></i
                          ></span>
                                                <input type="hidden" name="size" value='{{$size->size}}'>
                                                <input
                                                    type="text"
                                                    id="basic-icon-default-phone"
                                                    class="form-control phone-mask"
                                                    placeholder="{!! json_decode($size['size'])->{app()->getLocale()} !!}"
                                                    aria-describedby="basic-icon-default-phone2"
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
                                <a style="display: flex;flex-direction: row;justify-content: end;" href="{{ route('admin.product_size_delete',$size->id) }}" >  <button class="btn btn-danger">Delete Size</button></a>
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
