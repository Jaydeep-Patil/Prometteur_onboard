<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Account;
use App\Models\Lob;
use App\Models\Channel;
use App\Models\Process_info;

class FrontController extends Controller
{
    public function index(Request $request){
        $country = Country::pluck('country_name','country_id');
        $city = City::pluck('city_name','city_id');
        $user_detail = User::where('id','f185596')->first();
       // $account_detail = Account::where('temp_id','f185596')->with('lobs')->with('processinfo')->with('fileimage')->get();
        $account_detail = Account::where('temp_id','f185596')->with('lobs')->with(['channel.ChannelDatas','channel.processInfo','channel.countrydata','channel.citydata'])->with('fileimage')->get();   
        return view('index',compact('country','city','user_detail','account_detail'));
    }
    public function check_user_login(Request $request){
        $email = User::where('email',$request->email)->first();
        
        if($email){
            // return response()->json(['status' => '1']);
            return response()->json(['status' => '1','user_id'=>$email->id]);
        }
        else{
            return response()->json(['status' => '0']);
        }
    }
    public function country_code(Request $request)
    {
        $country = $request->value_name;
        $city = City::where('country_id',$country)->pluck('city_name','city_id');
        if($city != " "){
            return response()->json($city);
        }
        else{
            return response()->json($city);
        }
    }
    public function get_channels(Request $request)
    {
        $id= $request->id;
        $channels = Channel::where('lob_id',$id)->get();
        if($channels != " "){
            return response()->json($channels);
        }
        else{
            return response()->json($channels);
        }
    }
}
