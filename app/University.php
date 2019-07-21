<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $fillable = [
        'name', '4_l', '4_d', '5_b', '5_l', '5_d', 'j_b', 'j_l', 'j_d', 's_b', 'dorm', 'd_3', 'd_4', 'd_5',
        'd_j', 'd_room',
    ];
    public function applicants()
    {
        return $this->hasMany(Applicant::class,'university','id');
    }
}
