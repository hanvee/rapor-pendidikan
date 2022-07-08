<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;

class Subdistrict extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'city_id'
    ];

    protected $with = [
        'city'
    ];

    public function city() 
    {
        return $this->belongsTo(City::class);
    }

    public function schools() 
    {
        return $this->hasMany(School::class);
    }

}
