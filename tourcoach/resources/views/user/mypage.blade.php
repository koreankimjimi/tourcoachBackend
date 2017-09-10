@extends('master')

@push('css')
<link rel="stylesheet" href="/css/myPage.css">
@endpush
@push('js')
<script src="/js/myPage.js"></script>
@endpush

@section('content')

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
            <div class="account-box google-disabled">
                <img src="/img/RESOURCE/Mypage/ic_goolge_abled.png" alt="" draggable="false">
                <div class="account-title">
                    구글 계정으로 연결하기
                </div>
            </div>
            <div class="kakao-box account-box">
                <img src="/img/RESOURCE/Mypage/ic_kakao_활성화.png" alt="" draggable="false">
                <div class="account-title">
                    카카오 계정연결 <span>활성화</span>
                </div>
                <div class="account-reset">
                    계정 연결 비활성화는 <a href="#">여기</a>를 클릭해 주세요
                </div>
            </div>
            <div class="account-box kakao-disabled">
                <img src="/img/RESOURCE/Mypage/ic_kakao_비활성화.png" alt="" draggable="false">
                <div class="account-title">
                    카카오 계정으로 연결하기
                </div>
            </div>
            <div class="fb-box account-box">
                <img src="/img/RESOURCE/Mypage/ic_facebook_활성화.png" alt="" draggable="false">
                <div class="account-title">
                    페이스북 계정연결 <span>활성화</span>
                </div>
                <div class="account-reset">
                    계정 연결 비활성화는 <a href="#">여기</a>를 클릭해 주세요
                </div>
            </div>
            <div class="account-box fb-disabled">
                <img src="/img/RESOURCE/Mypage/ic_facebook_비활성화.png" alt="" draggable="false">
                <div class="account-title">
                    페이스북 계정으로 연결하기
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
                            <div class="list-name" style="cursor: pointer" onclick="location.href = '/tour/detail/{{ $data->id }}'">
                                {{ $data->name }}
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
                        <div class="list-name" style="cursor: pointer" onclick="location.href = '/tour/detail/{{ $data->id }}'">
                            {{ $data->name }}
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
    <footer></footer>
@endsection