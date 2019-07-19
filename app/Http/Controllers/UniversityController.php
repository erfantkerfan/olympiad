<?php

namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    public function delete($id)
    {
        $applicant = University::FindOrFail($id);
        $applicant->delete();
        return redirect()->back();
    }
}
