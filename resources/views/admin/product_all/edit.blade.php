@extends('admin.layout.master')

@section('container')


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->


            <div class="container-xxl flex-grow-1 container-p-y">
                <div style="display: flex;align-items: baseline;flex-direction: row;justify-content: space-between;">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Product </h4>
                </div>


              <!-- Examples -->
              <div class="row mb-5">

                <div class="col-md-4 col-lg-2 mb-3 card-body">
                    @if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  @endif
                    <form enctype="multipart/form-data" id="formAccountSettings" method="POST" action="{{ route('admin.product_all_update',$product->id) }}">
                        @csrf
                        <div class="row mb-3">
                            <select id="largeSelect" name="product_id" class="form-select form-select-lg">
                                <option value="0">Select Product :</option>
                                @foreach($products as $product2)
                                    <option value="{{ $product2->id }}"   @if($product->product_id == $product2->id) selected @endif  > {!! json_decode($product2['name'])->{app()->getLocale()} !!} </option>
                                @endforeach

                            </select>
                        </div>
                        <div class="row mb-3">
                            <select id="largeSelect" name="color_id" class="form-select form-select-lg">
                                <option value="0">Select Color :</option>
                                @foreach($colors as $color)
                                    <option value="{{ $color->id }}" @if($product->color_id == $color->id) selected @endif > {!! json_decode($color['name'])->{app()->getLocale()} !!} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row mb-3">
                            <select id="largeSelect" name="size_id" class="form-select form-select-lg">
                                <option value="0">Select Size :</option>
                                @foreach($sizes as $size)
                                    <option value="{{ $size->id }}"  @if($product->size_id == $size->id) selected @endif> {!! json_decode($size['size'])->{app()->getLocale()} !!} </option>
                                @endforeach

                            </select>
                        </div>

                       

                               <div class="mb-3 col-md-12 translate">
                                <label for="alt" class="form-label">Count</label>
                                  <input  class="form-control" type="text" name="count" value="{{ $product->count }}">

                              </div>



                               <button type="submit" class="btn btn-outline-secondary account-image-reset mb-4">
                                 <i class="bx bx-reset d-block d-sm-none"></i>
                                 <span class="d-none d-sm-block">Edit</span>
                               </button>
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



          <script src="{{ asset('/admin/js/file-upload.js') }}"></script>
     <script src="{{ asset('/admin/js/translate.js') }}"></script>
    <script src="{{ asset('/admin/vendors/ckeditor/ckeditor.js') }}"></script>
          <script src="{{ asset('/admin/assets/js/cketditor.js') }}"></script>
    <script src="{{asset('/admin/js/own.js')}}"></script>


          <!-- Content wrapper -->
          <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
                  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>


@endsection
