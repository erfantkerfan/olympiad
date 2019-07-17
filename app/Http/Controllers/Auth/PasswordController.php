<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Hekmatinasser\Verta\Verta;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function showPasswordForm()
    {
        return view('auth.password');
    }
    public function password(Request $request)
    {
        Validator::extend('old_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, current($parameters));
        });
        $this->Validate($request,[
            'old_password' => 'required|old_password:' . Auth::user()->password,
            'password' => 'string|min:6|confirmed'
        ]);
        $user = User::FindOrFail(Auth::user()->id);
        $user->password = bcrypt($request['password']);
        $user->save();
        return redirect(route('home'));
    }
}
