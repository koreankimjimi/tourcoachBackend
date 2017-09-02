@extends('master')

@push('css')
    <style>
    header{
        display:none;
    }
    @if($errors->any())
            .input-box{
        border-bottom-color:red !important;
    }
    .input-title{
        color:red !important;
    }
        @endif
    </style>
    <link rel="stylesheet" href="/css/signIn.css">
    <link rel="stylesheet" href="/css/register.css">
@endpush

@section('content')
    {{--@if($errors->any())--}}
        {{--<h2>에러 리스트</h2>--}}
        {{--<ul>--}}
            {{--@foreach($errors->all() as $error)--}}
                {{--<li>{{$error}}</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--@endif--}}
    {{--<h2>아이디 찾기</h2>--}}
    {{--<form action="/user/foundId" method="post">--}}
        {{--{{ csrf_field() }}--}}
        {{--<input type="text" name="username" value="{{ old('username') }}">--}}
        {{--<input type="text" name="useremail" value="{{ old('useremail') }}">--}}
        {{--<button type="submit">submit</button>--}}
    {{--</form>--}}
    <div class="container">
        <div class="loginBox registerBox">
            <form class="input-table" method="post">
                {{ csrf_field() }}
                <div class="table-box">
                    <div class="table-title">
                        아이디 찾기
                    </div>
                    <div class="form-box">
                        @if($errors->any())
                            <div class="input-box" style="height: 5px;padding: 0;margin: 0;border: none;margin-top: -20px;margin-bottom: 20px;">
                                <div class="input-title" style="width: 100%;">*{{ $errors->first() }}</div>
                            </div>
                        @endif
                        
                        <div class="input-box">
                            <div class="input-title">이름</div>
                            <input type="text" name="username" value="{{ old('username') }}" id="id-input" required>
                        </div>
                        <div class="input-box">
                            <div class="input-title">이메일</div>
                            <input type="email" name="useremail" value="{{ old('useremail') }}" id="pass-input" required>
                        </div>
                            <button id="foundId-form-button" type="submit" style="display: none;"></button>
                        {{--<div class="color-box block-box">--}}
                            {{--<div class="block-text">내가 좋아하는 색깔은?</div>--}}
                            {{--<input type="text" name="" placeholder="검정색">--}}
                        {{--</div>--}}
                        <div class="text-box block-box">
                            <p>가입시에 입력하셨던 정보를 그대로 입력하셔야 찾기가 가능합니다..</p>
                        </div>
                    </div>
                </div>
            </form>
            <div class="bottom-box">
                <div class="register-box-full">
                    <button type="button" name="button" onclick="document.getElementById('foundId-form-button').click();">찾기</button>
                </div>
            </div>
        </div>
    </div>
@endsection