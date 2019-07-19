<?php

namespace App\Http\Controllers;

use App\Dorm;
use Illuminate\Http\Request;

class DormController extends Controller
{
    public function delete($id)
    {
        $applicant = Dorm::FindOrFail($id);
        $applicant->delete();
        return redirect()->back();
    }
    public function list(Request $request)
    {
        $dorms = Dorm::all();
        return view('dorm.list')->with(compact('dorms'));
    }

    public function create(Request $request)
    {
        $major = new Dorm();
        $major -> fill($request->all());
        $major -> save();
        return redirect()->back();
    }

    public function edit(Request $request,$id)
    {
        $major = Dorm::FindOrFail($id);
        $major->fill($request->all());
        $major->save();
        return redirect()->back();
    }
}
