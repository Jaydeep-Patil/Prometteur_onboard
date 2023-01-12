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

    <div class="pagetitle">
       <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="accountlist.html">Account</a></li>
          <li class="breadcrumb-item active">Account Details</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col col-md-12 col-12">
          <!-- === Account Details Blocks === -->
          <div class="card mb-4">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between">
                  <h5 class="card-title">Account Details</h5>
              </div>
                <ul class="summary_ul">
                  <li>
                      <label>User Name</label>
                      <p>{{ $user_detail->name }}</p>
                  </li>
                  <li>
                      <label>Business Email</label>
                      <p>{{ $user_detail->email }}</p>
                  </li>
               </ul>
            </div>
          </div>

         <!-- === General Overview Blocks === -->
                           <div class="summary_contaienr">
                              <h2>General Overview</h2>
                              <div class="table-responsive">
                                 <table class="table table-bordered summary_table">
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
                                    @foreach ($account_detail as $key => $account)
                                        <tbody>
                                        <tr>
                                            {{-- {{ dd($account->lobs->count()) }} --}}
                                            <th rowspan="3">{{ $account->account_name }}</th>
                                            @foreach ($account->lobs as $key => $lob)
                                            <td rowspan="1" {{ $key }}>{{ $lob->lob_name }}</td>
                                            @foreach ($lob->channels as $key => $channels)
                                                    {{-- @if($key == 0) --}}
                                                        <tr>
                                                            <td>{{ $channels->channel_name }}</td>
                                                            <td>{{ $channels->country }}</td>
                                                            <td>{{ $channels->city_name }}</td>
                                                            <td>{{ $channels->site_name }}</td>
                                                            <td>{{ $channels->fte }}</td>
                                                        </tr>
                                                            {{-- @else
                                                            <tr>
                                                                <td>{{ $channels->channel_name }}</td>
                                                                <td>{{ $channels->country }}</td>
                                                                <td>{{ $channels->city_name }}</td>
                                                                <td>{{ $channels->site_name }}</td>
                                                                <td>{{ $channels->fte }}</td>
                                                            </tr>
                                                    @endif --}}
                                                        @endforeach
                                                    @endforeach
                                        </tbody>
                                    @endforeach
                                 </table>
                              </div>
                           </div>
                           <!-- === Detailed Information Blocks === -->
                           <div class="summary_contaienr">
                              <h2>Detailed Information</h2>
                              <div class="table-responsive">
                                 <table class="table table-bordered summary_table">
                                    <!-- === Account Tbody ===  -->
                                    <tbody>
                                        @foreach ($account_detail as $key => $account)
                                        <tr>
                                           <th class="bg_dark_th">Account Name</th>
                                                 <td colspan="4" class="text-center">{{ $account->account_name }}</td>
                                             </tr>
                                             <tr>
                                                <th class="bg_light_th">LOB</th>
                                                    @foreach ($account->lobs as $key => $lob)
                                                      <td colspan="{{ $account->lobs->count() }}" {{ $key }} class="text-center">{{ $lob->lob_name }}</td>
                                                      @endforeach
                                                      <?php
                                                      $total = count($lob->channels)
                                                      ?>

                                                        {{-- {{ dd($lob->channels[0]['channel_name']) }} --}}
                                                    {{-- @foreach ($lob as $key => $lobs) --}}
                                                      <tr>
                                                         <th class="bg_light_th">Channels</th>
                                                        @foreach ($account->lobs as $key => $lob)
                                                            @foreach ($lob->channels as $key => $channels)
                                                            <td class="text-center">{{ $channels->channel_name }}</td>
                                                            @endforeach
                                                        @endforeach
                                                      </tr>
                                                      <tr>
                                                         <th class="bg_light_th">Country</th>

                                                        @foreach ($account->lobs as $key => $lob)
                                                            @foreach ($lob->channels as $key => $channels)
                                                            <td class="text-center">{{ $channels->country }}</td>
                                                            @endforeach
                                                        @endforeach
                                                      </tr>
                                                      <tr>
                                                         <th class="bg_light_th">City Name</th>

                                                         @foreach ($account->lobs as $key => $lob)
                                                            @foreach ($lob->channels as $key => $channels)
                                                            <td class="text-center">{{ $channels->city_name }}</td>
                                                            @endforeach
                                                         @endforeach
                                                      </tr>
                                                      <tr>
                                                         <th class="bg_light_th">Site Name</th>

                                                         @foreach ($account->lobs as $key => $lob)
                                                            @foreach ($lob->channels as $key => $channels)
                                                            <td class="text-center">{{ $channels->site_name }}</td>
                                                            @endforeach
                                                         @endforeach
                                                      </tr>
                                                      <tr>
                                                         <th class="bg_light_th">FTEs</th>

                                                         @foreach ($account->lobs as $key => $lob)
                                                            @foreach ($lob->channels as $key => $channels)
                                                            <td class="text-center">{{ $channels->fte }}</td>
                                                            @endforeach
                                                         @endforeach
                                                      </tr>
                                                      {{-- @endforeach --}}
                                                  {{-- @endforeach --}}
                                                {{-- <td colspan="2" class="text-center">Voice LOB</td>
                                                <td colspan="2" class="text-center">Chat LOB</td>
                                                <td colspan="2" class="text-center">Voice LOB</td> --}}
                                             </tr>
                                              @endforeach
                                           {{-- <td colspan="4" class="text-center">Microsoft</td> --}}



                                      </tbody>
                                    <!-- === Billability Tbody ===  -->
                                    <tbody>
                                       <tr>
                                          <th class="bg_dark_th">Billability</th>
                                          <td colspan="8"></td>
                                       </tr>
                                       <tr>
                                          <th>Billing Method</th>
                                          <td class="text-center">Handle Minutes</td>
                                          <td class="text-center">Production Hour</td>
                                          <td class="text-center">Handle Minutes</td>
                                          <td class="text-center">Production Hour</td>
                                          <td class="text-center">Handle Minutes</td>
                                          <td class="text-center">Production Hour</td>
                                          <td class="text-center">Handle Minutes</td>
                                          <td class="text-center">Production Hour</td>
                                       </tr>
                                       <tr>
                                          <th>Billing Cap</th>
                                          <td class="text-center">Occupancy</td>
                                          <td class="text-center">AHT</td>
                                          <td class="text-center">Occupancy</td>
                                          <td class="text-center">AHT</td>
                                          <td class="text-center">Occupancy</td>
                                          <td class="text-center">AHT</td>
                                          <td class="text-center">Occupancy</td>
                                          <td class="text-center">AHT</td>
                                       </tr>
                                       <tr>
                                          <th>Value for selected Billing Cap</th>
                                          <td class="text-center"></td>
                                          <td class="text-center"></td>
                                          <td class="text-center"></td>
                                          <td class="text-center"></td>
                                          <td class="text-center"></td>
                                          <td class="text-center"></td>
                                          <td class="text-center"></td>
                                          <td class="text-center"></td>
                                       </tr>
                                       <tr>
                                          <th>Min Billing Guarantee</th>
                                          <td class="text-center">50.%</td>
                                          <td class="text-center">60.%</td>
                                          <td class="text-center">70.%</td>
                                          <td class="text-center">80.%</td>
                                          <td class="text-center">85.%</td>
                                          <td class="text-center">90.%</td>
                                          <td class="text-center">95.%</td>
                                          <td class="text-center">100%</td>
                                       </tr>
                                       <tr>
                                          <th>Min Billing Reference</th>
                                          <td class="text-center">Contractual Lock</td>
                                          <td class="text-center">Contractual FTE</td>
                                          <td class="text-center">Contractual Lock</td>
                                          <td class="text-center">Contractual FTE</td>
                                          <td class="text-center">Contractual Lock</td>
                                          <td class="text-center">Contractual FTE</td>
                                          <td class="text-center">Contractual Lock</td>
                                          <td class="text-center">Contractual FTE</td>
                                       </tr>
                                       <tr>
                                          <th>Max Billable Threshold</th>
                                          <td class="text-center">101.%</td>
                                          <td class="text-center">102.%</td>
                                          <td class="text-center">103.%</td>
                                          <td class="text-center">104.%</td>
                                          <td class="text-center">105.%</td>
                                          <td class="text-center">106.%</td>
                                          <td class="text-center">107.%</td>
                                          <td class="text-center">108.%</td>
                                       </tr>
                                       <tr>
                                          <th>Max Billing Reference</th>
                                          <td class="text-center">Contractual Lock</td>
                                          <td class="text-center">Contractual FTE</td>
                                          <td class="text-center">Contractual Lock</td>
                                          <td class="text-center">Contractual FTE</td>
                                          <td class="text-center">Contractual Lock</td>
                                          <td class="text-center">Contractual FTE</td>
                                          <td class="text-center">Contractual Lock</td>
                                          <td class="text-center">Contractual FTE</td>
                                       </tr>
                                    </tbody>
                                    <!-- === KPIs & Objectives Tbody ===  -->
                                    <tbody>
                                       <tr>
                                          <th class="bg_dark_th">KPIs & Objectives</th>
                                          <td colspan="8"></td>
                                       </tr>
                                       <tr>
                                          <th>SOW Max Staffing Req?</th>
                                          <td class="text-center">101.%</td>
                                          <td class="text-center">102.%</td>
                                          <td class="text-center">103.%</td>
                                          <td class="text-center">104.%</td>
                                          <td class="text-center">105.%</td>
                                          <td class="text-center">106.%</td>
                                          <td class="text-center">107.%</td>
                                          <td class="text-center">108.%</td>
                                       </tr>
                                       <tr>
                                          <th>Service KPI - 1 (If applicable)</th>
                                          <td class="text-center">Occupancy %</td>
                                          <td class="text-center">Occupancy %</td>
                                          <td class="text-center">Occupancy %</td>
                                          <td class="text-center">Occupancy %</td>
                                          <td class="text-center">Occupancy %</td>
                                          <td class="text-center">Occupancy %</td>
                                          <td class="text-center">Occupancy %</td>
                                          <td class="text-center">Occupancy %</td>
                                       </tr>
                                       <tr>
                                          <th>Service KPI - 1 - Target (%/Sec)</th>
                                          <td class="text-center">30</td>
                                          <td class="text-center">30</td>
                                          <td class="text-center">30</td>
                                          <td class="text-center">30</td>
                                          <td class="text-center">30</td>
                                          <td class="text-center">30</td>
                                          <td class="text-center">30</td>
                                          <td class="text-center">30</td>
                                       </tr>
                                       <tr>
                                          <th>Service KPI - 2 (If applicable)</th>
                                          <td class="text-center">Occupancy %</td>
                                          <td class="text-center">Occupancy %</td>
                                          <td class="text-center">Occupancy %</td>
                                          <td class="text-center">Occupancy %</td>
                                          <td class="text-center">Occupancy %</td>
                                          <td class="text-center">Occupancy %</td>
                                          <td class="text-center">Occupancy %</td>
                                          <td class="text-center">Occupancy %</td>
                                       </tr>
                                       <tr>
                                          <th>Service KPI - 2 - Target (%/Sec)</th>
                                          <td class="text-center">30</td>
                                          <td class="text-center">30</td>
                                          <td class="text-center">30</td>
                                          <td class="text-center">30</td>
                                          <td class="text-center">30</td>
                                          <td class="text-center">30</td>
                                          <td class="text-center">30</td>
                                          <td class="text-center">30</td>
                                       </tr>
                                    </tbody>
                                    <!-- === Training Details Tbody ===  -->
                                    <tbody>
                                       <tr>
                                          <th class="bg_dark_th">Training Details</th>
                                          <td colspan="8"></td>
                                       </tr>
                                       <tr>
                                          <th>Classroom Training Duration (Weeks)</th>
                                          <td class="text-center">3</td>
                                          <td class="text-center">3</td>
                                          <td class="text-center">3</td>
                                          <td class="text-center">3</td>
                                          <td class="text-center">3</td>
                                          <td class="text-center">3</td>
                                          <td class="text-center">3</td>
                                          <td class="text-center">3</td>
                                       </tr>
                                       <tr>
                                          <th>Nesting / OJT Duration (Weeks)</th>
                                          <td class="text-center">3</td>
                                          <td class="text-center">3</td>
                                          <td class="text-center">3</td>
                                          <td class="text-center">3</td>
                                          <td class="text-center">3</td>
                                          <td class="text-center">3</td>
                                          <td class="text-center">3</td>
                                          <td class="text-center">3</td>
                                       </tr>
                                    </tbody>
                                    <!-- === Operating Hours Tbody ===  -->
                                    <tbody>
                                       <tr>
                                          <th class="bg_dark_th">Operating Hours</th>
                                          <td colspan="8"></td>
                                       </tr>
                                       <tr>
                                          <th>Weekday Start Time</th>
                                          <td class="text-center">00:00</td>
                                          <td class="text-center">00:00</td>
                                          <td class="text-center">00:00</td>
                                          <td class="text-center">00:00</td>
                                          <td class="text-center">00:00</td>
                                          <td class="text-center">00:00</td>
                                          <td class="text-center">00:00</td>
                                          <td class="text-center">00:00</td>
                                       </tr>
                                       <tr>
                                          <th>Weekday End Time</th>
                                          <td class="text-center">23:30</td>
                                          <td class="text-center">23:30</td>
                                          <td class="text-center">23:30</td>
                                          <td class="text-center">23:30</td>
                                          <td class="text-center">23:30</td>
                                          <td class="text-center">23:30</td>
                                          <td class="text-center">23:30</td>
                                          <td class="text-center">23:30</td>
                                       </tr>
                                       <tr>
                                          <th>Sat Start Time</th>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                       </tr>
                                       <tr>
                                          <th>Sat Start Time</th>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                       </tr>
                                       <tr>
                                          <th>Sun Start Time</th>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                       </tr>
                                       <tr>
                                          <th>Sun Start Time</th>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                          <td class="text-center">No Operations</td>
                                       </tr>
                                    </tbody>
                                    <!-- === Process Details Tbody ===  -->
                                    <tbody>
                                       <tr>
                                          <th class="bg_dark_th">Process Details</th>
                                          <td colspan="8"></td>
                                       </tr>
                                       <tr>
                                          <th>Industry Segment</th>
                                          <td class="text-center">Fintech</td>
                                          <td class="text-center">Retail</td>
                                          <td class="text-center">Banking</td>
                                          <td class="text-center">e-Com</td>
                                          <td class="text-center">Health Care</td>
                                          <td class="text-center">Telecom</td>
                                          <td class="text-center">Customer Service</td>
                                          <td class="text-center">Others</td>
                                       </tr>
                                    </tbody>
                                    <!-- === Employee Details Tbody ===  -->
                                    <tbody>
                                       <tr>
                                          <th class="bg_dark_th">Employee Details</th>
                                          <td colspan="8"></td>
                                       </tr>
                                       <tr>
                                          <th>Full-Time Employees</th>
                                          <td class="text-center">Yes</td>
                                          <td class="text-center">Yes</td>
                                          <td class="text-center">Yes</td>
                                          <td class="text-center">Yes</td>
                                          <td class="text-center">Yes</td>
                                          <td class="text-center">Yes</td>
                                          <td class="text-center">Yes</td>
                                          <td class="text-center">Yes</td>
                                       </tr>
                                       <tr>
                                          <th>Part-Time Employees</th>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                       </tr>
                                       <tr>
                                          <th>Contractual Employees</th>
                                          <td class="text-center">Yes</td>
                                          <td class="text-center">Yes</td>
                                          <td class="text-center">Yes</td>
                                          <td class="text-center">Yes</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                       </tr>
                                    </tbody>
                                    <!-- === Authorized Locations Tbody ===  -->
                                    <tbody>
                                       <tr>
                                          <th class="bg_dark_th">Authorized Locations</th>
                                          <td colspan="8"></td>
                                       </tr>
                                       <tr>
                                          <th>Work in Office</th>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                       </tr>
                                       <tr>
                                          <th>Work from Home</th>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                          <td class="text-center">No</td>
                                       </tr>
                                    </tbody>
                                    <!-- === System Information Tbody ===  -->
                                    <tbody>
                                       <tr>
                                          <th class="bg_dark_th">System Information</th>
                                          <td colspan="8"></td>
                                       </tr>
                                       <tr>
                                          <th>ACD Name</th>
                                          <td class="text-center">CISCO</td>
                                          <td class="text-center">INCONTACT</td>
                                          <td class="text-center">AVAYA</td>
                                          <td class="text-center">Other</td>
                                          <td class="text-center">CISCO</td>
                                          <td class="text-center">INCONTACT</td>
                                          <td class="text-center">AVAYA</td>
                                          <td class="text-center">Other</td>
                                       </tr>
                                       <tr>
                                          <th>WFM Tool</th>
                                          <td class="text-center">NICE</td>
                                          <td class="text-center">VERINT</td>
                                          <td class="text-center">ASPECT</td>
                                          <td class="text-center">CALABRIO</td>
                                          <td class="text-center">Other</td>
                                          <td class="text-center">NICE</td>
                                          <td class="text-center">VERINT</td>
                                          <td class="text-center">ASPECT</td>
                                       </tr>
                                       <tr>
                                          <th>Back office Tool</th>
                                          <td class="text-center"></td>
                                          <td class="text-center"></td>
                                          <td class="text-center"></td>
                                          <td class="text-center"></td>
                                          <td class="text-center"></td>
                                          <td class="text-center"></td>
                                          <td class="text-center"></td>
                                          <td class="text-center"></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <!-- === Process Information Blocks === -->
                           <div class="summary_contaienr">
                              <h2>Process Information</h2>
                              <div class="table-responsive">
                                 <table class="table table-bordered summary_table summary_procee_table">
                                    <!-- === Account Tbody ===  -->
                                    <tbody>
                                        @foreach ($account_detail as $account_info)
                                        <tr>
                                            <th class="bg_dark_th">Account Name</th>
                                                @foreach ($account_info->processinfo as $info)
                                                    <td class="text-center">{{ $info->account_names }}</td>
                                                @endforeach
                                        </tr>
                                       <tr>
                                           <th class="bg_light_th">LOB</th>
                                           @foreach ($account_info->processinfo as $info)
                                          <td class="text-center">{{ $info->lob_names }}</td>
                                          @endforeach
                                          {{-- <td class="text-center">Voice LOB</td> --}}
                                       </tr>
                                       <tr>
                                          <th class="bg_light_th">Channels</th>
                                            @foreach ($account_info->processinfo as $info)
                                                <td class="text-center">{{ $info->channelnames }}</td>
                                            @endforeach
                                          {{-- <td class="text-center">Email</td> --}}
                                       </tr>
                                       <tr>
                                          <th class="bg_light_th">Country</th>
                                            @foreach ($account_info->processinfo as $info)
                                                <td class="text-center">{{ $info->country }}</td>
                                            @endforeach
                                          {{-- <td class="text-center">India</td> --}}
                                       </tr>
                                       @endforeach
                                    </tbody>
                                    <!-- ======= Forecasting  ======= -->
                                    <tbody>
                                       <tr>
                                          <th class="bg_dark_th">Forecasting</th>
                                          <td colspan="2" ></td>
                                       </tr>
                                       <tr>
                                           <td>Which Forecasting tool / software package is being utilised?</td>
                                                @foreach ($account_info->processinfo as $info)
                                                    <td>{{ $info->f_1 }}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>Which Forecasting model is being used?</td>
                                                @foreach ($account_info->processinfo as $info)
                                                    <td>{{ $info->f_2 }}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>What are the key input parameters to the model?</td>
                                                @foreach ($account_info->processinfo as $info)
                                                    <td>{{ $info->f_3 }}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>How frequently is the model revisited for goodness of fit?</td>
                                                @foreach ($account_info->processinfo as $info)
                                                    <td>{{ $info->f_4 }}</td>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                <td>How do you measure the accuracy of your Forecasting model?</td>
                                                @foreach ($account_info->processinfo as $info)
                                                    <td>{{ $info->f_5 }}</td>
                                                @endforeach
                                            </tr>
                                        {{-- @endforeach --}}
                                    </tbody>
                                    <!-- ========= Staffing / Resource Planning  ======= -->
                                    <tbody>
                                       <tr>
                                          <th class="bg_dark_th">Staffing / Resource Planning</th>
                                          <td colspan="2" ></td>
                                       </tr>
                                       <!-- Forecast Locks -->
                                       <tr>
                                          <th class="bg_light_th">Forecast Locks</th>
                                          <td colspan="2" ></td>
                                       </tr>
                                       <tr>
                                          <td>Who provides the Forecast / Lock which forms the base of Staff Planning?</td>
                                            @foreach ($account_info->processinfo as $info)
                                                <td>{{ $info->f_6 }}</td>
                                            @endforeach
                                       </tr>
                                       <tr>
                                          <td>What is your staff locking model?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_7 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Do you generate Internal Forecast?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_8 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Which Forecast is used for Staff Planning?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_9 }}</td>
                                          @endforeach
                                       </tr>
                                       <!-- AHT -->
                                       {{-- {{ dd($account_info->processinfo); }} --}}
                                       <tr>
                                          <th class="bg_light_th">AHT</th>
                                          <td colspan="2" ></td>
                                       </tr>
                                       <tr>
                                          <td>What AHT is used for Staff Planning?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_10 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>How do you calculate New Hire impact on the AHT?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_11 }}</td>
                                          @endforeach
                                       </tr>
                                       <!-- FTE -->
                                       <tr>
                                          <th class="bg_light_th">FTE</th>
                                          <td colspan="2" ></td>
                                       </tr>
                                       <tr>
                                          <td>How do you generate FTE requirements?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_12 }}</td>
                                          @endforeach
                                       </tr>
                                       <!-- In-Office Shrinkage -->
                                       <tr>
                                          <th class="bg_light_th">In-Office Shrinkage</th>
                                          <td colspan="2" ></td>
                                       </tr>
                                       <tr>
                                          <td>At what level are your In-Office Shrinkages planned?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_13 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Do you have set targets for each individual Aux/Activity code?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_14 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>In-Office shrinkage Forecasts are modeled on (please select the appropriate)</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_15 }}</td>
                                          @endforeach
                                       </tr>
                                       <!-- Out-of-Office Shrinkage -->
                                       <tr>
                                          <th class="bg_light_th">Out-of-Office Shrinkage</th>
                                          <td colspan="2" ></td>
                                       </tr>
                                       <tr>
                                          <td>At what level are your Out-of-Office Shrinkages planned?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_16 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Vacation Forecasts are modeled on (please select the appropriate)</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_17 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Absenteeism Forecasts are modeled on (please select the appropriate)</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_18 }}</td>
                                          @endforeach

                                       </tr>
                                       <!-- Schedule Inflex -->
                                       <tr>
                                          <th class="bg_light_th">Schedule Inflex</th>
                                          <td colspan="2" ></td>
                                       </tr>
                                       <tr>
                                          <td>Is Schedule Inflex considered in Staff planning?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_19 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>How is the Schedule Inflex estimated / calculated?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_20 }}</td>
                                          @endforeach
                                       </tr>
                                       <!-- Attrition -->
                                       <tr>
                                          <th class="bg_light_th">Attrition</th>
                                          <td colspan="2" ></td>
                                       </tr>
                                       <tr>
                                          <td>How do you factor attrition in your staff plan?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_21 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Do you plan for Involuntary Attrition as a separate line item? (BQM, Promotions, Transfers etc.)</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_22 }}</td>
                                          @endforeach
                                       </tr>
                                       <!-- Staff Planning Connects -->
                                       <tr>
                                          <th class="bg_light_th">Staff Planning Connects</th>
                                          <td colspan="2" ></td>
                                       </tr>
                                       <tr>
                                          <td>Do you have Inter-departmental Staff planning discussions?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_23 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>What is the frequency?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_24 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td colspan="3"><strong>Who decides the below:-</strong></td>
                                       </tr>
                                       <tr>
                                          <td>Staffing Plan (Validation & Signing off key assumptions such as AHT, Shrinkage etc.</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_25 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Adding Batches</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_26 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Removing Batches</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_27 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Cross Skilling</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_28 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Is there a client dependency for hiring batches?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_29 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Do you have a calibration calls with the Recruitment team</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_30 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>If Yes – Weekly or Monthly</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_31 }}</td>
                                          @endforeach
                                       </tr>
                                    </tbody>
                                    <!-- ========= Scheduling  ======= -->
                                    <tbody>
                                       <tr>
                                          <th class="bg_dark_th">Scheduling</th>
                                          <td colspan="2"></td>
                                       </tr>
                                       <tr>
                                          <td>Do you do Call Curve Analysis before deciding the Schedule Pattern?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_32 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>What is the frequency of the above?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_33 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>How do you create interval level Volume and AHT requirements?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_34 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>How do you manage the Headcount reconciliation process?</td>
                                          @foreach ($account_info->processinfo as $info)
                                          <td>{{ $info->f_35 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Do you run Manpower Dimensionioning exercise frequently to arrive at optimal HC mix FT/PT/Split/Flexi?</td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_36 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>What is the frequency of the above?</td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_37 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Do you run & test different Schedule Patterns to identify best fit?</td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_38 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>What is the frequency of the above?</td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_39 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Do you plot all In-office shrinkages in your Schedules at Interval Level?
                                             (Coaching, Team Meeting, Business Updates etc.)
                                          </td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_40 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Do you plot Out-of-Office shrinkage in your Schedules at Interval Level? (Vacation)</td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_41 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Do you review IDP/Schedule deviation prior to schedule release?</td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_42 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Do you measure Schedule Efficiency?</td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_43 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>What is your target for Schedule Efficiency? (Please specify in %)</td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_44 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>How do you measure the Schedule Efficiency?</td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_45 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>What is your internal target for Scheduling accuracy? (Requirment to Scheduled - Day/Intervals)</td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_46 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>How do you measure the Schedule Accuracy?</td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_47 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Do you measure the impact of various Scheduling Constraints on the account in terms or FTE & Cost?</td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_48 }}</td>
                                          @endforeach
                                       </tr>
                                    </tbody>
                                    <!-- ========= Intraday Management  ======= -->
                                    <tbody>
                                       <tr>
                                          <th class="bg_dark_th">Intraday Management</th>
                                          <td colspan="2"></td>
                                       </tr>
                                       <tr>
                                          <td>Do you have a WFM Play book / Guide? E.g - Downtime Process, Calling Tree, Threshold & Skilling</td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_49 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Does RTA have a daily read out call / RCA?</td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_50 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Does the RTA do real time skill management?</td>
                                          @foreach ($account_info->processinfo as $info)

                                            <td>{{ $info->f_51 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>Does RTA do Intra-day Reforecasting?</td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_52 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>How do you manage customers resources up or down Realtime?</td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_53 }}</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <td>How do you manage and report, variance to plan Realtime?</td>
                                          @foreach ($account_info->processinfo as $info)
                                            <td>{{ $info->f_54 }}</td>
                                          @endforeach
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                           <!-- === Process Information Blocks === -->
                           <div class="summary_contaienr">
                              <h2>File Information</h2>
                              <div class="table-responsive">

                                 <table class="table table-bordered summary_table summary_procee_table">
                                    <tbody>

                                       <tr>
                                          <th class="bg_dark_th">Account Name</th>
                                            @foreach ($account_info->processinfo as $info)
                                                <td class="text-center">{{ $info->account_names }}</td>
                                            @endforeach
                                       </tr>
                                       <tr>
                                          <th class="bg_light_th">Forecasting</th>
                                          <td colspan="2"></td>
                                       </tr>
                                       <tr>
                                          <th class="text-right">Process Document</th>
                                          @foreach ($account_info->fileimage as $info)
                                          <td class="text-center"><img src="{{ asset('/file_images/'.$info->f_process_doc) }}" alt="f_process_doc image" height="50" width="50">@if($info->f_process_doc == null)<i class="fad fa-file-check"></i>@endif</td>
                                          @endforeach
                                          {{-- <td class="text-center"><i class="fad fa-file-check"></i>@endif</td> --}}
                                       </tr>
                                       <tr>
                                          <th class="text-right">Model Sample File</th>
                                          @foreach ($account_info->fileimage as $info)
                                          <td class="text-center"><img src="{{ asset('/file_images/'.$info->model_file) }}" alt="model_file image" height="50" width="50" > @if($info->model_file == null)<i class="fad fa-file-check"></i>@endif</td>
                                          @endforeach
                                       </tr>>
                                       <tr>
                                          <th class="text-right">Accuracy Measurement / Result</th>
                                          @foreach ($account_info->fileimage as $info)
                                          <td class="text-center"><img src="{{ asset('/file_images/'.$info->f_accurecy_file) }}" alt="f_accurecy_file image"  height="50" width="50">@if($info->f_accurecy_file == null)<i class="fad fa-file-check"></i>@endif</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <th class="bg_light_th">Staffing / Resource Planning</th>
                                          <td colspan="2"></td>
                                       </tr>
                                       <tr>
                                          <th class="text-right">Process Document</th>
                                          @foreach ($account_info->fileimage as $info)
                                          <td class="text-center"><img src="{{ asset('/file_images/'.$info->sta_process_doc) }}" alt="sta_process_doc image"  height="50" width="50">@if($info->sta_process_doc == null)<i class="fad fa-file-check"></i>@endif</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <th class="text-right">Model Sample File</th>
                                          @foreach ($account_info->fileimage as $info)
                                          <td class="text-center"><img src="{{ asset('/file_images/'.$info->sta_model_file) }}" alt="sta_model_file image"  height="50" width="50">@if($info->sta_model_file == null)<i class="fad fa-file-check"></i>@endif</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <th class="text-right">Staffing Forecast Accuracy Result</th>
                                          @foreach ($account_info->fileimage as $info)
                                          <td class="text-center"><img src="{{ asset('/file_images/'.$info->sta_forecast_file) }}" alt="sta_forecast_file image"  height="50" width="50">@if($info->sta_forecast_file == null)<i class="fad fa-file-check"></i>@endif</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <th class="bg_light_th">Scheduling</th>
                                          <td colspan="2"></td>
                                       </tr>
                                       <tr>
                                          <th class="text-right">Process Document</th>
                                          @foreach ($account_info->fileimage as $info)
                                          <td class="text-center"><img src="{{ asset('/file_images/'.$info->sche_p_doc) }}" alt="sche_p_doc image"  height="50" width="50">@if($info->sche_p_doc == null)<i class="fad fa-file-check"></i>@endif</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <th class="text-right">Scheduling Model (only if done in Excel)</th>
                                          @foreach ($account_info->fileimage as $info)
                                          <td class="text-center"><img src="{{ asset('/file_images/'.$info->sche_sched_file) }}" alt="sche_sched_file image"  height="50" width="50">@if($info->sche_sched_file == null)<i class="fad fa-file-check"></i>@endif</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <th class="text-right">Staffing Forecast Accuracy Result</th>
                                          @foreach ($account_info->fileimage as $info)
                                          <td class="text-center"><img src="{{ asset('/file_images/'.$info->sche_forecast_file) }}" alt="sche_forecast_file image"  height="50" width="50">@if($info->sche_forecast_file == null)<i class="fad fa-file-check"></i>@endif</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <th class="text-right">IDP / Deviation File sample</th>
                                          @foreach ($account_info->fileimage as $info)
                                          <td class="text-center"><img src="{{ asset('/file_images/'.$info->sche_idp_file) }}" alt="sche_idp_file image"  height="50" width="50">@if($info->sche_idp_file == null)<i class="fad fa-file-check"></i>@endif</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <th class="bg_light_th">RTA / Intraday Management</th>
                                          <td colspan="2"></td>
                                       </tr>
                                       <tr>
                                          <th class="text-right">Process Document</th>
                                          @foreach ($account_info->fileimage as $info)
                                          <td class="text-center"><img src="{{ asset('/file_images/'.$info->rta_p_file) }}" alt="rta_p_file image"  height="50" width="50">@if($info->rta_p_file == null)<i class="fad fa-file-check"></i>@endif</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <th class="text-right">Intraday Report Sample</th>
                                          @foreach ($account_info->fileimage as $info)
                                          <td class="text-center"><img src="{{ asset('/file_images/'.$info->rta_intro_file) }}" alt="rta_intro_file image"  height="50" width="50">@if($info->f_process_doc == null)<i class="fad fa-file-check"></i>@endif</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <th class="text-right">Day-End Report Sample</th>
                                          @foreach ($account_info->fileimage as $info)
                                          <td class="text-center"><img src="{{ asset('/file_images/'.$info->rta_dayr_file) }}" alt="rta_dayr_file image"  height="50" width="50">@if($info->rta_dayr_file == null)<i class="fad fa-file-check"></i>@endif</td>
                                          @endforeach
                                       </tr>
                                       <tr>
                                          <th class="text-right">RCA/Post-Mortem Report Sample</th>
                                          @foreach ($account_info->fileimage as $info)
                                          <td class="text-center"><img src="{{ asset('/file_images/'.$info->rta_rca_file) }}" alt="rta_rca_file image"  height="50" width="50">@if($info->rta_rca_file == null)<i class="fad fa-file-check"></i>@endif</td>
                                          @endforeach
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>

        </div>
      </div>
    </section>
    
  </main>
@endsection


@section('jquery')
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

