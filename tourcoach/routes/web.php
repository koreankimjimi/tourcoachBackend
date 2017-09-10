<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// @TourController
// 메인 뷰
Route::get('/','TourController@index')->name('mainPage');
// 실시간 여행지 뷰
Route::get('/tour/live','TourController@liveList')->name('tourLiveListView');
// 여행지 자세히보기 뷰
Route::get('/tour/detail/{no}','TourController@detail')->name('tourDetailView');
// 여행지 추천 뷰
Route::get('/tour/propose','TourController@propose')->name('tourProposeView');
// 추천 결과값 요청 ajax
Route::put('/tour/coach','TourController@coachAjax')->name('tourcoachAjax');
// 카테고리 뷰
Route::get("/tour/cateSearch","TourController@cateSearch")->name('tourcateSearch');
// 후기
Route::post("/tour/letterWrite/{tourId}","TourController@letterWrite")->name("tourLetterWrite");
// 좋아요
Route::post("/tour/productLike","TourController@productLike")->name("tourProductLike");
// 여행지 정보 카카오톡으로 보내기
Route::post("/tour/sendKakao/{no}","TourController@sendKakao")->name("tourSendKakao");
// 리뷰 가져오기
Route::post("/tour/getReview","TourController@getReview")->name("tourGetReview");

// @UserController
// 로그인 뷰
Route::get('/user/login','UserController@login')->name('userLoginView');
// 로그인 처리
Route::post('/user/login','UserController@login')->name('userLogin');
// 회원가입 뷰
Route::get('/user/join','UserController@join')->name('userJoinView');
// 회원가입
Route::post('/user/join','UserController@join')->name('userJoin');
//로그아웃
Route::get('/user/logout','UserController@logout')->name('userLogoutView');
// 마이페이지 뷰
Route::get('/user/mypage','UserController@mypage')->name('userMypageView');
// 회원정보 뷰
Route::get('/user/impormation','UserController@impormation')->name('userimpormationView');
// 회원정보 수정 뷰
Route::get('/user/modify/{kinds}','UserController@modify')->name('userModifyView');
// 회원정보 수정  처리
Route::post('/user/modify/{kinds}','UserController@modifyProcess')->name('userModify');
// 이메일 인증
Route::post('/user/emailCheck','UserController@emailCheck')->name('emailCheck');
// 아이디 찾기 뷰
Route::get('/user/foundId','UserController@foundId')->name('foundIdView');
// 아이디 찾기
Route::post('/user/foundId','UserController@foundId')->name('foundId');
// 비밀번호 찾기 뷰
Route::get('/user/foundPass','UserController@foundPass')->name('foundPassView');
// 비밀번호 찾기
Route::post('/user/foundPass','UserController@foundPass')->name('foundPass');



// test
Route::get('/test','TestController@index')->name('Test');
//test2
Route::get('/test/test2','TestController@test2')->name('Test2');
Route::get('/test/send','TestController@send')->name('send');
Route::get('/test/test','TestController@test')->name('TestPost');
Route::get('/t','TestController@t')->name('T');

// 개인정보보호 URL
Route::get('/userPrivate',function(){
    return view('userPrivate');
});


//\DB::listen(function($sql) {
//    var_dump($sql);
//});