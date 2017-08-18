@extends('master')

@push('css')
<style>
    header{ display: none; }
</style>
<link rel="stylesheet" href="/css/signIn.css">
<link rel="stylesheet" href="/css/style.css">
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
                    <div class="form-box">
                        <div class="input-box">
                            <div class="input-title">아이디</div>
                            <input type="text" name="" value="" id="id-input">
                        </div>
                        <div class="input-box">
                            <div class="input-title">비밀번호</div>
                            <input type="password" name="" value="" id="pass-input">
                        </div>
                        <div class="input-box">
                            <div class="input-title">비밀번호 재확인</div>
                            <input type="password" name="" value="" id="pass-input">
                        </div>
                        <div class="input-box">
                            <div class="input-title">이름</div>
                            <input type="text" name="" value="" id="pass-input">
                        </div>
                        <div class="input-box">
                            <div class="input-title">이메일</div>
                            <input type="email" name="" value="" id="pass-input">
                        </div>
                        <div class="num-box">
                            <input type="text" name="" value="" id="year" placeholder="년">
                            <input type="text" name="" value="" id="month" placeholder="월">
                            <input type="text" name="" value="" id="day" placeholder="일">
                        </div>
                        <div class="sex-box">
                            <button type="button" name="button" id="men">남자</button>
                            <button type="button" name="button" id="women">여자</button>
                        </div>

                        <div class="text-box">
                            <p>가입 계약을 채결하시면 서비스 약관 및 개인 정보 보호 정책에 동의합니다.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-box">
                <div class="register-box-full">
                    <button type="button" name="button">회원가입</button>
                </div>
            </div>
        </div>
    </div>
@endsection