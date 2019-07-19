<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class ExtraController extends Controller
{
    public function test()
    {
//        $x = Applicant::find(1);
//        $x -> dorm = Null;
//        $x->save();
        return 'OK' ;
    }

    public function cafe(Request $request)
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
        $dorm_array = [
            'خوابگاه سه شنبه'=>'d_3',
            'خوابگاه چهارشنبه'=>'d_4',
            'خوابگاه پنج شنبه'=>'d_5',
            'خوابگاه جمعه'=>'d_j',
        ];
        $dorm_sum = [
            'خوابگاه سه شنبه'=>'d_3',
            'خوابگاه چهارشنبه'=>'d_4',
            'خوابگاه پنج شنبه'=>'d_5',
            'خوابگاه جمعه'=>'d_j',
        ];
        if (!isset($request->sort)){
            $request->sort='id';
        }
        if (!isset($request->order)){
            $request->order='asc';
        }
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
            ->orwhere('d_3','!=',0)
            ->orwhere('d_4','!=',0)
            ->orwhere('d_5','!=',0)
            ->orwhere('d_j','!=',0)
            ->with('dorm')
            ->orderBy($request->sort,$request->order)
            ->get();
        foreach ($food_sum as $key=>$value){
            $food_sum[$key] = $applicants->sum($value);
        }
        foreach ($dorm_sum as $key=>$value){
            $dorm_sum[$key] = $applicants->sum($value);
        }
        return view('cafe')->with(compact('food_array','applicants','food_sum','dorm_array','dorm_sum'));
    }
}
