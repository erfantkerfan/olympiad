@extends('layouts.app')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header text-center">تعریف خوابگاه</div>

                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                <tr class="text-center">
                                    <th scope="col">نام</th>
                                    <th scope="col">مسئول</th>
                                    <th scope="col">ظرفیت</th>
                                    <th scope="col">جنسیت</th>
                                    <th scope="col">ثبت</th>
                                </tr>
                                </thead>
                                <tbody>
                                <form id="config_form" method="post" action="{{ route('dorm_create') }}">
                                    <input type="hidden" form="config_form" name="_token" value="{{ csrf_token() }}">
                                    <tr class="text-center">
                                        <td scope="row"><input form="config_form" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} text-center" name="name" id="name" value="{{ old('name') }}" required></td>
                                        <td scope="row"><input form="config_form" class="form-control{{ $errors->has('supervisor') ? ' is-invalid' : '' }} text-center" name="supervisor" id="supervisor" value="{{ old('supervisor') }}" required></td>
                                        <td scope="row"><input form="config_form" class="form-control{{ $errors->has('capacity') ? ' is-invalid' : '' }} text-center" name="capacity" id="capacity" value="{{ old('capacity') }}" required></td>
                                        <td scope="row">
                                            <div class="form-check-inline">
                                                <input form="config_form" class="form-check-input" type="radio" name="gender" id="gender" value="2">
                                                <label class="form-check-label" for="gender">
                                                    مرد
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input form="config_form" class="form-check-input" type="radio" name="gender" id="gender" value="1">
                                                <label class="form-check-label" for="gender">
                                                    زن
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <input form="config_form" class="form-check-input" type="radio" name="gender" id="gender" value="3">
                                                <label class="form-check-label" for="gender">
                                                    سایر
                                                </label>
                                            </div>
                                        </td>
                                        <td scope="row"><button form="config_form" type="submit" class="btn btn-sm">ثبت</button></td>
                                    </tr>
                                </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <br>

                <div class="card">
                    <div class="card-header text-center">لیست خوابگاه ها</div>

                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                <tr class="text-center">
                                    <th scope="col">ردیف</th>
                                    <th scope="col">نام</th>
                                    <th scope="col">مسئول</th>
                                    <th scope="col">ظرفیت</th>
                                    <th scope="col">جنسیت</th>
                                    <th scope="col">تغییر</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dorms as $dorm)
                                    <form id="config_form{{$loop->iteration}}" method="post" action="{{ route('dorm_edit',['id'=>$dorm->id]) }}">
                                        <input type="hidden" form="config_form{{$loop->iteration}}" name="_token" value="{{ csrf_token() }}">
                                        <tr class="text-center">
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td scope="row"><input form="config_form{{$loop->iteration}}" class="form-control text-center" name="name" id="name" value="{{$dorm->name}}"></td>
                                            <td scope="row"><input form="config_form{{$loop->iteration}}" class="form-control text-center" name="supervisor" id="supervisor" value="{{$dorm->supervisor}}"></td>
                                            <td scope="row"><input form="config_form{{$loop->iteration}}" class="form-control text-center" name="capacity" id="capacity" value="{{$dorm->capacity}}"></td>
                                            <td scope="row">
                                                <div class="form-check-inline">
                                                    <input form="config_form{{$loop->iteration}}" class="form-check-input" type="radio" name="gender" id="gender" value="2" @if($dorm->gender==2) checked @endif>
                                                    <label class="form-check-label" for="gender">
                                                        مرد
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <input form="config_form{{$loop->iteration}}" class="form-check-input" type="radio" name="gender" id="gender" value="1" @if($dorm->gender==1) checked @endif>
                                                    <label class="form-check-label" for="gender">
                                                        زن
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <input form="config_form{{$loop->iteration}}" class="form-check-input" type="radio" name="gender" id="gender" value="3" @if($dorm->gender==3) checked @endif>
                                                    <label class="form-check-label" for="gender">
                                                        سایر
                                                    </label>
                                                </div>
                                            </td>
                                            <td scope="row"><button form="config_form{{$loop->iteration}}" type="submit" class="btn btn-sm">اعمال</button></td>
                                        </tr>
                                    </form>
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