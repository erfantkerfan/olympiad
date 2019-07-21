@extends('layouts.app')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header text-center">مجموع سفارشات غذا</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr class="text-center">
                                @foreach($food_sum as $key=>$value)
                                    <th scope="col">{{$key}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                @foreach($food_sum as $key=>$value)
                                    <td scope="col">{{ $value }}</td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <br>

                <div class="card">
                    <div class="card-header text-center">ظرفیت خوابگاه ها</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr class="text-center">
                                @foreach($dorm_sum as $key=>$value)
                                    <th scope="col">{{$key}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                @foreach($dorm_sum as $key=>$value)
                                    <td scope="col">{{ $value }}</td>
                                @endforeach
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <br>
                <div class="card">
                    <div class="card-header text-center">لیست سفارشات غذا</div>

                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">ردیف</th>
                                <th scope="col">
                                    <a href="{{ Route('cafe',['sort'=>'name']) }}">
                                        <button class="btn btn-sm">
                                            نام
                                        </button>
                                    </a>
                                </th>
                                <th scope="col">
                                    <a href="{{ Route('cafe',['sort'=>'f_name']) }}">
                                        <button class="btn btn-sm">
                                            نام خانوادگی
                                        </button>
                                    </a>
                                </th>
                                <th scope="col">
                                    <a href="{{ Route('cafe',['sort'=>'SSN']) }}">
                                        <button class="btn btn-sm">
                                            شماره ملی
                                        </button>
                                    </a>
                                </th>
                                @foreach($food_array as $key=>$value)
                                    <th scope="col">
                                        <a href="{{ Route('cafe',['sort'=>$value,'order'=>'desc']) }}">
                                            <button class="btn btn-sm">
                                                {{ $key }}
                                            </button>
                                        </a>
                                    </th>
                                @endforeach
                                @foreach($dorm_array as $key=>$value)
                                    <th scope="col">
                                        <a href="{{ Route('cafe',['sort'=>$value,'order'=>'desc']) }}">
                                            <button class="btn btn-sm">
                                                {{ $key }}
                                            </button>
                                        </a>
                                    </th>
                                @endforeach
                                <th scope="col">خوابگاه</th>
                                <th scope="col">شماره اتاق</th>
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
                                    @foreach($food_array as $key=>$value)
                                        <td scope="col">
                                            @if($applicant->$value===1)
                                                <span class="fas fa-apple-alt" style="color: red"></span>
                                            @elseif(true)
                                                <span class="fas fa-sad-tear"></span>
                                            @endif
                                        </td>
                                    @endforeach
                                    @foreach($dorm_array as $key=>$value)
                                        <td @if($loop->first) scope="col" style="border-right: 2px solid black;" @endif>
                                            @if($applicant->$value===1)
                                                <span class="fas fa-hotel" style="color: red"></span>
                                            @elseif(true)
                                                <span class="fas fa-sad-tear"></span>
                                            @endif
                                        </td>
                                    @endforeach
                                    <td>{{ $applicant->getRelation('dorm')->name ?? ""}}</td>
                                    <td>{{ $applicant->d_room }}</td>
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