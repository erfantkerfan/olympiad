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
        $universities = University::orderBy('name')->get();
        $majors = Major::orderBy('name')->get();
        return view('applicant.form')->with(compact('universities','majors'));
    }

    public function create(Request $request)
    {
        $applicant = new Applicant($request->all());
        $applicant -> save();
        return redirect()->route('applicant_list');
    }

    public function list(Request $request)
    {
        if (!isset($request->sort)){
            $request->sort='id';
        }
        if (!isset($request->order)){
            $request->order='asc';
        }
        $applicants = Applicant::with('university','major')->orderBy($request->sort,$request->order)->get();
        return view('applicant.list')->with(compact('applicants'));
    }

    public function show($id)
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
        $dorm_array = [
            'خوابگاه سه شنبه'=>'d_3',
            'خوابگاه چهارشنبه'=>'d_4',
            'خوابگاه پنج شنبه'=>'d_5',
            'خوابگاه جمعه'=>'d_j',
        ];
        $universities = University::orderBy('name')->get();
        $majors = Major::orderBy('name')->get();
        $dorms = Dorm::orderBy('name')->get();
        $applicant = Applicant::FindOrFail($id);
        return view('applicant.show')->with(compact('applicant','universities','majors','dorms','food_array','dorm_array'));
    }

    public function edit($id,Request $request)
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
            $applicant -> dorm = $university->dorm;
            $applicant -> d_room = $university->d_room;
        }
        $applicant->save();
        return redirect()->route('applicant_list');
    }
}
