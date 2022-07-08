<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subdistrict;
use Spatie\Permission\Traits\HasRoles;

class School extends Model
{
    use HasFactory, HasRoles;

    protected $fillable = [
        'name', 
        'address',
        'subdistrict_id'
    ];

    protected $with = [
        'subdistrict'
    ];


    public function subdistrict()
    {
        return $this->belongsTo(Subdistrict::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
