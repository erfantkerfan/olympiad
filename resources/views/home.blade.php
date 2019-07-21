@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" dir="rtl">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header text-center">پنل ادمین</div>

                <div class="card-body text-center">
                    <a href="{{Route('applicant_create')}}">
                        <button class="btn">
                            اضافه کردن متقاضی
                        </button>
                    </a>
                    <a href="{{Route('applicant_list')}}">
                        <button class="btn">
                            پذیرش متقاضی
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
                    <a href="{{Route('state_report')}}">
                        <button class="btn">
                            گزارش وضعیت ها
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
