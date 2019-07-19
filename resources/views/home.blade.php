@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" dir="rtl">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">پنل ادمین</div>

                <div class="card-body text-right">
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
                    <a href="{{Route('home')}}">
                        <button class="btn">
                            دانشگاه ها
                        </button>
                    </a>
                    <br>
                    <br>
                    <a href="{{Route('home')}}">
                        <button class="btn">
                            رشته ها
                        </button>
                    </a>
                    <br>
                    <br>
                    <a href="{{Route('home')}}">
                        <button class="btn">
                            خوابگاها
                        </button>
                    </a>
                    <br>
                    <br>
                    <a href="{{Route('cafe')}}">
                        <button class="btn">
                            آمار غذاخوری
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
