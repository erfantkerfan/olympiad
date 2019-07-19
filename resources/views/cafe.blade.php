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
                <br>

                <div class="card">
                    <div class="card-header text-center">لیست سفارشات غذا</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">نام</th>
                                <th scope="col">نام خانوادگی</th>
                                <th scope="col">شماره ملی</th>
                                @foreach($food_array as $key=>$value)
                                    <th scope="col">{{$key}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($applicants as $applicant)
                                <tr class="text-center">
                                    <th scope="row">{{ $applicant->name }}</th>
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
                                                <h2>
                                                    <span class="fas fa-apple-alt" style="color: red"></span>
                                                </h2>
                                            @elseif(true)
                                                <span class="fas fa-sad-tear"></span>
                                            @endif
                                        </td>
                                    @endforeach

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection