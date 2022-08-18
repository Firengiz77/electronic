@extends('admin.layout.master')

@section('container')

  <!-- Content wrapper -->
  <div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
      <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Contact</h4>

      <!-- Basic Layout & Basic with Icons -->
      <div class="row">
    
        <!-- Basic with Icons -->
        <div class="col-lg-6">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Add Contact</h5>
            </div>
            <div class="card-body">
              @if(session()->has('message'))
              <div class="alert alert-success">
                  {{ session()->get('message') }}
              </div>
          @endif

              <form method="POST" action="{{ route('admin.contact_add') }}">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 form-label" for="basic-icon-default-phone">Phone</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-phone2" class="input-group-text"
                        ><i class="bx bx-phone"></i
                      ></span>
                      <input
                        type="text"
                        id="basic-icon-default-phone"
                        class="form-control phone-mask"
                        placeholder="994 070 888 4581"
                          name="phone"
                        aria-describedby="basic-icon-default-phone2"
                      />
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Address</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"
                        ><i class="bx bx-buildings"></i
                      ></span>
                      <input
                        type="text"
                        name="address"
                        id="basic-icon-default-company"
                        class="form-control"
                        placeholder="Address"
                        aria-describedby="basic-icon-default-company2"
                      />
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                      <input
                        type="text"
                        id="basic-icon-default-email"
                        class="form-control"
                        placeholder="Email"
                        name="email"
                        aria-describedby="basic-icon-default-email2"
                      />
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 form-label" for="basic-icon-default-phone">Open Time</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-phone2" class="input-group-text"
                        ><i class='bx bx-time' ></i></span>
                      <input
                        type="text"
                        id="basic-icon-default-phone"
                        class="form-control phone-mask"
                        placeholder="Open Time"
                          name="open_time"
                        aria-describedby="basic-icon-default-phone2"
                      />
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-company"> Facebook Link </label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"
                        >
                        <i class='bx bxl-facebook'></i>
                      </span>
                      <input
                        type="text"
                        name="fb_link"
                        id="basic-icon-default-company"
                        class="form-control"
                        placeholder="Facebook Link"
                        aria-describedby="basic-icon-default-company2"
                      />
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Whatsapp Link</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class='bx bxl-whatsapp' ></i></span>
                      <input
                        type="text"
                        id="basic-icon-default-email"
                        class="form-control"
                        placeholder="Whatsapp Link"
                        name="wp_link"
                        aria-describedby="basic-icon-default-email2"
                      />
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Instagram Link</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class='bx bxl-instagram' ></i></span>
                      <input
                        type="text"
                        id="basic-icon-default-email"
                        class="form-control"
                        placeholder="Whatsapp Link"
                        name="insta_link"
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



@foreach ($contacts as $contact )
    


        <div class="col-lg-6">
          <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
              <h5 class="mb-0">Edit Contact</h5>
            </div>
            <div class="card-body">
              @if(session()->has('message'))
              <div class="alert alert-success">
                  {{ session()->get('message') }}
              </div>
          @endif

              <form method="post" action="{{ route('admin.contact_update',$contact->id) }}">
                @csrf
                <div class="row mb-3">
                  <label class="col-sm-2 form-label" for="basic-icon-default-phone">Phone</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-phone2" class="input-group-text"
                        ><i class="bx bx-phone"></i
                      ></span>
                      <input
                        type="text"
                        id="basic-icon-default-phone"
                        class="form-control phone-mask"
                        placeholder="994 070 888 4581"
                        name="phone"
                         value="{{ $contact->phone }}"
                        aria-describedby="basic-icon-default-phone2"
                      />
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-company">Address</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"
                        ><i class="bx bx-buildings"></i
                      ></span>
                      <input
                        type="text"
                        name="address"
                        id="basic-icon-default-company"
                        class="form-control"
                        value="{{ $contact->address }}"
                        placeholder="Address"
                        aria-describedby="basic-icon-default-company2"
                      />
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Email</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                      <input
                        type="text"
                        id="basic-icon-default-email"
                        class="form-control"
                        placeholder="Email"
                        name="email"
                        value="{{ $contact->email }}"
                        aria-describedby="basic-icon-default-email2"
                      />
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 form-label" for="basic-icon-default-phone">Open Time</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-phone2" class="input-group-text"
                        ><i class='bx bx-time' ></i></span>
                      <input
                        type="text"
                        id="basic-icon-default-phone"
                        class="form-control phone-mask"
                        placeholder="Open Time"
                          name="open_time"
                          value="{{ $contact->open_time }}"
                        aria-describedby="basic-icon-default-phone2"
                      />
                    </div>
                  </div>
                </div>

                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-company"> Facebook Link </label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span id="basic-icon-default-company2" class="input-group-text"
                        >
                        <i class='bx bxl-facebook'></i>
                      </span>
                      <input
                        type="text"
                        name="fb_link"
                        id="basic-icon-default-company"
                        class="form-control"
                        placeholder="Facebook Link"
                        value="{{ $contact->fb_link }}"
                        aria-describedby="basic-icon-default-company2"
                      />
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Whatsapp Link</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class='bx bxl-whatsapp' ></i></span>
                      <input
                        type="text"
                        id="basic-icon-default-email"
                        class="form-control"
                        placeholder="Whatsapp Link"
                        name="wp_link"
                        value="{{ $contact->wp_link }}"
                        aria-describedby="basic-icon-default-email2"
                      />
                    </div>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label" for="basic-icon-default-email">Instagram Link</label>
                  <div class="col-sm-10">
                    <div class="input-group input-group-merge">
                      <span class="input-group-text"><i class='bx bxl-instagram' ></i></span>
                      <input
                        type="text"
                        id="basic-icon-default-email"
                        class="form-control"
                        placeholder="Whatsapp Link"
                        name="insta_link"
                        value="{{ $contact->insta_link }}"
                        aria-describedby="basic-icon-default-email2"
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
              <a href="{{ route('admin.contact_delete',$contact->id) }}" >  <button class="btn btn-danger">Delete Contact</button></a>
            </div>
          </div>
        </div>

        @endforeach




      </div>
    </div>
    <!-- / Content -->


    
@endsection