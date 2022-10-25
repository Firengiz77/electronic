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
            
            <div class="card-body">
              @if(session()->has('message'))
              <div class="alert alert-success">
                  {{ session()->get('message') }}
              </div>
          @endif

              <form method="POST" enctype="multipart/form-data" action="{{ route('admin.products_all_add') }}">
                @csrf

                  <div class="row mb-3">
                      <select id="largeSelect" name="product_id" class="form-select form-select-lg">
                          <option value="0">Select Product :</option>
                          @foreach($products as $product)
                              <option value="{{ $product->id }}" > {!! json_decode($product['name'])->{app()->getLocale()} !!} </option>
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
                      <div class=" mt-3">
                          <input type="text"  placeholder="Count"  class="form-control"  name="count" id="count" >
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

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('/admin/js/swal.js') }}"></script>
@endsection
