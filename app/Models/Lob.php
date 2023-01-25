<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lob extends Model
{
    use HasFactory;
    protected $fillable = ['client_id','account_id','lob_name'];

    public function channel()
    {
        return $this->hasMany(Channel::class, 'lob_id');
    }
}
