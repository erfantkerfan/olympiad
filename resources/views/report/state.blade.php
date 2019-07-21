@extends('layouts.app')

@section('content')
    <div class="container" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">گزارش وضعیت های متقاضیان</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">پذیرش نشده</th>
                                <th scope="col">پذیرش کامل</th>
                                <th scope="col">پذیرش موقت</th>
                                <th scope="col">عدم پذیرش</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                <td scope="col">{{$report1->nashode}}</td>
                                <td scope="col">{{$report1->kamel}}</td>
                                <td scope="col">{{$report1->movaghat}}</td>
                                <td scope="col">{{$report1->namomken}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div class="card">
                    <div class="card-header text-center">گزارش وضعیت های سایر متقاضیان</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">پذیرش نشده</th>
                                <th scope="col">پذیرش کامل</th>
                                <th scope="col">پذیرش موقت</th>
                                <th scope="col">عدم پذیرش</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="text-center">
                                <td scope="col">{{$report2->nashode}}</td>
                                <td scope="col">{{$report2->kamel}}</td>
                                <td scope="col">{{$report2->movaghat}}</td>
                                <td scope="col">{{$report2->namomken}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection