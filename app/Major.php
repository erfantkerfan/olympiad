<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    protected $fillable = [
        'name', 'supervisor', '4_m', '4_e', '5_m', '5_e', 'j_m', 'j_e',
    ];
    public function applicants()
    {
        return $this->hasMany(Applicant::class,'major','id');
    }
}
