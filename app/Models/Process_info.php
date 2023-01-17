<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Process_info extends Model
{
    use HasFactory;
    protected $fillable = ['account_names','lob_names','channelnames','country','f_1','f_2','f_3','f_4','f_5','f_6','f_7','f_8','f_9','f_10','f_11','f_12','f_13','f_14','f_15','f_16','f_17','f_18','f_19','f_20','f_21','f_22','f_23','f_24','f_25','f_26','f_27','f_28','f_29','f_30','f_31','f_32','f_33','f_34','f_35','f_36','f_37','f_38','f_39','f_40','f_41','f_42','f_43','f_44','f_45','f_46','f_47','f_48','f_49','f_50','f_51','f_52','f_53'];

    public function channels(){
        return $this->belongsTo(Channel::class,'id');
     }

}
