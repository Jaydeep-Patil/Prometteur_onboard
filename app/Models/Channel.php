<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;
     protected $fillable = ['client_id','account_id','lob_id','channel_name','country','city_name','site_name','fte'];
     public function lob_data(){
        return $this->hasMany(Account::class,'id','account_id');
     }

     public function citydata(){
        return $this->hasMany(City::class,'city_id','city_name');
     }

     public function countrydata(){
      return $this->hasMany(Country::class, 'country_id','country');
     }

     public function ChannelDatas(){
      return $this->hasMany(ChannelDatas::class, 'channel_id','id');
     }

     public function processInfo()
     {
         return $this->hasMany(Process_info::class, 'channelnames');
     }
}
