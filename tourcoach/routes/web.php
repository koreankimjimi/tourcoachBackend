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
Route::get('/tour/details','TourController@details')->name('tourDetailsView');
// 여행지 추천 뷰
Route::get('/tour/propose','TourController@propose')->name('tourProposeView');
// 추천 결과값 요청 ajax
Route::put('/tour/coach','TourController@coachAjax')->name('tourcoachAjax');


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
// 회원정보 수정 뷰
Route::get('/user/modify','UserController@modify')->name('userModifyView');
// 회원정보 처리
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
Route::get('/test/test','TestController@test')->name('TestPost');
Route::get('/t','TestController@t')->name('T');

// 개인정보보호 URL
Route::get('/userPrivate',function(){
    return view('userPrivate');
});


//\DB::listen(function($sql) {
//    var_dump($sql);
//});