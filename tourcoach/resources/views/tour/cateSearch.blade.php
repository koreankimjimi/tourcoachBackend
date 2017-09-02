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
                    <img src="/img/RESOURCE/FieldTourist/ic_여행지_검색.png" alt="" id="long" draggable="false">
                </div>
            </div>
            <div class="project-side">
                나에게 맞는 맞춤 검색으로 여행지의 정보를 알려드립니다.
            </div>
            <div class="search-box">
                <div class="loaction-input search-input">
                    <img src="/img/RESOURCE/FieldTourist/ic_airplane.png" alt="">
                    <input type="text" name="" value="" placeholder="여행지명을 입력하세요">
                </div>
                <div class="data-input search-input">
                    <img src="/img/RESOURCE/FieldTourist/ic_category.png" alt="">
                    <input type="text" name="" value="" placeholder="카테고리를 선택하세요">
                </div>
                <div class="search-btn">
                    검색
                </div>
            </div>
        </div>
    </section>
    <section id="p1" class="project-page page-card">
        <div class="page-name">
            <div class="project-header">
                <div class="project-more">
                    <img src="/img/RESOURCE/FieldTourist/ic_주변_여행지_검색.png" alt="" id="long" draggable="false">
                </div>
            </div>
            <div class="project-side">
                나에게 맞는 맞춤 검색으로 여행지의 정보를 알려드립니다.
            </div>
            <div class="search-box">
                <div class="loaction-input search-input">
                    <img src="/img/RESOURCE/FieldTourist/ic_loaction.png" alt="">
                    <div class="">
                        시/도를 입력하세요
                    </div>
                </div>
                <div class="data-input search-input">
                    <img src="/img/RESOURCE/FieldTourist/ic_loaction.png" alt="">
                    <div class="">
                        시/군/구를 입력하세요
                    </div>
                </div>
                <div class="data-input search-input">
                    <img src="/img/RESOURCE/FieldTourist/ic_loaction.png" alt="">
                    <div class="">
                        읍/면을 입력하세요
                    </div>
                </div>
                <div class="data-input search-input">
                    <img src="/img/RESOURCE/FieldTourist/ic_category.png" alt="">
                    <div class="">
                        카테코리를 입려학세요
                    </div>
                </div>
                <div class="search-btn">
                    검색
                </div>
            </div>
        </div>
    </section>
    <section id="p2" class="project-page page-card">
        <div class="page-name">
            <div class="project-header">
                <div class="project-more">
                    <img src="/img/RESOURCE/FieldTourist/ic_인기_여행지.png" alt="" id="long">
                </div>
                <div class="more-button">
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
                <div class="project-box pb a">
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
    </section>
    <section id="p3" class="project-page page-card">
        <div class="page-name">
            <div class="project-header">
                <div class="project-more">
                    <img src="/img/RESOURCE/FieldTourist/ic_최근_여행지.png" alt="" id="long">
                </div>
                <div class="more-button">
                    더 알아보기
                </div>
            </div>
            <div class="project-side">
                최근동안 살펴본 여행지를 보여드립니다.
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
                <div class="project-box pb b">
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
    </section>
    <section id="p3" class="project-page page-card">
        <div class="page-name">
            <div class="project-header">
                <div class="project-more">
                    <img src="/img/RESOURCE/FieldTourist/ic_건축.png" alt="" id="short">
                </div>
                <div class="more-button">
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
                <div class="project-box pb c">
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
    </section>
    <section id="p4" class="project-page page-card">
        <div class="page-name">
            <div class="project-header">
                <div class="project-more">
                    <img src="/img/RESOURCE/FieldTourist/ic_문화.png" alt="" id="short">
                </div>
                <div class="more-button">
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
                <div class="project-box pb d">
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
    </section>
    <section id="p5" class="project-page page-card">
        <div class="page-name">
            <div class="project-header">
                <div class="project-more">
                    <img src="/img/RESOURCE/FieldTourist/ic_자연.png" alt="" id="short">
                </div>
                <div class="more-button">
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
                <div class="project-box pb e">
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
    </section>
    <footer>
        <div class="footer-icon">
            <img src="/img/RESOURCE/Main/ic_airplane.png" alt="">
        </div>
        <div class="footer-logo">
            <img src="/img/RESOURCE/Main/ic_tour_coach.png" alt="">
        </div>
        <div class="null-box">
            <!-- 기둥뒤에 공간있어요 -->
        </div>
        <div class="sk-logo">
            <img src="" alt="">
        </div>
    </footer>
@endsection