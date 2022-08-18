@extends('admin.layout.master')
@section('container')

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
            <div style="display: flex;align-items: baseline;flex-direction: row;justify-content: space-between;">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin /</span> Message</h4>

          </div>
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <h5 class="card-header">All Messages</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

     @foreach ($messages as $message )
                      <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $message->name }}</strong></td>
                        <td>
                         {{ $message->email }}
                        </td>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $message->message }}</strong></td>
                        <td>
                          <a href="{{ route('admin.message_delete',$message->id) }}" class="btn btn-outline-danger">Delete Message</a>
                        </td>
                      </tr>
                   
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

              <hr class="my-5" />
            </div>
            <!-- / Content -->

      

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
     
    
@endsection