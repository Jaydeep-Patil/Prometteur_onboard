<?php

return [
    "BILLING_TYPE" => [
            '1'=> "Monthly FTE",
            '2'=> "Incenter Hours",
            '3'=> "Production Hour",
            '4'=> "Production Hour with interval compliance caps",
            '5'=> "Handled Minutes",
            '6'=> "Per Call",
            '7'=> "Per Call Tiered Pricing",
            '8'=> "Per Minute with Occupancy Adjustment",
            '9'=> "Per Minute with AHT Cap",
            '10'=> "Per Minute when only Talk Time and ACW are paid",
            '11'=> "Per Minute when only Talk Time and Hold are paid",
            '12'=> "Per Minute when only Talk Time is Paid",
            '13'=> "Per E-mail Processed",
            '14'=> "Per Workstation",
            '15'=> "Per Sale",
            '16'=> "Per Chat",
            '17'=> "Other",
    ],

    "BILLING_CAP" => [
        '1' => 'Occupancy',
        '2' => 'AHT',
        '3' => 'Not Applicable'
    ],

    "MIN_BILLING_GUARANTEE" => [
        '1' => '100%',
        '2' => '95%',
        '3' => '90%',
        '4' => '85%',
        '5' => '80%',
        '6' => '75%',
        '7' => '70%',
        '8' => '65%',
        '9' => '60%',
        '10' => '55%',
        '11' => '50%',
        '12' => 'Not Applicable'
    ],

    "MIN_BILLING_REFERENCE" => [
        '1' => 'Contractual Lock',
        '2' => 'Contractual FTE',
        '3' => 'Current Run Rate'
    ],

    "MAX_BILLABLE_THRESHOLD" => [ 
        '1' => '120%',
        '2' => '119%',
        '3' => '118%',
        '4' => '117%',
        '5' => '116%',
        '6' => '115%',
        '7' => '114%',
        '8' => '113%',
        '9' => '112%',
        '10' => '111%',
        '11' => '110%',
        '12' => '109%',
        '13' => '108%',
        '14' => '107%',
        '15' => '106%',
        '16' => '105%',
        '17' => '104%',
        '18' => '103%',
        '19' => '102%',
        '20' => '101%',
        '21' => 'Not Applicable'
    ],

    "MAX_BILLABLE_REFERENCE" => [
        '1' => 'Contractual Lock',
        '2' => 'Contractual FTE',
    ],

    "SERVICE_API" => [
        '1' => 'Service Level',
        '2' => 'ASA',
        '3' => 'Abandon %',
        '4' => 'Answered %',
        '5' => 'Handle to Commit %',
        '6' => 'FTE Delivery',
        '7' => 'Production Hours',
        '8' => 'Occupancy %',
        '9' => 'Interval Compliance %',
        '10' => 'ISAR Delivery',
        '11' => 'Service Quality Index',
        '12' => 'AHT',
        '13' => 'Sales Conversion'
    ],

    "TIME" => [
        '0:00' => '0:00',
        '0:30' => '0:30',
        '1:00' => '1:00',
        '1:30' => '1:30',
        '2:00' => '2:00',
        '2:30' => '2:30',
        '3:00' => '3:00',
        '3:30' => '3:30',
        '4:00' => '4:00',
        '4:30' => '4:30',
        '5:00' => '5:00',
        '5:30' => '5:30',
        '6:00' => '6:00',
        '6:30' => '6:30',
        '7:00' => '7:00',
        '7:30' => '7:30',
        '8:00' => '8:00',
        '8:30' => '8:30',
        '9:00' => '9:00',
        '9:30' => '9:30',
        '10:00' => '10:00',
        '10:30' => '10:30',
        '11:00' => '11:00',
        '11:30' => '11:30',
        '12:00' => '12:00',
        '12:30' => '12:30',
        '13:00' => '13:00',
        '13:30' => '13:30',
        '14:00' => '14:00',
        '14:30' => '14:30',
        '15:00' => '15:00',
        '15:30' => '15:30',
        '16:00' => '16:00',
        '16:30' => '16:30',
        '17:00' => '17:00',
        '17:30' => '17:30',
        '18:00' => '18:00',
        '18:30' => '18:30',
        '19:00' => '19:00',
        '19:30' => '19:30',
        '20:00' => '20:00',
        '20:30' => '20:30',
        '21:00' => '21:00',
        '21:30' => '21:30',
        '22:00' => '22:00',
        '22:30' => '22:30',
        '23:00' => '23:00',
        '23:30' => '23:30',
        'No Operations' => 'No Operations',
    ],

    "ACD_Billing_SystemName" => [  
        '1' => 'INCONTACT',
        '2' => 'AWS CONNECT',
        '3' => 'CISCO',
        '4' => 'AVAYA',
        '5' => 'GENESYS',
        '6' => 'Other',
    ],

    "WFM_SYSTEM" => [
        '1' => 'NICE',
        '2' => 'VERINT',
        '3' => 'ASPECT',
        '4' => 'GENESYS',
        '5' => 'CALABRIO',
        '6' => 'Other',
    ],

    "PROCESS_DETAILS" => [
        '1' => 'Retail',
        '2' => 'Telecom',
        '3' => 'Fintech',
        '4' => 'Bankng',
        '5' => 'e-Com',
        '6' => 'Insurance',
        '7' => 'Health Care',
        '8' => 'Customer Service',
        '9' => 'Others',
    ],

];