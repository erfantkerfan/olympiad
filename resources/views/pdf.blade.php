<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.9.0/css/v4-shims.css">

    <!-- Styles -->
    <link href="{{ ('/css/app.css') }}" rel="stylesheet">
    <style>
        @font-face {
            font-family:'Bmitra';
            src: url('{{ ('/fonts/BTITRBOLD.ttf') }}');
        }
        @font-face {
            font-family: 'IranNastaliq';
            src: url('{{ ('/fonts/IranNastaliq.eot?#') }}') format('eot'),
            url('{{ ('/fonts/IranNastaliq.ttf') }}') format('truetype'),
            url('{{ ('/fonts/IranNastaliq.woff') }}') format('woff');
        }
        .title {
            font-size: 50px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body style="font-family:'Bmitra;'">
<div id="app" style="font-family:'Bmitra;'">
    <main class="py-4">
        <div class="container" dir="rtl">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body text-right">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">کارت پذیرش متقاضی</h5>
                                <p class="card-text">
                                    @if($applicant->gender==1)
                                        سرکار خانم
                                    @elseif($applicant->gender==2)
                                        جناب آقای
                                    @else
                                        شرکت کننده محترم
                                    @endif
                                    <u style="font-size: 150%">
                                        {{$applicant->name}}
                                        {{$applicant->f_name}}
                                    </u>
                                    فرزند
                                    {{$applicant->fa_name}}
                                    به شماره ملی
                                    <u style="font-size: 150%">
                                        {{$applicant->SSN}}
                                    </u>
                                    در تاریخ
                                    {{ str_replace('-','/',Verta::now()->format('Y-n-j')) }}
                                    در پردیس فنی و مهندسی شهید عباسپور دانشگاه شهید بهشتی جهت شرکت در مرحله نهایی بیست و چهارمین المپیاد علمی دانشجویی کشور پذیرش گردیده است.
                                    <br>
                                    <br>
                                    وضعیت پذیرش:
                                    <u style="font-size: 120%">
                                        @if($applicant->state==1)
                                            پذیرش کامل
                                        @elseif($applicant->state==2)
                                            پذیرش موقت
                                        @elseif($applicant->state==3)
                                            پذیرش ممکن نیست
                                        @else
                                            پذیرش نشده
                                        @endif
                                    </u>
                                        <br>
                                    @if(isset($applicant->state_note))
                                        یادداشت پذیرنده:
                                        {{ $applicant->state_note }}
                                    @endif
                                    دانشگاه:
                                    {{ \App\University::find($applicant->university)->name ?? ""}}
                                    <br>
                                    رشته:
                                    {{ \App\Major::find($applicant->major)->name ?? ""}}
                                    <span class="float-left">
                                        <img src="{{ asset('image/PWU.png') }}">
                                        <img src="{{ asset('image/SBU.png') }}">
                                    </span>
                                </p>
                            </div>
                        </div>
                        <br>
                        @if($has_food)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">ژتون غذا</h5>
                                    <p class="card-text">
                                        <div class="row">
                                            @foreach($food_array as $key=>$value)
                                                @if($applicant->$value==0)
                                                    <div class="col-md-3 m-b-md">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h5 class="card-title text-center">ژتون غذا</h5>
                                                        <p class="card-text text-center">
                                                            {{$applicant->name}}
                                                            {{$applicant->f_name}}
                                                            {{$applicant->SSN}}
                                                            <br>
                                                            {{$key}}
                                                        </p>
                                                    </div>
                                                </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    </p>
                                </div>
                            </div>
                        @endif
                        <br>
                        @if($has_dorm)
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">معرفی نامه خوابگاه</h5>
                                    <p class="card-text">
                                        باسلام
                                        <br>
                                        @if($applicant->dorm)
                                            @if(\App\Dorm::find($applicant->dorm)->gender==1)
                                                سرکار خانم
                                            @elseif(\App\Dorm::find($applicant->dorm)->gender==2)
                                                جناب آقای
                                            @endif
                                        {{\App\Dorm::find($applicant->dorm)->supervisor}}
                                        @endif
                                        لطفا
                                        @if($applicant->gender==1)
                                            سرکار خانم
                                        @elseif($applicant->gender==2)
                                            جناب آقای
                                        @else
                                            شرکت کننده محترم
                                        @endif
                                        <span style="font-size: 120%">
                                            {{$applicant->name}}
                                            {{$applicant->f_name}}
                                        </span>
                                        فرزند
                                        {{$applicant->fa_name}}
                                        به شماره ملی
                                        <span style="font-size: 120%">
                                            {{$applicant->SSN}}
                                        </span>
                                        را در
                                        @if($applicant->dorm)
                                            {{\App\Dorm::find($applicant->dorm)->name}}
                                        @endif
                                        در روز
                                        @foreach($dorm_array as $key=>$value)
                                            @if($applicant->$value==1)
                                                <u>
                                                    {{$key}}
                                                </u>
                                                ،
                                            @endif
                                        @endforeach
                                        پذیرش بفرمایید.
                                        <br>
                                        باتشکر
                                        <span class="float-left">
                                            <img src="{{ asset('image/PWU.png') }}">
                                            <img src="{{ asset('image/SBU.png') }}">
                                        </span>
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
</body>
</html>