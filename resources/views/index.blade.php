@extends('layouts.front')
@section('content')
<div class="wrapper-panel">
   <div class="login-comman login-right">
      <div class="bg-span"></div>
      <div class="accountwelocme_box">
         <h1>WFM Self-Assessment</h1>
         <p>This assessment guides you to the opportunities for improving <br>your Financials & CX.</p>
         <button type="button" class="letstartBtn">Let’s start <i
            class="fal fa-long-arrow-alt-right"></i></button>
      </div>
   </div>
   <!-- ======== Account Process Form ====== -->
   <div class="accountproce-container" id="accountSidebar">
      <button id="accountClose" class="accounthide" type="button"> <i class="far fa-times"></i></button>
      <div class="account_step_form">
         <form id="accountForms" class="accountForm" action="{{route('home')}}" method="get">
            <!-- progressbar -->
            <ul id="progressbarAct" class="progressbar_ul">
               <li class="active">Account Details</li>
               <li>Contents</li>
               <li>General Overview</li>
               <li>Detailed Information</li>
               <li>Process Information</li>
               <li>Files Information</li>
               <li>Summary Details</li>
            </ul>
            <!-- ========= Register Tab ======= -->

            <fieldset class="fielset_panel fielset_height check_user_data" data-route="{{route('clients.store')}}" data-name="client_info">
               <div class="scrollbarbar">
                  <div class="container">
                     <div class="row d-flex align-items-center justify-content-center">
                        <div class="col col-lg-10 col-12">
                           <div class="input_contianer">
                              <h3 class="mb-5">Let’s start by understanding your Business / Process and People.</h3>
                              <div class="row d-flex align-items-center justify-content-center">
                                 <div class="col col-lg-6 col-12">
                                    <input type="hidden" name="client_id" class="client_id" value="1">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" placeholder="Name" name="name" id="client_name" required>
                                    </div>
                                    <div class="form-group">
                                      <input type="email" class="form-control" placeholder="Business Email" name="email" id="client_email" required>
                                      <span class="email_error text-danger"></span>
                                    </div>
                                 </div>
                              </div>

                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="footerBtn-panel">
                     <button type="button" class="action-button previous_button">Back</button>
                     <button type="button" class="next action-button save-data">Save & Continue</button>
                  </div>
               </div>
            </fieldset>

            <!-- ========= Content Tab ======= -->
            <fieldset class="fielset_panel fielset_height">
               <div class="scrollbarbar">
                  <div class="container">
                     <div class="row d-flex align-items-center justify-content-center">
                        <div class="col col-lg-6 col-12">
                           <div class="input_contianer">
                              <h3>Let’s start by understanding your Business / Process and People.</h3>
                              <ul class="content_ul mt-4">
                                 <li>
                                    <a href="#">
                                       <h4>General Overview - By Account</h4>
                                       <span>Not Started</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#">
                                       <h4>Detailed Information - By Account</h4>
                                       <span>Not Started</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#">
                                       <h4>Process Information - By Account</h4>
                                       <span>Not Started</span>
                                    </a>
                                 </li>
                                 <li>
                                    <a href="#">
                                       <h4>Files Information</h4>
                                       <span>Not Started</span>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="footerBtn-panel">
                     <button type="button" class="action-button previous previous_button">Back</button>
                     <button type="button" class="next action-button">Save & Continue</button>
                  </div>

                  <?php if(isset($clients)){echo "<pre>"; print_r($clients);} 
                  
                  ?>

               </div>
            </fieldset>
            <!-- ========= General Overview Tab ======= -->
            <fieldset class="fielset_panel fielset_height" data-route="{{route('accounts.store')}}" data-name="general_info">
                <input type="hidden" name="client_id" class="client_id" value="">
                <input type="hidden" name="temp_id" id="temp_id" class="temp_id" value="{{substr(md5(mt_rand()), 0, 7)}}">
               <div class="scrollbarbar">
                  <div class="generalTableForm">
                     <div class="account_more"></div>
                     <div class="addmorePanel text-left mt-4">
                        <a href="javascript:void(0);" id="addmore_acount">Add Account</a>
                     </div>
                  </div>
                  <div class="footerBtn-panel">
                     <button type="button" class="action-button previous previous_button">Back</button>
                     <button type="button" class="next action-button">Save & Continue</button>
                  </div>
               </div>
            </fieldset>
            <!-- ========= Detailed Information Tab ======= -->
            <fieldset class="fielset_panel fielset_height" data-route="{{route('get_account')}}" data-name="detailed_info">
               <div class="scrollbarbar">
                  <div style="width:100%;position:relative;">
                     <div class="details-container text-left mb-5">

                     </div>

                  </div>
                  <div class="footerBtn-panel">
                     <button type="button" class="action-button previous previous_button">Back</button>
                     <button type="button" class="next action-button">Save & Continue</button>
                  </div>
               </div>
            </fieldset>
            <!-- ========= Process Information Tab by findp ======= -->
            <fieldset class="fielset_panel fielset_height process_info" data-name="process_info">
               <div class="scrollbarbar">
                  <div class="container" style="position:relative;">
                     <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4">
                           <div class="form-group">
                              <select class="selectpicker form-control" title="Select Account Name" name="account_names" id="account_names">
                                 <!-- <option>Apple</option>
                                 <option>Microsoft</option>
                                 <option>Jio</option> -->
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                           <div class="form-group">
                              <select class="selectpicker form-control" title="Select LOB" multiple name="process_info[lob_names][]" id="lob_names">
                                 <!-- <option>LOB 1</option>
                                 <option>LOB 2</option>
                                 <option>LOB 3</option>
                                 <option>LOB 4</option>
                                 <option>LOB 5</option> -->
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                           <div class="form-group">
                              <select class="selectpicker form-control" title="Select Channels" multiple name="process_info[channelnames][]" id="channelnames">
                                 <!-- <option>Voice - IB</option>
                                 <option>Voice - OB</option>
                                 <option>Chat</option>
                                 <option>Email</option>
                                 <option>Back Office</option>
                                 <option>Social Media</option>
                                 <option>Other</option> -->
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-4">
                           <div class="form-group">
                              <select class="selectpicker form-control" multiple name="country[]" title="Select Country" id="country">
                                 <!-- <option>Afghanistan</option>
                                 <option>Albania</option>
                                 <option>Algeria</option>
                                 <option>Andorra</option>
                                 <option>Angola</option>
                                 <option>Antigua and Barbuda</option>
                                 <option>Argentina</option>
                                 <option>Armenia</option>
                                 <option>Australia</option>
                                 <option>Austria</option>
                                 <option>Azerbaijan</option>
                                 <option>Bahamas</option>
                                 <option>Bahrain</option>
                                 <option>Bangladesh</option>
                                 <option>Barbados</option>
                                 <option>Belarus</option>
                                 <option>Belgium</option>
                                 <option>Belize</option>
                                 <option>Benin</option>
                                 <option>Bhutan</option>
                                 <option>Bolivia</option> -->
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col col-md-12">
                           <div class="processTableForm generalTableForm">
                              <div class="table-responsive">
                                 <table class="table">
                                    <!-- ======= Forecasting  ======= -->
                                    <tbody>
                                       <tr>
                                          <th colspan="2" class="bg_th">Forecasting</th>
                                       </tr>
                                       <tr>
                                          <td>Which Forecasting tool / software package is being utilised?</td>
                                          <td>
                                             <div class="form-group">
                                                <input type="text" name="f_1" id="f_1" class="form-control" placeholder="Please Enter">
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Which Forecasting model is being used?</td>
                                          <td>
                                             <div class="form-group">
                                                <input type="text" name="f_2" id="f_2" class="form-control" placeholder="Please Enter">
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>What are the key input parameters to the model?</td>
                                          <td>
                                             <div class="form-group">
                                                <input type="text"  name="f_3" id="f_3" class="form-control" placeholder="Please Enter">
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>How frequently is the model revisited for goodness of fit?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control"  name="f_4" id="f_4" title="Please select">
                                                   <option value="Monthly">Monthly</option>
                                                   <option value="Quarterly">Quarterly</option>
                                                   <option value="Half-yearly">Half-yearly</option>
                                                   <option value="Yearly">Yearly</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>How do you measure the accuracy of your Forecasting model?</td>
                                          <td>
                                             <div class="form-group">
                                                <input type="text"  name="f_5" id="f_5" class="form-control" placeholder="Please Enter">
                                             </div>
                                          </td>
                                       </tr>
                                    </tbody>
                                    <!-- ========= Staffing / Resource Planning  ======= -->
                                    <tbody>
                                       <tr>
                                          <th colspan="2" class="bg_th">Staffing / Resource Planning</th>
                                       </tr>
                                       <!-- Forecast Locks -->
                                       <tr>
                                          <th colspan="2">Forecast Locks</th>
                                       </tr>
                                       <tr>
                                          <td>Who provides the Forecast / Lock which forms the base of Staff Planning?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control"  name="f_6" id="f_6" title="Please select">
                                                   <option value="Client">Client</option>
                                                   <option value="Internal">Internal</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>What is your staff locking model?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control"  name="f_7" id="f_7" title="Please select">
                                                   <option value="FTE">FTE</option>
                                                   <option value="Incenter Hours">Incenter Hours</option>
                                                   <option value="Production Hours">Production Hours</option>
                                                   <option value="Handle Minutes">Handle Minutes</option>
                                                   <option value="Calls">Calls</option>
                                                   <option value="Emails">Emails</option>
                                                   <option value="Chats">Chats</option>
                                                   <option value="Workstations">Workstations</option>
                                                   <option value="Social Media">Social Media</option>
                                                   <option value="Other">Other</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Do you generate Internal Forecast?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control"  name="f_8" id="f_8" title="Please select">
                                                   <option value="yes">Yes</option>
                                                   <option value="no">No</option>
                                                   <option value="NA">Not Applicable</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Which Forecast is used for Staff Planning?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_9" id="f_9"  title="Please select">
                                                   <option value="client forecast">Client Forecast</option>
                                                   <option value="internal Forecast">Internal Forecast</option>
                                                   <option value="NA">Not Applicable</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <!-- AHT -->
                                       <tr>
                                          <th colspan="2">AHT</th>
                                       </tr>
                                       <tr>
                                          <td>What AHT is used for Staff Planning?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control"  name="f_10" id="f_10" title="Please select">
                                                   <option value="Target-Internal">Target-Internal</option>
                                                   <option value="Target-Client">Target-Client</option>
                                                   <option value="Billable-Cap">Billable-Cap</option>
                                                   <option value="Trend-Based">Trend-Based</option>
                                                   <option value="NA">Not Applicable</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>How do you calculate New Hire impact on the AHT?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_11" id="f_11" title="Please select">
                                                   <option value="Not Considered">Not Considered</option>
                                                   <option value="Experiential">Experiential</option>
                                                   <option value="Calculation (Learning Curve)">Calculation (Learning Curve)</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <!-- FTE -->
                                       <tr>
                                          <th colspan="2">FTE</th>
                                       </tr>
                                       <tr>
                                          <td>How do you generate FTE requirements?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_12" id="f_12" title="Please select">
                                                   <option value="Client-Provided">Client-Provided</option>
                                                   <option value="Workload Fn">Workload Fn</option>
                                                   <option value="Erlang">Erlang</option>
                                                   <option value="Simulation-Based">Simulation-Based</option>
                                                   <option value="Other">Other</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <!-- In-Office Shrinkage -->
                                       <tr>
                                          <th colspan="2">In-Office Shrinkage</th>
                                       </tr>
                                       <tr>
                                          <td>At what level are your In-Office Shrinkages planned?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_13" id="f_13" title="Please select">
                                                   <option value="All Combined">All Combined</option>
                                                   <option value="By Aux-code">By Aux-code</option>
                                                   <option value="By Activity-code">By Activity-code</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Do you have set targets for each individual Aux/Activity code?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_14" id="f_14" title="Please select">
                                                   <option value="Yes">Yes</option>
                                                   <option value="No">No</option>
                                                   <option value="NA">Not Applicable</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>In-Office shrinkage Forecasts are modeled on (please select the appropriate)</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_15" id="f_15" title="Please select">
                                                   <option value="Trend">Trend</option>
                                                   <option value="Targets">Targets</option>
                                                   <option value="Operational-Commitments">Operational-Commitments</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <!-- Out-of-Office Shrinkage -->
                                       <tr>
                                          <th colspan="2">Out-of-Office Shrinkage</th>
                                       </tr>
                                       <tr>
                                          <td>At what level are your Out-of-Office Shrinkages planned?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_16" id="f_16" title="Please select">
                                                   <option value="All Combined">All Combined</option>
                                                   <option value="By Absence Codes">By Absence Codes</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Vacation Forecasts are modeled on (please select the appropriate)</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_17" id="f_17" title="Please select">
                                                   <option value="Targets">Targets</option>
                                                   <option value="Trends">Trends</option>
                                                   <option value="Modulated (Need-Based)">Modulated (Need-Based)</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Absenteeism Forecasts are modeled on (please select the appropriate)</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_18" id="f_18" title="Please select">
                                                    <option value="Targets">Targets</option>
                                                    <option value="Trends">Trends</option>
                                                   <option value="Trend & Seasonality">Trend & Seasonality</option>
                                                   <option value="Operational Commitments">Operational Commitments</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <!-- Schedule Inflex -->
                                       <tr>
                                          <th colspan="2">Schedule Inflex</th>
                                       </tr>
                                       <tr>
                                          <td>Is Schedule Inflex considered in Staff planning?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_19" id="f_19" title="Please select">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>How is the Schedule Inflex estimated / calculated?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_20" id="f_20" title="Please select">
                                                   <option value="Experiential">Experiential</option>
                                                   <option value="Schedule Simulation">Schedule Simulation</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <!-- Attrition -->
                                       <tr>
                                          <th colspan="2">Attrition</th>
                                       </tr>
                                       <tr>
                                          <td>How do you factor attrition in your staff plan?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_21" id="f_21" title="Please select">
                                                    <option value="Targets">Targets</option>
                                                    <option value="Trends">Trends</option>
                                                   <option value="Trend & Seasonality">Trend & Seasonality</option>
                                                   <option value="Operational Commitments">Operational Commitments</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Do you plan for Involuntary Attrition as a separate line item? (BQM, Promotions, Transfers etc.)</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_22" id="f_22" title="Please select">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <!-- Staff Planning Connects -->
                                       <tr>
                                          <th colspan="2">Staff Planning Connects</th>
                                       </tr>
                                       <tr>
                                          <td>Do you have Inter-departmental Staff planning discussions?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_23" id="f_23" title="Please select">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>What is the frequency?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_24" id="f_24" title="Please select">
                                                   <option value="Weekly">Weekly</option>
                                                   <option value="Bi-weekly">Bi-weekly</option>
                                                   <option value="Monthly">Monthly</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td colspan="2"><strong>Who decides the below:-</strong></td>
                                       </tr>
                                       <tr>
                                          <td>Staffing Plan (Validation & Signing off key assumptions such as AHT, Shrinkage etc.</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_25" id="f_25" title="Please select">
                                                   <option value="Operations">Operations</option>
                                                   <option value="WFM">WFM</option>
                                                   <option value="Client">Client</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Adding Batches</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_26" id="f_26" title="Please select">
                                                    <option value="Operations">Operations</option>
                                                    <option value="WFM">WFM</option>
                                                    <option value="Client">Client</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Removing Batches</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_27" id="f_27" title="Please select">
                                                    <option value="Operations">Operations</option>
                                                    <option value="WFM">WFM</option>
                                                    <option value="Client">Client</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Cross Skilling</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_28" id="f_28" title="Please select">
                                                    <option value="Operations">Operations</option>
                                                    <option value="WFM">WFM</option>
                                                    <option value="Client">Client</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Is there a client dependency for hiring batches?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control"  name="f_29" id="f_29" title="Please select">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Do you have a calibration calls with the Recruitment team</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_30" id="f_30" title="Please select">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>If Yes – Weekly or Monthly</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_31" id="f_31" title="Please select">
                                                    <option value="Weekly">Weekly</option>
                                                    <option value="Bi-weekly">Bi-weekly</option>
                                                    <option value="Monthly">Monthly</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                    </tbody>
                                    <!-- ========= Scheduling  ======= -->
                                    <tbody>
                                       <tr>
                                          <th colspan="2" class="bg_th">Scheduling</th>
                                       </tr>
                                       <tr>
                                          <td>Do you do Call Curve Analysis before deciding the Schedule Pattern?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_32" id="f_32" title="Please select">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>What is the frequency of the above?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_33" id="f_33" title="Please select">
                                                   <option value="Monthly">Monthly</option>
                                                   <option value="Quarterly">Quarterly</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>How do you create interval level Volume and AHT requirements?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_34" id="f_34" title="Please select">
                                                    <option value="Monthly">Monthly</option>
                                                    <option value="Quarterly">Quarterly</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>How do you manage the Headcount reconciliation process?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_35" id="f_35" title="Please select">
                                                   <option value="Employee Database - Internal">Employee Database - Internal</option>
                                                   <option value="Employee Database - Client">Employee Database - Client</option>
                                                   <option value="Weekly Inputs from Operations">Weekly Inputs from Operations</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Do you run Manpower Dimensionioning exercise frequently to arrive at optimal HC mix (FT/PT/Split/Flexi?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_36" id="f_36" title="Please select">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>What is the frequency of the above?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_37" id="f_37" title="Please select">
                                                    <option value="Weekly">Weekly</option>
                                                    <option value="Bi-weekly">Bi-weekly</option>
                                                    <option value="Monthly">Monthly</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Do you run & test different Schedule Patterns to identify best fit?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_38" id="f_38" title="Please select">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>What is the frequency of the above?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_39" id="f_39" title="Please select">
                                                    <option value="Weekly">Weekly</option>
                                                    <option value="Bi-weekly">Bi-weekly</option>
                                                    <option value="Monthly">Monthly</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Do you plot all In-office shrinkages in your Schedules at Interval Level? (Coaching, Team Meeting, Business Updates etc.)</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_40" id="f_40" title="Please select">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                   <option value="NA">Not Applicable</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Do you plot Out-of-Office shrinkage in your Schedules at Interval Level? (Vacation)</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_41" id="f_41" title="Please select">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                   <option value="NA">Not Applicable</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Do you review IDP/Schedule deviation prior to schedule release?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_42" id="f_42" title="Please select">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Do you measure Schedule Efficiency?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_43" id="f_43" title="Please select">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>What is your target for Schedule Efficiency? (Please specify in %)</td>
                                          <td>
                                             <div class="form-group">
                                                <input type="text" name="f_44" id="f_44" class="form-control">
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>How do you measure the Schedule Efficiency?</td>
                                          <td>
                                             <div class="form-group">
                                                <input type="text" name="f_45" id="f_45" class="form-control">
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>What is your internal target for Scheduling accuracy? (Requirment to Scheduled - Day/Intervals)</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_46" id="f_46" title="Please select">
                                                   <option value="50%"> &lt; 50%</option>
                                                   <option value="50% to 70%">50% to 75%</option>
                                                   <option value="75% to 90%">75% to 90%</option>
                                                   <option value="90%"> &gt; 90%</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>How do you measure the Schedule Accuracy?</td>
                                          <td>
                                             <div class="form-group">
                                                <input type="text" name="f_47" id="f_47" class="form-control">
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Do you measure the impact of various Scheduling Constraints on the account in terms or FTE & Cost?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_48" id="f_48" title="Please select">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                    </tbody>
                                    <!-- ========= Intraday Management  ======= -->
                                    <tbody>
                                       <tr>
                                          <th colspan="2" class="bg_th">Intraday Management</th>
                                       </tr>
                                       <tr>
                                          <td>Do you have a WFM Play book / Guide? E.g - Downtime Process, Calling Tree, Threshold & Skilling</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control"  name="f_49" id="f_49" title="Please select">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Does RTA have a daily read out call / RCA?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_50" id="f_50" title="Please select">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Does the RTA do real time skill management?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_51" id="f_51" title="Please select">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Does RTA do Intra-day Reforecasting?</td>
                                          <td>
                                             <div class="form-group">
                                                <select class="selectpicker form-control" name="f_52" id="f_52" title="Please select">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>How do you manage customers resources up or down Realtime?</td>
                                          <td>
                                             <div class="form-group">
                                                <input type="text" name="f_53" id="f_53" class="form-control">
                                             </div>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>How do you manage and report, variance to plan Realtime?</td>
                                          <td>
                                             <div class="form-group">
                                                <input type="text" name="f_54" id="f_54" class="form-control">
                                             </div>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <div class="saveChannel text-center mt-5">
                              <button type="button" id="process_info">Save & Clear</button>
                           </div>
                        </div>
                     </div>

                  </div>
                  <div class="footerBtn-panel">
                     <button type="button" class="action-button previous previous_button">Back</button>
                     <button type="button" class="next action-button">Save & Continue</button>
                  </div>
               </div>
            </fieldset>
            <!-- ========= Files Information Tab ======= -->
            <fieldset class="fielset_panel fielset_height">
               <div class="scrollbarbar">
                  <div class="container">
                     <div class="row d-flex align-items-center justify-content-center">
                        <div class="col col-lg-8 col-12">
                           <div class="accordion file_page" id="accordionFileUpload">

                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="footerBtn-panel">
                     <?php $value = session('client_id');?>
                     <button type="button" class="action-button previous previous_button">Back</button>
                     <button type="button" class="next action-button" onclick="loadSummary({{session('client_id')}})">Save & Continue</button>
                  </div>
               </div>
            </fieldset>
            <!-- ========= Summary Details Tab ======= -->
            <fieldset class="fielset_panel fielset_height summary_page">
               
            </fieldset>
         </form>
      </div>
   </div>
   <div class="overlayaccount"></div>
</div>
<!-- Clone Data Modal popup -->

@endsection
@section('script')
<script>
   
   $(document).ready(function(e) {
      //Added By Jaydeep
      $(document).on('change','#account_names',function(){
            var val = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('getLobList') }}",
                    data: {
                            acc_id: val,
                            },
                success: function (result){
                        $('#lob_names').empty();
                        $('#lob_names').append('<option>Select LOB</option>');
                            $.each(result.data,function(i,v){
                              $.each(v.lobs,function(ii,vv){
                                $('#lob_names').append('<option value="'+vv.id+'">'+vv.lob_name+'</option>');
                              });
                            });
                            $('.selectpicker').selectpicker('refresh');
                     }   
                })
            });

            $(document).on('change','#lob_names',function(){
            var val = $(this).val();
           
            $.ajax({
                type: "POST",
                url: "{{ route('getChannelList') }}",
                    data: {
                            lob_id: val,
                            },
                success: function (result){
                        $('#channelnames').empty();
                        $('#channelnames').append('<option disabled>Select Channel</option>');
                            $.each(result.data,function(i,v){
                             // $.each(v.lobs,function(ii,vv){
                                $('#channelnames').append('<option value="'+v.id+'">'+v.channel_name+'</option>');
                              });
                            //});
                            $('.selectpicker').selectpicker('refresh');
                     }   
                })
            });
            $(document).on('change','#channelnames',function(){
            var val = $(this).val();
            
            $.ajax({
                type: "POST",
                url: "{{ route('getCountryList') }}",
                    data: {
                            channel_id: val,
                            },
                success: function (result){
                        $('#country').empty();
                        //$('#country').append('<option disabled>Select country</option>');
                            $.each(result.data,function(i,v){ console.log(v);
                                 $('#country').append('<option value="'+v.country_id+'" selected>'+v.country_name+'</option>');
                               });
                               $('.selectpicker').selectpicker('refresh');
                            }
                            
                       
                });
            });

            $("#f_8, #f_9, #f_20, #f_24, #f_31,#f_33, #f_37, #f_44, #f_45").prop('disabled', true);

            $(document).on('change','#f_6,#f_19, #f_23, #f_30, #f_32, #f_36, #f_43',function(){
               var f6 = $("#f_6").val();
               var f19 = $("#f_19").val();
               var f23 = $("#f_23").val();
               var f30 = $("#f_30").val();
               var f32 = $("#f_32").val();
               var f36 = $("#f_36").val();
               var f43 = $("#f_43").val();


               if(f6 == "Client"){
                  $("#f_8, #f_9").prop('disabled', false);
               }else{
                  $("#f_8, #f_9").prop('disabled', true);
                  $("#f_8, #f_9").val('');
               }

               if(f19 == "Yes"){
                  $("#f_20").prop('disabled', false);
               }else{
                  $("#f_20").prop('disabled', true);
                  $("#f_20").val('');
               }
               
               if(f23 == "Yes"){
                  $("#f_24").prop('disabled', false);
               }else{
                  $("#f_24").prop('disabled', true);
                  $("#f_24").val('');
               }

               if(f30 == "Yes"){
                  $("#f_31").prop('disabled', false);
               }else{
                  $("#f_31").prop('disabled', true);
                  $("#f_31").val('');
               }

               if(f32 == "Yes"){
                  $("#f_33").prop('disabled', false);
               }else{
                  $("#f_33").prop('disabled', true);
                  $("#f_33").val('');
               }

               if(f36 == "Yes"){
                  $("#f_37").prop('disabled', false);
               }else{
                  $("#f_37").prop('disabled', true);
                  $("#f_37").val('');
               }

               if(f43 == "Yes"){
                  $("#f_44, #f_45").prop('disabled', false);
               }else{
                  $("#f_44, #f_45").prop('disabled', true);
                  $("#f_44, #f_45").val('');
               }
               $('.selectpicker').selectpicker('refresh');
               
            });

            

      //ended here by Jaydeep

       $('#process_info').click(function(){
         process_data=$('.process_info :input,select,textarea').serialize();
         console.log(process_data);
         $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
         $.ajax({
              type: "POST",
              url: "{{route('process_info')}}",
              data: process_data, // serializes the form's elements.
              success: function(result)
              { 
                  console.log(result);
                  if(result.status){
                     alert("Process Information Saved Successfully.");
                     $("#f_1, #f_2, #f_3,#f_5,#f_8, #f_9, #f_20, #f_24, #f_44, #f_45, #f_47, #f_53, #f_54, #account_names").val("");
                     $('.selectpicker').selectpicker('refresh');
                     //$('#f_6,#f_19, #f_23, #f_30, #f_32, #f_36, #f_43', '#account_names').val("").selectpicker('refresh');
                     //$("#f_8, #f_9, #f_20, #f_24, #f_31,#f_33, #f_37, #f_44, #f_45").val("").selectpicker('refresh');;
                     $("#lob_names, #channelnames, #country, #f_4, #f_6, #f_7, #f_8, #f_9, #f_10, #f_11, #f_12, #f_13, #f_14, #f_15, #f_16, #f_17, #f_18, #f_19, #f_20, #f_21, #f_22, #f_23, #f_24, #f_25, #f_26, #f_27, #f_28, #f_29, #f_30, #f_31, #f_32, #f_33, #f_34, #f_35, #f_36, #f_37, #f_38, #f_39, #f_40, #f_41, #f_42, #f_43, #f_46, #f_48, #f_49, #f_50, #f_51, #f_52  ").val("").selectpicker('refresh');
                  }
              }
         });
      });


      $(document).on('keyup', ".check_user_data", function(e) {
        e.preventDefault();
        user_data = $('.check_user_data :input').serialize();
        $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
        $.ajax({
              type: "POST",
              url: "{{route('check_user_login')}}",
              data: user_data, // serializes the form's elements.
              success: function(data)
              {
                console.log(data);
                if (data.status == 0) {
                    errorMessage = "Email address not register in our system";
                    $(".email_error").show();
                    $(".email_error").text(errorMessage).addClass("error");
                    $('.next').hide();
                  } else {
                     $(".permission_error").removeClass("error").remove();
                      $(".email_error").hide();
                  //  console.log(data.user_id, '+++++++++++');
                    $('.temp_id').val(data.user_id);
                    $('.next').show();
                    return true;
                }
              }
         });

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
<!-- ==== Add Account Code === -->
<script>
   $(document).ready(function(){
      
      $('.selectpicker').selectpicker('refresh');
       var i= 0,j=0,acc_count=0,lob_count=0;
       let h = 0;
       // ========== Append Account Code =========
       function account_code(i, h){
         
       var cancel_button = `<button type="button" class="remove_account" data-toggle="tooltip" data-placement="top" title="Remove Account">
                           <i class="fas fa-trash-alt"></i></button>`;
       var account = `<div class="table-responsive table-container" data-account="`+i+`">
                       <table class="table account_table">
                           <thead>
                              <tr>
                                 <th scope="col">Account Name</th>
                                 <th scope="col">LOB</th>
                                 <th scope="col">Channels</th>
                                 <th scope="col">Country</th>
                                 <th scope="col">City Name</th>
                                 <th scope="col">Site Name</th>
                                 <th scope="col">FTEs</th>
                              </tr>
                           </thead>
                       <tbody>
                           <tr>
                              <td>
                                 <div class="form-group">
                                    <input type="hidden" id="mysearial" value="0">
                                    <input type="text" class="form-control" placeholder="Account Name" name="account_name[]" id="account_name">
                                 </div>
                              </td>
                              <td>
                                 <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter LOB" name="lob[`+i+`][]" id="lob">
                                 </div>
                              </td>
                              <td>
                                 <div class="form-group">
                                    <select class="selectpicker form-control" title="Select Channel" data-live-search="true" name="channel_name[`+i+`][0][]" id="channel">
                                       <option value = "Voice - IB">Voice - IB</option>
                                       <option value = "Voice - OB">Voice - OB</option>
                                       <option value = "Chat" >Chat</option>
                                       <option value ="Email">Email</option>
                                       <option value ="Back Office">Back Office</option>
                                       <option value = "Social Media">Social Media</option>
                                       <option value = "Other">Other</option>
                                    </select>
                                 </div>
                              </td>
                              <td>
                                 <div class="form-group">
                                    <select name="country[`+acc_count+`][`+lob_count+`][]" id="country`+h+`" data-id="`+h+`" class="form-control selectpicker" data-live-search="true" required>
                                       <option selected disabled>Select Country</option>
                                       @foreach($country as $key => $countries)
                                       <option value="{{ $key }}">{{ $countries }}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </td>
                              <td>
                                 <select name="city_name[`+acc_count+`][`+lob_count+`][]" id ="city_name`+h+`" class=" form-control selectpicker" data-live-search="true" required>
                                    <option selected disabled>Select City</option>
                                 </select>
                              </td>
                              <td>
                                 <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Enter Site Name" name="site_name[`+i+`][0][]" id="site_name">
                                 </div>
                              </td>
                              <td>
                                 <div class="form-group">
                                    <input type="number" class="form-control" placeholder="Enter FTE" name="fte[`+i+`][0][]" id="fte">
                                 </div>
                              </td>
                           </tr>
                           <tr class="tr_channel">
                              <td colspan="6"></td>
                              <td class="text-right"><button type="button" class="add_chaneels channel-${i}" data-row="${i}" data-lob="0"><i class="fas fa-plus-circle"></i> Add Channel</button></td>
                           </tr>
                       </tbody>
                       </table>
                       <div class="tableAction">${cancel_button}
                       <div class="childAction">
                       <button type="button" class="addLobBtn"><i class="fas fa-plus-circle"></i> Add LOB</button>
                       </div>
                       </div>`;
       return account;
       }

       // ========== Append LOB Code =========
       //let h = 0;
       function lob_code(i){
        h++;
        // <input type="hidden" id="mysearial" value="">
        console.log(h,"h va214654l1426354151e");
        $('#mysearial').val(h);
       var lob =  `<tr class="rowLob" data-lob="`+lob_count+`">
                     <td class="text-left">
                        <button type="button" class="formremove removeLob_row" data-toggle="tooltip" data-placement="top" title="Remove LOB">
                        <i class="fas fa-trash-alt"></i></button></td>
                     <td>
                        <div class="form-group">
                           <input type="text" class="form-control" placeholder="Enter LOB" name="lob[`+acc_count+`][]">
                        </div>
                     </td>
                   <td>
                     <div class="form-group">
                        <select class="selectpicker form-control" title="Select Channel" data-live-search="true" name="channel_name[`+acc_count+`][`+lob_count+`][]">
                           <option value = "Voice - IB">Voice - IB</option>
                           <option value = "Voice - OB">Voice - OB</option>
                           <option value = "Chat" >Chat</option>
                           <option value ="Email">Email</option>
                           <option value ="Back Office">Back Office</option>
                           <option value = "Social Media">Social Media</option>
                           <option value = "Other">Other</option>
                        </select>
                     </div>
                  </td>
                  <td>
                     <div class="form-group">
                           <select name="country[`+acc_count+`][`+lob_count+`][]" id="country`+h+`" data-id="`+h+`" class="form-control selectpicker" data-live-search="true" required>
                              <option selected disabled>Select Country</option>
                              @foreach($country as $key => $countries)
                              <option value="{{ $key }}">{{ $countries }}</option>
                              @endforeach
                           </select>
                     </div>
                  </td>
                  <td>
                     <div class="form-group">
                        <select name="city_name[`+acc_count+`][`+lob_count+`][]" id ="city_name`+h+`" class=" form-control selectpicker" data-live-search="true" required>
                           <option selected disabled>Select City</option>
                        </select>
                     </div>
                  </td>
                  <td>
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Site Name"  name="site_name[`+acc_count+`][`+lob_count+`][]">
                     </div>
                  </td>
                  <td>
                     <div class="form-group">
                        <input type="number" class="form-control" placeholder="Enter FTE" name="fte[`+acc_count+`][`+lob_count+`][]">
                     </div>
                  </td>
               </tr>
               <tr class="tr_channel">
                  <td colspan="6"></td>
                  <td class="text-right"><button type="button" class="add_chaneels" data-lob="`+lob_count+`"><i class="fas fa-plus-circle"></i> Add Channel</button></td>
               </tr>`;

       return lob;
       }

       // ========== Append LOB Code =========
    //    let h = 0;
       function channel_code(i,lobb){
        h++;
        // console.log(h,"h va214654l1426354151e");
        // $('#mysearial').val(h);
      var channel =  `<tr>
                        <td colspan="2" class="text-left">
                           <button type="button" class="formremove remove_channels" data-toggle="tooltip" data-placement="top" title="Remove Channel">
                           <i class="fas fa-trash-alt"></i></button></td>
                        <td>
                           <div class="form-group">
                              <select class="selectpicker form-control" title="Select Channel" data-live-search="true" name=channel_name[`+acc_count+`][`+lobb+`][]>
                                 <option value = "Voice - IB">Voice - IB</option>
                                 <option value = "Voice - OB">Voice - OB</option>
                                 <option value = "Chat" >Chat</option>
                                 <option value ="Email">Email</option>
                                 <option value ="Back Office">Back Office</option>
                                 <option value = "Social Media">Social Media</option>
                                 <option value = "Other">Other</option>
                              </select>
                           </div>
                        </td>
                        <td>
                           <div class="form-group">
                              <select name="country[`+acc_count+`][`+lob_count+`][]" id="country`+h+`" data-id="`+h+`" class="form-control selectpicker" data-live-search="true" required>
                                    <option selected disabled>Select Country</option>
                                    @foreach($country as $key => $countries)
                                    <option value="{{ $key }}">{{ $countries }}</option>
                                    @endforeach
                              </select>
                           </div>
                        </td>
                        <td>
                           <div class="form-group">
                              <select name="city_name[`+acc_count+`][`+lob_count+`][]" id ="city_name`+h+`" class=" form-control selectpicker" data-live-search="true" required>
                                 <option selected disabled>Select City</option>
                              </select>
                           </div>
                        </td>
                        <td>
                           <div class="form-group">
                              <input type="text" class="form-control" placeholder="Enter Site Name" name="site_name[`+acc_count+`][`+lobb+`][]">
                           </div>
                        </td>
                        <td>
                           <div class="form-group">
                              <input type="number" class="form-control" placeholder="Enter FTE" name="fte[`+acc_count+`][`+lobb+`][]">
                           </div>
                        </td>
                     </tr>`;

           return channel;
           }

       for(; i<=0; i++)
       { 
           $('.account_more').append(account_code(i,h));
           $('.selectpicker').selectpicker('refresh');
           j++;
       }

      // ========== Append Account Add and Delete on Click Code =========
        $('#addmore_acount').click(function(){
           acc_count=i;
           h++;
           $('.account_more').append(account_code(i,h));
           $('.selectpicker').selectpicker('refresh');
           //$('.datepicker').datetimepicker('refresh');
           i++;j++;
        });
            $(document).on('click','.remove_account',function(){
                $(this).parent().parent().remove();
            });
        // var mysearial1 =  $('#mysearial').val();
        // console.log(mysearial1,"mysearial1");
        for(j=0; j<=10; j++){
            $(document).on('change','#country'+j,function(){ 
            var searial_id = $(this).attr('data-id');
            var val = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('country_code') }}",
                    data: {
                            value_name: val,
                            },
                success: function (data){
                        $('#city_name'+searial_id).empty();
                        $('#city_name'+searial_id).append('<option>Select City</option>');
                            $.each(data,function(key,value){
                                $('#city_name'+searial_id).append('<option value="'+key+'">'+value+'</option>');
                            });
                            $('.selectpicker').selectpicker('refresh');
                        }
                })
            });
        }
        $(document).on('change','#country0',function(){
            var val = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{ route('country_code') }}",
                    data: {
                            value_name: val,
                            },
                success: function (data){
                        $('#city_name0').empty();
                        $('#city_name0').append('<option disabled>Select City</option>');
                            $.each(data,function(key,value){
                                $('#city_name0').append('<option value="'+key+'">'+value+'</option>');
                            });
                            $('.selectpicker').selectpicker('refresh');
                     }
                })
            });

    //  });

       // ========== Append LOB Add and Delete on Click Code =========
       $(document).on('click','.addLobBtn',function(){
           acc_count=$(this).parent().parent().parent().attr('data-account');
           lob_count=$(this).parent().parent().parent().find('.rowLob').length
           lob_count=lob_count+1;
           $(this).parent().parent().parent().find('table tbody').append(lob_code(0));
           $('.selectpicker').selectpicker('refresh');
           //i++;j++;
       });
       $(document).on('click','.removeLob_row',function(){
           $(this).parent().parent().nextUntil("tr.rowLob").remove();
           $(this).parent().parent().remove();
       });


       // ========== Append Channel Add and Delete on Click Code =========
       $(document).on('click','.add_chaneels',function(){
          $(this).closest('tr').before(channel_code(0,$(this).attr('data-lob')));
           $('.selectpicker').selectpicker('refresh');
       });
       $(document).on('click','.remove_channels',function(){
           $(this).parent().parent().remove();
       });

   });
</script>
<!-- ==== Multi Step Form Code === -->
<script>
   
   ;(function($) {
       "use strict";

       //* Form js
       function verificationForm() {
           //jQuery time
           var current_fs, next_fs, previous_fs,form_name; //fieldsets
           var left, opacity, scale; //fieldset properties which we will animate
           var animating; //flag to prevent quick multi-click glitches

           $(".next").click(function() {
               if (animating) return false;
               animating = true;

               current_fs = $(this).parent().parent().parent().parent();
               next_fs = $(this).parent().parent().parent().parent().next();

               //activate next step on progressbar using the index of next_fs
               $("#progressbarAct li").eq($("fieldset").index(next_fs)).addClass("active");
               form_name=$(current_fs).attr('data-name');
               console.log(form_name);
               $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
               });
               if(form_name=='detailed_info'){
                  $.get("{{route('get_account')}}",{temp_id:$('.temp_id').val()},function(result){
                        if(result.success){
                           $('#account_names').empty();
                           $('#lob_names').empty();
                           $('#channelnames').empty();
                           $('#country').empty();
                           $.each(result.data,function(i,v){
                              $('#account_names').append('<option value="'+v.id+'">'+v.account_name+'</option>');
                              //  $.each(v.lobs,function(ii,vv){
                              //      $('#lob_names').html('<option value="'+vv.id+'">'+vv.lob_name+'</option>');
                              //      $.each(vv.channels,function(iii,vvv){
                              //          $('#channelnames').html('<option value="'+vvv.id+'">'+vvv.channel_name+'</option>');
                              //       });
                              //  });
                           })
                           $('#account_names').selectpicker('refresh');
                           $('#lob_names').selectpicker('refresh');
                           $('#channelnames').selectpicker('refresh');
                        }
                  });
               }
               if($(current_fs).attr('data-route')){
                  console.log('JD-'+current_fs);
                   $.ajax({
                       type: "POST",
                       url: $(current_fs).attr('data-route'),
                       data: $(current_fs).serialize(), // serializes the form's elements.
                       success: function(data)
                       { console.log(data);
                           if(data.success){
                              if(data.data.client_id){
                                 $('.client_id').val(data.data.client_id);
                              }
                              if(data.data.account_id){
                                 $('.account_id').val(data.data.account_id);
                              }
                              if(data.data.detailed_page){
                                 $('.details-container').html(data.data.detailed_page);
                              }
                              if(data.data.file_page){
                                 $('.file_page').html(data.data.file_page);
                              }
                               if(data.data.account_detail){
                                 //$('.summary_page').html(data.data.account_detail);
                                 $('.summary_page').html(data.data.account_detail);
                              }
                              
                           }
                       }
                  });
               }


               //console.log($('#accountForms').serialize());
               //show the next fieldset
               next_fs.show();
               //hide the current fieldset with style
               current_fs.animate({
                   opacity: 0
               }, {
                   step: function(now, mx) {
                       //as the opacity of current_fs reduces to 0 - stored in "now"
                       //1. scale current_fs down to 80%
                       scale = 1 - (1 - now) * 0.2;
                       //2. bring next_fs from the right(50%)
                       left = (now * 50) + "%";
                       //3. increase opacity of next_fs to 1 as it moves in
                       opacity = 1 - now;
                       current_fs.css({
                           'transform': 'scale(' + scale + ')',
                           'position': 'absolute'
                       });
                       next_fs.css({
                           'left': left,
                           'opacity': opacity
                       });
                   },
                   duration: 800,
                   complete: function() {
                       current_fs.hide();
                       animating = false;
                   },
                   //this comes from the custom easing plugin
                   //easing: 'easeInOutBack'
               });
           });

           $(".previous").click(function() {
               if (animating) return false;
               animating = true;

               current_fs = $(this).parent().parent().parent().parent();
               previous_fs = $(this).parent().parent().parent().parent().prev();

               //de-activate current step on progressbar
               $("#progressbarAct li").eq($("fieldset").index(current_fs)).removeClass("active");

               //show the previous fieldset
               previous_fs.show();
               //hide the current fieldset with style
               current_fs.animate({
                   opacity: 0
               }, {
                   step: function(now, mx) {
                       //as the opacity of current_fs reduces to 0 - stored in "now"
                       //1. scale previous_fs from 80% to 100%
                       scale = 0.8 + (1 - now) * 0.2;
                       //2. take current_fs to the right(50%) - from 0%
                       left = ((1 - now) * 50) + "%";
                       //3. increase opacity of previous_fs to 1 as it moves in
                       opacity = 1 - now;
                       current_fs.css({
                           'left': left
                       });
                       previous_fs.css({
                           'transform': 'scale(' + scale + ')',
                           'opacity': opacity
                       });
                   },
                   duration: 800,
                   complete: function() {
                       current_fs.hide();
                       animating = false;
                   },
                   //this comes from the custom easing plugin
                   //easing: 'easeInOutBack'
               });
           });

           $(".submit").click(function() {
               return false;
           })
       };

       /*Function Calls*/
       verificationForm();
   })(jQuery);
</script>
 <script>

   function loadSummary(id){ alert(id);
      $.ajax({
                       type: "GET",
                       url: "http://localhost:8000/get_account?temp_id=1",
                      // data: {temp_id: 1}, // serializes the form's elements.
                       success: function(data)
                       { 
                           if(data.success){
                               if(data.data.account_detail){
                                 $('.summary_page').html(data.data.account_detail);
                              }
                              
                           }
                       }
                  });
   }
 </script>

@endsection
