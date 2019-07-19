@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" dir="rtl">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">پنل ادمین</div>

                <div class="card-body text-right">
                    <a href="/">
                        <button class="btn">
                            اضافه کردن متقاضی
                        </button>
                        <button class="btn">
                            پذیرش متقاضی
                        </button>
                        <button class="btn">
                            تغییر دادن اطلاعات متقاضی
                        </button>
                        <button class="btn">
                            دانشگاه ها
                        </button>
                        <button class="btn">
                            رشته ها
                        </button>
                        <button class="btn">
                            خوابگاها
                        </button>
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
