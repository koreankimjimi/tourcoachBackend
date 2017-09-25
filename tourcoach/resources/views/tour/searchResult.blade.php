@extends('master')


@push('css')
<link rel="stylesheet" href="/css/FieldTourist.css">
<link rel="stylesheet" href="/css/footer.css">
<style>
    .project-name > a{
        color: #fff;
    }
    html{
        overflow-x: hidden;
    }
</style>
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
                <form class="loaction-input search-input" id="search">
                    <img src="/img/RESOURCE/FieldTourist/ic_airplane.png" alt="">
                    <input type="text" name="search" value="" placeholder="여행지명을 입력하세요" required>
                    <button id="searchBtn" style="display: none"></button>
                </form>
                {{--<div class="data-input search-input">--}}
                {{--<img src="/img/RESOURCE/FieldTourist/ic_category.png" alt="">--}}
                {{--<input type="text" name="" value="" placeholder="카테고리를 선택하세요">--}}
                {{--</div>--}}
                <div class="search-btn" onclick="document.getElementById('searchBtn').click()">
                    검색
                </div>
            </div>
        </div>
    </section>
    <section id="p2" class="project-page page-card">
        <div class="page-name">
            <div class="project-header">
                <div class="project-more">
                    <img src="/img/RESOURCE/FieldTourist/ic_famuas.png" alt="" id="long">
                </div>

            </div>
            <div class="project-side">
                검색하신 결과입니다.
            </div>
        </div>
        <div class="btn_box">

            <div class="project" style="flex-wrap: wrap;justify-content: space-around;">
                @if( count($tourDatas) == 0)
                    검색 결과 없음
                @endif
                @foreach($tourDatas as $key => $data)

                                <div class="project-box pb pb" style="margin: 1em 0">
                                    <div class="project-card han {{$data->middle_cate}}">
                                        <div class="null-box"></div>
                                        <div class="project_bottom_explain">
                                            <div class="project-title">
                                                <div class="project-name">
                                                    <a href="/tour/detail/{{$data->id}}" title="{{$data->name}}">{{ mb_substr($data->name,0,7) }}</a>
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