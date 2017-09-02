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
    {{--<h2>비밀번호 찾기</h2>--}}
    {{--@if($errors->any())--}}
        {{--<h2>에러 리스트</h2>--}}
        {{--<ul>--}}
            {{--@foreach($errors->all() as $error)--}}
                {{--<li>{{$error}}</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--@endif--}}
    {{--<form method="post">--}}
        {{--{{ csrf_field() }}--}}
        {{--<input type="text" name="userid" value="{{ old('userid') }}">--}}
        {{--<input type="text" name="useremail" value="{{ old('useremail') }}">--}}
        {{--<select name="passquestion" value="{{ old('passquestion') }}">--}}
            {{--<option value="0">옛날 고향은?</option>--}}
            {{--<option value="1">어머니 성함은?</option>--}}
            {{--<option value="2">아버지 성함은?</option>--}}
        {{--</select>--}}
        {{--<input type="text" name="passanswer" value="{{ old('passanswer') }}">--}}
        {{--<button type="submit">submit</button>--}}
    {{--</form>--}}

    <div class="container">
        <div class="loginBox registerBox">
            <div class="input-table">
                <div class="table-box">
                    <div class="table-title">
                        비밀번호 찾기
                    </div>
                    <form class="form-box">
                        {{ csrf_field() }}
                        @if($errors->any())
                            <div class="input-box" style="height: 5px;padding: 0;margin: 0;border: none;margin-top: -20px;margin-bottom: 20px;">
                                <div class="input-title" style="width: 100%;">*{{ $errors->first() }}</div>
                            </div>
                        @endif
                        <div class="input-box">
                            <div class="input-title">이름</div>
                            <input type="text" name="username" value="{{ old('username') }}" id="id-input">
                        </div>
                        <div class="input-box">
                            <div class="input-title">아이디</div>
                            <input type="text" name="userid" value="{{ old('userid') }}" id="pass-input">
                        </div>
                        <div class="input-box">
                            <div class="input-title">이메일</div>
                            <input type="text" name="useremail" value="{{ old('useremail') }}" id="pass-input">
                        </div>
                        {{--<div class="color-box block-box">--}}
                        {{--<div class="block-text">내가 좋아하는 색깔은?</div>--}}
                        {{--<input type="text" name="" placeholder="검정색">--}}
                        {{--</div>--}}
                        <div class="text-box block-box">
                            <p>가입시에 입력하셨던 정보를 그대로 입력하셔야 찾기가 가능합니다..</p>
                        </div>
                        <button type="submit" id="foundPass-form-button" style="display: none"></button>
                    </form>
                </div>
            </div>
            <div class="bottom-box">
                <div class="register-box-full">
                    <button type="button" name="button" onclick="document.getElementById('foundPass-form-button').click();">찾기</button>
                </div>
            </div>
        </div>
    </div>
@endsection