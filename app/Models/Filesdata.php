<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filesdata extends Model
{
    use HasFactory;
    protected $table = 'files_data';
    protected $fillable = [
        'account_id',
        'f_process_doc',
        'model_file',
        'f_accurecy_file',
        'sta_process_doc',
        'sta_model_file',
        'sta_forecast_file',
        'sche_p_doc',
        'sche_sched_file',
        'sche_forecast_file',
        'sche_idp_file',
        'rta_p_file',
        'rta_intro_file',
        'rta_dayr_file',
        'rta_rca_file',
    ];
}
