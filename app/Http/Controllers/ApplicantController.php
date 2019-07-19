<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Dorm;
use App\Major;
use App\University;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function delete($id)
    {
        $applicant = Applicant::FindOrFail($id);
        $applicant->delete();
        return redirect()->back();
    }

    public function form()
    {
        $universities = University::all();
        $majors = Major::all();
        return view('applicant.form')->with(compact('universities','majors'));
    }

    public function create(Request $request)
    {
        $applicant = new Applicant($request->all());
        $applicant -> save();
        return $applicant;
    }

    public function list()
    {
        $applicants = Applicant::with('university','major')->get();
        return view('applicant.list')->with(compact('applicants'));
    }

    public function show($id)
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
        $dorm_array = [
            'خوابگاه سه شنبه'=>'d_3',
            'خوابگاه چهارشنبه'=>'d_4',
            'خوابگاه پنج شنبه'=>'d_5',
            'خوابگاه جمعه'=>'d_j',
        ];
        $universities = University::all();
        $majors = Major::all();
        $dorms = Dorm::all();
        $applicant = Applicant::FindOrFail($id);
        return view('applicant.show')->with(compact('applicant','universities','majors','dorms','food_array','dorm_array'));
    }

    public function edit($id,Request $request)
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
        $dorm_array = [
            'خوابگاه سه شنبه'=>'d_3',
            'خوابگاه چهارشنبه'=>'d_4',
            'خوابگاه پنج شنبه'=>'d_5',
            'خوابگاه جمعه'=>'d_j',
        ];
        $applicant = Applicant::FindOrFail($id);
        if ($request->team!=1){
            $applicant -> fill($request->all());
        }else{
            $applicant -> fill($request->all());
            $university = $applicant->university()->first();
            foreach ($food_array as $key=>$value){
                $applicant -> $value = $university->$value;
            }
            foreach ($dorm_array as $key=>$value){
                $applicant -> $value = $university->$value;
            }
        }
        $applicant->save();
        return $applicant;
    }
}
