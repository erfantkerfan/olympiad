<?php

namespace App\Http\Controllers;

use App\Applicant;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class ExtraController extends Controller
{
    public function test()
    {
//        $x = Applicant::find(1);
//        $x -> dorm = Null;
//        $x->save();
        return 'OK' ;
    }

    public function pdf($id, Request $request)
    {

    }
}
