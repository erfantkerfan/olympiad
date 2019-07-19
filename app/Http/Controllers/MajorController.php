<?php

namespace App\Http\Controllers;

use App\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function delete($id)
    {
        $applicant = Major::FindOrFail($id);
        $applicant->delete();
        return redirect()->back();
    }
    public function list(Request $request)
    {
        $time_array = [
            'چهارشنبه صبح'=>'4_m',
            'چهارشنبه عصر'=>'4_e',
            'پنج شنبه صبح'=>'5_m',
            'پنج شنبه عصر'=>'5_e',
            'جمعه صبح'=>'j_m',
            'جمعه عصر'=>'j_e',
        ];
        if (!isset($request->sort)){
            $request->sort='id';
        }
        if (!isset($request->order)){
            $request->order='asc';
        }
        $majors = Major::orderBy($request->sort,$request->order)->get();
        return view('major.list')->with(compact('time_array','majors'));
    }

    public function create(Request $request)
    {
        $major = new Major();
        $major -> fill($request->all());
        $major -> save();
        return redirect()->back();
    }

    public function edit(Request $request,$id)
    {
        $major = Major::FindOrFail($id);
        $major -> fill($request->all());
        $major -> save();
        return redirect()->back();
    }
}
