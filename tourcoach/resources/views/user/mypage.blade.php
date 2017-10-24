@extends('master')

@push('css')
<link rel="stylesheet" href="/css/myPage.css">
<link rel="stylesheet" href="/css/footer.css">
@endpush
@push('js')
{{--<script src="/js/myPage.js"></script>--}}
<script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>
<script type='text/javascript'>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //<![CDATA[
    // 사용할 앱의 JavaScript 키를 설정해 주세요.
    Kakao.init('36fc8efc43445022fdd021f246d39ce1');
    // 카카오 로그인 버튼을 생성합니다.
    Kakao.Auth.createLoginButton({
        container: '#kakao-login-btn',
        success: function(authObj) {
            var data = authObj;
            var accessToken = data.access_token;
            var refreshToken = data.refresh_token;
            var userId = $("#userId").val();



            $.post("/user/kakaoToken",{"access_token" : accessToken , "refresh_token" : refreshToken , "userId" : userId},function(){
                location.href = "/user/mypage";
            });
            

        },
        fail: function(err) {
            alert(JSON.stringify(err));
        }
    });
    //]]>
</script>
@endpush

@section('content')
    <input type="hidden" value="{{session()->get('loginData')->id}}" id="userId">
    <div class="containor">
        <section class="account">
            <div class="google-box account-box google-abled">
                <img src="/img/RESOURCE/Mypage/ic_goolge_abled.png" alt="" draggable="false">
                <div class="account-title">
                    구글 계정연결 <span>활성화</span>
                </div>
                <div class="account-reset">
                    계정 연결 비활성화는 <a href="#">여기</a>를 클릭해 주세요
                </div>
            </div>
            {{--<div class="account-box google-disabled">--}}
                {{--<img src="/img/RESOURCE/Mypage/ic_goolge_abled.png" alt="" draggable="false">--}}
                {{--<div class="account-title">--}}
                    {{--구글 계정으로 연결하기--}}
                {{--</div>--}}
            {{--</div>--}}
            @if( isset($kakaoToken) )
            <div class="kakao-box account-box">
                <img src="/img/RESOURCE/Mypage/ic_kakao_활성화.png" alt="" draggable="false" >
                <div class="account-title">
                    카카오 계정연결 <span>활성화</span>
                </div>
                <div class="account-reset">
                    계정 연결 비활성화는 <a href="#">여기</a>를 클릭해 주세요
                </div>
            </div>
            @endif
            @if( !isset($kakaoToken) )
            <div class="account-box kakao-disabled" id="kakao-login-btn">
                <img src="/img/RESOURCE/Mypage/ic_kakao_비활성화.png" alt="" draggable="false">
                <div class="account-title">

                </div>
            </div>
            @endif
            <div class="fb-box account-box">
                <img src="/img/RESOURCE/Mypage/ic_facebook_활성화.png" alt="" draggable="false">
                <div class="account-title">
                    페이스북 계정연결 <span>활성화</span>
                </div>
                <div class="account-reset">
                    계정 연결 비활성화는 <a href="#">여기</a>를 클릭해 주세요
                </div>
            </div>
            {{--<div class="account-box fb-disabled">--}}
                {{--<img src="/img/RESOURCE/Mypage/ic_facebook_비활성화.png" alt="" draggable="false">--}}
                {{--<div class="account-title">--}}
                    {{--페이스북 계정으로 연결하기--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="nugu-box account-box" style="display: none">
                <img src="/img/RESOURCE/Mypage/ic_facebook_활성화.png" alt="" draggable="false">
                <div class="account-title">
                    페이스북 계정연결 <span>활성화</span>
                </div>
                <div class="account-reset">
                    계정 연결 비활성화는 <a href="#">여기</a>를 클릭해 주세요
                </div>
            </div>
            <div class="account-box nugu-box">
                <img src="/img/RESOURCE/Mypage/ic_nugu_활성화.png" alt="" draggable="false" style="margin-bottom: 30px;">
                <div class="account-title">
                    누구 디바이스연결 <span>활성화</span>
                </div>
                <div class="account-reset">
                    디바이스 연결 비활성화는 <a href="#">여기</a>를 클릭해 주세요
                </div>
            </div>
        </section>
        <section id="attract" class="attract">
            <div class="recom-box attract-box">
                <div class="recom-header attract-header">
                    <div class="header-title">
                        최근 추천 받은 여행지
                    </div>
                </div>
                <div class="recom-index attract-index">
                    @foreach($proposeDatas as $data)
                        <li>
                            <div class="list-number">
                                {{ $data->realId }}
                            </div>
                            <div class="list-name" style="cursor: pointer" onclick="location.href = '/tour/detail/{{ $data->id }}'" title="{{ $data->name }}">
                                {{ mb_substr($data->name,0,7) }}
                                @if( mb_strlen($data->name) > 7)
                                    ...
                                @endif

                            </div>
                            <div class="list-locate">
                                {{ $data->address }}
                            </div>
                            <div class="list-right">

                            </div>
                            <div class="list-thumb list-review">
                                <img src="/img/RESOURCE/Mypage/ic_thumb_up.png" alt="">
                                <div class="thumb-cnt review-cnt">
                                    {{ $data->likeCnt }}
                                </div>
                            </div>
                            <div class="list-star list-review">
                                <img src="/img/RESOURCE/Mypage/ic_star.png" alt="">
                                <div class="star-cnt review-cnt">
                                    {{ $data->reviewCnt }}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </div>
            </div>
            <div class="infor-box attract-box">
                <div class="attract-header">
                    <div class="header-title">
                        최근 정보 받은 여행지
                    </div>
                </div>
                <div class="recom-index attract-index">
                    @foreach($coachDatas as $data)
                    <li>
                        <div class="list-number">
                            {{ $data->realId }}
                        </div>
                        <div class="list-name" style="cursor: pointer" onclick="location.href = '/tour/detail/{{ $data->id }}'" title="{{ $data->name }}">
                            {{ mb_substr($data->name,0,7) }}
                            @if( mb_strlen($data->name) > 7)
                                ...
                            @endif
                        </div>
                        <div class="list-locate">
                            {{ $data->address }}
                        </div>
                        <div class="list-right">

                        </div>
                        <div class="list-thumb list-review">
                            <img src="/img/RESOURCE/Mypage/ic_thumb_up.png" alt="">
                            <div class="thumb-cnt review-cnt">
                                {{ $data->likeCnt }}
                            </div>
                        </div>
                        <div class="list-star list-review">
                            <img src="/img/RESOURCE/Mypage/ic_star.png" alt="">
                            <div class="star-cnt review-cnt">
                                {{ $data->reviewCnt }}
                            </div>
                        </div>
                    </li>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
    <footer>
              <div class="footer-logo">
                <img src="/img/RESOURCE/CategoryResult/ic_tour_coach.png" alt="">
              </div>
              <div class="footer-index">
                ©2017 CIRCLE TOURCOACH ALL RIGHT RESERVED. </br>
                26. JONG-RO, JONGNO-GU, SEOUL</br>
                SKT Smarteen App Challenge 2017
              </div>
              <div class="footer-icon">
                <img src="/img/RESOURCE/CategoryResult/ic_skt.png" alt="">
              </div>
            </footer>
@endsection