<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tourdata as TourDataModel;
use App\LiveCoachList as LiveCoachListModel;
use App\TourWeather as TourWeatherModel;
use App\Locale as LocaleModel;
use App\Review as ReviewModel;

class TourController extends Controller
{
    // 메인 페이지
    public function index(Request $req){


        return view('tour.index');
    }

    // 실시간 여행지
    public function liveList(){
        return view('tour.live');
    }


    // 디비 날씨 체크하고 최신날짜 업데이트
    static function weatherCheck($id,$village,$city){

        // 5분전 날짜
        $date = date("Y-m-d H:i:s",strtotime("-5 minutes")) ;
        $weatherData = TourWeatherModel::where('tourId' , '=' , $id)->orderBy('date','desc')->first();
        // 결과값
        $result = null;

        if ( $weatherData['date'] < $date ){

            $locationData = LocaleModel::where([ ['name' , 'LIKE' ,'%'.$village.'%' ] , ['name' , 'LIKE' , '%'.$city.'%'] ])->first();

            if( !$locationData ) return false;

            // 위도 경도
            $lat = $locationData['lat'];
            $lon = $locationData['lng'];

            // 날씨 데이터 가져옴
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'http://apis.skplanetx.com/weather/current/minutely?lon='.$lon.'&village=&cellAWS=&lat='.$lat.'&country=&city=&version=1',
                CURLOPT_HTTPHEADER => array(
                    'appKey: 5d4f31bc-6b5c-3c8d-9715-2672fb5f2e6a'
                )
            ));
            $resp = json_decode(curl_exec($curl));

            curl_close($curl);
//            print_r($resp);
            $updateWeather = $resp->weather->minutely[0]->temperature->tc;

            $updateSky = $resp->weather->minutely[0]->sky->name;
            TourWeatherModel::create(array('tourId' => $id , 'weather' => $updateWeather , 'date' => date("Y-m-d H:i:s") , 'sky' => $updateSky));

            $result = array('weather' => $updateWeather , 'sky' => $updateSky);

        } else {

            $result = array('weather' => $weatherData['weather'] , 'sky' => $weatherData['sky']);
        }

        return $result;
    }

    // 여행지 자세히
    public function detail(Request $req , $no){
            $tourData = TourDataModel::where('id', '=', $no)->first();


            // 실시간 날씨
            $weather = $this->weatherCheck($tourData->id,$tourData->vilage,$tourData->city);

            return view('tour.detail',['tourData' => $tourData,'weatherData' => $weather]);
    }

    // 여행지 추천
    public function propose(Request $req){
        // 날짜
        $date = $req->input("date");
        // 장소
        $location = $req->input("location");
        // 여행지 추천 리스트
        $dataList = $this->getTravelPropose($date , $location);
        die($date."<br>".$location);
        return view('tour.propose');
    }

    // 여행지 추천 받아오기
     private function getTravelPropose($date , $location){
        // 여행지 추천 리스트 5개 받아오는 코드...
    }

    // 여행지 코치 결과값 ajax
    public function coachAjax(Request $req){
//        $date = $req->input('date');
        $location = $req->input('location');

        $returnData = null;

        // 이름 연관성 높은것을 찾는다.
        $tourDatas = TourDataModel::where('name', 'like', '%'.$location.'%')->first();

        if($tourDatas){
            // 유저 no
            $userId = isset( $req->session()->get('loginData')->id ) ? $req->session()->get('loginData')->id : null;

            $returnData = array('success' => 'true' , 'tourdata' => $tourDatas);
            $livecoacj= LiveCoachListModel::create(array('userId' => $userId , 'tourId' => $tourDatas->id, 'date' => date("Y-m-d H:i:s")));
        }else {
            $returnData = array('success' => 'false'  , 'msg' => '해당 여행지에대한 정보가 없습니다.');
        }

        return response()->json($returnData);

    }


    // 카테고리 , 검색 뷰
    public function cateSearch(Request $req){


        return view("tour.cateSearch");
    }


    // 좋아요
   public function productLike(){
        
   }

    // 후기
    public function letterWrite(Request $req){

        if( !isset($req->session()->get('loginData')->id) ){
            return false;
        }

       $userId = $req->session()->get('loginData')->id;
       $content = $req->input('content');
       $tourId = $req->input('tourId');

        ReviewModel::create(array('userId' =>  $userId, 'content' => $content , 'date' => date("Y-m-d H:i:s") , 'productId' => $tourId));

        return true;
   }


}
