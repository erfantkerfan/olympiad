@extends('layouts.app')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">گزارش وضعیت های متقاضیان هر رشته</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr class="text-center">
                                <th scope="col">رشته</th>
                                <th scope="col">پذیرش نشده مرد</th>
                                <th scope="col">پذیرش کامل مرد</th>
                                <th scope="col">پذیرش موقت مرد</th>
                                <th scope="col">عدم پذیرش مرد</th>
                                <th scope="col">پذیرش نشده زن</th>
                                <th scope="col">پذیرش کامل زن</th>
                                <th scope="col">پذیرش موقت زن</th>
                                <th scope="col">عدم پذیرش زن</th>
                                <th scope="col">پذیرش نشده سایر</th>
                                <th scope="col">پذیرش کامل سایر</th>
                                <th scope="col">پذیرش موقت سایر</th>
                                <th scope="col">عدم پذیرش سایر</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($majors as $major)
                                <tr class="text-center">
                                    <td scope="col">{{ $major->name }}</td>
                                    @foreach($map as $key=>$value)
                                        <td scope="col" @if(!$loop->first) style="border-right: 2px solid black;" @endif>{{$report[$major->id][$key]['nashode']}}</td>
                                        <td scope="col">{{$report[$major->id][$key]['kamel']}}</td>
                                        <td scope="col">{{$report[$major->id][$key]['movaghat']}}</td>
                                        <td scope="col">{{$report[$major->id][$key]['namomken']}}</td>
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