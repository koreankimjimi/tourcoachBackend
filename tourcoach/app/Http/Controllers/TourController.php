<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tourdata as TourDataModel;


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

    // 여행지 자세히
    public function details(Request $req){
        if($req->has('location')){
            
            return view('tour.details');
        }else{
            return view('error');
        }

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

        $tourDatas = TourDataModel::where('name', 'like', '%'.$location.'%')->first();

        if($tourDatas){
            $returnData = array('success' => 'true' , 'tourdata' => $tourDatas);
        }else {
            $returnData = array('success' => 'false'  , 'msg' => '해당 여행지에대한 정보가 없습니다.');
        }

        return response()->json($returnData);

    }


   


}
