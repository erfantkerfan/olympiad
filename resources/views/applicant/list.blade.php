@extends('layouts.app')

@section('content')
    <div class="container-fluid" dir="rtl">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">لیست متقاضیان</div>

                    <div class="card-body">
                       <table class="table">
                           <thead>
                           <tr class="text-center">
                               <th scope="col">نام</th>
                               <th scope="col">نام خانوادگی</th>
                               <th scope="col">شماره ملی</th>
                               <th scope="col">دانشگاه</th>
                               <th scope="col">رشته</th>
                               <th scope="col">وضعیت</th>
                               <th scope="col">یاددداشت وضعیت</th>
                               <th scope="col">شرایط خاص</th>
                               <th scope="col">بیماری خاص</th>
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
                                   <td>{{ $applicant->getRelation('university')->name }}</td>
                                   <td>{{ $applicant->getRelation('major')->name }}</td>
                                   <td>
                                       @if($applicant->state==1)
                                           پذیرش کامل
                                       @elseif($applicant->state==2)
                                           پذیرش موقت
                                       @elseif($applicant->state==3)
                                           پذیرش ممکن نیست
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
@endsection