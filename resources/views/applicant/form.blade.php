@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">ایجاد متقاضی جدید</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('applicant_create') }}" dir="rtl">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">نام</label>

                                <div class="col-md-7">
                                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

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
                                    <input id="f_name" type="text" class="form-control{{ $errors->has('f_name') ? ' is-invalid' : '' }}" name="f_name" value="{{ old('f_name') }}" required autofocus>

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
                                    <input id="fa_name" type="text" class="form-control{{ $errors->has('fa_name') ? ' is-invalid' : '' }}" name="fa_name" value="{{ old('fa_name') }}" required autofocus>

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
                                    <input id="SSN" type="text" class="form-control{{ $errors->has('SSN') ? ' is-invalid' : '' }}" name="SSN" value="{{ old('SSN') }}" required autofocus>

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
                                        <option value="">اتخاب کنید</option>
                                        <option value="1">زن</option>
                                        <option value="2">مرد</option>
                                        <option value="3">سایر</option>
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
                                        <option value="">اتخاب کنید</option>
                                        <option value="1">ارشد-سراسري</option>
                                        <option value="2">غيرمتمركز</option>
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
                                        <option value="">اتخاب کنید</option>
                                        @foreach($universities as $university)
                                            <option value="{{$university->id}}">{{$university->name}}</option>
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
                                        <option value="">اتخاب کنید</option>
                                        @foreach($majors as $major)
                                            <option value="{{$major->id}}">{{$major->name}}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('major'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('major') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">
                                        ایجاد
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