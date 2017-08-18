@extends('master')

@section('content')
    @if($errors->any())
        <h2>에러 리스트</h2>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <h2>아이디 찾기</h2>
    <form action="/user/foundId" method="post">
        {{ csrf_field() }}
        <input type="text" name="username" value="{{ old('username') }}">
        <input type="text" name="useremail" value="{{ old('useremail') }}">
        <button type="submit">submit</button>
    </form>
@endsection