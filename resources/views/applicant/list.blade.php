@extends('layouts.app')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-12">
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