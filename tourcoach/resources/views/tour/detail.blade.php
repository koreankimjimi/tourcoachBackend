@extends('master')


@push('css')
<link rel="stylesheet" href="/css/TravelInformation.css">
<link rel="stylesheet" href="/css/footer.css">
<link rel="stylesheet" href="/css/TravelRecommendations.css">
<link rel="stylesheet" href="/css/FieldTourist.css">
<style>
    body{
        overflow-x: hidden;
    }
    #writeBtn{
        width: 80px;
        height:80px;
        background: #fff;
        border-radius: 50%;
        box-shadow: 1px 1px 10px #333;
        position: fixed;
        bottom: 20px;
        right:20px;
        cursor: pointer;
        padding: 25px;
        box-sizing: border-box;
        font-weight: bold;
    }
</style>
@endpush

@section('content')
    <div class="container">
        <div class="info-box travel-box">
            <div class="title-box">
                <div class="main-title">
                    <img src="/img/RESOURCE/TravelInformation/ic_TravelInformation.png" alt="" draggable="false">
                </div>
                <div class="sub-title">
                    해당 여행지에 대한 정보를 자세히 알려드립니다.
                </div>
            </div>
            <section class="card normalCard main-card">
                <div class="card-title">
                    {{ $tourData->name}}
                </div>
                <div class="card-subTitle">
                    {{--Goseong Unification Observatory--}}
                </div>
                <div class="card-index">
                    <div class="card-left">
                        <div class="card-loction card-info">
                            <div class="info-title">
                                <div class="title">
                                    위치
                                </div>
                                <div class="subTitle">
                                    Loction
                                </div>
                            </div>
                            <div class="info-index">

                                {{ $tourData->address  }}
                            </div>
                        </div>
                        <div class="card-number card-info">
                            <div class="info-title">
                                <div class="title">
                                    전화번호
                                </div>
                                <div class="subTitle">
                                    Number
                                </div>
                            </div>
                            <div class="info-index">

                                {{ $tourData->information or '번호 없음'}}
                            </div>
                        </div>
                        <div class="card-time card-info">
                            <div class="info-title">
                                <div class="title">
                                    분류
                                </div>
                                <div class="subTitle">
                                    Category
                                </div>
                            </div>
                            <div class="info-index">
                                {{ $tourData->small_cate }}
                            </div>
                        </div>
                    </div>
                    <div class="card-right">
                        {{--<img src="/img/RESOURCE/TravelRecommendations/bg_tower.png" alt="" draggable="false">--}}
                        <iframe
                                width="500"
                                height="300"
                                style="border-radius: 5px;margin-left: 10px;"
                                frameborder="0" style="border:0"
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDqWBda5DAqcIJQIWAs6_kYjTPCLUd1Ejw
    &q={{ $tourData->address }}" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            </section>
            <section class="bottom-card normalCard">
                <div class="card-side side-left">
                    <div class="star card-list">
                        <div class="card-title">
                            <div class="title">
                                좋아요
                            </div>
                            <div class="subTitle">
                                Like
                            </div>
                        </div>
                        <div class="index">
                            0개
                        </div>
                    </div>
                    <div class="Review card-list">
                        <div class="card-title">
                            <div class="title">
                                후기
                            </div>
                            <div class="subTitle">
                                Latter Part
                            </div>

                        </div>
                        <div class="index">
                            총 0개
                        </div>
                    </div>
                </div>
                <div class="card-side side-right">
                    <div class="time card-list">
                        <div class="card-title">
                            <div class="title">
                                소요시간
                            </div>
                            <div class="subTitle">
                                Time Required
                            </div>

                        </div>
                        <div class="index">
                            약 2시간 30분
                        </div>
                    </div>
                    <div class="Weather card-list">
                        <div class="card-title">
                            <div class="title">
                                지역날씨
                            </div>
                            <div class="subTitle">
                                Regional Weather
                            </div>

                        </div>
                        <div class="index">
                            {{ $weatherData['weather'] }}C | {{ $weatherData['sky'] }}
                        </div>
                    </div>
                </div>

            </section>
            <section class="social">
                <div class="kakao social-box">
                    <img src="/img/RESOURCE/TravelInformation/ic_kakao.png" alt="" draggable="false">
                    <div class="social-text">
                        카카오톡으로 내보내기
                    </div>
                </div>
                <div class="fb social-box">
                    <img src="/img/RESOURCE/TravelInformation/ic_facebook.png" alt="" draggable="false">
                    <div class="social-text">
                        페이스북으로 내보내기
                    </div>
                </div>
            </section>
        </div>
        <div class="review-box travel-box">
            <div class="title-box">
                <div class="main-title">
                    <img src="/img/RESOURCE/TravelInformation/ic_여행지_후기.png" alt="" draggable="false">
                </div>
                <div class="sub-title">
                    해당 여행지에 다녀온 후기들을 살펴보실 수 있습니다.
                </div>
            </div>
            <section id="review" class="review-section">
                <div class="review-list">
                    <div class="review-title">
                        홍길동
                    </div>
                    <div class="review-sub">
                        <div class="review-date">
                            2017년 07월 28일
                        </div>
                        <div class="review-star">

                        </div>
                    </div>
                    <div class="review-index">
                        아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말
                        아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말아무말
                    </div>
                </div>
            </section>
        </div>


    </div>
    <div class="fit-box travel-box-side project-page page-card main-page-card" id="p2">
        <div class="title-box">
            <div class="main-title">
                <img src="/img/RESOURCE/TravelInformation/ic_맞춤_여행지.png" alt="" draggable="false">
            </div>
            <div class="sub-title">
                비슷한 여행지의 목록을 알려드립니다.
            </div>
        </div>
        <div class="btn_box">
            <div class="rightBtn">
                <img src="/img/RESOURCE/FieldTourist/ic_right_arrow.png" class="rightBtn_Img" draggable="false">
            </div>
            <div class="leftBtn">
                <img src="/img/RESOURCE/FieldTourist/ic_left_arrow.png" class="leftBtn_Img" draggable="false">
            </div>
            <div class="project">
                <div class="project-box pb ts">
                    <div class="project-card han">
                        <div class="null-box"></div>
                        <div class="project_bottom_explain">
                            <div class="project-title">
                                <div class="project-name">
                                    서울타워
                                </div>
                                <div class="project-subName">
                                    서울시 용산구 남산공원길 105
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="project-box pb">
                    <div class="project-card re">
                        <div class="null-box"></div>
                        <div class="project_bottom_explain">
                            <div class="project-title">
                                <div class="project-name">
                                    서울타워
                                </div>
                                <div class="project-subName">
                                    서울시 용산구 남산공원길 105
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="project-box pb">
                    <div class="project-card tras">
                        <div class="null-box"></div>
                        <div class="project_bottom_explain">
                            <div class="project-title">
                                <div class="project-name">
                                    서울타워
                                </div>
                                <div class="project-subName">
                                    서울시 용산구 남산공원길 105
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="project-box pb">
                    <div class="project-card ba">
                        <div class="null-box"></div>
                        <div class="project_bottom_explain">
                            <div class="project-title">
                                <div class="project-name">
                                    서울타워
                                </div>
                                <div class="project-subName">
                                    서울시 용산구 남산공원길 105
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="project-box pb">
                    <div class="project-card sr">
                        <div class="null-box"></div>
                        <div class="project_bottom_explain">
                            <div class="project-title">
                                <div class="project-name">
                                    서울타워
                                </div>
                                <div class="project-subName">
                                    서울시 용산구 남산공원길 105
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="project-box pb">
                    <div class="project-card alpha">
                        <div class="null-box"></div>
                        <div class="project_bottom_explain">
                            <div class="project-title">
                                <div class="project-name">
                                    서울타워
                                </div>
                                <div class="project-subName">
                                    서울시 용산구 남산공원길 105
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <footer>
        <div class="footer-icon">
            <img src="/img/RESOURCE/Main/ic_airplane.png" alt="" draggable="false">
        </div>
        <div class="footer-logo">
            <img src="/img/RESOURCE/Main/ic_tour_coach.png" alt="" draggable="false">
        </div>
        <div class="null-box">
            <!-- 기둥뒤에 공간있어요 -->
        </div>
        <div class="sk-logo">
            <img src="" alt="">
        </div>
    </footer>
    <nav id="writeBtn">
        <span>후기</span>
    </nav>

@endsection