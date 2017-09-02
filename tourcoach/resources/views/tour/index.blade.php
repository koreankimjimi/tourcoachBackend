@extends('master')

@push('css')
<link rel="stylesheet" href="/css/main.css">
@endpush

@section('content')
    <div class="container">
        <div class="chat-box">
            <div class="chat-list me">
                <div class="chat-inline">
                    <div class="chat-index">
                        2017 8월 15일에 강원도 속초 놀러갈껀데 추천좀 해줘
                    </div>
                </div>
            </div>
            <div class="chat-list-box opp">
                <div class="chat-inline">
                    <div class="chat-index">
                        <div class="project-card han">
                            <div class="project-top-box">
                                <div class="weather-box">
                                    <img src="img/RESOURCE/Main/ic_cloud.png" alt="">
                                    <div class="weather-text">
                                        맑음
                                    </div>
                                </div>
                            </div>
                            <div class="project-mid-box">
                                <img src="img/RESOURCE/Main/ic_left_arrow.png" alt="">
                                <img src="img/RESOURCE/Main/ic_right_arrow.png" alt="">
                            </div>
                            <div class="project_bottom_explain">
                                <div class="project-title">
                                    <div class="project-name">
                                        서울타워
                                    </div>
                                    <div class="project-subName">
                                        서울시 용산구 남산공원길 105
                                    </div>
                                </div>
                                <div class="project-btn">
                                    <div class="more-btn side-btn">
                                        상세보기
                                    </div>
                                    <div class="map-btn side-btn">
                                        길찾기
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="chat-list opp">
                <div class="chat-inline">
                    <div class="chat-index">
                        강원도 속초의 추천 목록입니다. 더 살펴보시려면 <a href="#">여기</a>를 클릭해주세요
                    </div>
                </div>
            </div>
            <div class="chat-list opp">
                <div class="chat-inline">
                    <div class="chat-index">
                        강원도 속초의 추천 목록입니다. 더 살펴보시려면 <a href="#">여기</a>를 클릭해주세요
                    </div>
                </div>
            </div>

        </div>
        <div class="chat-input-item">
            <div class="mic">
                <img src="img/RESOURCE/Main/ic_voice.png" alt="voice" draggable="false">
            </div>
            <div class="key">
                <img src="img/RESOURCE/Main/ic_keyboard.png" alt="keyboard" draggable="false">
            </div>
        </div>
        <div class="chat-locate-box">
            <div class="input-city input-box">
                <img src="img/RESOURCE/Main/ic_loaction.png" alt="">
                <div class="input-text">
                    시/도를 선택하세요
                </div>
            </div>
            <div class="input-town input-box">
                <img src="img/RESOURCE/Main/ic_loaction.png" alt="">
                <div class="input-text">
                    시/군/구를 선택하세요
                </div>
            </div>
            <div class="input-village input-box">
                <img src="img/RESOURCE/Main/ic_loaction.png" alt="">
                <div class="input-text">
                    읍/면을 선택해주세요
                </div>
            </div>
        </div>
    </div>

    <div class="chat-block-mid">
        <div class="mid-icon-box">
            <div class="mid-icon">
                <img src="img/RESOURCE/Main/ic_yellow.png" alt="" draggable="false">
            </div>
            <div class="mid-icon">
                <img src="img/RESOURCE/Main/ic_red.png" alt="" draggable="false">
            </div>
            <div class="mid-icon">
                <img src="img/RESOURCE/Main/ic_purple.png" alt="" draggable="false">
            </div>
            <div class="mid-icon">
                <img src="img/RESOURCE/Main/ic_blue.png" alt="" draggable="false">
            </div>
            <div class="mid-icon">
                <img src="img/RESOURCE/Main/ic_green.png" alt="" draggable="false">
            </div>
        </div>
    </div>

@endsection