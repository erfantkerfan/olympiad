<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\Dorm;
use App\Major;
use App\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ApplicantController extends Controller
{
    public function search(Request $request)
    {
        return redirect(Route('applicant_edit', ['id' => $request->applicant]));
    }

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
        return view('applicant.form')->with(compact('universities', 'majors'));
    }

    public function create(Request $request)
    {
        $applicant = new Applicant($request->all());
        $applicant->save();
        return redirect()->route('applicant_list');
    }

    public function list(Request $request)
    {
        if (!isset($request->sort)) {
            $request->sort = 'id';
        }
        if (!isset($request->order)) {
            $request->order = 'asc';
        }
        $applicants = Applicant::with('university', 'major')->orderBy($request->sort, $request->order)->get();
        return view('applicant.list')->with(compact('applicants'));
    }

    public function show($id)
    {
        $food_array = [
//            'ناهار چهارشنبه'=>'4_l',
//            'شام چهارشنبه'=>'4_d',
            'صبحانه پنج شنبه' => '5_b',
            'ناهار پنج شنبه' => '5_l',
            'شام پنج شنبه' => '5_d',
            'صبحانه جمعه' => 'j_b',
            'ناهار جمعه' => 'j_l',
            'شام جمعه' => 'j_d',
            'صبحانه شنبه' => 's_b',
        ];
        $dorm_array = [
//            'خوابگاه سه شنبه'=>'d_3',
//            'خوابگاه چهارشنبه'=>'d_4',
            'خوابگاه پنج شنبه' => 'd_5',
            'خوابگاه جمعه' => 'd_j',
        ];
        $universities = University::orderBy('name')->get();
        $majors = Major::orderBy('name')->get();
        $dorms = Dorm::orderBy('name')->get();
        $applicant = Applicant::FindOrFail($id);
        return view('applicant.show')->with(compact('applicant', 'universities', 'majors', 'dorms', 'food_array', 'dorm_array'));
    }

    public function edit($id, Request $request)
    {
        $food_array = [
//            'ناهار چهارشنبه'=>'4_l',
//            'شام چهارشنبه'=>'4_d',
            'صبحانه پنج شنبه' => '5_b',
            'ناهار پنج شنبه' => '5_l',
            'شام پنج شنبه' => '5_d',
            'صبحانه جمعه' => 'j_b',
            'ناهار جمعه' => 'j_l',
            'شام جمعه' => 'j_d',
            'صبحانه شنبه' => 's_b',
        ];
        $dorm_array = [
//            'خوابگاه سه شنبه'=>'d_3',
//            'خوابگاه چهارشنبه'=>'d_4',
            'خوابگاه پنج شنبه' => 'd_5',
            'خوابگاه جمعه' => 'd_j',
        ];
        $applicant = Applicant::FindOrFail($id);


        foreach ($dorm_array as $key => $value) {
            if (!($request->$value == 1 and $request->dorm == null)) {
                continue;
            }
            $alert = "نوع خوابگاه مشخص نشده";
            Session::flash('alert', (string)$alert);
            return redirect()->back();
        }
        if ($request->dorm != null) {
            $dorm_count = Applicant::where('dorm', '=', $request->dorm)->count();
            if ($dorm_count + 1 > Dorm::Find($request->dorm)->capacity) {
                $alert = "ظرفیت خوابگاه پر شده است";
                Session::flash('alert', (string)$alert);
                return redirect()->back();
            }
        }

        if ($request->team != 1) {
            $applicant->fill($request->all());
        } elseif ($request->team == 1) {
            $applicant->fill($request->all());
            $university = $applicant->university()->first();
            foreach ($food_array as $key => $value) {
                $applicant->$value = $university->$value;
            }
            foreach ($dorm_array as $key => $value) {
                $applicant->$value = $university->$value;
            }
        }
        if ($applicant->state == 1 or $applicant->state == 2) {
            $alert = Route('pdf', ['id' => $applicant->id]);
            Session::flash('alert', (string)$alert);
        } elseif ($applicant->state != 3) {
            $applicant->city = null;
            $applicant->mobile = null;
            $applicant->team = null;
            $applicant->card = null;
            $applicant->state = null;
            $applicant->state_note = null;
            $applicant->dorm = null;
            $applicant->d_room = null;
            $applicant->special_case = null;
            $applicant->special_disease = null;
            foreach ($food_array as $key => $value) {
                $applicant->$value = null;
            }
            foreach ($dorm_array as $key => $value) {
                $applicant->$value = null;
            }
        }
        $applicant->save();
        return redirect()->route('applicant_list');
    }
}
