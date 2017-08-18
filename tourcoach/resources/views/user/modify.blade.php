@extends('master')

@section('content')
    <span>회원정보 수정</span>

    <form action="/user/modify/userpass" method="post">
        <input type="text" name="userpass">
    </form>
@endsection