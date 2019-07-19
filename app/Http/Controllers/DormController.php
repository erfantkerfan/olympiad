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
}
