@extends('layouts.app')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">گزارش انواع متقاضیان</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">نوع</th>
                                <th scope="col">پذیرش نشده زن</th>
                                <th scope="col">پذیرش کامل زن</th>
                                <th scope="col">پذیرش موقت زن</th>
                                <th scope="col">عدم پذیرش زن</th>
                                <th scope="col">پذیرش نشده مرد</th>
                                <th scope="col">پذیرش کامل مرد</th>
                                <th scope="col">پذیرش موقت مرد</th>
                                <th scope="col">عدم پذیرش مرد</th>
                                <th scope="col">پذیرش نشده سایر</th>
                                <th scope="col">پذیرش کامل سایر</th>
                                <th scope="col">پذیرش موقت سایر</th>
                                <th scope="col">عدم پذیرش سایر</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($types as $name=>$type)
                                <tr class="text-center">
                                    <td scope="col">{{ $name }}</td>
                                    @foreach($map as $key=>$value)
                                        <td scope="col" @if(!$loop->first) style="border-right: 2px solid black;" @endif>{{$report[$type][$key]['nashode']}}</td>
                                        <td scope="col">{{$report[$type][$key]['kamel']}}</td>
                                        <td scope="col">{{$report[$type][$key]['movaghat']}}</td>
                                        <td scope="col">{{$report[$type][$key]['namomken']}}</td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--<br>--}}
                {{--<div class="card">--}}
                    {{--<div class="card-header text-center">گزارش وضعیت های سایر متقاضیان</div>--}}
                    {{--<div class="card-body">--}}
                        {{--<table class="table">--}}
                            {{--<thead>--}}
                            {{--<tr class="text-center">--}}
                                {{--<th scope="col">پذیرش نشده</th>--}}
                                {{--<th scope="col">پذیرش کامل</th>--}}
                                {{--<th scope="col">پذیرش موقت</th>--}}
                                {{--<th scope="col">عدم پذیرش</th>--}}
                            {{--</tr>--}}
                            {{--</thead>--}}
                            {{--<tbody>--}}
                            {{--<tr class="text-center">--}}
                                {{--<td scope="col">{{$report2->nashode}}</td>--}}
                                {{--<td scope="col">{{$report2->kamel}}</td>--}}
                                {{--<td scope="col">{{$report2->movaghat}}</td>--}}
                                {{--<td scope="col">{{$report2->namomken}}</td>--}}
                            {{--</tr>--}}
                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
@endsection