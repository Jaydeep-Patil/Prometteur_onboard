<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelDatas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function channels(){
        return $this->belongsTo(Channel::class,'id');
     }
}    
