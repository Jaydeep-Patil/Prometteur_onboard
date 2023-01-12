<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
@foreach($result1 as $key=>$value)
<div class="card">
    <div class="card-header" id="headingF1{{$value->id}}">
       <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseF{{$value->id}}" aria-expanded="true" aria-controls="collapseF{{$value->id}}">{{ $value->account_name }}</button>
       </h2>
    </div>
    <form id="file_data" enctype="multipart/form-data" action="{{ route('file_data') }}" method="POST">
        @csrf
        <input type="hidden" id="account_id" name="account_id" value="{{ $value->id }}"/>
    <div id="collapseF{{$value->id}}" class="collapse show" aria-labelledby="headingF{{$value->id}}" data-parent="#accordionFileUpload">
       <div class="card-body">
          <div class="table-resposive">
             <table class="table table-striped custom-table mb-0 table-data leave_table" id="DataLeaves_Table_0" cellspacing="0" width="100%">
                <thead>
                   <tr>
                      <th>File Name</th>
                      <th class="text-right">Actions</th>
                      <th class="text-center">Status</th>
                   </tr>
                </thead>
                <tbody>
                   <tr>
                      <td colspan="3">Forecasting</td>
                   </tr>
                   <tr>
                      <td class="text-right">Process Document</td>
                      <td class="text-center">
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="f_process_doc" class="file_upload"  onchange="SaveData()"/></button>
                      </td>
                      <td class="text-center">
                         <div class="dropdown action-label">
                            <a class="dropdown-toggle status_leaves" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-dot-circle-o text-success"></i> Pending
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> Uploaded</a>
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                            </div>
                         </div>
                      </td>
                   </tr>
                   <tr>
                      <td class="text-right">Model Sample File</td>
                      <td class="text-center">
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="model_file" class="file_upload"   onchange="SaveData()" /></button>
                      </td>
                      <td class="text-center">
                         <div class="dropdown action-label">
                            <a class="dropdown-toggle status_leaves" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-dot-circle-o text-success"></i> Pending
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> Uploaded</a>
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                            </div>
                         </div>
                      </td>
                   </tr>

                   <tr>
                      <td class="text-right">Accuracy Measurement / Result</td>
                      <td class="text-center">
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="f_accurecy_file" class="file_upload"  onchange="SaveData()" /></button>
                      </td>
                      <td class="text-center">
                         <div class="dropdown action-label">
                            <a class="dropdown-toggle status_leaves" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-dot-circle-o text-success"></i> Pending
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> Uploaded</a>
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                            </div>
                         </div>
                      </td>
                   </tr>
                   <tr>
                      <td colspan="3">Staffing / Resource Planning</td>
                   </tr>
                   <tr>
                      <td class="text-right">Process Document</td>
                      <td class="text-center">
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="sta_process_doc" class="file_upload"  onchange="SaveData()" /></button>
                      </td>
                      <td class="text-center">
                         <div class="dropdown action-label">
                            <a class="dropdown-toggle status_leaves" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-dot-circle-o text-success"></i> Pending
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> Uploaded</a>
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                            </div>
                         </div>
                      </td>
                   </tr>
                   <tr>
                      <td class="text-right">Model Sample File</td>
                      <td class="text-center">
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="sta_model_file" class="file_upload"  onchange="SaveData()" /></button>
                      </td>
                      <td class="text-center">
                         <div class="dropdown action-label">
                            <a class="dropdown-toggle status_leaves" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-dot-circle-o text-success"></i> Pending
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> Uploaded</a>
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                            </div>
                         </div>
                      </td>
                   </tr>
                   <tr>
                      <td class="text-right">Staffing Forecast Accuracy Result</td>
                      <td class="text-center">
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="sta_forecast_file" class="file_upload"  onchange="SaveData()" /></button>
                      </td>
                      <td class="text-center">
                         <div class="dropdown action-label">
                            <a class="dropdown-toggle status_leaves" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-dot-circle-o text-success"></i> Pending
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> Uploaded</a>
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                            </div>
                         </div>
                      </td>
                   </tr>
                   <tr>
                      <td colspan="3">Scheduling</td>
                   </tr>
                   <tr>
                      <td class="text-right">Process Document</td>
                      <td class="text-center">
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="sche_p_doc" class="file_upload"  onchange="SaveData()" /></button>
                      </td>
                      <td class="text-center">
                         <div class="dropdown action-label">
                            <a class="dropdown-toggle status_leaves" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-dot-circle-o text-success"></i> Pending
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> Uploaded</a>
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                            </div>
                         </div>
                      </td>
                   </tr>
                   <tr>
                      <td class="text-right">Scheduling Model (only if done in Excel)</td>
                      <td class="text-center">
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="sche_sched_file" class="file_upload"  onchange="SaveData()" /></button>
                      </td>
                      <td class="text-center">
                         <div class="dropdown action-label">
                            <a class="dropdown-toggle status_leaves" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-dot-circle-o text-success"></i> Pending
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> Uploaded</a>
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                            </div>
                         </div>
                      </td>
                   </tr>
                   <tr>
                      <td class="text-right">Scheduling Forecast Accuracy Result</td>
                      <td class="text-center">
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="sche_forecast_file" class="file_upload"  onchange="SaveData()" /></button>
                      </td>
                      <td class="text-center">
                         <div class="dropdown action-label">
                            <a class="dropdown-toggle status_leaves" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-dot-circle-o text-success"></i> Pending
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> Uploaded</a>
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                            </div>
                         </div>
                      </td>
                   </tr>
                   <tr>
                      <td class="text-right">IDP / Deviation File sample</td>
                      <td class="text-center">
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="sche_idp_file" class="file_upload"  onchange="SaveData()" /></button>
                      </td>
                      <td class="text-center">
                         <div class="dropdown action-label">
                            <a class="dropdown-toggle status_leaves" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-dot-circle-o text-success"></i> Pending
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> Uploaded</a>
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                            </div>
                         </div>
                      </td>
                   </tr>
                   <tr>
                      <td colspan="3">RTA / Intraday Management</td>
                   </tr>
                   <tr>
                      <td class="text-right">Process Document</td>
                      <td class="text-center">
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="rta_p_file" class="file_upload"  onchange="SaveData()" /></button>
                      </td>
                      <td class="text-center">
                         <div class="dropdown action-label">
                            <a class="dropdown-toggle status_leaves" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-dot-circle-o text-success"></i> Pending
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> Uploaded</a>
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                            </div>
                         </div>
                      </td>
                   </tr>
                   <tr>
                      <td class="text-right">Intraday Report Sample</td>
                      <td class="text-center">
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="rta_intro_file" class="file_upload"  onchange="SaveData()" /></button>
                      </td>
                      <td class="text-center">
                         <div class="dropdown action-label">
                            <a class="dropdown-toggle status_leaves" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-dot-circle-o text-success"></i> Pending
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> Uploaded</a>
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                            </div>
                         </div>
                      </td>
                   </tr>
                   <tr>
                      <td class="text-right">Day-End Report Sample</td>
                      <td class="text-center">
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="rta_dayr_file" class="file_upload"  onchange="SaveData()" /></button>
                      </td>
                      <td class="text-center">
                         <div class="dropdown action-label">
                            <a class="dropdown-toggle status_leaves" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-dot-circle-o text-success"></i> Pending
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> Uploaded</a>
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                            </div>
                         </div>
                      </td>
                   </tr>
                   <tr>
                      <td class="text-right">RCA / Post-Mortem Report Sample</td>
                      <td class="text-center">
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name=">" class="file_upload"  onchange="SaveData()" /></button>
                      </td>
                      <td class="text-center">
                         <div class="dropdown action-label">
                            <a class="dropdown-toggle status_leaves" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-dot-circle-o text-success"></i> Pending
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> Uploaded</a>
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                            </div>
                         </div>

                      </td>
                   </tr>
                </tbody>
             </table>
          </div>
          <div class="saveChannel text-center mt-5">
              <button type="submit" id="save_file_data">Save </button>
              {{-- <input type="submit" class="btn btn-blue" id="save_file_data" value="Save"> --}}
           </div>
       </div>
    </div>
    </form>
 </div>

@endforeach
<script>
   function SaveData(){ alert();
      $("#save_file_data").trigger('click');
   }
   $(document).ready(function(e) {

      $('.add_channeldata').click(function(){
         chan_id=$(this).attr('id');
         channel_data=$('#channelTab'+chan_id+' :input,select,textarea').serialize();
         $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
         $.ajax({
              type: "POST",
              url: "{{route('channel_data')}}",
              data: channel_data, // serializes the form's elements.
              success: function(result)
              {
                  console.log(result);
                  if(result.success){

                  }
              }
         });
      })

         $('#file_data').on('submit',(function(e) {
         e.preventDefault();
         var formData = new FormData($('#file_data')[0]);
         $.ajax({
               type:'POST',
               url: $(this).attr('action'),
               data:formData,
               cache:false,
               contentType: false,
               processData: false,
               success:function(data){
                  if (data.status == 1) {
                     alert("Image is Sucessfully Uploaded");
                  } else {
                     return false;
                  }
               },
               // error: function(data){
               //     console.log("error");
               //     console.log(data);
               // }
         });
      }));


    $("#ImageBrowse").on("change", function() {
        $("#imageUploadForm").submit();
    });
       $('[data-toggle="tooltip"]').tooltip();
       $('[data-toggle="popover"]').popover();;
       $('.popover-dismiss').popover({
           trigger: 'focus'
       });

       $('.selectpicker').selectpicker('refresh');



       $('#accountClose').on('click', function() {
           $('#accountSidebar').removeClass('active');
           $('.overlayaccount').removeClass('active');
       });

       $('.letstartBtn').on('click', function() {
           $('#accountSidebar').addClass('active');
           $('.overlayaccount').addClass('active');
       });

       $(".billing_cap_input").hide();
       $("#billingCapDrop").on("change", function(){
           if ($(this).val()=="occupancy")
           {
               $("#biilingCapSec").hide();
               $("#biilingCapPer").show();
           }
           else if ($(this).val()=="aht") {
               $("#biilingCapPer").hide();
               $("#biilingCapSec").show();

           } else {
               $(".billing_cap_input").hide();
           }
       });

       $('.fielset_height').css('height', $(window).height() - ($('.progressbar_ul').height() + 40) + 'px');
       $('.scrollbarbar').scrollbar();

   });
</script>
