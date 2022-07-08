<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Report extends Model
{
    use HasFactory, HasRoles;

    protected $guarded = [
        'id',  
        'updated_at'
    ];

    protected $with = [
        'school'
    ];

    public function school() 
    {
        return $this->belongsTo(School::class);
    }

  
}
