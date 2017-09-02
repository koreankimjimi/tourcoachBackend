@extends('master')

@push('css')
<link rel="stylesheet" href="/css/myPage.css">
@endpush

@section('content')

    <div class="containor">
        <section class="account">
            <div class="google-box account-box">
                <img src="/img/RESOURCE/Mypage/ic_goolge_활성화.png" alt="" draggable="false">
                <div class="account-title">
                    구글 계정으로 연결하기
                </div>
            </div>
            <div class="kakao-box account-box">
                <img src="/img/RESOURCE/Mypage/ic_kakao_활성화.png" alt="" draggable="false">
                <div class="account-title">
                    카카오 계정으로 연결하기
                </div>
            </div>
            <div class="fb-box account-box">
                <img src="/img/RESOURCE/Mypage/ic_facebook_활성화.png" alt="" draggable="false">
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
                    <li>
                        <div class="list-number">
                            00481
                        </div>
                        <div class="list-name">
                            남이섬
                        </div>
                        <div class="list-locate">
                            강원도 춘천시 남산면 남이섬길
                        </div>
                        <div class="list-star">

                        </div>
                    </li>
                </div>
            </div>
            <div class="infor-box attract-box">
                <div class="attract-header">
                    <div class="header-title">
                        최근 정보 받은 여행지
                    </div>
                </div>
                <div class="recom-index attract-index">
                    <li>
                        <div class="list-number">
                            00481
                        </div>
                        <div class="list-name">
                            남이섬
                        </div>
                        <div class="list-locate">
                            강원도 춘천시 남산면 남이섬길
                        </div>
                        <div class="list-star">

                        </div>
                    </li>
                </div>
            </div>
        </section>
    </div>
    <footer></footer>
@endsection