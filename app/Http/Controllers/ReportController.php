<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Major;
use App\University;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function cafe(Request $request)
    {
        $food_array = [
            'ناهار چهارشنبه'=>'4_l',
            'شام چهارشنبه'=>'4_d',
            'صبحانه پنج شنبه'=>'5_b',
            'ناهار پنج شنبه'=>'5_l',
            'شام پنج شنبه'=>'5_d',
            'صبحانه جمعه'=>'j_b',
            'ناهار جمعه'=>'j_l',
            'شام جمعه'=>'j_d',
            'صبحانه شنبه'=>'s_b',
        ];
        $food_sum = [
            'ناهار چهارشنبه'=>'4_l',
            'شام چهارشنبه'=>'4_d',
            'صبحانه پنج شنبه'=>'5_b',
            'ناهار پنج شنبه'=>'5_l',
            'شام پنج شنبه'=>'5_d',
            'صبحانه جمعه'=>'j_b',
            'ناهار جمعه'=>'j_l',
            'شام جمعه'=>'j_d',
            'صبحانه شنبه'=>'s_b',
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
        $applicants = Applicant::where('4_l','!=',0)
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
            ->orwhere('s_b','!=',0)
            ->with('dorm')
            ->orderBy($request->sort,$request->order)
            ->get();
        foreach ($food_sum as $key=>$value){
            $food_sum[$key] = $applicants->sum($value);
        }
        foreach ($dorm_sum as $key=>$value){
            $dorm_sum[$key] = $applicants->sum($value);
        }
        return view('report.cafe')->with(compact('food_array','applicants','food_sum','dorm_array','dorm_sum'));
    }
    public function state()
    {
        $report1 = [];
        $applicants1 = Applicant::where('type','=',1)->orwhere('type','=',null)->get();
        $report1['nashode'] = $applicants1 -> where('state','=',null)->count();
        $report1['kamel'] = $applicants1 -> where('state','=',1)->count();
        $report1['movaghat'] = $applicants1 -> where('state','=',2)->count();
        $report1['namomken'] = $applicants1 -> where('state','=',3)->count();
        $report1 = (object)$report1;
        $report2 = [];
        $applicants2 = Applicant::where('type','>','1')->get();
        $report2['nashode'] = $applicants2 -> where('state','=',null)->count();
        $report2['kamel'] = $applicants2 -> where('state','=',2)->count();
        $report2['movaghat'] = $applicants2 -> where('state','=',2)->count();
        $report2['namomken'] = $applicants2 -> where('state','=',3)->count();
        $report2 = (object)$report2;
        return view('report.state')->with(compact('report1','report2'));
    }
    public function major()
    {
        $report = [];
        $applicants = Applicant::where('type','=',1)->orwhere('type','=',null)->get();
        $majors = Major::all();
        $map = ['women'=>'1','men'=>'2','other'=>'3'];
        foreach ($majors as $major) {
            $layer = $applicants->where('university', '=', $major->id);
            $report[$major->id] = array();
            foreach ($map as $key => $value) {
                $report[$major->id][$key]['nashode'] = $layer->where('gender', '=', $value)->where('state', '=', null)->count();
                $report[$major->id][$key]['kamel'] = $layer->where('gender', '=', $value)->where('state', '=', 1)->count();
                $report[$major->id][$key]['movaghat'] = $layer->where('gender', '=', $value)->where('state', '=', 2)->count();
                $report[$major->id][$key]['namomken'] = $layer->where('gender', '=', $value)->where('state', '=', 3)->count();
            };
        }
        return view('report.major')->with(compact('report','map','majors'));
    }
    public function university()
    {
        $report = [];
        $applicants = Applicant::where('type','=',1)->orwhere('type','=',null)->get();
        $universities = University::all();
        $map = ['women'=>'1','men'=>'2','other'=>'3'];
        $sum = [];
        foreach ($map as $key => $value) {
            $sum[$key]['nashode'] = $applicants->where('gender', '=', $value)->where('state', '=', null)->where('type', '=', 1)->count();
            $sum[$key]['kamel'] = $applicants->where('gender', '=', $value)->where('state', '=', 1)->where('type', '=', 1)->count();
            $sum[$key]['movaghat'] = $applicants->where('gender', '=', $value)->where('state', '=', 2)->where('type', '=', 1)->count();
            $sum[$key]['namomken'] = $applicants->where('gender', '=', $value)->where('state', '=', 3)->where('type', '=', 1)->count();
        };
        foreach ($universities as $university) {
            $layer = $applicants->where('university', '=', $university->id);
            $report[$university->id] = array();
            foreach ($map as $key => $value) {
                $report[$university->id][$key]['nashode'] = $layer->where('gender', '=', $value)->where('state', '=', null)->count();
                $report[$university->id][$key]['kamel'] = $layer->where('gender', '=', $value)->where('state', '=', 1)->count();
                $report[$university->id][$key]['movaghat'] = $layer->where('gender', '=', $value)->where('state', '=', 2)->count();
                $report[$university->id][$key]['namomken'] = $layer->where('gender', '=', $value)->where('state', '=', 3)->count();
            };
        }
//        return $sum;
        return view('report.university')->with(compact('report','map','universities','sum'));
    }

}
