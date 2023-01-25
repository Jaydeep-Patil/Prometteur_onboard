<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChannelDatas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['channel_id','monthly_ftp','billing_cap','billing_guarantee', 'min_bill_ref', 'max_bill_thres', 'max_bill_ref', 'bill_remark',
        'kpi1_app', 'kpi1_target', 'kpi2_app', 'kpi2_target', 'swo', 'kpi_remark', 'weekday_start_time', 'weekday_end_time', 'sat_start_time', 'sat_end_time',
        'sun_start_time', 'sun_end_time', 'operating_remark', 'full_time_employee', 'part_time_employee', 'contract_employee', 'employee_remark', 'acd_name',
        'wfm_tool', 'back_tool', 'system_remark', 'class_duration', 'work_office', 'work_home', 'industry_segment', 'progress_remark', 'nesting_duration'
    ];

    public function channels(){
        return $this->belongsTo(Channel::class,'id');
     }
}    
