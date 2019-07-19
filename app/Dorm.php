<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dorm extends Model
{
    protected $fillable = [
        'id', 'name', 'supervisor', 'capacity', 'gender',
    ];
    public function applicants()
    {
        return $this->hasMany(Applicant::class,'dorm','id');
    }
}
