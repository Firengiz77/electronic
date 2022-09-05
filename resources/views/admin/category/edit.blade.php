@extends('admin.layout.master')

@section('container')


          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->


            <div class="container-xxl flex-grow-1 container-p-y">
                <div style=" display: flex;align-items: baseline;flex-direction: column-reverse;">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Edit Category </h4>
                    <div class="lang">
                        <a href="az" class="btn btn-success {{ app()->isLocale('az') ? 'active' : '' }}">Az</a>
                        <a href="en" class="btn btn-success {{ app()->isLocale('en') ? 'active' : '' }}">En</a>
                    </div>
                </div>


              <!-- Examples -->
              <div class="row mb-5">
                <div class="col-md-4 col-lg-2 mb-3 card-body" style="border:1px solid #a1acb8;border-radius:8px">
                    @if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  @endif
                    <form enctype="multipart/form-data" id="formAccountSettings" method="POST" action="{{ route('admin.category_update',$category->id) }}">
                        @csrf
                         <div class="d-flex align-items-start align-items-sm-center gap-4">
                                     <div class="button-wrapper">

                                         <div class="row mb-3">
                                             <select id="largeSelect" name="cat_id" class="form-select form-select-lg">
                                                 <option value="0">Select Category :</option>
                                                 @foreach($categories as $category2)
                                                     <option value="{{$category2->id}}"  @if($category->cat_id == $category2->id) selected @endif  > {!! json_decode($category2['name'])->{app()->getLocale()} !!} </option>
                                                 @endforeach

                                             </select>
                                         </div>

                                         <div class="row mb-3 translate">
                                             <label class="col-sm-12 col-form-label" for="basic-icon-default-company">Name</label>
                                             <div class="col-sm-10" >
                                                 <div class="input-group input-group-merge">
                         <span id="basic-icon-default-company2" class="input-group-text"
                         ></span>
                                                     <input type="hidden" name="name" value="{{ $category->name }}">
                                                     <input
                                                         type="text"

                                                         id="basic-icon-default-company"
                                                         class="form-control"
                                                         placeholder="{!! json_decode($category['name'])->{app()->getLocale()} !!}"
                                                         aria-describedby="basic-icon-default-company2"
                                                     />
                                                 </div>
                                             </div>
                                         </div>

                                         <div class="row mb-3">
                                             <label class="col-sm-12 col-form-label" for="basic-icon-default-company">Slug</label>
                                             <div class="col-sm-10">
                                                 <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"
                      ></span>
                                                     <input
                                                         name="slug"
                                                         type="text"
                                                         id="basic-icon-default-company"
                                                         class="form-control"
                                                         placeholder="{{$category->slug}}"
                                                         value="{{$category->slug}}"
                                                         aria-describedby="basic-icon-default-company2"
                                                     />
                                                 </div>
                                             </div>
                                         </div>


                                         <div class="row justify-content-end">
                                             <div class="col-sm-10">
                                                 <button type="submit" class="btn btn-primary">EDIT</button>
                                             </div>
                                         </div>


                                     </div>









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

          <script src="{{ asset('/admin/js/translate.js') }}"></script>
          <script src="{{ asset('/admin/vendors/ckeditor/ckeditor.js') }}"></script>
          <script src="{{ asset('/admin/assets/js/cketditor.js') }}"></script>

@endsection
