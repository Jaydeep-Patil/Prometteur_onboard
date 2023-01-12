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
                  <h5 class="card-title">Client Account List</h5>
                  <div class="left_button">
                    <button type="button" class="btn btn-secondary" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Selected Records">
                      <i class="bi bi-trash3" data-bs-toggle="modal" data-bs-target="#deleteModal"></i>
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
                    <th scope="col" class="text-center">Total Account</th>
                    <th scope="col" class="text-center">Total LOB</th>
                    <th scope="col" class="text-center">Total Channel</th>
                    <th scope="col" class="text-center">Total Completion</th>
                    <th scope="col" class="text-center">Date</th>
                    <th scope="col" class="text-center">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($clients as $key=>$value)
                  <tr>
                    <td><div class="form-check"><input class="form-check-input" type="checkbox"></div></td>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td class="text-center">{{$value->accounts->count()}}</td>
                    <td class="text-center">{{App\Models\Lob::whereIn('account_id',$value->accounts->pluck('id'))->count()}}</td>
                    <td class="text-center">{{App\Models\Channel::whereIn('account_id',$value->accounts->pluck('id'))->count()}}</td>
                    <td class="text-center" style="vertical-align: middle;">
                      <div class="progress progress_td">
                        <div class="progress-bar progress-bar-striped" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                      </div>
                    </td>
                    <td class="text-center">{{date('Y-m-d',strtotime($value->created_at))}}</td>
                    <td class="text-center">
                      <ul class="action_ul">
                        <li class="me-1">
                          <a href="{{route('account_details',$value->id)}}" class="detail" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                            <i class="bi bi-info-circle"></i>
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

