@extends('layouts.app')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header text-center">تعریف رشته المپیادی</div>

                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                <tr class="text-center">
                                    <th scope="col">نام</th>
                                    <th scope="col">مسئول</th>
                                    @foreach($time_array as $key=>$value)
                                        <th scope="col">{{ $key }}</th>
                                    @endforeach
                                    <th scope="col">ثبت</th>
                                </tr>
                                </thead>
                                <tbody>
                                <form id="config_form" method="post" action="{{ route('major_create') }}">
                                    <input type="hidden" form="config_form" name="_token" value="{{ csrf_token() }}">
                                    <tr class="text-center">
                                        <td scope="row"><textarea form="config_form" style="width: 300px" class="form-control" name="name" id="name"></textarea></td>
                                        <td scope="row"><input form="config_form" class="form-control text-center" name="supervisor" id="supervisor" value="{{old('supervisor')}}"></td>
                                        @foreach($time_array as $key=>$value)
                                            <td scope="row">
                                                <div class="form-check-inline">
                                                    <input form="config_form" class="form-check-input" type="radio" name="{{$value}}" id="{{$value}}" value="1">
                                                    <label class="form-check-label" for="{{$value}}">
                                                        بله
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <input form="config_form" class="form-check-input" type="radio" name="{{$value}}" id="{{$value}}" value="0">
                                                    <label class="form-check-label" for="{{$value}}">
                                                        خبر
                                                    </label>
                                                </div>
                                            </td>
                                        @endforeach
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
                    <div class="card-header text-center">لیست رشته های المپیادی</div>

                    <div class="card-body">
                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                <tr class="text-center">
                                    <th scope="col">ردیف</th>
                                    <th scope="col">
                                        <a href="{{ Route('major_list',['sort'=>'name']) }}">
                                            <button class="btn btn-sm">
                                                نام
                                            </button>
                                        </a>
                                    </th>
                                    <th scope="col">
                                        <a href="{{ Route('major_list',['sort'=>'supervisor']) }}">
                                            <button class="btn btn-sm">
                                                مسئول
                                            </button>
                                        </a>
                                    </th>
                                    @foreach($time_array as $key=>$value)
                                        <th scope="col">
                                            <a href="{{ Route('major_list',['sort'=>$value,'order'=>'desc']) }}">
                                                <button class="btn btn-sm">
                                                    {{ $key }}
                                                </button>
                                            </a>
                                        </th>
                                    @endforeach
                                    <th scope="col">تغییر</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($majors as $major)
                                    <form id="config_form{{$loop->iteration}}" method="post" action="{{ route('major_edit',['id'=>$major->id]) }}">
                                        <input type="hidden" form="config_form{{$loop->iteration}}" name="_token" value="{{ csrf_token() }}">
                                        <tr class="text-center">
                                            <td scope="row">{{ $loop->iteration }}</td>
                                            <td scope="row"><textarea form="config_form{{$loop->iteration}}" style="width: 300px" class="form-control" name="name" id="name">{{$major->name}}</textarea></td>
                                            <td scope="row"><input form="config_form{{$loop->iteration}}" class="form-control text-center" name="supervisor" id="supervisor" value="{{$major->supervisor}}"></td>
                                            @foreach($time_array as $key=>$value)
                                                <td scope="row">
                                                    <div class="form-check-inline">
                                                        <input form="config_form{{$loop->parent->iteration}}" class="form-check-input" type="radio" name="{{$value}}" id="{{$value}}" value="1" @if($major->$value==1) checked @endif>
                                                        <label class="form-check-label" for="{{$value}}">
                                                            بله
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <input form="config_form{{$loop->parent->iteration}}" class="form-check-input" type="radio" name="{{$value}}" id="{{$value}}" value="0" @if($major->$value===0) checked @endif>
                                                        <label class="form-check-label" for="{{$value}}">
                                                            خبر
                                                        </label>
                                                    </div>
                                                </td>
                                            @endforeach
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