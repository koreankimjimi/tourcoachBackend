@extends('master')


@push('css')
<link rel="stylesheet" href="/css/FieldTourist.css">
<link rel="stylesheet" href="/css/footer.css">
@endpush

@section('content')
    <section id="p1" class="project-page page-card">
        <div class="page-name">
            <div class="project-header">
                <div class="project-more">
                    <img src="/img/RESOURCE/FieldTourist/ic_toursearch.png" alt="" id="long" draggable="false">
                </div>
            </div>
            <div class="project-side">
                나에게 맞는 맞춤 검색으로 여행지의 정보를 알려드립니다.
            </div>
            <div class="search-box">
                <form class="loaction-input search-input" action="/tour/searchResult" id="search">
                    <img src="/img/RESOURCE/FieldTourist/ic_airplane.png" alt="">
                    <input type="text" name="search" value="" placeholder="여행지명을 입력하세요" required>
                    <button id="searchBtn" style="display: none"></button>
                </form>
                {{--<div class="data-input search-input">--}}
                {{--<img src="/img/RESOURCE/FieldTourist/ic_category.png" alt="">--}}
                {{--<input type="text" name="" value="" placeholder="카테고리를 선택하세요">--}}
                {{--</div>--}}
                <div class="search-btn" onclick="document.getElementById('searchBtn').click()">
                    검&nbsp;&nbsp;&nbsp;&nbsp;색
                </div>
            </div>
        </div>
    </section>
    {{--<section id="p1" class="project-page page-card">--}}
        {{--<div class="page-name">--}}
            {{--<div class="project-header">--}}
                {{--<div class="project-more">--}}
                    {{--<img src="/img/RESOURCE/FieldTourist/ic_주변_여행지_검색.png" alt="" id="long" draggable="false">--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="project-side">--}}
                {{--나에게 맞는 맞춤 검색으로 여행지의 정보를 알려드립니다.--}}
            {{--</div>--}}
            {{--<div class="search-box">--}}
                {{--<div class="loaction-input search-input">--}}
                    {{--<img src="/img/RESOURCE/FieldTourist/ic_loaction.png" alt="">--}}
                    {{--<div class="">--}}
                        {{--시/도를 입력하세요--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="data-input search-input">--}}
                    {{--<img src="/img/RESOURCE/FieldTourist/ic_loaction.png" alt="">--}}
                    {{--<div class="">--}}
                        {{--시/군/구를 입력하세요--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="data-input search-input">--}}
                    {{--<img src="/img/RESOURCE/FieldTourist/ic_loaction.png" alt="">--}}
                    {{--<div class="">--}}
                        {{--읍/면을 입력하세요--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="data-input search-input">--}}
                    {{--<img src="/img/RESOURCE/FieldTourist/ic_category.png" alt="">--}}
                    {{--<div class="">--}}
                        {{--카테코리를 입려학세요--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="search-btn">--}}
                    {{--검색--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
    <section id="p2" class="project-page page-card">
        <div class="page-name">
            <div class="project-header">
                <div class="project-more">
                    <img src="/img/RESOURCE/FieldTourist/ic_famuas.png" alt="" id="long">
                </div>
                <div class="more-button" onclick="location.href = '/tour/category/topTour'">
                    더 알아보기
                </div>
            </div>
            <div class="project-side">
                추천 수가 가장 많이 누적된 여행지를 보여드립니다.
            </div>
        </div>
        <div class="btn_box">
            <div class="rightBtn1 rightBtn">
                <img src="/img/RESOURCE/FieldTourist/ic_right_arrow.png" class="rightBtn_Img">
            </div>
            <div class="leftBtn1 leftBtn">
                <img src="/img/RESOURCE/FieldTourist/ic_left_arrow.png" class="leftBtn_Img">
            </div>
            <div class="project">
                @foreach($tourDatas['topTour'] as $key => $data)
                @if($key == 0)
                <div class="project-box pb a">
                @endif
                @if($key != 0)
                <div class="project-box pb pb">
                @endif
                    <div class="project-card han {{$data->middle_cate}}">
                        <div class="null-box"></div>
                        <div class="project_bottom_explain">
                            <div class="project-title">
                                <div class="project-name">
                                    <a href="/tour/detail/{{$data->realId}}" title="{{$data->name}}">{{ mb_substr($data->name,0,7) }}</a>
                                </div>
                                <div class="project-subName">
                                    {{ $data->address }}
                                </div>
                            </div>
                            <div class="project-subtitle">
                                <div class="item">
                                    <img src="/img/RESOURCE/TravelInformation/ic_cardview_thumb_up_blue.png" alt="like" width="18px" height="18px">
                                    {{ $data->likeCnt }}
                                </div>
                                <div class="item">
                                    <img src="/img/RESOURCE/TravelInformation/ic_cardview_star_yellow.png" alt="like" width="18px" height="18px">
                                    {{ $data->reviewCnt }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>

        </div>
    </section>
    <section id="p3" class="project-page page-card">
        <div class="page-name">
            <div class="project-header">
                <div class="project-more">
                    <img src="/img/RESOURCE/FieldTourist/ic_최근_여행지.png" alt="" id="long">
                </div>
                <div class="more-button" onclick="location.href = '/tour/category/liveTour'">
                    더 알아보기
                </div>
            </div>
            <div class="project-side">
                사용자들이 최근 살펴본 여행지를 보여드립니다.
            </div>
        </div>
        <div class="btn_box">
            <div class="rightBtn2 rightBtn">
                <img src="/img/RESOURCE/FieldTourist/ic_right_arrow.png" class="rightBtn_Img">
            </div>
            <div class="leftBtn2 leftBtn">
                <img src="/img/RESOURCE/FieldTourist/ic_left_arrow.png" class="leftBtn_Img">
            </div>
            <div class="project">

                @foreach($tourDatas['liveTour'] as $key => $data)
                    @if($key == 0)
                        <div class="project-box pb b">
                            @endif
                            @if($key != 0)
                                <div class="project-box pb pb">
                                    @endif
                                    <div class="project-card han {{$data->middle_cate}}">
                                        <div class="null-box"></div>
                                        <div class="project_bottom_explain">
                                            <div class="project-title">
                                                <div class="project-name">
                                                    <a href="/tour/detail/{{$data->realId}}">{{ mb_substr($data->name,0,7) }}</a>
                                                </div>
                                                <div class="project-subName">
                                                    {{ $data->address }}
                                                </div>
                                            </div>
                                            <div class="project-subtitle">
                                                <div class="item">
                                                    <img src="/img/RESOURCE/TravelInformation/ic_cardview_thumb_up_blue.png" alt="like" width="18px" height="18px">
                                                    {{ $data->likeCnt }}
                                                </div>
                                                <div class="item">
                                                    <img src="/img/RESOURCE/TravelInformation/ic_cardview_star_yellow.png" alt="like" width="18px" height="18px">
                                                    {{ $data->reviewCnt }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

            </div>

        </div>
    </section>
    <section id="p3" class="project-page page-card">
        <div class="page-name">
            <div class="project-header">
                <div class="project-more">
                    <img src="/img/RESOURCE/FieldTourist/ic_건축.png" alt="" id="short">
                </div>
                <div class="more-button" onclick="location.href = '/tour/category/buildTour'">
                    더 알아보기
                </div>

            </div>
            <div class="project-side">
                지역마다 대표하는 랜드마크 여행지를 알려드립니다.
            </div>
        </div>
        <div class="btn_box">
            <div class="rightBtn3 rightBtn">
                <img src="/img/RESOURCE/FieldTourist/ic_right_arrow.png" class="rightBtn_Img">
            </div>
            <div class="leftBtn3 leftBtn">
                <img src="/img/RESOURCE/FieldTourist/ic_left_arrow.png" class="leftBtn_Img">
            </div>
            <div class="project">

                @foreach($tourDatas['buildTour'] as $key => $data)
                    @if($key == 0)
                        <div class="project-box pb c">
                            @endif
                            @if($key != 0)
                                <div class="project-box pb pb">
                                    @endif
                                    <div class="project-card han {{$data->middle_cate}}">
                                        <div class="null-box"></div>
                                        <div class="project_bottom_explain">
                                            <div class="project-title">
                                                <div class="project-name">
                                                    <a href="/tour/detail/{{$data->realId}}">{{ mb_substr($data->name,0,7) }}</a>
                                                </div>
                                                <div class="project-subName">
                                                    {{ $data->address }}
                                                </div>
                                            </div>
                                            <div class="project-subtitle">
                                                <div class="item">
                                                    <img src="/img/RESOURCE/TravelInformation/ic_cardview_thumb_up_blue.png" alt="like" width="18px" height="18px">
                                                    {{ $data->likeCnt }}
                                                </div>
                                                <div class="item">
                                                    <img src="/img/RESOURCE/TravelInformation/ic_cardview_star_yellow.png" alt="like" width="18px" height="18px">
                                                    {{ $data->reviewCnt }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

            </div>

        </div>
    </section>
    <section id="p4" class="project-page page-card">
        <div class="page-name">
            <div class="project-header">
                <div class="project-more">
                    <img src="/img/RESOURCE/FieldTourist/ic_문화.png" alt="" id="short">
                </div>
                <div class="more-button" onclick="location.href = '/tour/category/cultureTour'">
                    더 알아보기
                </div>
            </div>
            <div class="project-side">
                즐길 수 있는 문화시설 여행지를 알려드립니다.

            </div>
        </div>
        <div class="btn_box">
            <div class="rightBtn4 rightBtn">
                <img src="/img/RESOURCE/FieldTourist/ic_right_arrow.png" class="rightBtn_Img">
            </div>
            <div class="leftBtn4 leftBtn">
                <img src="/img/RESOURCE/FieldTourist/ic_left_arrow.png" class="leftBtn_Img">
            </div>
            <div class="project">

                @foreach($tourDatas['cultureTour'] as $key => $data)
                    @if($key == 0)
                        <div class="project-box pb d">
                            @endif
                            @if($key != 0)
                                <div class="project-box pb pb">
                                    @endif
                                    <div class="project-card han {{$data->middle_cate}}">
                                        <div class="null-box"></div>
                                        <div class="project_bottom_explain">
                                            <div class="project-title">
                                                <div class="project-name">
                                                    <a href="/tour/detail/{{$data->realId}}">{{ mb_substr($data->name,0,7) }}</a>
                                                </div>
                                                <div class="project-subName">
                                                    {{ $data->address }}
                                                </div>
                                            </div>
                                            <div class="project-subtitle">
                                                <div class="item">
                                                    <img src="/img/RESOURCE/TravelInformation/ic_cardview_thumb_up_blue.png" alt="like" width="18px" height="18px">
                                                    {{ $data->likeCnt }}
                                                </div>
                                                <div class="item">
                                                    <img src="/img/RESOURCE/TravelInformation/ic_cardview_star_yellow.png" alt="like" width="18px" height="18px">
                                                    {{ $data->reviewCnt }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

            </div>

        </div>
    </section>
    <section id="p5" class="project-page page-card">
        <div class="page-name">
            <div class="project-header">
                <div class="project-more">
                    <img src="/img/RESOURCE/FieldTourist/ic_자연.png" alt="" id="short">
                </div>
                <div class="more-button" onclick="location.href = '/tour/category/naturalTour'">
                    더 알아보기
                </div>

            </div>
            <div class="project-side">
                아름다운 자연과 관련된 여행지를 알려드립니다.
            </div>
        </div>
        <div class="btn_box">
            <div class="rightBtn5 rightBtn">
                <img src="/img/RESOURCE/FieldTourist/ic_right_arrow.png" class="rightBtn_Img">
            </div>
            <div class="leftBtn5 leftBtn">
                <img src="/img/RESOURCE/FieldTourist/ic_left_arrow.png" class="leftBtn_Img">
            </div>
            <div class="project">

                @foreach($tourDatas['naturalTour'] as $key => $data)
                    @if($key == 0)
                        <div class="project-box pb e">
                            @endif
                            @if($key != 0)
                                <div class="project-box pb pb">
                                    @endif
                                    <div class="project-card han {{$data->middle_cate}}">
                                        <div class="null-box"></div>
                                        <div class="project_bottom_explain">
                                            <div class="project-title">
                                                <div class="project-name">
                                                    <a href="/tour/detail/{{$data->realId}}">{{ mb_substr($data->name,0,7) }}</a>
                                                </div>
                                                <div class="project-subName">
                                                    {{ $data->address }}
                                                </div>
                                            </div>
                                            <div class="project-subtitle">
                                                <div class="item">
                                                    <img src="/img/RESOURCE/TravelInformation/ic_cardview_thumb_up_blue.png" alt="like" width="18px" height="18px">
                                                    {{ $data->likeCnt }}
                                                </div>
                                                <div class="item">
                                                    <img src="/img/RESOURCE/TravelInformation/ic_cardview_star_yellow.png" alt="like" width="18px" height="18px">
                                                    {{ $data->reviewCnt }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

            </div>

        </div>
    </section>
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