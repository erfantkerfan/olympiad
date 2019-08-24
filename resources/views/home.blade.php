@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center" dir="rtl">
            <div class="col-md-7">
                <div class="card">
                    <div class="card-header text-center">پنل ادمین</div>

                    <div class="card-body text-center">
                        <div>
                            <form method="post" action="{{Route('applicant_search')}}">
                                @csrf

                                <div class="form-group row justify-content-center">
                                    <label for="applicant" class="col-form-label text-md-right"></label>

                                    <input id="applicant" list="applicantlist"
                                           class="col-md-7 mx-3 form-control{{ $errors->has('applicant') ? ' is-invalid' : '' }}"
                                           name="applicant" autofocus required autocomplete="off">
                                    <datalist id="applicantlist">
                                        @foreach($applicants as $applicant)
                                            <option value="{{$applicant->id}}">{{$applicant->name." ".$applicant->f_name." ".$applicant->SSN}}</option>
                                        @endforeach
                                    </datalist>

                                    @if ($errors->has('major'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('major') }}</strong>
                                    </span>
                                    @endif

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-dark">
                                            جست و جو
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <a href="{{Route('applicant_create')}}">
                            <button class="btn">
                                اضافه کردن متقاضی
                            </button>
                        </a>
                        <a href="{{Route('applicant_list')}}">
                            <button class="btn">
                                لیست کامل متقاضیان
                            </button>
                        </a>
                        <br>
                        <br>
                        <a href="{{Route('university_list')}}">
                            <button class="btn">
                                دانشگاه ها
                            </button>
                        </a>
                        <br>
                        <br>
                        <a href="{{Route('major_list')}}">
                            <button class="btn">
                                رشته های المپیادی
                            </button>
                        </a>
                        <br>
                        <br>
                        <a href="{{Route('dorm_list')}}">
                            <button class="btn">
                                خوابگاه ها
                            </button>
                        </a>
                        <br>
                        <br>
                        <a href="{{Route('cafe')}}">
                            <button class="btn">
                                گزارش غذاخوری و خوابگاه ها
                            </button>
                        </a>
                        <a href="{{Route('type_report')}}">
                            <button class="btn">
                                گزارش انواع متقاضیان
                            </button>
                        </a>
                        <a href="{{Route('major_report')}}">
                            <button class="btn">
                                گزارش رشته ها
                            </button>
                        </a>
                        <a href="{{Route('university_report')}}">
                            <button class="btn">
                                گزارش دانشگاه ها
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
