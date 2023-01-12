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
     public function City(){
        return $this->hasOne(Country::class,'id','city_name');
     }

     public function country(){
      return $this->hasOne(Country::class, 'country_id','country');
     }
}
