@extends('master')

@push('css')
<style>
    header{ display: none; }
</style>
<link rel="stylesheet" href="/css/signIn.css">
<link rel="stylesheet" href="/css/register.css">

@endpush

@push('js')
<script src="/js/register.js"></script>
@endpush

@section('content')
    {{--<span>회원가입 페이지</span>--}}
    {{--@if($errors->any())--}}
        {{--<h2>에러 리스트</h2>--}}
        {{--<ul>--}}
            {{--@foreach($errors->all() as $error)--}}
                {{--<li>{{$error}}</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--@endif--}}
    {{--@if(session()->has('err'))--}}
        {{--<li>{{ session('err') }}</li>--}}
    {{--@endif--}}

    {{--<form method="post">--}}
        {{--{{ csrf_field() }}--}}
        {{--<input type="text" name="userid" value="{{ old('userid') }}">--}}
        {{--<input type="text" name="userpass" value="{{ old('userpass') }}">--}}
        {{--<input type="text" name="userpass_confirmation" value="{{ old('userpass_confirmation') }}">--}}
        {{--<input type="text" name="username" value="{{ old('username') }}">--}}
        {{--<select name="usergender" value="{{ old('usersex') }}">--}}
            {{--<option value="man">남자</option>--}}
            {{--<option value="woman">여자</option>--}}
        {{--</select>--}}
        {{--<select name="userquestion">--}}
            {{--<option value="0">옛날 고향은?</option>--}}
            {{--<option value="1">어머니 성함은?</option>--}}
            {{--<option value="2">아버지 성함은?</option>--}}
        {{--</select>--}}
        {{--<input type="hidden" name="emailToken">--}}
        {{--<input type="text" name="useranswer" value="{{ old('useranswer') }}">--}}
        {{--<input type="date" name="userbirth" value="{{ old('userbirth') }}">--}}
        {{--<input type="email" name="useremail" value="{{ old('useremail') }}">--}}
        {{--<button type="submit">회원가입</button>--}}
    {{--</form>--}}
    <div class="container">
        <div class="loginBox registerBox">
            <div class="input-table">
                <div class="table-box">
                    <div class="table-title">
                        회원가입
                    </div>

                    <form class="form-box" method="post">
                        {{ csrf_field() }}
                        @if($errors->any())
                            <div class="input-box" style="height: 5px;padding: 0;margin: 0;border: none;margin-top: -20px;margin-bottom: 20px;padding-top:20px; ">
                                <div class="input-title" style="width: 100%;color: red">
                                    @foreach($errors->all() as $error)
                                        *{{ $error }} <br>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="input-box">
                            <div class="input-title">아이디</div>
                            <input type="text" name="userid" value="{{ old('userid') }}" id="id-input" required>
                        </div>
                        <div class="input-box">
                            <div class="input-title">비밀번호</div>
                            <input type="password" name="userpass" value="{{ old('userpass') }}" id="pass-input" required>
                        </div>
                        <div class="input-box">
                            <div class="input-title">비밀번호 재확인</div>
                            <input type="password" name="userpass_confirmation" value="{{ old('userpass_confirmation') }}" id="pass-input" required>
                        </div>
                        <div class="input-box">
                            <div class="input-title">이름</div>
                            <input type="text" name="username" value="{{ old('username') }}" id="pass-input" required>
                        </div>
                        <div class="input-box">
                            <div class="input-title">이메일</div>
                            <input type="email" name="useremail" value="{{ old('useremail') }}" id="email-input" required>
                        </div>
                        {{--<div class="email-box block-box">--}}
                            {{--<input type="text" name="" value="" id="year" placeholder="이메일">--}}
                            {{--<div class="block-btn email-btn">--}}
                              {{--인증하기--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="input-box block-box">
                            <div class="input-title">생일</div>
                            <input type="date" name="userbirth" value="{{ old('userbirth') }}" id="pass-input" required>
                        </div>
                        {{--<div class="color-box block-box">--}}
                            {{--<select id="select">--}}
                              {{--<option value="color">좋아하는 색은?</option>--}}
                              {{--<option value="teacher">기억에 남는 선생님 이름은?</option>--}}
                              {{--<option value="top">내 보물 1호는?</option>--}}
                              {{--<option value="pet">키우는 애완견 이름은?</option>--}}
                            {{--</select>--}}
                            {{--<input type="text" name="" placeholder="검정색" id="color-index">--}}
                        {{--</div>--}}
                        {{--<div class="num-box block-box">--}}
                            {{--<input type="text" name="" value="" id="year" placeholder="년">--}}
                            {{--<input type="text" name="" value="" id="month" placeholder="월">--}}
                            {{--<input type="text" name="" value="" id="day" placeholder="일">--}}
                        {{--</div>--}}
                        <div class="sex-box block-box">
                            <div type="checkbox" name="button" id="men" class="block-btn unClickMen">남자</div>
                            <div type="checkbox" name="button" id="women" class="block-btn unClickWomen">여자</div>
                        </div>

                        {{--<input type="checkbox" name="sex" value="men">--}}
                        {{--<input type="checkbox" name="sex" value="girl">--}}

                        <div class="text-box">
                            <p>가입 계약을 채결하시면 서비스 약관 및 개인 정보 보호 정책에 동의합니다.</p>
                        </div>
                        <button type="submit" id="join-form-button" style="display: none;"></button>
                    </form>
                </div>
            </div>
            <div class="bottom-box">
                <div class="register-box-full">
                    <button type="button" name="button" onclick="document.getElementById('join-form-button').click()">회원가입</button>
                </div>
            </div>
        </div>
    </div>

@endsection
