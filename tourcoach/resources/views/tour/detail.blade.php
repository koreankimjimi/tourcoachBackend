@extends('master')

@push('js')

    <script>
        window.onload = function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


        }

    </script>
    <script src="/js/detail.js"></script>
@endpush

@push('css')
<link rel="stylesheet" href="/css/TravelInformation.css">
<link rel="stylesheet" href="/css/footer.css">
<link rel="stylesheet" href="/css/TravelRecommendations.css">
<link rel="stylesheet" href="/css/FieldTourist.css">

<style>
    body{
        overflow-x: hidden;
    }
    .review-list{
        margin-bottom: 30px;
    }
    .input-box {
        margin-bottom: 1.6rem;
        width: 100%;
        display: flex;
        align-items: center;
        border-bottom: 1px solid lightgray;
        padding-bottom: 0.8rem;
    }
    .input-title{
        font-size: 9pt;
        width:60px;
        display: block;
        color:#5a5a5a;
    }
    .input-box input{
        border: none;
        outline: none;
        width: 100%;
        height: 1.1rem;
        font-size: 12pt;
        padding-bottom: 0.4rem;
    }
    #likeBtn{
        width: 80px;
        height:80px;
        background: #fff;
        color: #333;
        border-radius: 50%;
        box-shadow: 1px 1px 10px #555;
        position: fixed;
        bottom: 20px;
        right:20px;
        cursor: pointer;
        padding: 30px 25px;
        box-sizing: border-box;
        font-weight: bold;
        background-image: url('/img/RESOURCE/TravelInformation/like.png');
        background-repeat: no-repeat;
        background-position: 50%;
        background-size: 50% 50%;
    }

    /*#ReviewPopup{*/
        /*width:100%;*/
        /*height:100%;*/
        /*background-color: rgba(0,0,0,0.8);*/
        /*position: fixed;*/
        /*top:0;*/
        /*left:0;*/
    /*}*/
    /*#ReviewPopup > div{*/
        /*width: 400px;*/
        /*height:auto;*/
        /*padding: 50px 0;*/
        /*background-color: #eee;*/
        /*margin: 0 auto;*/
        /*position: relative;*/
        /*top:50%;*/
        /*transform: translateY(-50%);*/
        /*border-radius: 10px;*/
        /*box-shadow: 1px 1px 10px #333;*/
    /*}*/
</style>
@endpush

@section('content')
    @if(session()->has('loginData'))
        @if($like)
        <nav id="likeBtn" data="{{ $tourData->id }}"></nav>
        @endif
    @endif
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
                                id="detailGoogleMap"
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
                            {{ $likeCount }}개
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
                            총 {{ $reviewCount }}개
                        </div>
                    </div>
                </div>
                <div class="card-side side-right">
                    <div class="time card-list">
                        <div class="card-title">
                            <div class="title">
                                현재 날씨
                            </div>
                            <div class="subTitle">
                                Now Sky
                            </div>

                        </div>
                        <div class="index">
                            {{ $weatherData['sky'] }}
                        </div>
                    </div>
                    <div class="Weather card-list">
                        <div class="card-title">
                            <div class="title">
                                현재 온도
                            </div>
                            <div class="subTitle">
                                Now Temperature
                            </div>

                        </div>
                        <div class="index">
                            {{ $weatherData['weather'] }}°C
                        </div>
                    </div>
                </div>

            </section>
            @if(session()->has('loginData'))
            <section class="social">
                <div class="kakao social-box" style="width: 100%;cursor: pointer;" onclick="sendKakao({{ $tourData->id }})">
                    <img src="/img/RESOURCE/TravelInformation/ic_kakao.png" alt="" draggable="false">
                    <div class="social-text">
                        카카오톡으로 내보내기
                    </div>
                </div>
                {{--<div class="fb social-box">--}}
                    {{--<img src="/img/RESOURCE/TravelInformation/ic_facebook.png" alt="" draggable="false">--}}
                    {{--<div class="social-text">--}}
                        {{--페이스북으로 내보내기--}}
                    {{--</div>--}}
                {{--</div>--}}
            </section>
            @endif
        </div>
        <div class="review-box travel-box">
            <div class="title-box">
                <div class="main-title">
                    <img src="/img/RESOURCE/TravelInformation/ic_review.png" alt="" draggable="false">
                </div>
                <div class="sub-title">
                    해당 여행지에 다녀온 후기들을 살펴보실 수 있습니다.
                </div>
            </div>
            <section id="review" class="review-section" style="padding-bottom: 60px;">
                @foreach($reviews as $review)
                <div class="review-list">
                    <div class="review-title">
                        {{ $review->userName }}
                    </div>
                    <div class="review-sub">
                        <div class="review-date">
                            {{ $review->date }}
                        </div>
                        <div class="review-star">

                        </div>
                    </div>
                    <div class="review-index">
                        {{ $review->content }}
                    </div>
                </div>
                @endforeach
                @if(session()->has('loginData'))
                <div class="review-list input-box">
                    <div class="input-title">리뷰 작성</div>
                    <form action="/tour/letterWrite/{{$tourData->id}}" method="post" style="width: 100%">
                        {{ csrf_field() }}
                        <input type="text" name="content" required>

                        <button id="reviewSubmit" type="submit" style="display: none"></button>
                    </form>

                </div>
                <button onclick="document.getElementById('reviewSubmit').click();" style="float:right;width: 80px;height: 40px;border: none;outline: none;cursor: pointer;    background-color: #2d3b55;color: white;cursor: pointer;">작성</button>
                @endif
                <button data="{{ $tourData->id }}" class="reviewMoreBtn" style="margin-right:10px;float:right;width: 80px;height: 40px;border: none;outline: none;cursor: pointer;    background-color: #2d3b55;color: white;cursor: pointer;">더보기</button>
            </section>
            <section id="reviewPop" class="review-section" style="overflow-y:scroll;padding-bottom: 60px;background-color:#fff;position: fixed;width: 80%;height: 90%;top: 50%;left: 50%;transform: translate(-50%,-50%);display: none">

                    {{--<div class="review-list">--}}
                        {{--<div class="review-title">--}}
                            {{--이름--}}
                        {{--</div>--}}
                        {{--<div class="review-sub">--}}
                            {{--<div class="review-date">--}}
                                {{--날짜--}}
                            {{--</div>--}}

                        {{--</div>--}}
                        {{--<div class="review-index">--}}
                            {{--내용--}}
                        {{--</div>--}}
                    {{--</div>--}}


                <button id="reviewCloseBtn"  style="margin-left:10px;float:right;width: 80px;height: 40px;border: none;outline: none;cursor: pointer;    background-color: #2d3b55;color: white;cursor: pointer;">닫기</button>
                <button data="{{ $tourData->id }}" class="reviewMoreBtn" style="float:right;width: 80px;height: 40px;border: none;outline: none;cursor: pointer;    background-color: #2d3b55;color: white;cursor: pointer;">더 불러오기</button>
            </section>
        </div>


    </div>
    <div class="fit-box travel-box-side project-page page-card main-page-card" id="p2">
        <div class="title-box">
            <div class="main-title">
                <img src="/img/RESOURCE/TravelInformation/ic_goodTour.png" alt="" draggable="false">
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

                @foreach($userTourDatas as $data)
                <div class="project-box pb ts">
                    <div class="project-card han">
                        <div class="null-box"></div>
                        <div class="project_bottom_explain">
                            <div class="project-title">
                                <div class="project-name">
                                    <a style="color: #fff;text-decoration: none" href="/tour/detail/{{ $data->id }}">{{ $data->realName }}</a>
                                </div>
                                <div class="project-subName">
                                    {{ $data->address or '주소없음' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{--<div class="project-box pb">--}}
                    {{--<div class="project-card re">--}}
                        {{--<div class="null-box"></div>--}}
                        {{--<div class="project_bottom_explain">--}}
                            {{--<div class="project-title">--}}
                                {{--<div class="project-name">--}}
                                    {{--서울타워--}}
                                {{--</div>--}}
                                {{--<div class="project-subName">--}}
                                    {{--서울시 용산구 남산공원길 105--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="project-box pb">--}}
                    {{--<div class="project-card tras">--}}
                        {{--<div class="null-box"></div>--}}
                        {{--<div class="project_bottom_explain">--}}
                            {{--<div class="project-title">--}}
                                {{--<div class="project-name">--}}
                                    {{--서울타워--}}
                                {{--</div>--}}
                                {{--<div class="project-subName">--}}
                                    {{--서울시 용산구 남산공원길 105--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="project-box pb">--}}
                    {{--<div class="project-card ba">--}}
                        {{--<div class="null-box"></div>--}}
                        {{--<div class="project_bottom_explain">--}}
                            {{--<div class="project-title">--}}
                                {{--<div class="project-name">--}}
                                    {{--서울타워--}}
                                {{--</div>--}}
                                {{--<div class="project-subName">--}}
                                    {{--서울시 용산구 남산공원길 105--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="project-box pb">--}}
                    {{--<div class="project-card sr">--}}
                        {{--<div class="null-box"></div>--}}
                        {{--<div class="project_bottom_explain">--}}
                            {{--<div class="project-title">--}}
                                {{--<div class="project-name">--}}
                                    {{--서울타워--}}
                                {{--</div>--}}
                                {{--<div class="project-subName">--}}
                                    {{--서울시 용산구 남산공원길 105--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="project-box pb">--}}
                    {{--<div class="project-card alpha">--}}
                        {{--<div class="null-box"></div>--}}
                        {{--<div class="project_bottom_explain">--}}
                            {{--<div class="project-title">--}}
                                {{--<div class="project-name">--}}
                                    {{--서울타워--}}
                                {{--</div>--}}
                                {{--<div class="project-subName">--}}
                                    {{--서울시 용산구 남산공원길 105--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

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


@endsection