<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="/js/jquery-1.11.1.js"></script>
    <title>TourCoach</title>

    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/main.css">
    @stack('css')

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
    <meta name="theme-color" content="#f2a73e">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <meta name="author" content="STAC Dev.">
    <meta name="title" content="TOURCO COACH :: Ai Customized travel recommendation service!">
    <meta name="description" content="2017 STAC AI 부분 출품작">
    <meta name="keywords" content="STAC, 여행지, AI, 여행추천, 인공지능, 스택, 갈만한곳, 여행">

    <meta property="og:title" content="TOURCO COACH :: Ai Customized travel recommendation service!">
    <meta property="og:type" content="website">
    <meta property="og:image" content="/img/favicon/favicon.ico">
    <!-- 서버 : 유닛에 따라 경로 변경 -->
    <meta property="og:site_name" content="EDCAN">
    <meta property="og:url" content="http://127.0.0.1">
    <meta property="og:description" content="2017 STAC AI 부분 출품작">

    <meta charset="utf-8">
    
    <link rel="image_src" href="/img/favicon/favicon.ico">
    <link rel="shortcut icon" href="/img/favicon/favicon.ico">
    <link rel="apple-touch-icon" href="/img/favicon/favicon.ico">
</head>
<body>
<header>
    <div class="header-icon">
        <img src="/img/RESOURCE/Main/ic_airplane.png" alt="logo">
    </div>
    <div class="header-logo">
        <img src="/img/RESOURCE/Main/ic_tour_coach.png" alt="logo">
    </div>
    <div class="null-box">
        <!-- 기둥뒤에 공간있어요 -->
    </div>
    <nav>
        <div class="nav-box">
            분야별 여행지
        </div>
        <div class="nav-box">
            마이페이지
        </div>
        <div class="nav-box">
            로그인
        </div>
    </nav>
</header>



    {{-- 유동 섹션 --}}
    @yield('content')
</body>
</html>