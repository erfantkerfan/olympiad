<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'id', 'uid', 'name', 'f_name', 'fa_name', 'SSN', 'gender', 'district', 'city', 'mobile', 'university', 'team',
        'major', 'major', 'card', 'state', 'state_note', 'type', '3_d', '4_b', '4_l', '4_d', '5_b', '5_l', '5_d',
        'j_b', 'j_l', 'j_d', 'dorm', 'd_3', 'd_4', 'd_5', 'd_j', 'd_room', 'special_case', 'special_disease','note1','note2'
    ];
    public function university()
    {
        return $this->belongsTo(University::class,'university','id');
    }
    public function major()
    {
        return $this->belongsTo(Major::class,'major','id');
    }
    public function dorm()
    {
        return $this->belongsTo(Dorm::class,'dorm','id');
    }
}