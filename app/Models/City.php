<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'city_name',
        'state_id'
    ];

    public function city(){
        return $this->hasMany(Country::class, 'country_id', 'country_id');
    }

}
