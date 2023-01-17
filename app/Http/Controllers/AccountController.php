<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Channel;
use App\Models\Lob;
use App\Models\Process_info;
use App\Models\Country;
use App\Models\Filesdata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Storage;
use Config;
use Illuminate\Support\Facades\File;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$request->all();
        // $numberToWord = new Numbers_Words();
        // return  $numberToWords->toWords(200);
        // $result=Account::where('temp_id','655cc25')->with('lobs.channels')->get();
        // return view('detailed_information',compact('result'));
        $clients = User::get();
        return view('accounts',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $input=$request->all();
        $ac_del=Account::where('temp_id',$request->temp_id);
        Lob::whereIn('account_id',$ac_del->pluck('id'))->delete();
        Channel::whereIn('account_id',$ac_del->pluck('id'))->delete();
        $ac_del->delete();
        foreach($request->account_name as $key=>$value){
            $ac['account_name']=$value;
            $ac['temp_id']=$request->temp_id;
            $ac['client_id']=$request->client_id;
            $account=Account::create($ac);
            foreach($request->lob[$key]as $key1=>$value1){
                $lb['account_id']=$account->id;
                $lb['lob_name']=$value1;
                $lb['client_id']=$request->client_id;
                $lob=Lob::create($lb);
                foreach($request->channel_name[$key][$key1] as $key2=>$value2){
                    //return $value2;
                    $ch['account_id']=$account->id;
                    $ch['lob_id']=$lob->id;
                    $ch['channel_name']=$value2;
                    $ch['country']=isset($request->country[$key][$key1][$key2])?$request->country[$key][$key1][$key2]:Null;
                    $ch['city_name']=isset($request->city_name[$key][$key1][$key2])?$request->city_name[$key][$key1][$key2]:Null;
                    $ch['site_name']=isset($request->site_name[$key][$key1][$key2])?$request->site_name[$key][$key1][$key2]:Null;
                    $ch['fte']=isset($request->fte[$key][$key1][$key2])?$request->fte[$key][$key1][$key2]:Null;
                    $ch['client_id']=$request->client_id;
                    $channel=Channel::create($ch);
                    //$result[$key][$key1][$key2]=$channel;
                }
            }

        }
        $result=Account::where('temp_id',$request->temp_id)->with('lobs.channels')->get();
        $result1=Account::where('temp_id',$request->temp_id)->with('lobs.channels')->with('fileimage')->get();
        $country=Country::get();

        //Added by Jaydeep
        $billingType =  Config::get("common.BILLING_TYPE");
        $billingCap =  Config::get("common.BILLING_CAP");
        $minBillingGuarantee = Config::get("common.MIN_BILLING_GUARANTEE");
        $minBillingReference = Config::get("common.MIN_BILLING_REFERENCE");
        $maxBillingThres = Config::get("common.MAX_BILLABLE_THRESHOLD");
        $maxBillRef = Config::get("common.MAX_BILLABLE_REFERENCE");
        $serviceApi = Config::get("common.SERVICE_API");
        $time = Config::get("common.TIME");
        $acdBillSystem = Config::get("common.ACD_Billing_SystemName");
        $wfmSystem = Config::get("common.WFM_SYSTEM");
        $processDetails = Config::get("common.PROCESS_DETAILS");

        //ended here by jaydeep
        $result['detailed_page']=view('detailed_information',compact('result','country','billingType','billingCap','minBillingGuarantee',
                'minBillingReference','maxBillingThres', 'maxBillRef', 'serviceApi','time','acdBillSystem','wfmSystem','processDetails'
        ))->render();
        $result['file_page']=view('file_page',compact('result1'))->render();
        $user_detail = User::where('id',$request->temp_id)->first();
        $account_detail = Account::where('temp_id',$request->temp_id)->with('lobs')->with('processinfo')->with('fileimage')->get();
        
         $result['account_detail']=view('summary_page',compact('account_detail','user_detail'))->render();
       
        // dd($result);
        return response()->json(['success' => true,'data'=>$result,'message' => 'Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function show(Account $account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Account $account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Account  $account
     * @return \Illuminate\Http\Response
     */
    public function destroy(Account $account)
    {
        //
    }
    public function account_details($id=null)
    {   
        $user_detail = User::where('id',$id)->first();
        $account_detail = Account::where('temp_id',$id)->with('lobs')->with('processinfo')->with('fileimage')->get();
        //d($account_detail[0]->name,$request->all());
       return view('accoundetails',compact('account_detail','user_detail'))->render();
    }
    public function get_account(Request $request){
       $result=Account::where('temp_id',$request->temp_id)->with('lobs.channels')->get();
        return response()->json(['success' => true,'data'=>$result,'message' => 'Successfully']);
    }
    public function process_info(Request $request){
        $input =$request->all();
        $acc_id = $request->account_names;
        $inputLobs = $request['process_info']['lob_names'];
        $inputChannels = $request['process_info']['channelnames'];
        //fetch all lobs according to requested account
        $lobs = Lob::where('account_id', $acc_id)->get();
       
        foreach($lobs as $lb=>$lob){
            //check lob is present in requested lob array
            if(in_array($lob->id,$inputLobs)){
                //fetch all chaneels against requested lob
                $channelId = Channel::where('lob_id', $lob->id)->get();
                foreach($channelId as $ch=>$channel){ 
                    $chId =$channel['id'];
                    //check channel is present in requested channels
                    if(in_array($chId, $inputChannels)){
                        $input['channelnames'] = $channel['id'];
                        $input['account_names'] = $acc_id;
                        $input['lob_names'] = $lob->id;
                        $input['country'] = $channel['country'];
                        $insert = Process_info::updateOrcreate(['account_names'=>$acc_id,'lob_names'=> $lob->id,'channelnames'=>$chId],$input);
                    }
                }
            }
        }
        if(!empty($insert) && $insert != null){
            return response()->json(["status" => '1', "data" =>  $insert]);
        }else{
            return response()->json(["status" => 0]);
        }
    }
    private function  N2L($number)
    {
        $result = array();
        $tens = floor($number / 10);
        $units = $number % 10;

        $words = array
        (
            'units' => array('', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen'),
            'tens' => array('', '', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety')
        );

        if ($tens < 2)
        {
            $result[] = $words['units'][$tens * 10 + $units];
        }

        else
        {
            $result[] = $words['tens'][$tens];

            if ($units > 0)
            {
                $result[count($result) - 1] .= '-' . $words['units'][$units];
            }
        }

        if (empty($result[0]))
        {
            $result[0] = 'Zero';
        }

        return trim(implode(' ', $result));
    }
    public function file_data(Request $request){
        $imagename1 = null;
        $imagename2 = null;
        $imagename3 = null;
        $imagename4 = null;
        $imagename5 = null;
        $imagename6 = null;
        $imagename7 = null;
        $imagename8 = null;
        $imagename9 = null;
        $imagename10 = null;
        $imagename11 = null;
        $imagename12 = null;
        $imagename11 = null;
        $imagename12 = null;
        $imagename13 = null;
        $imagename14 = null;

        $acc_id =$request->account_id;
        $accountData = Account::where('id',$acc_id)->get();
        if(!empty($accountData)){
            $clientId = $accountData[0]['client_id'];
            $acc_name = $accountData[0]['account_name'];
            
            //get data if account_id already present in table
            $filesData = Filesdata::where('account_id', $acc_id)->first();
            //path for file storage
            $path = '/uploads/'.$clientId.'_'.$acc_name;
            //check here path is already created for this account or not
            if (!File::exists(public_path().$path)) { 
                //If path account created then create here
                File::makeDirectory(public_path().$path,0777,true);
            }
           
            //Forecasting Process Document
            if($request->f_process_doc != null){ 
                //check file already exist or not  
                if(!empty($filesData) && $filesData->f_process_doc != null){
                    //if file already exist then remove from folder
                    unlink(public_path($path.'/'.$filesData['f_process_doc']));
                }
                // $imagename1 = rand(0000,9999).$request->f_process_doc->getclientoriginalname();
                $imagename1 = $clientId.'_'.$acc_name.'_'.$request->f_process_doc->getclientoriginalname();
                //here move file to account folder
                $request->f_process_doc->move(public_path().$path.'/',$imagename1);
                $file_data['f_process_doc'] = $imagename1;
            }else{
                $imagename1 = ($filesData)?$filesData['f_process_doc']:'';
            }
        
            //Model Sample File
            if($request->model_file != null){
                //check file already exist or not  
                if(!empty($filesData) && $filesData->model_file != null){
                    //if file already exist then remove from folder
                    unlink(public_path($path.'/'.$filesData['model_file']));
                }
                // $imagename2 = rand(0000,9999).$request->model_file->getclientoriginalname();
                $imagename2 = $clientId.'_'.$acc_name.'_'.$request->model_file->getclientoriginalname();
                //here move file to account folder
                $request->model_file->move(public_path($path.'/'),$imagename2);
                $file_data['model_file'] = $imagename2;
            }else{
                $imagename2 = ($filesData)?$filesData['model_file']:null;
            }

            //Accuracy Measurement / Result
            if($request->f_accurecy_file != null){
                //check file already exist or not  
                if(!empty($filesData) && $filesData->f_accurecy_file != null){
                    //if file already exist then remove from folder
                    unlink(public_path($path.'/'.$filesData['f_accurecy_file']));
                }
                //$imagename3 = rand(0000,9999).$request->f_accurecy_file->getclientoriginalname();
                $imagename3 = $clientId.'_'.$acc_name.'_'.$request->f_accurecy_file->getclientoriginalname();
                //here move file to account folder
                $request->f_accurecy_file->move(public_path($path.'/'),$imagename3);
                $file_data['f_accurecy_file'] = $imagename3;
            }else{
                $imagename3 = ($filesData)?$filesData['f_accurecy_file']:null;
            }

            //Staffing / Resource Planning Process Document
            if($request->sta_process_doc != null){
                //check file already exist or not  
                if(!empty($filesData) && $filesData->sta_process_doc != null){
                    //if file already exist then remove from folder
                    unlink(public_path($path.'/'.$filesData['sta_process_doc']));
                }
                // $imagename4 = rand(0000,9999).$request->sta_process_doc->getclientoriginalname();
                $imagename4 = $clientId.'_'.$acc_name.'_'.$request->sta_process_doc->getclientoriginalname();
                //here move file to account folder
                $request->sta_process_doc->move(public_path($path.'/'),$imagename4);
                $file_data['sta_process_doc'] = $imagename4;
            }else{
                $imagename4 = ($filesData)?$filesData['sta_process_doc']:null;
            }

            //Staffing / Resource Planning Model Sample File
            if($request->sta_model_file != null){
                //check file already exist or not  
                if(!empty($filesData) && $filesData->sta_process_doc != null){
                    //if file already exist then remove from folder
                    unlink(public_path($path.'/'.$filesData['sta_model_file']));
                }
                // $imagename5 = rand(0000,9999).$request->sta_model_file->getclientoriginalname();
                $imagename5 = $clientId.'_'.$acc_name.'_'.$request->sta_model_file->getclientoriginalname();
                //here move file to account folder
                $request->sta_model_file->move(public_path($path.'/'),$imagename5);
                $file_data['sta_model_file'] = $imagename5;
            }else{
                $imagename5 = ($filesData)?$filesData['sta_model_file']:null;
            }

            //Staffing / Resource Planning ModelStaffing Forecast Accuracy Result
            if($request->sta_forecast_file != null){
                //check file already exist or not  
                if(!empty($filesData) && $filesData->sta_forecast_file != null){
                    //if file already exist then remove from folder
                    unlink(public_path($path.'/'.$filesData['sta_forecast_file']));
                }
                // $imagename6 = rand(0000,9999).$request->sta_forecast_file->getclientoriginalname();
                $imagename6 = $clientId.'_'.$acc_name.'_'.$request->sta_forecast_file->getclientoriginalname();
                //here move file to account folder
                $request->sta_forecast_file->move(public_path($path.'/'),$imagename6);
                $file_data['sta_forecast_file'] = $imagename6;
            }else{
                $imagename6 = ($filesData)?$filesData['sta_forecast_file']:null;
            }

            //Scheduling Process Document
            if($request->sche_p_doc != null){
                //check file already exist or not  
                if(!empty($filesData) && $filesData->sche_p_doc != null){
                    //if file already exist then remove from folder
                    unlink(public_path($path.'/'.$filesData['sche_p_doc']));
                }
                // $imagename7 = rand(0000,9999).$request->sche_p_doc->getclientoriginalname();
                $imagename7 = $clientId.'_'.$acc_name.'_'.$request->sche_p_doc->getclientoriginalname();
                //here move file to account folder
                $request->sche_p_doc->move(public_path($path.'/'),$imagename7);
                $file_data['sche_p_doc'] = $imagename7;
            }else{
                $imagename7 = ($filesData)?$filesData['sche_p_doc']:null;
            }

            //Scheduling Scheduling Model (only if done in Excel)
            if($request->sche_sched_file != null){
                //check file already exist or not  
                if(!empty($filesData) && $filesData->sche_sched_file != null){
                    //if file already exist then remove from folder
                    unlink(public_path($path.'/'.$filesData['sche_sched_file']));
                }
                // $imagename8 = rand(0000,9999).$request->sche_sched_file->getclientoriginalname();
                $imagename8 = $clientId.'_'.$acc_name.'_'.$request->sche_sched_file->getclientoriginalname();
                //here move file to account folder
                $request->sche_sched_file->move(public_path($path.'/'),$imagename8);
                $file_data['sche_sched_file'] = $imagename8;
            }else{
                $imagename8 = ($filesData)?$filesData['sche_sched_file']:null;
            }

            //Scheduling Forecast Accuracy Result
            if($request->sche_forecast_file != null){
                //check file already exist or not  
                if(!empty($filesData) && $filesData->sche_forecast_file != null){
                    //if file already exist then remove from folder
                    unlink(public_path($path.'/'.$filesData['sche_forecast_file']));
                }
                // $imagename9 = rand(0000,9999).$request->sche_forecast_file->getclientoriginalname();
                $imagename9 = $clientId.'_'.$acc_name.'_'.$request->sche_forecast_file->getclientoriginalname();
                //here move file to account folder
                $request->sche_forecast_file->move(public_path($path.'/'),$imagename9);
                $file_data['sche_forecast_file'] = $imagename9;
            }else{
                $imagename9 = ($filesData)?$filesData['sche_forecast_file']:null;
            }

            //Scheduling IDP / Deviation File sample
            if($request->sche_idp_file != null){
                //check file already exist or not  
                if(!empty($filesData) && $filesData->sche_idp_file != null){
                    //if file already exist then remove from folder
                    unlink(public_path($path.'/'.$filesData['sche_idp_file']));
                }
                // $imagename10 = rand(0000,9999).$request->sche_idp_file->getclientoriginalname();
                $imagename10 = $clientId.'_'.$acc_name.'_'.$request->sche_idp_file->getclientoriginalname();
                //here move file to account folder
                $request->sche_idp_file->move(public_path($path.'/'),$imagename10);
                $file_data['sche_idp_file'] = $imagename10;
            }else{
                $imagename10 = ($filesData)?$filesData['sche_idp_file']:null;
            }

            //RTA / Intraday Management Process Document
            if($request->rta_p_file != null){
                //check file already exist or not  
                if(!empty($filesData) && $filesData->rta_p_file != null){
                    //if file already exist then remove from folder
                    unlink(public_path($path.'/'.$filesData['rta_p_file']));
                }
                // $imagename11 = rand(0000,9999).$request->rta_p_file->getclientoriginalname();
                $imagename11 = $clientId.'_'.$acc_name.'_'.$request->rta_p_file->getclientoriginalname();
                //here file move to account folder
                $request->rta_p_file->move(public_path($path.'/'),$imagename11);
                $file_data['rta_p_file'] = $imagename11;
            }else{
                $imagename11 = ($filesData)?$filesData['rta_p_file']:null;
            }

            //RTA / Intraday Management Intraday Report Sample
            if($request->rta_intro_file != null){
                //check file already exist or not  
                if(!empty($filesData) && $filesData->rta_intro_file != null){
                    //if file already exist then remove from folder
                    unlink(public_path($path.'/'.$filesData['rta_intro_file']));
                }
                // $imagename12 = rand(0000,9999).$request->rta_intro_file->getclientoriginalname();
                $imagename12 = $clientId.'_'.$acc_name.'_'.$request->rta_intro_file->getclientoriginalname();
                //here file move to account folder
                $request->rta_intro_file->move(public_path($path.'/'),$imagename12);
                $file_data['rta_intro_file'] = $imagename12;
            }else{
                $imagename12 = ($filesData)?$filesData['rta_intro_file']:null;
            }

            //RTA / Intraday Management Day-End Report Sample 
            if($request->rta_dayr_file != null){
                //check file already exist or not  
                if(!empty($filesData) && $filesData->rta_dayr_file != null){
                    //if file already exist then remove from folder
                    unlink(public_path($path.'/'.$filesData['rta_dayr_file']));
                }
                // $imagename13 = rand(0000,9999).$request->rta_dayr_file->getclientoriginalname();
                $imagename13 = $clientId.'_'.$acc_name.'_'.$request->rta_dayr_file->getclientoriginalname();
                //here file move to account folder
                $request->rta_dayr_file->move(public_path($path.'/'),$imagename13);
                $file_data['rta_dayr_file'] = $imagename13;
            }else{
                $imagename13 = ($filesData)?$filesData['rta_dayr_file']:null;
            }

            //RTA / Intraday Management RCA / Post-Mortem Report Sample
            if($request->rta_rca_file != null){
                //check file already exist or not  
                if(!empty($filesData) && $filesData->rta_rca_file != null){
                    //if file already exist then remove from folder
                    unlink(public_path($path.'/'.$filesData['rta_rca_file']));
                }
                // $imagename14 = rand(0000,9999).$request->rta_rca_file->getclientoriginalname();
                $imagename14 = $clientId.'_'.$acc_name.'_'.$request->rta_rca_file->getclientoriginalname();
                //here file move to account folder
                $request->rta_rca_file->move(public_path($path.'/'),$imagename14);
                $file_data['rta_rca_file'] = $imagename14;
            }else{
                $imagename14 = ($filesData)?$filesData['rta_rca_file']:null;
            } 

            $file_data = array(
                "account_id" => $request->account_id,
                "f_process_doc" => $imagename1,
                "model_file" => $imagename2,
                "f_accurecy_file" => $imagename3,
                "sta_process_doc" => $imagename4,
                "sta_model_file" => $imagename5,
                "sta_forecast_file" => $imagename6,
                "sche_p_doc" => $imagename7,
                "sche_sched_file" => $imagename8,
                "sche_forecast_file" => $imagename9,
                "sche_idp_file" => $imagename10,
                "rta_p_file" => $imagename11,
                "rta_intro_file" => $imagename12,
                "rta_dayr_file" => $imagename13,
                "rta_rca_file" => $imagename14,
            );

            $file_data = Filesdata::updateOrCreate(['account_id'=>$acc_id],$file_data);
        }

        if($file_data != null){
            return response()->json(["status" => 1, "data" => $file_data]);
        }else{
            return response()->json(["status" => 0]);
        }
    }

    //
    public function summary($id=null)
    {   
        $user_detail = User::where('id',$id)->first();
       // $account_detail = Account::where('temp_id',$id)->with('lobs.channels.ChannelDatas')->with('processinfo')->with('fileimage')->first();
       $account_detail = Account::where('temp_id',$id)->with('lobs')->with(['channel.ChannelDatas','channel.processInfo','channel.countrydata','channel.citydata'])->with('fileimage')->get(); 
      
        $billingType =  Config::get("common.BILLING_TYPE");
        $billingCap =  Config::get("common.BILLING_CAP");
        $minBillingGuarantee = Config::get("common.MIN_BILLING_GUARANTEE");
        $minBillingReference = Config::get("common.MIN_BILLING_REFERENCE");
        $maxBillingThres = Config::get("common.MAX_BILLABLE_THRESHOLD");
        $maxBillRef = Config::get("common.MAX_BILLABLE_REFERENCE");
        $serviceApi = Config::get("common.SERVICE_API");
        $time = Config::get("common.TIME");
        $acdBillSystem = Config::get("common.ACD_Billing_SystemName");
        $wfmSystem = Config::get("common.WFM_SYSTEM");
        $processDetails = Config::get("common.PROCESS_DETAILS");

        //ended here by jaydeep
       return view('summary_page',compact('account_detail','user_detail', 'billingType', 'billingCap', 'minBillingGuarantee',
                    'minBillingReference', 'maxBillingThres', 'maxBillingThres', 'maxBillRef', 'serviceApi', 'time', 'acdBillSystem', 'wfmSystem', 'processDetails'      
                    ))->render();
    }
}
