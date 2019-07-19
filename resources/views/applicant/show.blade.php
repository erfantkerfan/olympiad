@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">پذیرش متقاضی</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('applicant_edit',['id'=>$applicant->id]) }}" dir="rtl">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">نام</label>

                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $applicant->name }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="f_name" class="col-md-4 col-form-label text-md-right">نام خانوادگی</label>

                                <div class="col-md-7">
                                    <input id="f_name" type="text" class="form-control{{ $errors->has('f_name') ? ' is-invalid' : '' }}" name="f_name" value="{{ $applicant->f_name }}" required autofocus>

                                    @if ($errors->has('f_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('f_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="fa_name" class="col-md-4 col-form-label text-md-right">نام پدر</label>

                                <div class="col-md-7">
                                    <input id="fa_name" type="text" class="form-control{{ $errors->has('fa_name') ? ' is-invalid' : '' }}" name="fa_name" value="{{ $applicant->fa_name }}" required autofocus>

                                    @if ($errors->has('fa_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fa_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="SSN" class="col-md-4 col-form-label text-md-right">شماره ملی</label>

                                <div class="col-md-7">
                                    <input id="SSN" type="text" class="form-control{{ $errors->has('SSN') ? ' is-invalid' : '' }}" name="SSN" value="{{ $applicant->SSN }}" required autofocus>

                                    @if ($errors->has('SSN'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('SSN') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">جنسیت</label>

                                <div class="col-md-7">
                                    <select id="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" required autofocus>
                                        <option value="1" @if($applicant->gender==1) selected @endif>زن</option>
                                        <option value="2" @if($applicant->gender==2) selected @endif>مرد</option>
                                        <option value="3" @if($applicant->gender==3) selected @endif>سایر</option>
                                    </select>

                                    @if ($errors->has('gender'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="district" class="col-md-4 col-form-label text-md-right">متمرکز/غیرمتمرکز</label>

                                <div class="col-md-7">
                                    <select id="district" class="form-control{{ $errors->has('district') ? ' is-invalid' : '' }}" name="district" required autofocus>
                                        <option value="1" @if($applicant->district==1) selected @endif>ارشد-سراسري</option>
                                        <option value="2" @if($applicant->district==2) selected @endif>غيرمتمركز</option>
                                    </select>

                                    @if ($errors->has('district'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('district') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="university" class="col-md-4 col-form-label text-md-right">دانشگاه</label>

                                <div class="col-md-7">
                                    <select id="university" class="form-control{{ $errors->has('university') ? ' is-invalid' : '' }}" name="university" required autofocus>
                                        @foreach($universities as $university)
                                            <option value="{{$university->id}}" @if($applicant->university==$university->id) selected @endif>{{$university->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('university'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('university') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="major" class="col-md-4 col-form-label text-md-right">رشته المپیاد</label>

                                <div class="col-md-7">
                                    <select id="major" class="form-control{{ $errors->has('major') ? ' is-invalid' : '' }}" name="major" required autofocus>
                                        @foreach($majors as $major)
                                            <option value="{{$major->id}}" @if($applicant->major==$major->id) selected @endif>{{$major->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('major'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('major') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city" class="col-md-4 col-form-label text-md-right">شهر</label>

                                <div class="col-md-7">
                                    <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ $applicant->city }}" autofocus>

                                    @if ($errors->has('city'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mobile" class="col-md-4 col-form-label text-md-right">شماره تلفن همراه</label>

                                <div class="col-md-7">
                                    <input id="mobile" type="text" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" name="mobile" value="{{ $applicant->mobile }}" autofocus>

                                    @if ($errors->has('mobile'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="card" class="col-md-4 col-form-label text-md-right">کارت سنجش دریافت کرده</label>

                                <div class="col-md-7">
                                    <select id="gender" class="form-control{{ $errors->has('card') ? ' is-invalid' : '' }}" name="card" autofocus>
                                        <option value="">انتخاب کنید</option>
                                        <option value="0" @if($applicant->gender===0) selected @endif>خیر</option>
                                        <option value="1" @if($applicant->gender==1) selected @endif>بله</option>
                                    </select>

                                    @if ($errors->has('card'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('card') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="state" class="col-md-4 col-form-label text-md-right">وضعیت پذیرش</label>

                                <div class="col-md-7">
                                    <select id="state" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" autofocus>
                                        <option value="">انتخاب کنید</option>
                                        <option value="1" @if($applicant->state==1) selected @endif>پذیرش کامل</option>
                                        <option value="2" @if($applicant->state==2) selected @endif>پذیرش موقت</option>
                                        <option value="3" @if($applicant->state==3) selected @endif>پذیرش ممکن نیست</option>
                                    </select>

                                    @if ($errors->has('state'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="state_note" class="col-md-4 col-form-label text-md-right">بادداشت وضعیت</label>

                                <div class="col-md-7">
                                    <input id="state_note" type="text" class="form-control{{ $errors->has('state_note') ? ' is-invalid' : '' }}" name="state_note" value="{{ $applicant->state_note }}" autofocus>

                                    @if ($errors->has('state_note'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state_note') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">نوع متقاضی</label>

                                <div class="col-md-7">
                                    <select id="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="type" autofocus>
                                        <option value="">انتخاب کنید</option>

                                        <option value="1" @if($applicant->type==1) selected @endif>داوطلب</option>
                                        <option value="2" @if($applicant->type==2) selected @endif>سرپرست داوطلب</option>
                                        <option value="3" @if($applicant->type==3) selected @endif>همراه داوطلب</option>
                                        <option value="4" @if($applicant->type==4) selected @endif>عوامل خدماتی</option>
                                        <option value="5" @if($applicant->type==5) selected @endif>عوامل برگزاری</option>
                                    </select>

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="team" class="col-md-4 col-form-label text-md-right">مراجعه دسته جمعی</label>

                                <div class="col-md-7">
                                    <select id="team" class="form-control{{ $errors->has('team') ? ' is-invalid' : '' }}" name="team" autofocus>
                                        <option value="">انتخاب کنید</option>
                                        <option value="0" @if($applicant->team===0) selected @endif>خیر</option>
                                        <option value="1" @if($applicant->team==1) selected @endif>بله</option>
                                    </select>

                                    @if ($errors->has('team'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('team') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="text-center">
                                ------------------------------------------
                            </div>

                            @foreach($food_array as $key=>$value)
                                <div class="form-group row">
                                    <label for="{{$value}}" class="col-md-4 col-form-label text-md-right">{{$key}}</label>

                                    <div class="col-md-7">
                                        <select id="{{$value}}" class="form-control{{ $errors->has($value) ? ' is-invalid' : '' }}" name="{{$value}}" autofocus>
                                            <option value="">انتخاب کنید</option>
                                            <option value="0" @if($applicant->$value===0) selected @endif>خیر</option>
                                            <option value="1" @if($applicant->$value==1) selected @endif>بله</option>
                                        </select>

                                        @if ($errors->has($value))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first($value) }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                            <div class="text-center">
                                ------------------------------------------
                            </div>

                            <div class="form-group row">
                                <label for="dorm" class="col-md-4 col-form-label text-md-right">خوابگاه </label>

                                <div class="col-md-7">
                                    <select id="dorm" class="form-control{{ $errors->has('dorm') ? ' is-invalid' : '' }}" name="dorm" autofocus>
                                        <option value="">بدون نیاز به خوابگاه</option>
                                        @foreach($dorms as $dorm)
                                            <option value="{{$dorm->id}}" @if($applicant->dorm==$dorm->id) selected @endif>{{$dorm->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('dorm'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dorm') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            @foreach($dorm_array as $key=>$value)
                                <div class="form-group row">
                                    <label for="{{$value}}" class="col-md-4 col-form-label text-md-right">{{$key}}</label>

                                    <div class="col-md-7">
                                        <select id="{{$value}}" class="form-control{{ $errors->has($value) ? ' is-invalid' : '' }}" name="{{$value}}" autofocus>
                                            <option value="">انتخاب کنید</option>
                                            <option value="0" @if($applicant->$value===0) selected @endif>خیر</option>
                                            <option value="1" @if($applicant->$value==1) selected @endif>بله</option>
                                        </select>

                                        @if ($errors->has($value))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first($value) }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group row">
                                <label for="d_room" class="col-md-4 col-form-label text-md-right">شماره اتاق</label>

                                <div class="col-md-7">
                                    <input id="d_room" type="text" class="form-control{{ $errors->has('d_room') ? ' is-invalid' : '' }}" name="d_room" value="{{ $applicant->d_room }}" autofocus>

                                    @if ($errors->has('d_room'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('d_room') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="text-center">
                                ------------------------------------------
                            </div>

                            <div class="form-group row">
                                <label for="special_case" class="col-md-4 col-form-label text-md-right">شرایط خاص</label>

                                <div class="col-md-7">
                                    <input id="special_case" type="text" class="form-control{{ $errors->has('special_case') ? ' is-invalid' : '' }}" name="special_case" value="{{ $applicant->special_case }}" autofocus>

                                    @if ($errors->has('special_case'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('special_case') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="special_disease" class="col-md-4 col-form-label text-md-right">بیماری خاص</label>

                                <div class="col-md-7">
                                    <input id="special_disease" type="text" class="form-control{{ $errors->has('special_disease') ? ' is-invalid' : '' }}" name="special_disease" value="{{ $applicant->special_disease }}" autofocus>

                                    @if ($errors->has('special_disease'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('special_disease') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">
                                        پذیرش
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection