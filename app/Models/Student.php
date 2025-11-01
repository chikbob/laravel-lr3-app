<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'address', 'city_id'];

    // Исправлено: у студента ОДИН город, поэтому belongsTo
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}