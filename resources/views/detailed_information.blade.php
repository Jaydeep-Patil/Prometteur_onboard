<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<style>
.modal-backdrop.show {
display: none !important;
}
</style>
@foreach($result as $key=>$value)
<div class="d-flex align-items-center justify-content-between mb-3">
   <h2>Account - <span>{{$value->account_name}}</span></h2>
   <button class="cloneBtn" type="button" data-toggle="modal" data-target="#cloneDataModal{{$value->id}}"><i class="far fa-clone"></i>Clone Data</button>
</div>

<!--  -->

<div class="modal fare bd-example-modal-lg" id="cloneDataModal{{$value->id}}" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="example-Modal3">Clone Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
               aria-hidden="true">&times;</span></button>
         </div>
         <div class="modal-body setup-content">
            <div class="fielset_panel p-0" style="min-height:600px;">
               <form id="msform" action="" method="post" class="text-left">
                  <div class="row mb-4">
                     <div class="col col-md-12">
                        <h4>Account Name - <span style="font-weight:600;"></span>{{$value->account_name}}</h4>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col col-md-6 col-12">
                        <div class="form-group">
                           <label>From LOB</label>
                           <select class="selectpicker form-control from_lob_select{{$value->id}}" data-acc="{{$value->id}}" id="from_lob_select{{$value->id}}" title="Please Select" onchange="fromLobSelect({{$value->id}})">
                              <option value="">Select LOB</option>
                               @foreach($value->lobs as $key1=>$value1)
                              <option value="{{$value1->id}}" >{{$value1->lob_name}}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="col col-md-6 col-12">
                        <div class="form-group">
                           <label>To LOB</label>
                           <select class="selectpicker form-control to_lob_select{{$value->id}}" data-acc="{{$value->id}}" title="Please Select" id="to_lob_select{{$value->id}}" onchange="toLobSelect({{$value->id}})">
                           <option value="">Select LOB</option>
                              @foreach($value->lobs as $key1=>$value1)
                              <option value="{{$value1->id}}" >{{$value1->lob_name}}</option>
                              @endforeach
                              
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col col-md-6 col-12">
                        <div class="form-group">
                           <label>From Channel</label>
                           <select class="selectpicker form-control" title="Please Select" id="from_channels{{$value->id}}">
                                
                           </select>
                        </div>
                     </div>
                     <div class="col col-md-6 col-12">
                        <div class="form-group">
                           <label>To Channel</label>
                           <select class="selectpicker form-control" title="Please Select" id="to_channels{{$value->id}}">
                              
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col col-12 text-right mt-4">
                        <!-- <button type="button" class="btnWithLogo btnActionPro mr-3" data-toggle="modal"
                           data-target="#BatchReadyModal" data-dismiss="modal">Process</button> -->
                        <button type="button" data-id="{{$value->id}}" class="btnWithLogo addcopyData">Copy Data</button>
                     </div>
                  </div>
                  <div class="row">
                     <span id="success_msg"></span>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!--  -->

<div class="accordion" id="accordionAccount{{$value->id}}">
   @foreach($value->lobs as $key1=>$value1)
   <div class="card">
      <div class="card-header" id="headingOne">
         <h2 class="mb-0">
            <button class="btn btn-link btn-block text-left d-flex align-items-center justify-content-between" type="button" data-toggle="collapse" data-target="#collapse{{$value1->id}}" aria-expanded="true" aria-controls="collapse{{$value1->id}}">
               {{$value1->lob_name}}
               <div class="completion_div">
                  <small>Completion Percent</small>
                  <div class="progress">
                     <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                  </div>
               </div>
            </button>
         </h2>
      </div>
      <div id="collapse{{$value1->id}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionAccount{{$value->id}}">
         <div class="card-body">
            <ul class="nav nav-tabs md-tabs boxparent-tabs mb-2" role="tablist">
               @foreach($value1->channel as $key2=>$value2)
               <li role="presentation" class="nav-item"><a class="{{$key2==0?'active':''}} nav-link" href="#channelTab{{$value2->id}}" aria-controls="channelTab1" role="tab" data-toggle="tab"  id ="{{$value2->id}}" onclick="showChannelData({{$value2->id}})">{{$value2->channel_name}}</a></li>
               @endforeach
            </ul>
            <div class="tab-content">
               @foreach($value1->channel as $key2=>$value2)
               <div role="tabpanel" class="tab-pane tabRamp-pane fade {{$key2==0?'show active':''}}" id="channelTab{{$value2->id}}">
                  <div class="text-left accoutList">
                     <ul>
                        <li><strong>Country -</strong>
                           @if(isset($value2['countrydata']) && !empty($value2['countrydata']))
                              @foreach($value2['countrydata'] as $country)
                              {{$country->country_name}}
                              @endforeach
                           @else
                              {{""}}
                           @endif
                        </li>
                        <li><strong>City Name -</strong>
                           @if(isset($value2['citydata']) && !empty($value2['citydata']))
                              @foreach($value2['citydata'] as $ct)
                              {{$ct['city_name']}}
                              @endforeach
                           @else
                              {{""}}
                           @endif
                        </li>
                        <li><strong>Site Name -</strong> {{$value2->site_name}}</li>
                        <li><strong>Language -</strong> English</li>
                     </ul>
                  </div>
                  <!-- ==== Billability ==== -->
                  <div class="accountDetailForm text-left mt-5">
                     <h5>Billability</h5>
                     <div class="row">
                        <input type="hidden" name="channel_id" value="{{$value2->id}}">
                        <div class="col col-lg-3 col-md-4 col-12">
                           <div class="form-group mb-4">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="How is the billing done for the account"><i class="far fa-info-circle"></i></button>
                                 <select class="selectpicker form-control" title="Billing Method" name="channel[{{$value2->id}}][monthly_ftp]" id="monthly_ftp">
                                    
                                    @foreach($billingType as $key=>$monthly_ftp)
                                       <option value="{{ $key }}">{{ $monthly_ftp }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="form-group mb-4">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Specify the parameter basis which the billing is capped. <br>Eg. <br> AHT @ 300 secs <br> Occ% @ 82%"><i class="far fa-info-circle"></i></button>
                                 <select class="selectpicker form-control" title="Billing Cap" id="billingCapDrop" name="channel[{{$value2->id}}][billing_cap]"  id="billing_cap">
                                    
                                    @foreach($billingCap as $key1=>$bill_cap)
                                       <option value="{{ $key1 }}">{{ $bill_cap }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="form-group mb-0 billing_cap_input" id="biilingCapPer">
                              <div class="fg-control fg_control_span">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Enter Value for selected Billing Cap"><i class="far fa-info-circle"></i></button>
                                 <input type="text" class="form-control" placeholder="Enter Value">
                                 <span>%</span>
                              </div>
                           </div>
                           <div class="form-group mb-0 billing_cap_input" id="biilingCapSec">
                              <div class="fg-control fg_control_span">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Enter Value for selected Billing Cap"><i class="far fa-info-circle"></i></button>
                                 <input type="text" class="form-control" placeholder="Enter Value">
                                 <span>Sec</span>
                              </div>
                           </div>
                        </div>
                        <div class="col col-lg-3 col-md-4 col-12">
                           <div class="form-group mb-4">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Specify the minimun guarantee for Billing. <br>Eg. <br> 85% of locked forecast"><i class="far fa-info-circle"></i></button>
                                 <select class="selectpicker form-control" title="Min Billing Guarantee" name="channel[{{$value2->id}}][billing_guarantee]">

                                    @foreach($minBillingGuarantee as $bill_gur=>$billing_guarantee)
                                       <option value="{{ $bill_gur }}">{{ $billing_guarantee }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="form-group mb-0">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Select the reference parameter for min. guarantee. <br>Eg. <br> 80% of the locked forecast"><i class="far fa-info-circle"></i></button>
                                 <select class="selectpicker form-control" title="Min Billing Reference" name="channel[{{$value2->id}}][min_bill_ref]">
                                    
                                    @foreach($minBillingReference as $min_ref=>$min_bill_ref)
                                       <option value="{{ $min_ref }}">{{ $min_bill_ref }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col col-lg-3 col-md-4 col-12">
                           <div class="form-group mb-4">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Specify the maximum billing. <br>Eg. <br> 110% of locked FTE"><i class="far fa-info-circle"></i></button>
                                 <select class="selectpicker form-control" title="Max Billable Threshold" name="channel[{{$value2->id}}][max_bill_thres]">
                                    
                                    @foreach($maxBillingThres as $max_thres=>$max_bill_thres)
                                       <option value="{{ $max_thres }}">{{ $max_bill_thres }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="form-group mb-0">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Select the input parameter for max billing. <br>Eg. <br> 110% of the locked FTE"><i class="far fa-info-circle"></i></button>
                                 <select class="selectpicker form-control" title="Max Billing Reference" name="channel[{{$value2->id}}][max_bill_ref]">
                                    
                                    @foreach($maxBillRef as $max_ref=>$max_bill_ref)
                                       <option value="{{ $max_ref }}">{{ $max_bill_ref }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col col-lg-3 col-md-12 col-12">
                           <div class="form-group mb-0">
                              <textarea class="form-control" placeholder="Remark" style="height:118px;" name="channel[{{$value2->id}}][bill_remark]"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- ==== KPIs & Objective ==== -->
                  <div class="accountDetailForm text-left mt-5">
                     <h5>KPIs & Objectives</h5>
                     <div class="row">
                        <div class="col col-lg-3 col-md-4 col-12">
                           <div class="form-group mb-4">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Agreed KPI metrics as per SOW. <br>Eg. <br> 80/30 Service Level <br> Abandoned < 5%"><i class="far fa-info-circle"></i></button>
                                 <select class="selectpicker form-control" title="Service KPI - 1 (If applicable)" name="channel[{{$value2->id}}][kpi1_app]">
                                    
                                    @foreach($serviceApi as $kpi1=>$kpi1_app)
                                       <option value="{{ $kpi1 }}">{{ $kpi1_app }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="form-group mb-0">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Please clearly write exact description of the target <br>e.g.<br> 80% in 20 Sec"><i class="far fa-info-circle"></i></button>
                                 <input type="text" class="form-control" placeholder="Service KPI - 1 - Target (%/Sec)" name="channel[{{$value2->id}}][kpi1_target]">
                              </div>
                           </div>
                        </div>
                        <div class="col col-lg-3 col-md-4 col-12">
                           <div class="form-group mb-4">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Agreed KPI metrics as per SOW. <br>Eg. <br> 80/30 Service Level <br> Abandoned < 5%"><i class="far fa-info-circle"></i></button>
                                 <select class="selectpicker form-control" title="Service KPI - 2 (If applicable)" name="channel[{{$value2->id}}][kpi2_app]">
                                    
                                    @foreach($serviceApi as $kpi2=>$kpi2_app)
                                       <option value="{{ $kpi2 }}">{{ $kpi2_app }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                           <div class="form-group mb-0">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Please clearly write exact description of the target <br>e.g.<br> 80% in 20 Sec"><i class="far fa-info-circle"></i></button>
                                 <input type="text" class="form-control" placeholder="Service KPI - 2 - Target (%/Sec)" name="channel[{{$value2->id}}][kpi2_target]">
                              </div>
                           </div>
                        </div>
                        <div class="col col-lg-3 col-md-4 col-12">
                           <div class="form-group mb-4">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Center is liable to staff upto 110% of the Interval / Daily Lock"><i class="far fa-info-circle"></i></button>
                                 <select class="selectpicker form-control" title="SOW Max Staffing Req?" name="channel[{{$value2->id}}][swo]">
                                   
                                    @foreach($maxBillingThres as $sw=>$swo)
                                       <option value="{{ $sw }}">{{ $swo }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col col-lg-3 col-md-12">
                           <div class="form-group mb-0">
                              <textarea class="form-control" placeholder="Remark" style="height:118px;" name="channel[{{$value2->id}}][kpi_remark]"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- ==== Operating Hours ==== -->
                  <div class="accountDetailForm text-left mt-5">
                     <h5>Operating Hours - <i class="fad fa-info-circle" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="General operating hours of the Programs / LOBs"></i></h5>
                     <div class="row">
                        <div class="col col-lg-3 col-md-4 col-12">
                           <div class="form-group mb-4">
                              <select class="selectpicker form-control" title="Weekday Start Time" name="channel[{{$value2->id}}][weekday_start_time]">
                                
                                 @foreach($time as $wst=>$weekday_start_time)
                                       <option value="{{ $wst }}">{{ $weekday_start_time }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group mb-0">
                              <select class="selectpicker form-control" title="Weekday End Time" name="channel[{{$value2->id}}][weekday_end_time]">
                                 
                                 @foreach($time as $wet=>$weekday_end_time)
                                       <option value="{{ $wet }}">{{ $weekday_end_time }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col col-lg-3 col-md-4 col-12">
                           <div class="form-group mb-4">
                              <select class="selectpicker form-control" title="Sat Start Time" name="channel[{{$value2->id}}][sat_start_time]">
                                
                                 @foreach($time as $sst=>$sat_start_time)
                                       <option value="{{ $sst }}">{{ $sat_start_time }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group mb-0">
                              <select class="selectpicker form-control" title="Sat End Time" name="channel[{{$value2->id}}][sat_end_time]">
                                 
                                 @foreach($time as $set=>$sat_end_time)
                                       <option value="{{ $set }}">{{ $sat_end_time }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col col-lg-3 col-md-4 col-12">
                           <div class="form-group mb-4">
                              <select class="selectpicker form-control" title="Sun Start Time" name="channel[{{$value2->id}}][sun_start_time]">
                                 
                                 @foreach($time as $sunst=>$sun_start_time)
                                       <option value="{{ $sunst }}">{{ $sun_start_time }}</option>
                                 @endforeach
                              </select>
                           </div>
                           <div class="form-group mb-0">
                              <select class="selectpicker form-control" title="Sun End Time" name="channel[{{$value2->id}}][sun_end_time]">
                                 
                                 @foreach($time as $sunet=>$sun_end_time)
                                       <option value="{{ $sunet }}">{{ $sun_end_time }}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col col-lg-3 col-md-12">
                           <div class="form-group mb-0">
                              <textarea class="form-control" placeholder="Remark" style="height:118px;" name="channel[{{$value2->id}}][operating_remark]"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- ==== Employee Details ==== -->
                  <div class="accountDetailForm text-left mt-5">
                     <h5>Employee Details</h5>
                     <div class="row">
                        <div class="col col-lg-3 col-md-4 col-12">
                           <div class="form-group mb-0">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="1 FTE = 40 hrs or as per SOW/Labor Law"><i class="far fa-info-circle"></i></button>
                                 <select class="selectpicker form-control" title="Full-Time Employees" name="channel[{{$value2->id}}][full_time_employee]">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col col-lg-3 col-md-4 col-12">
                           <div class="form-group mb-0">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="1 FTE = 20-30 hrs or as per Labor Law"><i class="far fa-info-circle"></i></button>
                                 <select class="selectpicker form-control" title="Part-Time Employees" name="channel[{{$value2->id}}][part_time_employee]">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col col-lg-3 col-md-4 col-12">
                           <div class="form-group mb-0">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Seasonal hires, contractual hires"><i class="far fa-info-circle"></i></button>
                                 <select class="selectpicker form-control" title="Contractual Employees" name="channel[{{$value2->id}}][contract_employee]">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col col-lg-3 col-md-12">
                           <div class="form-group mb-0">
                              <textarea class="form-control" placeholder="Remark" name="channel[{{$value2->id}}][employee_remark]"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- ==== System Information ==== -->
                  <div class="accountDetailForm text-left mt-5">
                     <h5>System Information</h5>
                     <div class="row">
                        <div class="col col-lg-3 col-md-4 col-12">
                           <div class="form-group mb-0">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Name of the ACD- Avaya, Cisco, Aws etc."><i class="far fa-info-circle"></i></button>
                                 <select class="selectpicker form-control" title="ACD Name" name="channel[{{$value2->id}}][acd_name]">
                                   
                                    @foreach($acdBillSystem as $acd=>$acd_name)
                                       <option value="{{ $acd }}">{{ $acd_name }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col col-lg-3 col-md-4 col-12">
                           <div class="form-group mb-0">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Name of WFM Scheduling Tool Verint, Nice"><i class="far fa-info-circle"></i></button>
                                 <select class="selectpicker form-control" title="WFM Tool" name="channel[{{$value2->id}}][wfm_tool]">
                                    
                                    @foreach($wfmSystem as $wfm=>$wfm_tool)
                                       <option value="{{ $wfm }}">{{ $wfm_tool }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col col-lg-3 col-md-4 col-12">
                           <div class="form-group mb-0">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Name of Backoffice support tool - Kana, Salesforce"><i class="far fa-info-circle"></i></button>
                                 <input type="text" class="form-control" placeholder="Back office Tool" name="channel[{{$value2->id}}][back_tool]">
                              </div>
                           </div>
                        </div>
                        <div class="col col-lg-3 col-md-12">
                           <div class="form-group mb-0">
                              <textarea class="form-control" placeholder="Remark" name="channel[{{$value2->id}}][system_remark]"></textarea>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- ==== Training, Authorized Locations and Process Details ==== -->
                  <div class="accountDetailForm text-left mt-5">
                     <div class="row">
                        <!-- ==== Training Details ==== -->
                        <div class="col col-lg-3 col-md-4 col-12">
                           <h5>Training Details</h5>
                           <div class="form-group mb-4">
                              <input type="text" class="form-control" placeholder="Classroom Training Duration (Weeks)" name="channel[{{$value2->id}}][class_duration]">
                           </div>
                           <div class="form-group mb-0">
                              <input type="text" class="form-control" placeholder="Nesting / OJT Duration (Weeks)" name="channel[{{$value2->id}}][nesting_duration]">
                           </div>
                        </div>
                        <!-- ==== Authorized Locations Details ==== -->
                        <div class="col col-lg-3 col-md-4 col-12">
                           <h5>Authorized Locations</h5>
                           <div class="form-group mb-4">
                              <select class="selectpicker form-control" title="Work in Office" name="channel[{{$value2->id}}][work_office]">
                                 <option value="Yes">Yes</option>
                                 <option value="No">No</option>
                              </select>
                           </div>
                           <div class="form-group mb-0">
                              <select class="selectpicker form-control" title="Work from Home" name="channel[{{$value2->id}}][work_home]">
                                 <option value="Yes">Yes</option>
                                 <option value="No">No</option>
                              </select>
                           </div>
                        </div>
                        <!-- ==== Process Details ==== -->
                        <div class="col col-lg-3 col-md-4 col-12">
                           <h5>Process Details</h5>
                           <div class="form-group mb-0">
                              <div class="fg-control">
                                 <button type="button" class="infoButton" data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="Select the program segment. <br>Eg. <br> Telecom, Retail etc."><i class="far fa-info-circle"></i></button>
                                 <select class="selectpicker form-control" title="Industry Segment (Eg : Finance, Retail, Insurance, Banking)" name="channel[{{$value2->id}}][industry_segment]">
                                    
                                    @foreach($processDetails as $pd=>$industry_segment)
                                    <option value="{{$pd}}">{{ $industry_segment }}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>
                        </div>
                        <div class="col col-lg-3 col-md-12">
                           <div class="form-group mb-0" style="margin-top:33px;">
                              <textarea class="form-control" placeholder="Remark" name="channel[{{$value2->id}}][progress_remark]"></textarea>
                           </div>
                        </div>
                        <!-- <div class="form-group col-lg-3 col-md-4">
                           <input type="text" class="form-control" placeholder="Total Training Duration (Weeks)">
                           </div> -->
                     </div>
                  </div>
                  <div class="saveChannel text-center mt-4">
                     <button type="button" id="{{$value2->id}}" class="add_channeldata">Save Channel</button>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>

{{-- model popup --}}



   @endforeach
</div>
@endforeach




<script>
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
                     alert("Channel Data Saved Successfully!");
                     $("#collapse"+chan_id).collapse('hide');
                  }
              }
         });
      })

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

 <script>

function fromLobSelect(id){
   $("#success_msg").html("");
            var val = $('#from_lob_select'+id).val();
            $.ajax({
                type: "POST",
                url: "{{ route('getChannels') }}",
                    data: {
                            lob_id: val,
                            },
                            error:function(error){
                              alert(error);
                            },
                success: function (result){
                        $('#from_channels'+id).empty();
                        $('#from_channels'+id).append('<option disabled>Select Channel</option>');
                            $.each(result.data,function(i,v){
                             // $.each(v.lobs,function(ii,vv){
                                $('#from_channels'+id).append('<option value="'+v.id+'">'+v.channel_name+'</option>');
                              });
                            //});
                            $('.selectpicker').selectpicker('refresh');
                     }   
                })

}

function toLobSelect(id){
   var acc = $(this).data("acc");
               $("#success_msg").html("");
            var val = $('#to_lob_select'+id).val();
            $.ajax({
                type: "POST",
                url: "{{ route('getChannels') }}",
                    data: {
                            lob_id: val,
                            },
                           
                success: function (result){
                        $('#to_channels'+id).empty();
                        $('#to_channels'+id).append('<option disabled>Select Channel</option>');
                            $.each(result.data,function(i,v){
                                $('#to_channels'+id).append('<option value="'+v.id+'">'+v.channel_name+'</option>');
                              });
                            $('.selectpicker').selectpicker('refresh');
                     }   
                })
}

 $(document).ready(function(e) {
         // $(document).on('change','#from_lob_select',function(){
           
         //    var acc = $(this).data("acc");
         //    $("#success_msg").html("");
         //    var val = $('#from_lob_select'+acc).val();
         //    alert(val);
         //    $.ajax({
         //        type: "POST",
         //        url: "{{ route('getChannels') }}",
         //            data: {
         //                    lob_id: val,
         //                    },
         //                    error:function(error){
         //                      alert(error);
         //                    },
         //        success: function (result){
         //                $('#from_channels'+acc).empty();
         //                $('#from_channels'+acc).append('<option disabled>Select Channel</option>');
         //                    $.each(result.data,function(i,v){
         //                     // $.each(v.lobs,function(ii,vv){
         //                        $('#from_channels'+acc).append('<option value="'+v.id+'">'+v.channel_name+'</option>');
         //                      });
         //                    //});
         //                    $('.selectpicker').selectpicker('refresh');
         //             }   
         //        })
         //    });

            // $(document).on('change','#to_lob_select',function(){ 
            //    var acc = $(this).data("acc");
            //    $("#success_msg").html("");
            // var val = $('#to_lob_select'+acc).val();
            // alert($('#to_lob_select'+acc).val());
            // $.ajax({
            //     type: "POST",
            //     url: "{{ route('getChannels') }}",
            //         data: {
            //                 lob_id: val,
            //                 },
                           
            //     success: function (result){
            //             $('#to_channels'+acc).empty();
            //             $('#to_channels'+acc).append('<option disabled>Select Channel</option>');
            //                 $.each(result.data,function(i,v){
            //                     $('#to_channels'+acc).append('<option value="'+v.id+'">'+v.channel_name+'</option>');
            //                   });
            //                 $('.selectpicker').selectpicker('refresh');
            //          }   
            //     })
            // });
  

// Added By Jaydeep on 17/01/2023

   $('.addcopyData').click(function(){
      var acc = $(this).data("id");
      var from_lob = $("#from_lob_select"+acc).val();
      var from_channel = $("#from_channels"+acc).val();
      var to_lob = $("#to_lob_select"+acc).val();
      var to_channel = $("#to_channels"+acc).val();
         //chan_id=$(this).attr('id');
         //copy_data=$('#msform :input,select,textarea').serialize();
         $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
         $.ajax({
              type: "POST",
              url: "{{route('addCopyData')}}",
              //data: copy_data,//channel_data, // serializes the form's elements.
              data: { from_lob:from_lob, from_channel: from_channel,
                      to_lob:to_lob, to_channel:to_channel
                     },
              success: function(result)
              {
                  console.log(result.success);
                  if(result){
                     $("#success_msg").html(result.message);
                  }
              }
         });
      })

     });

function showChannelData(id) {
   $.ajax({
              type: "POST",
              url: "{{route('getChannelData')}}",
              //data: copy_data,//channel_data, // serializes the form's elements.
              data: { id : id},
              success: function(result)
              {
                  console.log(result.data);
                  if(result){
                     $("#monthly_ftp").val(1).attr('selected','selected');
                     $('.selectpicker').selectpicker('refresh');
                     if(!empty(result.data.billing_cap) && result.data.billing_cap != null){
                        $("#billing_cap").value(result.data.billing_cap).change();
                     }

                     result.data.monthly_ftp

                     if(!empty(result.data.monthly_ftp) && result.data.monthly_ftp != null){
                        $("#monthly_ftp").val(result.data.monthly_ftp).change();
                        $('#monthly_ftp option[value='+result.data.monthly_ftp+']').attr('selected','selected');
                     }
                  }
              }
         });
}
 </script>


