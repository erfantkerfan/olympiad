<?php

namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function delete($id)
    {
        $university = University::FindOrFail($id);
        $university->delete();
        return redirect()->back();
    }

    public function list(Request $request)
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
        if (!isset($request->sort)){
            $request->sort='id';
        }
        if (!isset($request->order)){
            $request->order='asc';
        }
        $universities = University::orderBy($request->sort,$request->order)->get();
        return view('university.list')->with(compact('dorm_array','food_array','universities'));
    }

    public function create(Request $request)
    {
        $university = new University();
        $university -> fill($request->all());
        $university -> save();
        return redirect()->back();
    }

    public function edit(Request $request,$id)
    {
        $university = University::FindOrFail($id);
        $university -> fill($request->all());
        $university -> save();
        return redirect()->back();
    }
}
