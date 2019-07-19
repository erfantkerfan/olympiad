<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class ExtraController extends Controller
{
    public function test()
    {
        $x = Applicant::find(1);
        $x -> dorm = Null;
        $x->save();
    }

    public function cafe()
    {
        $food_array = [
            'شام سه شنبه'=>'3_d',
            'صبحانه چهارشنبه'=>'4_b',
            'ناهار چهارشنبه'=>'4_l',
            'شام چهارشنبه'=>'4_d',
            'صبحانه پنج شنبه'=>'5_b',
            'ناهار پنج شنبه'=>'5_l',
            'شام پنج شنبه'=>'5_d',
            'صبحانه جمعه'=>'j_b',
            'ناهار جمعه'=>'j_l',
            'شام جمعه'=>'j_d',
        ];
        $food_sum = [
            'شام سه شنبه'=>'3_d',
            'صبحانه چهارشنبه'=>'4_b',
            'ناهار چهارشنبه'=>'4_l',
            'شام چهارشنبه'=>'4_d',
            'صبحانه پنج شنبه'=>'5_b',
            'ناهار پنج شنبه'=>'5_l',
            'شام پنج شنبه'=>'5_d',
            'صبحانه جمعه'=>'j_b',
            'ناهار جمعه'=>'j_l',
            'شام جمعه'=>'j_d',
        ];
        $applicants = Applicant::where('3_d','!=',0)
            ->orwhere('4_b','!=',0)
            ->orwhere('4_l','!=',0)
            ->orwhere('4_d','!=',0)
            ->orwhere('5_b','!=',0)
            ->orwhere('5_l','!=',0)
            ->orwhere('5_d','!=',0)
            ->orwhere('j_b','!=',0)
            ->orwhere('j_l','!=',0)
            ->orwhere('j_d','!=',0)
            ->get();
        foreach ($food_sum as $key=>$value){
            $food_sum[$key] = $applicants->sum($value);
        }
        return view('cafe')->with(compact('food_array','applicants','food_sum'));
    }
}
