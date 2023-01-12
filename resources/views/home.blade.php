@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}

 <main id="main" class="main">

    <!--<div class="pagetitle">
      <h1>User / Clients List</h1>
       <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav> -->
    </div>

    <section class="section">
      <div class="row">
        <div class="col col-md-12 col-12">
          <div class="card">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between">
                  <h5 class="card-title">User / Clients List</h5>
                  <div class="left_button">
                    <button type="button" class="btn btn-secondary me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Selected Records">
                      <i class="bi bi-trash3" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>
                    </button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClientsCentered">
                      <i class="bi bi-plus-circle me-1"></i> Add Clients
                    </button>
                  </div>
              </div>
             
              <table class="table table-hover datatable">
                <thead>
                  <tr>
                    <th>
                      <div class="form-check">
                         <input class="form-check-input" type="checkbox">
                       </div>
                   </th>
                   <th scope="col">#</th>
                    <th scope="col">User Name</th>
                    <th scope="col">Business Email</th>
                    <th scope="col">Date</th>
                   <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                   @foreach($clients as $key=>$value)
               
             
                <tr>
                    <td>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox">
                      </div>
                    </td>
                    <th scope="row">{{++$key}}</th>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->created_at }}
                    </td>
                
                    <td class="text-center">
                      <ul class="action_ul">
                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                          <a href="javascript:void(0);" class="edit" id="edit" data-bs-toggle="modal" data-bs-target="#editClientsCentered{{$key}}">
                            <i class="bi bi-pencil-fill"></i>
                          </a>
                        </li>
                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                          <a href="javascript:void(0);" class="delete" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="bi bi-trash-fill"></i>
                          </a>
                        </li>
                      </ul>
                    </td>
                </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     @foreach($clients as $key=>$value) 
     {{++$key}}
    <!-- ==== Add and Update Clients Modal Popup ==== -->
  <div class="modal fade" id="editClientsCentered{{$key}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Clients</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form class="row g-3 needs-validation" novalidate action="{{ url('edituser') }}" method="post">
           @csrf
          
            <div class="col-md-12">
              <label for="validationCustom01" class="form-label">Company name</label>
              <input type="text" name="company_name" class="form-control" value="{{ $value->company_name}}" id="validationCustom01" required>
              <div class="invalid-feedback">Please provide company name</div>
            </div>
            <div class="col-md-12">
              <label for="validationCustom02" class="form-label">User name</label>
              <input type="text" class="form-control" value="{{ $value->name}}" name="name" id="validationCustom02" required>
              <div class="invalid-feedback">Please provide user name!</div>
            </div>
            <div class="col-md-12">
              <label for="validationCustomUsername" class="form-label">Business Email</label>
              <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" value="{{ $value->email}}" name="email" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                <div class="invalid-feedback">
                  Please provide Email!.
                </div>
              </div>
            </div>
             <input type="hidden" name="id" value="{{ $value->id}}">
            <div class="col-12">
              <input class="btn btn-primary" type="submit">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endforeach
  </main><!-- End #main -->


  @endsection


 @section('jquery')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
         $('#edit').click(function(){
            alert('success');

          var id = $("#edit").attr('data-id');
           var name = $("#edit").attr('data-name');
            var email = $("#edit").attr('data-email');
             var company_name = $("#edit").attr('data-companyname');
                $('#validationCustom01').val(company_name);
                $('#validationCustom01').val(company_name);
                $('#name').val(name);
                $('#validationCustom01').val(company_name);
                $('#email').val(email);
              
                console.log(company_name);
        });
        });
    </script> --}}
  @endsection

