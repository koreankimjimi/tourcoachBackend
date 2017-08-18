@extends('master')

@section('content')
    <h2>비밀번호 찾기</h2>
    @if($errors->any())
        <h2>에러 리스트</h2>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <form method="post">
        {{ csrf_field() }}
        <input type="text" name="userid" value="{{ old('userid') }}">
        <input type="text" name="useremail" value="{{ old('useremail') }}">
        <select name="passquestion" value="{{ old('passquestion') }}">
            <option value="0">옛날 고향은?</option>
            <option value="1">어머니 성함은?</option>
            <option value="2">아버지 성함은?</option>
        </select>
        <input type="text" name="passanswer" value="{{ old('passanswer') }}">
        <button type="submit">submit</button>
    </form>
@endsection