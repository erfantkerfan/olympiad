<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
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

    public function pdf($id, Request $request)
    {
        $food_array = $y = array_reverse([
//            'ناهار چهارشنبه'=>'4_l',
//            'شام چهارشنبه'=>'4_d',
            'صبحانه پنجشنبه'=>'5_b',
            'ناهار پنجشنبه'=>'5_l',
            'شام پنجشنبه'=>'5_d',
            'صبحانه جمعه'=>'j_b',
            'ناهار جمعه'=>'j_l',
            'شام جمعه'=>'j_d',
            'صبحانه شنبه'=>'s_b',
        ]);
        $dorm_array = [
//            'سه شنبه'=>'d_3',
//            'چهارشنبه'=>'d_4',
            'پنج شنبه'=>'d_5',
            'جمعه'=>'d_j',
        ];
        $applicant = Applicant::FindOrFail($id);
        $has_food = 0;
        foreach ($food_array as $key=>$value){
            if($applicant->$value==1){
                $has_food = 1;
                break;
            }
        }
        $has_dorm = 0;
        foreach ($dorm_array as $key=>$value){
            if($applicant->$value==1){
                $has_dorm = 1;
                break;
            }
        }
        return view('pdf')->with(compact('applicant','food_array','dorm_array','has_food','has_dorm'));
//        $pdf = Pdf::loadView('pdf', compact('applicant','food_array','dorm_array','has_food','has_dorm'));
//        return $pdf->stream('document.pdf');
    }
}
