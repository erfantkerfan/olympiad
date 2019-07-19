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
}
