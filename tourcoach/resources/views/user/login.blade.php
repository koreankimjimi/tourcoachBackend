@extends('master')


@push('css')
    <style>
        header{ display: none; }
    </style>
    <link rel="stylesheet" href="/css/signIn.css">
    <link rel="stylesheet" href="/css/style.css">
@endpush

@section('content')

        {{--<h2>세션 결과</h2>--}}
        {{--<ul>--}}
        {{--@if( session()->has('success') )--}}
                {{--<li><strong>Success : {{ session()->get('success') }}</strong></li>--}}
        {{--@endif--}}
        {{--@if( session()->has('err') )--}}
            {{--<li><strong>Error: {{ session()->get('err') }}</strong></li>--}}
        {{--@endif--}}
        {{--</ul>--}}

    {{--<span>로그인 페이지</span>--}}
    {{--<form method="post">--}}
        {{--{{ csrf_field() }}--}}
        {{--<input type="text" name="userid">--}}
        {{--<input type="text" name="userpass">--}}
        {{--<button type="submit">로그인</button>--}}
    {{--</form>--}}
        <div class="container">
            <div class="signBox loginBox">
                <div class="input-table">
                    <div class="table-box">
                        <div class="table-title">
                            로그인
                        </div>
                        <div class="form-box">
                            <div class="input-box">
                                <div class="input-title">아이디</div>
                                <input type="text" name="" value="" id="id-input">
                            </div>
                            <div class="input-box">
                                <div class="input-title">비밀번호</div>
                                <input type="password" name="" value="" id="pass-input">
                            </div>
                        </div>
                    </div>
                    <div class="find-info">
                        <a href="#">아이디 찾기</a>
                        <div class="line">
                            |
                        </div>
                        <a href="#">비밀번호 찾기</a>
                    </div>
                </div>
                <div class="bottom-box">
                    <div class="register-box button-box">
                        <button type="button" name="button">회원가입</button>
                    </div>
                    <div class="login-box button-box">
                        <button type="button" name="button">로그인</button>
                    </div>
                </div>
            </div>
        </div>
@endsection