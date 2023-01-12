<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = ['client_id','account_name','temp_id'];

    public function lobs()
    {
        return $this->hasMany(lob::class,'account_id');
    }
    public function processinfo()
    {
        return $this->hasMany(Process_info::class, 'account_names');
    }
    public function fileimage()
    {
        return $this->hasMany(Filesdata::class, 'account_id');
    }

    public function channel(){
        return $this->hasMany(Channel::class, 'account_id');
    }

}
