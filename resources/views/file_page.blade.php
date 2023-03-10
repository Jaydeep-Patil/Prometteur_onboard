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
    <form id="file_data{{$value->id}}" enctype="multipart/form-data" action="" method="POST">
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
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="f_process_doc" id="f_process_doc" class="file_upload" data-myvar="f_process_doc_toggle"  onchange="SaveData({{$value->id}})"/></button>
                      </td>
                      <td class="text-center">
                         <div class="dropdown action-label">
                            <a class="dropdown-toggle status_leaves" href="#" role="button" data-toggle="dropdown" aria-expanded="false" id='f_process_doc_toggle'>
                            <i class="fa fa-dot-circle-o text-success" ></i><span id="f_process_doc_toggle">Pending</span>
                            </a>
                            <!-- <div class="dropdown-menu dropdown-menu-right">
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-purple"></i> Uploaded</a>
                               <a class="dropdown-item" href="#"><i class="fa fa-dot-circle-o text-info"></i> Pending</a>
                            </div> -->
                         </div>
                      </td>
                   </tr>
                   <tr>
                      <td class="text-right">Model Sample File</td>
                      <td class="text-center">
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="model_file" class="file_upload" data-myvar="model_file"   onchange="SaveData({{$value->id}})" /></button>
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
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="f_accurecy_file" class="file_upload" data-myvar="f_accurecy_file"  onchange="SaveData({{$value->id}})" /></button>
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
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="sta_process_doc" class="file_upload" data-myvar="sta_process_doc"  onchange="SaveData({{$value->id}})" /></button>
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
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="sta_model_file" class="file_upload" data-myvar="sta_model_file"  onchange="SaveData({{$value->id}})" /></button>
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
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="sta_forecast_file" class="file_upload" data-myvar="sta_forecast_file"  onchange="SaveData({{$value->id}})" /></button>
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
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="sche_p_doc" class="file_upload" data-myvar="sche_p_doc" onchange="SaveData({{$value->id}})" /></button>
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
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="sche_sched_file" class="file_upload" data-myvar="sche_sched_file"  onchange="SaveData({{$value->id}})" /></button>
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
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="sche_forecast_file" class="file_upload" data-myvar="sche_forecast_file" onchange="SaveData({{$value->id}})" /></button>
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
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="sche_idp_file" class="file_upload" data-myvar="sche_idp_file" onchange="SaveData({{$value->id}})" /></button>
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
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="rta_p_file" class="file_upload" data-myvar="rta_p_file" onchange="SaveData({{$value->id}})" /></button>
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
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="rta_intro_file" class="file_upload" data-myvar="rta_intro_file"  onchange="SaveData({{$value->id}})" /></button>
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
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="rta_dayr_file" class="file_upload" data-myvar="rta_dayr_file"  onchange="SaveData({{$value->id}})" /></button>
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
                         <button class="fileUploadBtn"><i class="far fa-upload"></i><input type="file" name="rta_rca_file" class="file_upload" data-myvar="rta_rca_file" onchange="SaveData({{$value->id}})" /></button>
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
   function SaveData(ids){
      var formData = new FormData($('#file_data'+ids)[0]);
      console.log("formData:-"+formData);
      $.ajax({
               type:'POST',
               url: "{{ route('file_data') }}",
               data:formData,
               cache:false,
               contentType: false,
               processData: false,
               success:function(data){
                  if (data.status == 1) {
                     alert("File is Sucessfully Uploaded");
                     $(".file_upload").val("");
                  } else {
                     return false;
                  }
               },
            });
   }
   $(document).ready(function(e) {

      // $('#file_data').on('submit',(function(e) {
      //    e.preventDefault();
      //    var formData = new FormData($('#file_data')[0]);
      //    $.ajax({
      //          type:'POST',
      //          url: $(this).attr('action'),
      //          data:formData,
      //          cache:false,
      //          contentType: false,
      //          processData: false,
      //          success:function(data){
      //             if (data.status == 1) {
      //                alert("File is Sucessfully Uploaded");
      //                $(".file_upload").val("");
      //             } else {
      //                return false;
      //             }
      //          },
      //          // error: function(data){
      //          //     console.log("error");
      //          //     console.log(data);
      //          // }
      //    });
      // }));


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
