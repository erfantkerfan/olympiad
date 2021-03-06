@extends('layouts.app')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(Session::has('alert'))
                    <div class="col-4 mx-auto" dir="rtl">
                        <div class="text-center">
                            <div class="alert alert-success alert-dismissible show" role="alert">
                                <h4 class="alert-heading">
                                    <a href="{{Session::get('alert')}}">
                                        دانلود فرم پذیرش
                                    </a>
                                </h4>
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">
                                <span class="fa fa-times-circle" style="color:red;">
                                </span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-center">لیست متقاضیان</div>

                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                <tr class="text-center">
                                    <th scope="col">ردیف</th>
                                    <th scope="col">
                                        <a href="{{ Route('applicant_list',['sort'=>'name']) }}">
                                            <button class="btn">
                                                نام
                                            </button>
                                        </a>
                                    </th>
                                    <th scope="col">
                                        <a href="{{ Route('applicant_list',['sort'=>'f_name']) }}">
                                            <button class="btn">
                                                نام خانوادگی
                                            </button>
                                        </a>
                                    </th>
                                    <th scope="col">
                                        <a href="{{ Route('applicant_list',['sort'=>'SSN']) }}">
                                            <button class="btn">
                                                شماره ملی
                                            </button>
                                        </a>
                                    </th>
                                    <th scope="col">
                                        <a href="{{ Route('applicant_list',['sort'=>'university']) }}">
                                            <button class="btn">
                                                دانشگاه
                                            </button>
                                        </a>
                                    </th>
                                    <th scope="col">
                                        <a href="{{ Route('applicant_list',['sort'=>'major']) }}">
                                            <button class="btn">
                                                رشته
                                            </button>
                                        </a>
                                    </th>
                                    <th scope="col">
                                        <a href="{{ Route('applicant_list',['sort'=>'state','order'=>'desc']) }}">
                                            <button class="btn">
                                                وضعیت
                                            </button>
                                        </a>
                                    </th>
                                    <th scope="col">یاددداشت وضعیت</th>
                                    <th scope="col">
                                        <a href="{{ Route('applicant_list',['sort'=>'special_case','order'=>'desc']) }}">
                                            <button class="btn">
                                                شرایط خاص
                                            </button>
                                        </a>
                                    </th>
                                    <th scope="col">
                                        <a href="{{ Route('applicant_list',['sort'=>'special_disease','order'=>'desc']) }}">
                                            <button class="btn">
                                                بیماری خاص
                                            </button>
                                        </a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($applicants as $applicant)
                                    @if($applicant->type==1)
                                        <tr class="text-center">
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $applicant->name }}</td>
                                            <td>{{ $applicant->f_name }}</td>
                                            <td>
                                                <a href="{{Route('applicant_edit',['id'=>$applicant->id])}}" style="color: inherit">
                                                    <button class="btn btn-secondary btn-sm">
                                                        {{ $applicant->SSN }}
                                                    </button>
                                                </a>
                                            </td>
                                            <td>{{ $applicant->getRelation('university')->name ?? ""}}</td>
                                            <td>{{ $applicant->getRelation('major')->name ?? ""}}</td>
                                            <td>
                                                @if($applicant->state==1)
                                                    <span style="color: green">پذیرش کامل</span>
                                                @elseif($applicant->state==2)
                                                    <span style="color: yellow">پذیرش موقت</span>
                                                @elseif($applicant->state==3)
                                                    <span style="color: red">پذیرش ممکن نیست</span>
                                                @else
                                                    عدم مراجعه
                                                @endif
                                            </td>
                                            <td>{{ $applicant->state_note }}</td>
                                            <td>{{ $applicant->special_case }}</td>
                                            <td>{{ $applicant->special_disease }}</td>
                                        </tr>
                                        @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header text-center">لیست سایر متقاضیان</div>

                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                <tr class="text-center">
                                    <th scope="col">ردیف</th>
                                    <th scope="col">
                                        <a href="{{ Route('applicant_list',['sort'=>'name']) }}">
                                            <button class="btn">
                                                نام
                                            </button>
                                        </a>
                                    </th>
                                    <th scope="col">
                                        <a href="{{ Route('applicant_list',['sort'=>'f_name']) }}">
                                            <button class="btn">
                                                نام خانوادگی
                                            </button>
                                        </a>
                                    </th>
                                    <th scope="col">
                                        <a href="{{ Route('applicant_list',['sort'=>'SSN']) }}">
                                            <button class="btn">
                                                شماره ملی
                                            </button>
                                        </a>
                                    </th>
                                    <th scope="col">
                                        <a href="{{ Route('applicant_list',['sort'=>'type']) }}">
                                            <button class="btn">
                                                نوع متقاضی
                                            </button>
                                        </a>
                                    </th>
                                    <th scope="col">
                                        <a href="{{ Route('applicant_list',['sort'=>'state','order'=>'desc']) }}">
                                            <button class="btn">
                                                وضعیت
                                            </button>
                                        </a>
                                    </th>
                                    <th scope="col">یاددداشت وضعیت</th>
                                    <th scope="col">
                                        <a href="{{ Route('applicant_list',['sort'=>'special_case','order'=>'desc']) }}">
                                            <button class="btn">
                                                شرایط خاص
                                            </button>
                                        </a>
                                    </th>
                                    <th scope="col">
                                        <a href="{{ Route('applicant_list',['sort'=>'special_disease','order'=>'desc']) }}">
                                            <button class="btn">
                                                بیماری خاص
                                            </button>
                                        </a>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($applicants as $applicant)
                                    @if($applicant->type!=1)
                                        <tr class="text-center">
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $applicant->name }}</td>
                                            <td>{{ $applicant->f_name }}</td>
                                            <td>
                                                <a href="{{Route('applicant_edit',['id'=>$applicant->id])}}" style="color: inherit">
                                                    <button class="btn btn-secondary btn-sm">
                                                        {{ $applicant->SSN }}
                                                    </button>
                                                </a>
                                            </td>
                                            <td>
                                                @if($applicant->type==2)
                                                    سرپرست داوطلب
                                                @elseif($applicant->type==3)
                                                    همراه داوطلب
                                                @elseif($applicant->type==4)
                                                    عوامل دانشگاه
                                                @elseif($applicant->type==5)
                                                    عوامل عوامل سنجش
                                                @elseif($applicant->type==6)
                                                    اساتید و ناظرین
                                                @else
                                                    نوع متقاضی مشخص نشده
                                                @endif
                                            </td>
                                            <td>
                                                @if($applicant->state==1)
                                                    <span style="color: green">پذیرش کامل</span>
                                                @elseif($applicant->state==2)
                                                    <span style="color: blue">پذیرش موقت</span>
                                                @elseif($applicant->state==3)
                                                    <span style="color: red">پذیرش ممکن نیست</span>
                                                @else
                                                    عدم مراجعه
                                                @endif
                                            </td>
                                            <td>{{ $applicant->state_note }}</td>
                                            <td>{{ $applicant->special_case }}</td>
                                            <td>{{ $applicant->special_disease }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection