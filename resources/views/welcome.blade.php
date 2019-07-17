@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 mx-auto">
                <div class="title m-b-md">
                <a href="{{ Route('home') }}" style="text-decoration: none; color: inherit; font-family:'Bmitra'">
                    <br>
                    <br>
                    <div>
                        <img src="{{ asset('image/SBU.png') }}">
                        المپیاد دانشگاه شهید بهشتی
                        <img src="{{ asset('image/PWU.png') }}">
                    </div>
                </a>
                </div>
            </div>
        </div>
    </div>
@endsection