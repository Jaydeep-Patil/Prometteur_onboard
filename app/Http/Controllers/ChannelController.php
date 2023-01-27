<?php

namespace App\Http\Controllers;

use App\Models\Channel;
use Illuminate\Http\Request;
use App\Models\ChannelDatas;
use App\Models\Account;
use App\Models\Lob;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class ChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Channel $channel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        //
    }
    public function channel_data(Request $request){
        $input=$request->all();
       // dd($input['channel'][$request->channel_id]);
        $channel=ChannelDatas::updateOrCreate(['channel_id'=>$request->channel_id],$input['channel'][$request->channel_id]);
        return response()->json(['success' => true,'data'=>$channel,'message' => 'Successfully']);
    }

    public function getLobList(Request $request){
        $accId = $request->acc_id;
        $lobData = Account::where(['id'=>$accId])->with('lobs')->get();
        //$lobData[0]['lobs']
        return response()->json(['success' => true,'data'=>$lobData,'message' => 'Successfully']);
    }

    public function getChannelList(Request $request){
        $channelData = Channel::whereIn('lob_id',$request->lob_id)->get();
        return response()->json(['success' => true,'data'=>$channelData,'message' => 'Successfully']);
    }

    public function getCountryList(Request $request){
        $channelData = Channel::whereIn('id',$request->channel_id)->get('country');
        $arr=array();
       foreach($channelData as $k =>$value){
            array_push($arr,$value['country']);
       }

        $countryData = Country::whereIn('country_id',$arr)->distinct()->get();
        return response()->json(['success' => true,'data'=>$countryData,'message' => 'Successfully']);
    }

    public function getChannels(Request $request){
        $channelData = Channel::where('lob_id',$request->lob_id)->get();
        return response()->json(['success' => true,'data'=>$channelData,'message' => 'Successfully']);
    }
    public function addCopyData(Request $request){
        //$acc_id = 1;
        $from_lob= $request->from_lob;
        $to_lob = $request->to_lob_to_lobselect;
        $from_channel = $request->from_channel;
        $to_channel = $request->to_channel;

        $data = "form_lob:".$from_lob."--To LOB :".$to_lob."</br> From Channel:".$from_channel."--To Channel :".$to_channel;
        //dd($data);

        if(!empty($from_channel) && $from_channel != null){
            $existingChanneldata = ChannelDatas::where('channel_id', $from_channel)->get()->toArray();
            //dd($existingChanneldata);
        }

        if(!empty($existingChanneldata) && $existingChanneldata != null){
            unset($existingChanneldata['id']);
            $existingChanneldata[0]['channel_id'] = $to_channel;
            $copiedChannelData = ChannelDatas::updateOrcreate(['channel_id'=>$to_channel],$existingChanneldata[0]);
        }

        if(!empty($copiedChannelData) && $copiedChannelData != null){
            
            return response()->json(["status" => 1, "data" => $copiedChannelData, "message"=>'Data Copied Successfully!']);
        }else{
            return response()->json(["status" => 0]);
        }
    }

    public function getChannelData(Request $request){
        $channelData = ChannelDatas::where('channel_id',$request->id)->get();
        if(!empty($channelData) &&  $channelData != null){
            return response()->json(["status" => 1, "data"=>$channelData[0]]);
        }
        
    }

}
