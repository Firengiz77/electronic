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
                    <form enctype="multipart/form-data" id="formAccountSettings" method="POST" action="{{ route('admin.products_update',$product->id) }}">
                        @csrf
                        <div class="row mb-3">
                            <select id="largeSelect" name="cat_id" class="form-select form-select-lg">
                                <option value="0">Select Category :</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"   @if($product->cat_id == $category->id) selected @endif  > {!! json_decode($category['name'])->{app()->getLocale()} !!} </option>
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

                        <div class="row mb-3">
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="checkbox" name="on_stock" id="inlineCheckbox1" value="1">
                                <label class="form-check-label" for="inlineCheckbox1">On Stock</label>
                            </div>
                        </div>

                               <div class="mb-3 col-md-12 translate">
                                <label for="alt" class="form-label">Name</label>
                                  <input type="hidden" name="name" value="{{ $product->name }}">

                                <input
                                  class="form-control"
                                  type="text"
                                  id="alt"
                                  placeholder="{!! json_decode($product['name'])->{app()->getLocale()} !!}"
                                />
                              </div>

                              <div class="mb-3 col-md-12">
                                <label for="title" class="form-label">Slug</label>
                                <input type="hidden" name="slug" value="{{ $product->slug }}">
                                <input
                                  class="form-control"
                                  type="text"
                                  id="title"
                                  placeholder="{{  $product->slug }}"
                                />
                              </div>

                              <div class="mb-3 col-md-12">
                                <label for="" class="form-label">Price</label>
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                  <input
                                      class="form-control"
                                      type="text"
                                      id="title"
                                      placeholder="{{  $product->price }}"
                                  />
                              </div>

                              <div class="mb-3 col-md-12 translate">
                                <label for="author" class="form-label">Description</label>
                                <input type="hidden" name="desc" value="{{ $product->desc }}">
                                  <textarea
                                      class="form-control"
                                      id="editor"
                                  >{!! json_decode($product['desc'])->{app()->getLocale()} !!}</textarea>
                              </div>



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

                        <img src="{{  (!empty($product->thumbnail)? url('uploads/products/'.$product->thumbnail):asset('/admin/assets/img/avatars/1.png')  )}}"  alt="Avatar" width="25%"
                        style="display: flex;margin-bottom: 20px;margin-top:20px"/>




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

                        <div class="row" style="margin-top: 28px;">
                        @foreach ($product->images as $key=>$image)
                            <div class="col-md-3">
                                <div class="image-box">
                                    <img src="{{ asset('uploads/products/' . $image) }}" width="150" alt="" height="40px">
                                    <div id="newform24" class='a_remove2_{{$key}}'>
                                        <button type="button" data_id="{{$key}}" class="a_remove3 btn btn-primary me-2" style="margin-top: 20px;margin-bottom: 20px" onclick="delete_images('{{route('admin.delete_images_product',$product->id)}}','{{ $key }}')"  id="{{ $key }}" >
                                            <input type="hidden" name="current_images[]" value="{{ $image }}" id='a_remove'>
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
