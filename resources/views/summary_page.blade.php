
   <div class=" scroll-wrapper scrollbarbar">
      <div class="container">
         <div class="row">
            <div class="col col-12">
               <!-- === Account Details Blocks === -->
               <div class="summary_contaienr">
                  <h2>Account Details</h2>
                  <ul class="summary_ul">
                     <li>
                        <label>User Name</label>
                        <p>{{ $user_detail->name }}</p>
                     </li>
                     <li>
                        <label>Business Email</label>
                        <p>{{ $user_detail->email }}</p>
                     </li>
                     {{-- @endforeach --}}
                  </ul>
               </div>
               <?php //echo "<pre>"; print_r($account_detail); ?>
               <!-- === General Overview Blocks === -->
                  <!-- Added By JD -->
                  <?php //echo "<pre>"; print_r($account_detail); ?>
                  <div class="summary_contaienr">
                  <h2>General Overview</h2>

                  <div class="table-responsive">
                     <?php //echo "<pre>"; print_r($account_detail); die;?>
                     <table class="table table-bordered summary_table fix_summary_table">
                        <thead>
                           <tr>
                              <th scope="col" class="bg_dark_th">Account Name</th>
                              <th scope="col" class="bg_dark_th">LOB</th>
                              <th scope="col" class="bg_dark_th">Channels</th>
                              <th scope="col" class="bg_dark_th">Country</th>
                              <th scope="col" class="bg_dark_th">City Name</th>
                              <th scope="col" class="bg_dark_th">Site Name</th>
                              <th scope="col" class="bg_dark_th">FTEs</th>
                           </tr>
                        </thead>
                              <tbody>
                                 <?php $i=1; $y=0;
                                 ?>
                                 @foreach ($account_detail as $key => $account)
                                    <?php 
                                       $acc_lob_cnt=$acc_lob_ch_cnt=0;
                                       $acc_lob_cnt += count($account_detail[$key]['lobs']);
                                    ?>
                                    @foreach($account['lobs'] as $key2 => $lob)
                                    <?php $acc_lob_ch_cnt += count($lob->channel); ?>
                                    @endforeach
                                 
                                 <tr>
                                    <td rowspan="{{ $acc_lob_cnt + $acc_lob_ch_cnt +1 }}" style="text-align:center; justify-content:center;">
                                       {{ $account->account_name }}
                                    </td>
                                 </tr>
                                 
                                 @foreach ($account['lobs'] as $key => $lob)
                                 <?php $ch = count($lob->channel); ?>
                                 <tr>
                                    <td rowspan="{{$ch +1}}">{{$lob->lob_name}}</td>
                                 </tr>
                                 
                                 @foreach ($lob->channel as $key => $channels)
                                 <tr>
                                    <td>{{ $channels->channel_name }}</td>
                                    <td>
                                       @if(isset($channels['countrydata']) && !empty($channels['countrydata']))
                                          @foreach($channels['countrydata'] as $cntry)
                                             {{ $cntry['country_name'] }}
                                          @endforeach
                                       @endif
                                    </td>
                                    <td>
                                       @if(isset($channels['citydata']) && !empty($channels['citydata']))
                                          @foreach($channels['citydata'] as $ct)
                                             {{ $ct['city_name'] }}
                                          @endforeach
                                       @endif
                                    </td>
                                    <td>{{ $channels->site_name }}</td>
                                    <td>{{ $channels->fte }}</td> 
                                 </tr>
                                 @endforeach
                                 @endforeach
                                 @endforeach
                              </tbody>
                     </table>
                  </div>
               </div>

               <!-- === Detailed Information Blocks === -->
               <div class="summary_contaienr">
                  <h2>Detailed Information</h2>
                  <div class="table-responsive">
                     <table class="table table-bordered summary_table fix_summary_table">
                        <!-- === Account Tbody ===  -->
                        <tbody>
                           <tr>
                              <th class="bg_dark_th">Account Name</th>
                              @foreach ($account_detail as $key => $account)
                              <?php 
                                 $acc_lob_cnt=$acc_lob_ch_cnt=0;
                                 $acc_lob_cnt += count($account_detail[$key]['lobs']);
                              ?>
                              @foreach($account['lobs'] as $key2 => $lob)
                                 <?php $ch = count($lob->channel); ?>
                                 @foreach ($lob->channel as $key => $channels)
                                 <?php ++$acc_lob_ch_cnt; ?>
                              @endforeach
                                 @endforeach
                                 <td colspan="{{$acc_lob_ch_cnt}}" style="text-align:center; justify-content:center;">
                                    {{ $account->account_name }}
                                 </td>
                              @endforeach
                           </tr>

                           <!-- Lob Details -->
                           <tr>
                              <th class="bg_light_th">LOB</th>
                              @foreach ($account_detail as $key => $account)
                              <?php 
                                 $acc_lob_cnt=$acc_lob_ch_cnt=0;
                                 $acc_lob_cnt += count($account_detail[$key]['lobs']);
                              ?>
                              @foreach($account['lobs'] as $key2 => $lob)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td colspan="{{$acc_lob_ch_cnt}}" style="text-align:center; justify-content:center;">
                                  {{ $lob->lob_name }}
                              </td>
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Channels Details -->
                           <tr>
                              <th class="bg_light_th">Channels</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                  {{ $channels->channel_name }}
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- country Details -->
                           <tr>
                              <th class="bg_light_th">Country</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 <td>
                                    @if(isset($channels['countrydata']) && !empty($channels['countrydata']))
                                       @foreach($channels['countrydata'] as $cntry)
                                          {{ $cntry['country_name'] }}
                                       @endforeach
                                    @endif
                                 </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->
                           
                           <!-- city Name -->
                           <tr>
                              <th class="bg_light_th">City Name</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 <td>
                                    @if(isset($channels['citydata']) && !empty($channels['citydata']))
                                       @foreach($channels['countrydata'] as $ct)
                                          {{ $ct['city_name'] }}
                                       @endforeach
                                    @endif
                                 </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- site Name -->
                           <tr>
                              <th class="bg_light_th">Site Name</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                  {{ $channels->site_name }}
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- FTEs Name -->
                           <tr>
                              <th class="bg_light_th">FTEs</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                  {{ $channels->fte }}
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->
                        
                     <!-- *********************************** Billability ****************************** -->
                           <!-- Billability Details -->
                           <tr>
                              <th class="bg_dark_th">Billability</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php ++$acc_lob_ch_cnt; ?>
                              @endforeach
                              @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- Billing Method -->
                           <tr>
                              <th>Billing Method</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                              <td>
                              <!-- @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                    {{ $billingType[$chdata->monthly_ftp] }}
                              @endforeach -->
                             
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Billing Cap -->
                           <tr>
                              <th>Billing Cap</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                              <td>
                              @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                    {{ $billingCap[$chdata->billing_cap] }}
                              @endforeach
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Value for selected Billing Cap -->
                           <tr>
                              <th>Value for selected Billing Cap</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                              <td>
                              
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Min Billing Guarantee -->
                           <tr>
                              <th>Min Billing Guarantee</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $minBillingGuarantee[$chdata->billing_guarantee] }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Min Billing Reference -->
                           <tr>
                              <th>Min Billing Reference</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $minBillingReference[$chdata->min_bill_ref] }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Max Billable Threshold -->
                           <tr>
                              <th>Max Billable Threshold</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $maxBillingThres[$chdata->max_bill_thres] }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Max Billing Reference -->
                           <tr>
                              <th>Min Billing Reference</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $maxBillRef[$chdata->max_bill_ref] }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- *********************************** KPIs & Objectives ****************************** -->
                           <!-- KPIs & Objectives Details -->
                           <tr>
                              <th class="bg_dark_th">KPIs & Objectives</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- SOW Max Staffing Req? -->
                           <tr>
                              <th>SOW Max Staffing Req?</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $maxBillingThres[$chdata->swo] }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Service KPI - 1 (If applicable) -->
                           <tr>
                              <th>Service KPI - 1 (If applicable)</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @if(isset($channels['ChannelDatas']) && $channels['ChannelDatas'] != null)
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                          @if(isset($chdata->kpi1_app) && $chdata->kpi1_app != null)
                                             {{ $serviceApi[$chdata->kpi1_app] }}
                                          @endif
                                       @endforeach
                                       @endif
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Service KPI - 1 - Target (%/Sec) -->
                           <tr>
                              <th>Service KPI - 1 - Target (%/Sec)</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $chdata->kpi1_target }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Service KPI - 2 (If applicable) -->
                           <tr>
                              <th>Service KPI - 2 (If applicable)</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $serviceApi[$chdata->kpi2_app] }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Service KPI - 2 - Target (%/Sec) -->
                           <tr>
                              <th>Service KPI - 2 - Target (%/Sec)</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $chdata->kpi2_target }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- *********************************** Training Details ****************************** -->
                           <!-- Training Details -->
                           <tr>
                              <th class="bg_dark_th">Training Details</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- Classroom Training Duration (Weeks) -->
                           <tr>
                              <th>Classroom Training Duration (Weeks)</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $chdata->class_duration }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Nesting / OJT Duration (Weeks) -->
                           <tr>
                              <th>Nesting / OJT Duration (Weeks)</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $chdata->nesting_duration }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- *********************************** Operating Hours ****************************** -->
                           <!-- Operating Hours -->
                           <tr>
                              <th class="bg_dark_th">Operating Hours</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- Weekday Start Time -->
                           <tr>
                              <th>Weekday Start Time</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $chdata->weekday_start_time }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Weekday End Time -->
                           <tr>
                              <th>Weekday End Time</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $chdata->weekday_end_time }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Sat Start Time -->
                           <tr>
                              <th>Sat Start Time</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $chdata->sat_start_time }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Sat End Time -->
                           <tr>
                              <th>Sat End Time</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $chdata->sat_end_time }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Sun Start Time -->
                           <tr>
                              <th>Sun Start Time</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $chdata->sun_start_time }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Sun End Time -->
                           <tr>
                              <th>Sun End Time</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $chdata->sun_end_time }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- *********************************** Process Details ****************************** -->
                           <!-- Process Details -->
                           <tr>
                              <th class="bg_dark_th">Process Details</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->
                           <!-- Industry Segment -->
                           <tr>
                              <th>Industry Segment</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                     @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                          @if(isset($chdata->industry_segment) && $chdata->industry_segment != null)
                                             {{ $processDetails[$chdata->industry_segment] }}
                                          @else
                                             {{ ""}}
                                             @endif
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- *********************************** Process Details ****************************** -->
                           <!-- Employee Details -->
                           <tr>
                              <th class="bg_dark_th">Employee Details</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- Full-Time Employees -->
                           <tr>
                              <th>Full-Time Employees</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $chdata->full_time_employee }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Part-Time Employees -->
                           <tr>
                              <th>Part-Time Employees</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $chdata->part_time_employee }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Contractual Employees -->
                           <tr>
                              <th>Contractual Employees</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $chdata->contract_employee }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- *********************************** Authorized Locations ****************************** -->
                           <!-- Authorized Locations -->
                           <tr>
                              <th class="bg_dark_th">Authorized Locations</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- Work in Office -->
                           <tr>
                              <th>Work in Office</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $chdata->work_office }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Work from Home -->
                           <tr>
                              <th>Work from Home</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                             {{ $chdata->work_home }}
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- *********************************** System Information ****************************** -->
                           <!-- System Information -->
                           <tr>
                              <th class="bg_dark_th">System Information</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- ACD Name details -->
                           <tr>
                              <th>ACD Name</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                          @if(isset($chdata->acd_name) && $chdata->acd_name != null)
                                             {{ $acdBillSystem[$chdata->acd_name] }}
                                          @else
                                             {{""}}
                                          @endif
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- WFM Tool details -->
                           <tr>
                              <th>WFM Tool</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chdata)
                                       @if(isset($chdata->wfm_tool) && $chdata->wfm_tool != null)
                                       {{ $processDetails[$chdata->wfm_tool]}}
                                       @else
                                       {{""}}
                                       @endif
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Back office Tool -->
                           <tr>
                              <th>Back office Tool</th>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                    <td>
                                       @foreach($channels['ChannelDatas'] as $chd=>$chdata)
                                          @if(isset($chdata->back_tool))
                                             {{ $chdata->back_tool }}
                                          @else
                                             {{""}}
                                          @endif
                                       @endforeach
                                    </td>
                                    @endforeach
                                 @endforeach
                              @endforeach
                           </tr>
                           <!--  -->
                        </tbody>
                     </table>
                  </div>
               </div>

<!-- ***********************************  Process Information Block ****************************** -->
               <!-- === Process Information Blocks === -->
               <div class="summary_contaienr">
                  <h2>Process Information</h2>
                  <div class="table-responsive">
                     <table class="table table-bordered summary_table summary_procee_table fix_summary_table">
                        <!-- === Account Tbody ===  -->
                        <tbody>
                        <tr>
                              <th class="bg_dark_th">Account Name</th>
                              @foreach ($account_detail as $key => $account)
                              <?php 
                                 $acc_lob_cnt=$acc_lob_ch_cnt=0;
                                 $acc_lob_cnt += count($account_detail[$key]['lobs']);
                              ?>
                              @foreach($account['lobs'] as $key2 => $lob)
                                 <?php $ch = count($lob->channel); ?>
                                 @foreach ($lob->channel as $key => $channels)
                                 <?php ++$acc_lob_ch_cnt;?>
                              @endforeach
                                 @endforeach
                                 <td colspan="{{$acc_lob_ch_cnt}}" style="text-align:center; justify-content:center;">
                               {{ $account->account_name }}
                              </td>
                              @endforeach
                           </tr>

                           <!-- Lob Details -->
                           <tr>
                              <th class="bg_light_th">LOB</th>
                              @foreach ($account_detail as $key => $account)
                              <?php 
                                 $acc_lob_cnt=$acc_lob_ch_cnt=0;
                                 $acc_lob_cnt += count($account_detail[$key]['lobs']);
                              ?>
                              @foreach($account['lobs'] as $key2 => $lob)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td colspan="{{$acc_lob_ch_cnt}}" style="text-align:center; justify-content:center;">
                                  {{ $lob->lob_name }}
                              </td>
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Channels Details -->
                           <tr>
                              <th class="bg_light_th">Channels</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                  {{ $channels->channel_name }}
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- country Details -->
                           <tr>
                              <th class="bg_light_th">Country</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 <td>
                                       @if(isset($channels['countrydata']) && !empty($channels['countrydata']))
                                          @foreach($channels['countrydata'] as $cntry)
                                             {{ $cntry['country_name'] }}
                                          @endforeach
                                       @endif
                                    </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Forecasting -->
                           <tr>
                              <th class="bg_dark_th">Forecasting</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- Which Forecasting tool / software package is being utilised? -->
                           <tr>
                              <th>Which Forecasting tool / software package is being utilised?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 <td>
                                    @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_1 }}
                                    @endforeach
                                    @else
                                    {{""}}
                                    @endif
                                 </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Which Forecasting model is being used? -->
                           <tr>
                              <th>Which Forecasting model is being used?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 <td>
                                    @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_2 }}
                                       @endforeach
                                    @else
                                    {{""}}
                                    @endif
                                 </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- What are the key input parameters to the model? -->
                           <tr>
                              <th>What are the key input parameters to the model?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 <td>
                                    @if(isset($channels['processInfo']))
                                       @foreach($channels['processInfo'] as $proInfo)
                                          {{ $proInfo->f_3 }}
                                       @endforeach
                                    @else
                                    {{""}}
                                    @endif
                                 </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- How frequently is the model revisited for goodness of fit? -->
                           <tr>
                              <th>How frequently is the model revisited for goodness of fit?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 
                                 <td>
                                    @if(isset($channels['processInfo']))
                                       @foreach($channels['processInfo'] as $proInfo)
                                          {{ $proInfo->f_4 }}
                                       @endforeach
                                    @else
                                       {{""}}
                                    @endif
                                 </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- How do you measure the accuracy of your Forecasting model? -->
                           <tr>
                              <th>How do you measure the accuracy of your Forecasting model?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 <td>
                                    @if(isset($channels['processInfo']))
                                       @foreach($channels['processInfo'] as $proInfo)
                                          {{ $proInfo->f_5 }}
                                       @endforeach
                                    @else
                                    {{""}}
                                    @endif
                                 </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- ***************** Staffing / Resource Planning ******************* -->
                           <!--Staffing / Resource Planning -->
                           <tr>
                              <th class="bg_dark_th">Staffing / Resource Planning</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!--Staffing / Resource Planning -->
                           <tr>
                              <th class="bg_light_th">Forecast Locks</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- Who provides the Forecast / Lock which forms the base of Staff Planning? -->
                           <tr>
                              <th>Who provides the Forecast / Lock which forms the base of Staff Planning?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 <td>
                                    @if(isset($channels['processInfo']))
                                       @foreach($channels['processInfo'] as $proInfo)
                                          {{ $proInfo->f_6 }}
                                       @endforeach
                                    @else
                                    {{""}}
                                    @endif
                                 </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- What is your staff locking model? -->
                           <tr>
                              <th>What is your staff locking model?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 <td>
                                    @if(isset($channels['processInfo']))
                                       @foreach($channels['processInfo'] as $proInfo)
                                          {{ $proInfo->f_7 }}
                                       @endforeach
                                    @else
                                    {{""}}
                                    @endif
                                 </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Do you generate Internal Forecast? -->
                           <tr>
                              <th>Do you generate Internal Forecast?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_8 }}
                                    @endforeach
                                    @else
                                    {{""}}
                                    @endif
                                 </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->
                           
                           <!-- Which Forecast is used for Staff Planning? -->
                           <tr>
                              <th>Which Forecast is used for Staff Planning?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_9 }}
                                    @endforeach
                                    @else
                                    {{""}}
                                    @endif
                                 </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- ******************** AHT Details ******************** -->
                           <!-- AHT -->
                           <tr>
                              <th class="bg_light_th">AHT</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- What AHT is used for Staff Planning? -->
                           <tr>
                              <th>What AHT is used for Staff Planning?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 <td>
                                    @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_10 }}
                                    @endforeach
                                    @else
                                    {{""}}
                                    @endif
                                 </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- How do you calculate New Hire impact on the AHT? -->
                           <tr>
                              <th>How do you calculate New Hire impact on the AHT?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 <td>
                                    @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_11 }}
                                    @endforeach
                                    @else
                                    {{""}}
                                    @endif
                                 </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- ******************** FTE Details ******************** -->
                           <!--FTE -->
                           <tr>
                              <th class="bg_light_th">FTE</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- How do you generate FTE requirements? -->
                           <tr>
                              <th>How do you generate FTE requirements?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 <td>
                                    @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_12 }}
                                    @endforeach
                                    @else
                                    {{""}}
                                    @endif
                                 </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- ******************** In-Office Shrinkage Details ******************** -->
                           <!--In-Office Shrinkage -->
                           <tr>
                              <th class="bg_light_th">In-Office Shrinkage</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- At what level are your In-Office Shrinkages planned? -->
                           <tr>
                              <th>At what level are your In-Office Shrinkages planned?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 <td>
                                    @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_13 }}
                                    @endforeach
                                    @else
                                    {{""}}
                                    @endif
                                 </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Do you have set targets for each individual Aux/Activity code? -->
                           <tr>
                              <th>Do you have set targets for each individual Aux/Activity code?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 <td>
                                    @if(isset($channels['processInfo']))
                                       @foreach($channels['processInfo'] as $proInfo)
                                          {{ $proInfo->f_14 }}
                                       @endforeach
                                    @else
                                    {{""}}
                                    @endif
                                 </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- In-Office shrinkage Forecasts are modeled on (please select the appropriate) -->
                           <tr>
                              <th>In-Office shrinkage Forecasts are modeled on (please select the appropriate)</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                                 <td>
                                    @if(isset($channels['processInfo']))
                                       @foreach($channels['processInfo'] as $proInfo)
                                          {{ $proInfo->f_15 }}
                                       @endforeach
                                    @else
                                    {{""}}
                                    @endif
                                 </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- *************** Out-of-Office Shrinkage Details ************** -->
                           <!--Out-of-Office Shrinkage -->
                           <tr>
                              <th class="bg_dark_th">Out-of-Office Shrinkage</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- At what level are your Out-of-Office Shrinkages planned? -->
                           <tr>
                              <th>At what level are your Out-of-Office Shrinkages planned?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_16 }}
                                    @endforeach
                                 
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Vacation Forecasts are modeled on (please select the appropriate) -->
                           <tr>
                              <th>Vacation Forecasts are modeled on (please select the appropriate)</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_17 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Absenteeism Forecasts are modeled on (please select the appropriate) -->
                           <tr>
                              <th>Absenteeism Forecasts are modeled on (please select the appropriate)</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_18 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- **************** Schedule Inflex  ******************** -->
                           <!-- Schedule Inflex -->
                           <tr>
                              <th class="bg_light_th">Schedule Inflex</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- Is Schedule Inflex considered in Staff planning? -->
                           <tr>
                              <th>Is Schedule Inflex considered in Staff planning?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_19 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- How is the Schedule Inflex estimated / calculated? -->
                           <tr>
                              <th>How is the Schedule Inflex estimated / calculated?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_20 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- ********************* Attrition Details ******************** -->
                           <!--Attrition -->
                           <tr>
                              <th class="bg_light_th">Attrition</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channel)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- How do you factor attrition in your staff plan? -->
                           <tr>
                              <th>How do you factor attrition in your staff plan?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_21 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Do you plan for Involuntary Attrition as a separate line item? (BQM, Promotions, Transfers etc.) -->
                           <tr>
                              <th>Do you plan for Involuntary Attrition as a separate line item? (BQM, Promotions, Transfers etc.)</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_22 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- *************** Staff Planning Connects *********************** -->
                           <!--Staff Planning Connects -->
                           <tr>
                              <th class="bg_light_th">Staff Planning Connects</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- Do you have Inter-departmental Staff planning discussions? -->
                           <tr>
                              <th>Do you have Inter-departmental Staff planning discussions?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_23 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- What is the frequency? -->
                           <tr>
                              <th>What is the frequency?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_24 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!--Staffing / Resource Planning -->
                           <tr>
                              <th>Who decides the below:-</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->
                           
                           <!-- Staffing Plan (Validation & Signing off key assumptions such as AHT, Shrinkage etc. -->
                           <tr>
                              <th>Staffing Plan (Validation & Signing off key assumptions such as AHT, Shrinkage etc.</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_25 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Adding Batches -->
                           <tr>
                              <th>Adding Batches</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_26 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Removing Batches -->
                           <tr>
                              <th>Removing Batches</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_27 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Cross Skilling -->
                           <tr>
                              <th>Cross Skilling</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_28 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Is there a client dependency for hiring batches? -->
                           <tr>
                              <th>Is there a client dependency for hiring batches?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_29 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Do you have a calibration calls with the Recruitment team -->
                           <tr>
                              <th>Do you have a calibration calls with the Recruitment team</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_30 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- If Yes – Weekly or Monthly -->
                           <tr>
                              <th>If Yes – Weekly or Monthly</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_31 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- *********************** Scheduling Details ************************ -->

                           <!--Scheduling -->
                           <tr>
                              <th class="bg_dark_th">Scheduling</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- Do you do Call Curve Analysis before deciding the Schedule Pattern? -->
                           <tr>
                              <th>Do you do Call Curve Analysis before deciding the Schedule Pattern?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_32 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Do you do Call Curve Analysis before deciding the Schedule Pattern? -->
                           <tr>
                              <th>Do you do Call Curve Analysis before deciding the Schedule Pattern?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_32 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- What is the frequency of the above? -->
                           <tr>
                              <th>What is the frequency of the above?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_33 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- How do you create interval level Volume and AHT requirements? -->
                           <tr>
                              <th>How do you create interval level Volume and AHT requirements?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_34 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- How do you manage the Headcount reconciliation process? -->
                           <tr>
                              <th>How do you manage the Headcount reconciliation process?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_35 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Do you run Manpower Dimensionioning exercise frequently to arrive at optimal HC mix (FT/PT/Split/Flexi? -->
                           <tr>
                              <th>Do you run Manpower Dimensionioning exercise frequently to arrive at optimal HC mix (FT/PT/Split/Flexi?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_36 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- What is the frequency of the above? -->
                           <tr>
                              <th>What is the frequency of the above?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_37 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Do you run & test different Schedule Patterns to identify best fit? -->
                           <tr>
                              <th>Do you run & test different Schedule Patterns to identify best fit?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_38 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- What is the frequency of the above? -->
                           <tr>
                              <th>What is the frequency of the above?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_39 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Do you plot all In-office shrinkages in your Schedules at Interval Level? (Coaching, Team Meeting, Business Updates etc.) -->
                           <tr>
                              <th>Do you plot all In-office shrinkages in your Schedules at Interval Level? (Coaching, Team Meeting, Business Updates etc.)</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_40 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Do you plot Out-of-Office shrinkage in your Schedules at Interval Level? (Vacation) -->
                           <tr>
                              <th>Do you plot Out-of-Office shrinkage in your Schedules at Interval Level? (Vacation)</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_41 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Do you review IDP/Schedule deviation prior to schedule release? -->
                           <tr>
                              <th>Do you review IDP/Schedule deviation prior to schedule release?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_42 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Do you measure Schedule Efficiency? -->
                           <tr>
                              <th>Do you measure Schedule Efficiency?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_43 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- What is your target for Schedule Efficiency? (Please specify in %) -->
                           <tr>
                              <th>What is your target for Schedule Efficiency? (Please specify in %)</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_44 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- How do you measure the Schedule Efficiency? -->
                           <tr>
                              <th>How do you measure the Schedule Efficiency?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_45 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- What is your internal target for Scheduling accuracy? (Requirment to Scheduled - Day/Intervals) -->
                           <tr>
                              <th>What is your internal target for Scheduling accuracy? (Requirment to Scheduled - Day/Intervals)</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_46 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- How do you measure the Schedule Accuracy? -->
                           <tr>
                              <th>How do you measure the Schedule Accuracy?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_47 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Do you measure the impact of various Scheduling Constraints on the account in terms or FTE & Cost? -->
                           <tr>
                              <th>Do you measure the impact of various Scheduling Constraints on the account in terms or FTE & Cost?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_48 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                            <!-- *********************** Intraday Management Details ************************ -->

                           <!--Intraday Management -->
                           <tr>
                              <th class="bg_dark_th">Intraday Management</th>
                              <?php $acc_lob_ch_cnt=0; ?>
                              @foreach ($account_detail as $key => $account)
                                 @foreach($account['lobs'] as $key2 => $lob)
                                    @foreach ($lob->channel as $key => $channels)
                                       <?php ++$acc_lob_ch_cnt; ?>
                                    @endforeach
                                 @endforeach
                              @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- Do you have a WFM Play book / Guide? E.g - Downtime Process, Calling Tree, Threshold & Skilling -->
                           <tr>
                              <th>Do you have a WFM Play book / Guide? E.g - Downtime Process, Calling Tree, Threshold & Skilling</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_49 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Does RTA have a daily read out call / RCA? -->
                           <tr>
                              <th>Does RTA have a daily read out call / RCA?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_50 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Does the RTA do real time skill management? -->
                           <tr>
                              <th>Does the RTA do real time skill management?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_51 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Does RTA do Intra-day Reforecasting? -->
                           <tr>
                              <th>Does RTA do Intra-day Reforecasting?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_52 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- How do you manage customers resources up or down Realtime? -->
                           <tr>
                              <th>How do you manage customers resources up or down Realtime?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_53 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- How do you manage and report, variance to plan Realtime? -->
                           <tr>
                              <th>How do you manage and report, variance to plan Realtime?</th>
                              @foreach ($account_detail as $key => $account)
                              @foreach($account['lobs'] as $key2 => $lob)
                              @foreach ($lob->channel as $key => $channels)
                                 <?php $acc_lob_ch_cnt = count($lob->channel); ?>
                              <td>
                                 @if(isset($channels['processInfo']))
                                    @foreach($channels['processInfo'] as $proInfo)
                                       {{ $proInfo->f_54 }}
                                    @endforeach
                                 @else
                                    {{""}}
                                 @endif
                              </td>
                              @endforeach
                              @endforeach
                              @endforeach
                           </tr>
                           <!--  -->
                        </tbody>
                     </table>
                  </div>
               </div>

            <!-- **************************** File Information Details *********************** -->
            <!-- File Information -->
               <div class="summary_contaienr">
                  <h2>File Information</h2>
                  <div class="table-responsive">

                     <table class="table table-bordered summary_table summary_procee_table fix_summary_table">
                        <tbody>
                           <tr>
                              <th class="bg_dark_th">Account Name</th>
                              @foreach ($account_detail as $key => $account)
                              <?php 
                                 $acc_lob_cnt=$acc_lob_ch_cnt=0;
                                 $acc_lob_cnt += count($account_detail[$key]['lobs']);
                              ?>
                              @foreach($account['lobs'] as $key2 => $lob)
                                 <?php $ch = count($lob->channel); ?>
                                 @foreach ($lob->channel as $key => $channels)
                                 <?php ++$acc_lob_ch_cnt; ?>
                              @endforeach
                                 @endforeach
                                 <td colspan="{{$acc_lob_ch_cnt}}" style="text-align:center; justify-content:center;">
                                    {{ $account->account_name }}
                                 </td>
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Forecasting -->
                           <tr>
                              <th class="bg_light_th">Forecasting</th>
                                 <?php $acc_lob_ch_cnt=0; ?>
                                 @foreach ($account_detail as $key => $account)
                                    @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                 @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- Process Document -->
                           <tr>
                              <th class="text-right">Process Document</th>
                              @foreach ($account_detail as $key => $account)
                              <?php $acc_lob_ch_cnt=0; ?>
                                 @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                 <td class="text-center" colspan="{{ $acc_lob_ch_cnt }}">
                                    @foreach($account['fileimage'] as $file)
                                       @if(isset($file->f_process_doc) && !empty($file->f_process_doc) && $file->f_process_doc !=null)
                                          <?php 
                                             $client_id = $account->client_id;
                                             $acc_name = $account->account_name;
                                             $replace_str = $client_id."_".$acc_name."_";
                                             $f_name = str_replace($replace_str, "", $file->f_process_doc)
                                           ?>
                                          <i class="fad fa-file-check" title="{{ $f_name }}"></i>
                                          @endif
                                    @endforeach
                                 </td>
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Model Sample File -->
                           <tr>
                              <th class="text-right">Model Sample File</th>
                              @foreach ($account_detail as $key => $account)
                                 <?php $acc_lob_ch_cnt=0; ?>
                                 @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                 <td class="text-center" colspan="{{$acc_lob_ch_cnt}}">
                                    @foreach($account['fileimage'] as $file)
                                       @if(isset($file->model_file) && !empty($file->model_file) && $file->model_file !=null)
                                          <?php 
                                             $client_id = $account->client_id;
                                             $acc_name = $account->account_name;
                                             $replace_str = $client_id."_".$acc_name."_";
                                             $f_name = str_replace($replace_str, "", $file->model_file)
                                           ?>
                                          <i class="fad fa-file-check" title="{{ $f_name }}"></i>
                                          @endif
                                    @endforeach
                                 </td>
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Accuracy Measurement / Result -->
                           <tr>
                              <th class="text-right">Accuracy Measurement / Result</th>
                              @foreach ($account_detail as $key => $account)
                              <?php $acc_lob_ch_cnt=0; ?>
                                 @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                 <td class="text-center" colspan ="{{$acc_lob_ch_cnt}}">
                                    @foreach($account['fileimage'] as $file)
                                       @if(isset($file->f_accurecy_file) && !empty($file->f_accurecy_file) && $file->f_accurecy_file !=null)
                                          <?php 
                                             $client_id = $account->client_id;
                                             $acc_name = $account->account_name;
                                             $replace_str = $client_id."_".$acc_name."_";
                                             $f_name = str_replace($replace_str, "", $file->f_accurecy_file)
                                           ?>
                                          <i class="fad fa-file-check" title="{{ $f_name }}"></i>
                                          @endif
                                    @endforeach
                                 </td>
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Staffing / Resource Planning -->
                           <tr>
                              <th class="bg_light_th">Staffing / Resource Planning</th>
                                 
                                 @foreach ($account_detail as $key => $account)
                                 <?php $acc_lob_ch_cnt=0; ?>
                                 @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                    
                                 @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- Process Document -->
                           <tr>
                              <th class="text-right">Process Document</th>
                              @foreach ($account_detail as $key => $account)
                              <?php $acc_lob_ch_cnt=0; ?>
                                 @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                 <td class="text-center" colspan ="{{$acc_lob_ch_cnt}}">
                                    @foreach($account['fileimage'] as $file)
                                       @if(isset($file->sta_process_doc) && !empty($file->sta_process_doc) && $file->sta_process_doc !=null)
                                          <?php 
                                             $client_id = $account->client_id;
                                             $acc_name = $account->account_name;
                                             $replace_str = $client_id."_".$acc_name."_";
                                             $f_name = str_replace($replace_str, "", $file->sta_process_doc)
                                           ?>
                                          <i class="fad fa-file-check" title="{{ $f_name }}"></i>
                                       @endif
                                    @endforeach
                                 </td>
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Model Sample File -->
                           <tr>
                              <th class="text-right">Model Sample File</th>
                              @foreach ($account_detail as $key => $account)
                              <?php $acc_lob_ch_cnt=0; ?>
                                 @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                 <td class="text-center" colspan ="{{$acc_lob_ch_cnt}}">
                                    @foreach($account['fileimage'] as $file)
                                       @if(isset($file->sta_model_file) && !empty($file->sta_model_file) && $file->sta_model_file !=null)
                                          <?php 
                                             $client_id = $account->client_id;
                                             $acc_name = $account->account_name;
                                             $replace_str = $client_id."_".$acc_name."_";
                                             $f_name = str_replace($replace_str, "", $file->sta_model_file)
                                           ?>
                                          <i class="fad fa-file-check" title="{{ $f_name }}"></i>
                                       @endif
                                    @endforeach
                                 </td>
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Staffing Forecast Accuracy Result -->
                           <tr>
                              <th class="text-right">Staffing Forecast Accuracy Result</th>
                              @foreach ($account_detail as $key => $account)
                              <?php $acc_lob_ch_cnt=0; ?>
                                 @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                 <td class="text-center" colspan ="{{$acc_lob_ch_cnt}}">
                                    @foreach($account['fileimage'] as $file)
                                       @if(isset($file->sta_forecast_file) && !empty($file->sta_forecast_file) && $file->sta_forecast_file !=null)
                                          <?php 
                                             $client_id = $account->client_id;
                                             $acc_name = $account->account_name;
                                             $replace_str = $client_id."_".$acc_name."_";
                                             $f_name = str_replace($replace_str, "", $file->sta_forecast_file)
                                           ?>
                                          <i class="fad fa-file-check" title="{{ $f_name }}"></i>
                                       @endif
                                    @endforeach
                                 </td>
                              @endforeach
                           </tr>
                           <!--  -->

                            <!-- Scheduling -->
                            <tr>
                              <th class="bg_light_th">Scheduling</th>
                                 @foreach ($account_detail as $key => $account)
                                 <?php $acc_lob_ch_cnt=0; ?>
                                    @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                 @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- Process Document -->
                           <tr>
                              <th class="text-right">Process Document</th>
                              @foreach ($account_detail as $key => $account)
                              <?php $acc_lob_ch_cnt=0; ?>
                                 @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                 <td class="text-center" colspan ="{{$acc_lob_ch_cnt}}">
                                    @foreach($account['fileimage'] as $file)
                                       @if(isset($file->sche_p_doc) && !empty($file->sche_p_doc) && $file->sche_p_doc !=null)
                                          <?php 
                                             $client_id = $account->client_id;
                                             $acc_name = $account->account_name;
                                             $replace_str = $client_id."_".$acc_name."_";
                                             $f_name = str_replace($replace_str, "", $file->sche_p_doc)
                                           ?>
                                          <i class="fad fa-file-check" title="{{ $f_name }}"></i>
                                       @endif
                                    @endforeach
                                 </td>
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Scheduling Model (only if done in Excel) -->
                           <tr>
                              <th class="text-right">Scheduling Model (only if done in Excel)</th>
                              @foreach ($account_detail as $key => $account)
                              <?php $acc_lob_ch_cnt=0; ?>
                                 @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                 <td class="text-center" colspan ="{{$acc_lob_ch_cnt}}">
                                    @foreach($account['fileimage'] as $file)
                                       @if(isset($file->sche_sched_file) && !empty($file->sche_sched_file) && $file->sche_sched_file !=null)
                                          <?php 
                                             $client_id = $account->client_id;
                                             $acc_name = $account->account_name;
                                             $replace_str = $client_id."_".$acc_name."_";
                                             $f_name = str_replace($replace_str, "", $file->sche_sched_file)
                                           ?>
                                          <i class="fad fa-file-check" title="{{ $f_name }}"></i>
                                       @endif
                                    @endforeach
                                 </td>
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Scheduling Forecast Accuracy Result -->
                           <tr>
                              <th class="text-right">Scheduling Forecast Accuracy Result</th>
                              @foreach ($account_detail as $key => $account)
                              <?php $acc_lob_ch_cnt=0; ?>
                                 @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                 <td class="text-center" colspan ="{{$acc_lob_ch_cnt}}">
                                    @foreach($account['fileimage'] as $file)
                                       @if(isset($file->sche_forecast_file) && !empty($file->sche_forecast_file) && $file->sche_forecast_file !=null)
                                          <?php 
                                             $client_id = $account->client_id;
                                             $acc_name = $account->account_name;
                                             $replace_str = $client_id."_".$acc_name."_";
                                             $f_name = str_replace($replace_str, "", $file->sche_forecast_file)
                                           ?>
                                          <i class="fad fa-file-check" title="{{ $f_name }}"></i>
                                       @endif
                                    @endforeach
                                 </td>
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- IDP / Deviation File sample -->
                           <tr>
                              <th class="text-right">IDP / Deviation File sample</th>
                              @foreach ($account_detail as $key => $account)
                              <?php $acc_lob_ch_cnt=0; ?>
                                 @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                 <td class="text-center" colspan ="{{$acc_lob_ch_cnt}}">
                                    @foreach($account['fileimage'] as $file)
                                       @if(isset($file->sche_idp_file) && !empty($file->sche_idp_file) && $file->sche_idp_file !=null)
                                          <?php 
                                             $client_id = $account->client_id;
                                             $acc_name = $account->account_name;
                                             $replace_str = $client_id."_".$acc_name."_";
                                             $f_name = str_replace($replace_str, "", $file->sche_idp_file)
                                           ?>
                                          <i class="fad fa-file-check" title="{{ $f_name }}"></i>
                                       @endif
                                    @endforeach
                                 </td>
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- RTA / Intraday Management -->
                           <tr>
                              <th class="bg_light_th">RTA / Intraday Management</th>
                                 @foreach ($account_detail as $key => $account)
                                 <?php $acc_lob_ch_cnt=0; ?>
                                    @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                 @endforeach
                              <td colspan ="{{$acc_lob_ch_cnt}}"></td>
                           </tr>
                           <!--  -->

                           <!-- Process Document -->
                           <tr>
                              <th class="text-right">Process Document</th>
                              @foreach ($account_detail as $key => $account)
                                 <?php $acc_lob_ch_cnt=0; ?>
                                 @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                 <td class="text-center" colspan ="{{$acc_lob_ch_cnt}}">
                                    @foreach($account['fileimage'] as $file)
                                       @if(isset($file->rta_p_file) && !empty($file->rta_p_file) && $file->rta_p_file !=null)
                                          <?php 
                                             $client_id = $account->client_id;
                                             $acc_name = $account->account_name;
                                             $replace_str = $client_id."_".$acc_name."_";
                                             $f_name = str_replace($replace_str, "", $file->rta_p_file)
                                           ?>
                                          <i class="fad fa-file-check" title="{{ $f_name }}"></i>
                                       @endif
                                    @endforeach
                                 </td>
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Intraday Report Sample -->
                           <tr>
                              <th class="text-right">Intraday Report Sample</th>
                              @foreach ($account_detail as $key => $account)
                                 <?php $acc_lob_ch_cnt=0; ?>
                                 @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                 <td class="text-center" colspan ="{{$acc_lob_ch_cnt}}">
                                    @foreach($account['fileimage'] as $file)
                                       @if(isset($file->rta_intro_file) && !empty($file->rta_intro_file) && $file->rta_intro_file !=null)
                                          <?php 
                                             $client_id = $account->client_id;
                                             $acc_name = $account->account_name;
                                             $replace_str = $client_id."_".$acc_name."_";
                                             $f_name = str_replace($replace_str, "", $file->rta_intro_file)
                                           ?>
                                          <i class="fad fa-file-check" title="{{ $f_name }}"></i>
                                       @endif
                                    @endforeach
                                 </td>
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- Day-End Report Sample -->
                           <tr>
                              <th class="text-right">Day-End Report Sample</th>
                              @foreach ($account_detail as $key => $account)
                                 <?php $acc_lob_ch_cnt=0; ?>
                                 @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                 <td class="text-center" colspan ="{{$acc_lob_ch_cnt}}">
                                    @foreach($account['fileimage'] as $file)
                                       @if(isset($file->rta_dayr_file) && !empty($file->rta_dayr_file) && $file->rta_dayr_file !=null)
                                          <?php 
                                             $client_id = $account->client_id;
                                             $acc_name = $account->account_name;
                                             $replace_str = $client_id."_".$acc_name."_";
                                             $f_name = str_replace($replace_str, "", $file->rta_dayr_file)
                                           ?>
                                          <i class="fad fa-file-check" title="{{ $f_name }}"></i>
                                       @endif
                                    @endforeach
                                 </td>
                              @endforeach
                           </tr>
                           <!--  -->

                           <!-- RCA / Post-Mortem Report Sample -->
                           <tr>
                              <th class="text-right">RCA / Post-Mortem Report Sample</th>
                              @foreach ($account_detail as $key => $account)
                                 <?php $acc_lob_ch_cnt=0; ?>
                                 @foreach($account['lobs'] as $key2 => $lob)
                                       @foreach ($lob->channel as $key => $channels)
                                          <?php ++$acc_lob_ch_cnt; ?>
                                       @endforeach
                                    @endforeach
                                 <td class="text-center" colspan ="{{$acc_lob_ch_cnt}}">
                                    @foreach($account['fileimage'] as $file)
                                       @if(isset($file->rta_rca_file) && !empty($file->rta_rca_file) && $file->rta_rca_file !=null)
                                          <?php 
                                             $client_id = $account->client_id;
                                             $acc_name = $account->account_name;
                                             $replace_str = $client_id."_".$acc_name."_";
                                             $f_name = str_replace($replace_str, "", $file->rta_rca_file)
                                           ?>
                                          <i class="fad fa-file-check" title="{{ $f_name }}"></i>
                                       @endif
                                    @endforeach
                                 </td>
                              @endforeach
                           </tr>
                           <!--  -->
                           </tbody>
                     </table>
                  </div>
               </div>
                  <!-- ended by JD -->
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="footerBtn-panel">
         <button type="button" class="action-button previous previous_button">Back</button>
         <button type="submit" class="action-button">Submit</button>
      </div>
   </div>
   