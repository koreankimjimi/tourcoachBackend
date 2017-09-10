@extends('master')

@push('css')
    <link rel="stylesheet" href="/css/TravelRecommendations.css">
@endpush

@section('content')
    <div class="container">
        <section class="head-title">
            <img src="/img/RESOURCE/TravelRecommendations/ic_tour_propose.png" alt="" draggable="false">
            <div>사용자에게 알맞는 여행지 추천 목록을 알려드립니다.</div>
        </section>

        @foreach($datas as $data)
        <section class="card twoCard" style="cursor: pointer" onclick="location.href = '/tour/detail/{{$data->id}}'">
            <div class="card-title">
                {{ $data->name }}
            </div>
            <div class="card-subTitle">

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
                            {{ $data->address }}
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
                            {{ $data->information or '번호 없음'}}
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
                            {{ $data->small_cate }}
                        </div>
                    </div>
                </div>
                <div class="card-right">
                    <iframe
                            id="detailGoogleMap"
                            width="500"
                            height="300"
                            style="border-radius: 5px;margin-left: 10px;"
                            frameborder="0" style="border:0"
                            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDqWBda5DAqcIJQIWAs6_kYjTPCLUd1Ejw
    &q={{ $data->address }}" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </section>

        </section>
        @endforeach
        {{--<section class="card twoCard">--}}
            {{--<div class="card-title">--}}
                {{--고성 통일전망대--}}
            {{--</div>--}}
            {{--<div class="card-subTitle">--}}
                {{--Goseong Unification Observatory--}}
            {{--</div>--}}
            {{--<div class="card-index">--}}
                {{--<div class="card-left">--}}
                    {{--<div class="card-loction card-info">--}}
                        {{--<div class="info-title">--}}
                            {{--<div class="title">--}}
                                {{--위치--}}
                            {{--</div>--}}
                            {{--<div class="subTitle">--}}
                                {{--Loction--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="info-index">--}}
                            {{--강원도 고성군 현내면 금강산로--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="card-number card-info">--}}
                        {{--<div class="info-title">--}}
                            {{--<div class="title">--}}
                                {{--전화번호--}}
                            {{--</div>--}}
                            {{--<div class="subTitle">--}}
                                {{--Number--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="info-index">--}}
                            {{--031-000-0000--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="card-time card-info">--}}
                        {{--<div class="info-title">--}}
                            {{--<div class="title">--}}
                                {{--이용시간--}}
                            {{--</div>--}}
                            {{--<div class="subTitle">--}}
                                {{--Utilization Time--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="info-index">--}}
                            {{--평일 09:00 ~  12 : 00--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="card-right">--}}
                    {{--<img src="img/RESOURCE/TravelRecommendations/bg_tower.png" alt="" draggable="false">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}
        {{--<section class="bottom-card twoCard">--}}
            {{--<div class="card-side side-left">--}}
                {{--<div class="star card-list">--}}
                    {{--<div class="card-title">--}}
                        {{--<div class="title">--}}
                            {{--좋아요--}}
                        {{--</div>--}}
                        {{--<div class="subTitle">--}}
                            {{--Like--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="index">--}}
                        {{--27개--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="Review card-list">--}}
                    {{--<div class="card-title">--}}
                        {{--<div class="title">--}}
                            {{--후기--}}
                        {{--</div>--}}
                        {{--<div class="subTitle">--}}
                            {{--Latter Part--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="index">--}}
                        {{--총 32개--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="card-side side-right">--}}
                {{--<div class="time card-list">--}}
                    {{--<div class="card-title">--}}
                        {{--<div class="title">--}}
                            {{--소요시간--}}
                        {{--</div>--}}
                        {{--<div class="subTitle">--}}
                            {{--Time Required--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="index">--}}
                        {{--약 2시간 30분--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="Weather card-list">--}}
                    {{--<div class="card-title">--}}
                        {{--<div class="title">--}}
                            {{--지역날씨--}}
                        {{--</div>--}}
                        {{--<div class="subTitle">--}}
                            {{--Regional Weather--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="index">--}}
                        {{--23C | 흐림--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</section>--}}
        {{--<section class="card threeCard">--}}
            {{--<div class="card-title">--}}
                {{--고성 통일전망대--}}
            {{--</div>--}}
            {{--<div class="card-subTitle">--}}
                {{--Goseong Unification Observatory--}}
            {{--</div>--}}
            {{--<div class="card-index">--}}
                {{--<div class="card-left">--}}
                    {{--<div class="card-loction card-info">--}}
                        {{--<div class="info-title">--}}
                            {{--<div class="title">--}}
                                {{--위치--}}
                            {{--</div>--}}
                            {{--<div class="subTitle">--}}
                                {{--Loction--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="info-index">--}}
                            {{--강원도 고성군 현내면 금강산로--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="card-number card-info">--}}
                        {{--<div class="info-title">--}}
                            {{--<div class="title">--}}
                                {{--전화번호--}}
                            {{--</div>--}}
                            {{--<div class="subTitle">--}}
                                {{--Number--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="info-index">--}}
                            {{--031-000-0000--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="card-time card-info">--}}
                        {{--<div class="info-title">--}}
                            {{--<div class="title">--}}
                                {{--이용시간--}}
                            {{--</div>--}}
                            {{--<div class="subTitle">--}}
                                {{--Utilization Time--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="info-index">--}}
                            {{--평일 09:00 ~  12 : 00--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="card-right">--}}
                    {{--<img src="img/RESOURCE/TravelRecommendations/bg_tower.png" alt="" draggable="false">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}
        {{--<section class="bottom-card threeCard">--}}
            {{--<div class="card-side side-left">--}}
                {{--<div class="star card-list">--}}
                    {{--<div class="card-title">--}}
                        {{--<div class="title">--}}
                            {{--좋아요--}}
                        {{--</div>--}}
                        {{--<div class="subTitle">--}}
                            {{--Like--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="index">--}}
                        {{--27개--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="Review card-list">--}}
                    {{--<div class="card-title">--}}
                        {{--<div class="title">--}}
                            {{--후기--}}
                        {{--</div>--}}
                        {{--<div class="subTitle">--}}
                            {{--Latter Part--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="index">--}}
                        {{--총 32개--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="card-side side-right">--}}
                {{--<div class="time card-list">--}}
                    {{--<div class="card-title">--}}
                        {{--<div class="title">--}}
                            {{--소요시간--}}
                        {{--</div>--}}
                        {{--<div class="subTitle">--}}
                            {{--Time Required--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="index">--}}
                        {{--약 2시간 30분--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="Weather card-list">--}}
                    {{--<div class="card-title">--}}
                        {{--<div class="title">--}}
                            {{--지역날씨--}}
                        {{--</div>--}}
                        {{--<div class="subTitle">--}}
                            {{--Regional Weather--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="index">--}}
                        {{--23C | 흐림--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</section>--}}
        {{--<section class="card normalCard">--}}
            {{--<div class="card-title">--}}
                {{--고성 통일전망대--}}
            {{--</div>--}}
            {{--<div class="card-subTitle">--}}
                {{--Goseong Unification Observatory--}}
            {{--</div>--}}
            {{--<div class="card-index">--}}
                {{--<div class="card-left">--}}
                    {{--<div class="card-loction card-info">--}}
                        {{--<div class="info-title">--}}
                            {{--<div class="title">--}}
                                {{--위치--}}
                            {{--</div>--}}
                            {{--<div class="subTitle">--}}
                                {{--Loction--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="info-index">--}}
                            {{--강원도 고성군 현내면 금강산로--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="card-number card-info">--}}
                        {{--<div class="info-title">--}}
                            {{--<div class="title">--}}
                                {{--전화번호--}}
                            {{--</div>--}}
                            {{--<div class="subTitle">--}}
                                {{--Number--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="info-index">--}}
                            {{--031-000-0000--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="card-time card-info">--}}
                        {{--<div class="info-title">--}}
                            {{--<div class="title">--}}
                                {{--이용시간--}}
                            {{--</div>--}}
                            {{--<div class="subTitle">--}}
                                {{--Utilization Time--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="info-index">--}}
                            {{--평일 09:00 ~  12 : 00--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="card-right">--}}
                    {{--<img src="img/RESOURCE/TravelRecommendations/bg_tower.png" alt="" draggable="false">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</section>--}}
        {{--<section class="bottom-card normalCard">--}}
            {{--<div class="card-side side-left">--}}
                {{--<div class="star card-list">--}}
                    {{--<div class="card-title">--}}
                        {{--<div class="title">--}}
                            {{--좋아요--}}
                        {{--</div>--}}
                        {{--<div class="subTitle">--}}
                            {{--Like--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="index">--}}
                        {{--27개--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="Review card-list">--}}
                    {{--<div class="card-title">--}}
                        {{--<div class="title">--}}
                            {{--후기--}}
                        {{--</div>--}}
                        {{--<div class="subTitle">--}}
                            {{--Latter Part--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="index">--}}
                        {{--총 32개--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="card-side side-right">--}}
                {{--<div class="time card-list">--}}
                    {{--<div class="card-title">--}}
                        {{--<div class="title">--}}
                            {{--소요시간--}}
                        {{--</div>--}}
                        {{--<div class="subTitle">--}}
                            {{--Time Required--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="index">--}}
                        {{--약 2시간 30분--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="Weather card-list">--}}
                    {{--<div class="card-title">--}}
                        {{--<div class="title">--}}
                            {{--지역날씨--}}
                        {{--</div>--}}
                        {{--<div class="subTitle">--}}
                            {{--Regional Weather--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="index">--}}
                        {{--23C | 흐림--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</section>--}}

    </div>

    <footer>
    </footer>
@endsection