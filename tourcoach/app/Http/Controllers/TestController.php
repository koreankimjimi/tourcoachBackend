<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tourdata as TourDataModel;
use App\KakaoToken as KakaoaModel;
use App\Http\Controllers\TourController as TourController;
use Illuminate\Support\Facades\DB;
use App\ProductViewCount as ViewCountModel;
use App\ProductProposeCount as ProposeCountModel;
use App\NeedTourList as NeedTourListModel;

class TestController extends Controller
{
    private $token = "rlawlals";

    public function index(Request $req){

//        //dump($req);
//        $token = $req->input("hub_verify_token");
//
//        $hub = $req->input("hub_challenge");
//
////        ob_start();
////        var_dump($hub);
////        $result = ob_get_clean();
////        \File::put(storage_path()."/text.txt", $result);
//
//        return response($hub, 200);

        return view('test.index');
    }

    public function send(){
        $answer = $_GET['id'];
        $type = $_GET['type'];
        echo "{\"msg\":\"$answer\",\"type\":\"$type\"}";
    }


    // 코치
    public function test(){

//        test$to      = 'kimppangs@gmail.com';
//        $subject = '테스트';
//        $message = rand();
//        $headers = 'From: 투어코치 <no-reply@tourcoach.co.kr>' . "\r\n" .
//            'Reply-To: no-reply@tourcoach.co.kr' . "\r\n" .
//            'X-Mailer: PHP/' . phpversion();
//
//        mail($to, $subject, $message, $headers);
        // 여행지명

            $token = KakaoaModel::where('userId' , '=' , '6')->first();

            $name = $_GET['location'];
            // 여행지 데이터 가져오는 쿼리
            $sql = "SELECT A.id as realId , A.area as area ,A.village as village , A.city as city , A.address as address , A.name as name  FROM 
                    tourdatas as A 
                    LEFT JOIN 
                    BestTour2016 as B
                    ON A.address = B.location
                    WHERE A.name LIKE '%".$name."%'
                    ORDER BY B.name DESC
                    LIMIT 0,1";

            $tourData = DB::select( DB::raw($sql));
//            dd($tourData);

            if( !isset($tourData[0]) ) {
                NeedTourListModel::create(array('tourName' => $name , 'date' => date("Y-m-d H:i:s")));
                return false;
                exit;
            }
            $tourData = $tourData[0];
            $weather =  TourController::weatherCheck($tourData->realId,$tourData->village,$tourData->city);
        // 현재 날씨
        $nowWeather = $weather['weather'];
        // 현재 하늘
        $nowSky = $weather['sky'];
        // 주소
        $location = is_null($tourData->address) ? $tourData->area." ".$tourData->city." ".$tourData->village : $tourData->address;
        // 타이틀
        $title = $tourData->name." ".round($nowWeather)."°C/ ".$nowSky;

        $data = "template_object={
          \"object_type\": \"location\",
          \"content\": {
            \"title\": \"$title\",
            \"description\": \"$location\",
            \"image_url\": \"https://tourcoach.co.kr/img/favicon/favicon.png\",
            \"link\": {
              \"web_url\": \"https://tourcoach.co.kr/tour/detail/$tourData->realId\",
              \"mobile_web_url\": \"https://tourcoach.co.kr/tour/detail/$tourData->realId\",
              \"android_execution_params\": \"platform=android\",
              \"ios_execution_params\": \"platform=ios\"
            }
          },
          \"buttons\": [
            {
              \"title\": \"웹으로 보기\",
              \"link\": {
                \"web_url\": \"https://tourcoach.co.kr/tour/detail/$tourData->realId\",
                \"mobile_web_url\": \"https://tourcoach.co.kr/tour/detail/$tourData->realId\"
              }
            }
          ],
          \"address\": \"$location\",
          \"address_title\": \"$tourData->name\"
        }";


        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://kapi.kakao.com/v2/api/talk/memo/default/send',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$token->accessToken,
            ),
            CURLOPT_POSTFIELDS => $data
//            CURLOPT_POSTFIELDS => $data
        ));
        // Send the request & save response to $resp
        $resp = json_decode(curl_exec($curl));
        // Close request to clear up some resources
        curl_close($curl);

        // 카카오톡 인증코드 재인증
        if( isset($resp->code) ){

            $data2 = 'grant_type=refresh_token&client_id=5ec50e2b770cb96c54982616ede557ad&refresh_token='.$token->refreshToken;
            $curl = curl_init();
            // Set some options - we are passing in a useragent too here
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'https://kauth.kakao.com/oauth/token',
                CURLOPT_USERAGENT => 'Codular Sample cURL Request',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/x-www-form-urlencoded'
                ),
                CURLOPT_POSTFIELDS => $data2
//            CURLOPT_POSTFIELDS => $data
            ));
            // Send the request & save response to $resp
            $resp = json_decode(curl_exec($curl));
            // Close request to clear up some resources
            curl_close($curl);
            $token->accessToken = $resp->access_token;
            $token->save();

            // 다시 추천하기 메시지 전송
            $curl = curl_init();
            // Set some options - we are passing in a useragent too here
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'https://kapi.kakao.com/v2/api/talk/memo/default/send',
                CURLOPT_USERAGENT => 'Codular Sample cURL Request',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer '.$resp->access_token,
                ),
                CURLOPT_POSTFIELDS => $data
//            CURLOPT_POSTFIELDS => $data
            ));
            // Send the request & save response to $resp

            // Close request to clear up some resources
            curl_close($curl);

        }

            ViewCountModel::create(array('userId' => '6' , 'productId' => $tourData->realId , 'date' => date("Y-m-d H:i:s")));
            $msg = $name."는 ".$tourData->area." ".$tourData->city." ".$tourData->village." 에 위치하며 현재 ".$name."의 날씨는 ".$weather['weather']."도 하늘은 ".$weather['sky']."입니다. 자세한 내용은 메신저로 전송하였습니다.";
            echo "{\"id\":\"$tourData->realId\",\"name\":\"$name\",\"msg\":\"$msg\"}";

    }

    // 추천
    public function test2(){
        $location = $_GET['location'];
        switch($location){
            case "충남":
                $location = "충청남도";
                break;
            case "충북":
                $location = "충청북도";
                break;
            case "전남":
                $location = "전라남도";
                break;
            case "전북":
                $location = "전라북도";
                break;
        }
         $sql = "SELECT DISTINCT(B.id) ,A.name , B.name as realName, B.address , B.big_cate , B.middle_cate ".
                "FROM BestTour2016 AS A ".
                "RIGHT JOIN (SELECT * ".
                "FROM tourdatas as A ".
                "LEFT JOIN ".
                "(SELECT tourId , COUNT(*) as cnt from product_likes GROUP BY tourId) as B ".
                "ON A.id = B.tourId ".
                "ORDER BY cnt DESC) as B ".
                "ON A.location = B.address ".
                "WHERE B.area LIKE \"%$location%\" or B.city LIKE \"%$location%\" or B.village LIKE \"%$location%\" ".
                "ORDER BY A.name DESC ".
                "LIMIT 0,5";
        $tourData = DB::select( DB::raw($sql) );
//        dd($data);
//        dump($data);

        // 타이틀
        $title = [$tourData[0]->realName,$tourData[1]->realName,$tourData[2]->realName];
        // 카테고리
        $cate = [$tourData[0]->middle_cate , $tourData[1]->middle_cate , $tourData[2]->middle_cate];
        // 고유 넘버값
        $id = [$tourData[0]->id , $tourData[1]->id , $tourData[2]->id];
        // 카카오 토큰
        $token = KakaoaModel::where('userId', '=' , '6')->first();


        // 카카오톡메시지 전송 형식
        $data = "template_object= {
  \"object_type\": \"list\",
  \"header_title\": \"$location 추천 결과\",
  \"header_link\": {
    \"web_url\": \"https://tourcoach.co.kr\",
    \"mobile_web_url\": \"https://tourcoach.co.kr\",
    \"android_execution_params\": \"main\",
    \"ios_execution_params\": \"main\"
  },
  \"contents\": [
    {
      \"title\": \"$title[0]\",
      \"description\": \"$cate[0]\",
      \"image_url\": \"https://tourcoach.co.kr/img/RESOURCE/FieldTourist/bg_tower.png\",
      \"image_width\": 640,
      \"image_height\": 640,
      \"link\": {
        \"web_url\": \"https://tourcoach.co.kr/tour/detail/$id[0]\",
        \"mobile_web_url\": \"https://tourcoach.co.kr/tour/detail/$id[0]\",
        \"android_execution_params\": \"/contents/1\",
        \"ios_execution_params\": \"/contents/1\"
      }
    },
    {
      \"title\": \"$title[1]\",
      \"description\": \"$cate[1]\",
      \"image_url\": \"https://tourcoach.co.kr/img/RESOURCE/FieldTourist/bg_tower.png\",
      \"image_width\": 640,
      \"image_height\": 640,
      \"link\": {
        \"web_url\": \"https://tourcoach.co.kr/tour/detail/$id[1]\",
        \"mobile_web_url\": \"https://tourcoach.co.kr/tour/detail/$id[1]\",
        \"android_execution_params\": \"/contents/2\",
        \"ios_execution_params\": \"/contents/2\"
      }
    },
    {
      \"title\": \"$title[2]\",
      \"description\": \"$cate[2]\",
      \"image_url\": \"https://tourcoach.co.kr/img/RESOURCE/FieldTourist/bg_tower.png\",
      \"image_width\": 640,
      \"image_height\": 640,
      \"link\": {
        \"web_url\": \"https://tourcoach.co.kr/tour/detail/$id[2]\",
        \"mobile_web_url\": \"https://tourcoach.co.kr/tour/detail/$id[2]\",
        \"android_execution_params\": \"/contents/3\",
        \"ios_execution_params\": \"/contents/3\"
      }
    }
  ],
  \"buttons\": [
    {
      \"title\": \"웹으로 보기\",
      \"link\": {
        \"web_url\": \"https://tourcoach.co.kr/tour/propose?location=$location\",
        \"mobile_web_url\": \"https://tourcoach.co.kr/tour/propose?location=$location\"
      }
    }
  ]
}";
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://kapi.kakao.com/v2/api/talk/memo/default/send',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer '.$token->accessToken,
            ),
            CURLOPT_POSTFIELDS => $data
//            CURLOPT_POSTFIELDS => $data
        ));
        // Send the request & save response to $resp
        $resp = json_decode(curl_exec($curl));
        // Close request to clear up some resources
        curl_close($curl);


        // 카카오톡 인증코드 재인증
        if( isset($resp->code) ){


            $data2 = 'grant_type=refresh_token&client_id=5ec50e2b770cb96c54982616ede557ad&refresh_token='.$token->refreshToken;
            $curl = curl_init();
            // Set some options - we are passing in a useragent too here
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'https://kauth.kakao.com/oauth/token',
                CURLOPT_USERAGENT => 'Codular Sample cURL Request',
                CURLOPT_HTTPHEADER => array(
                    'Content-Type: application/x-www-form-urlencoded'
                ),
                CURLOPT_POSTFIELDS => $data2
//            CURLOPT_POSTFIELDS => $data
            ));
            // Send the request & save response to $resp
            $resp = json_decode(curl_exec($curl));
            // Close request to clear up some resources
            curl_close($curl);
            $token->accessToken = $resp->access_token;
            $token->save();

            // 다시 추천하기 메시지 전송
            $curl = curl_init();
            // Set some options - we are passing in a useragent too here
            curl_setopt_array($curl, array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => 'https://kapi.kakao.com/v2/api/talk/memo/default/send',
                CURLOPT_USERAGENT => 'Codular Sample cURL Request',
                CURLOPT_HTTPHEADER => array(
                    'Authorization: Bearer '.$resp->access_token,
                ),
                CURLOPT_POSTFIELDS => $data
//            CURLOPT_POSTFIELDS => $data
            ));
            // Send the request & save response to $resp

            // Close request to clear up some resources
            curl_close($curl);

        }
//        dd($tourData);
        $insertData = array(
            array('userId' => '6' , 'tourId' => $tourData[0]->id , 'date' => date("Y-m-d H:i:s")),
            array('userId' => '6' , 'tourId' => $tourData[1]->id , 'date' => date("Y-m-d H:i:s")),
            array('userId' => '6' , 'tourId' => $tourData[2]->id , 'date' => date("Y-m-d H:i:s"))
        );
        ProposeCountModel::insert($insertData);
        $msg = $tourData[0]->name . " , ". $tourData[1]->name ." , ". $tourData[2]->name ."를 추천드립니다 자세한 내용은 메신저로 전송하였습니다.";
        echo "{\"msg\" : \"$msg\"}";
    }

    public function t(){

        $data = 'grant_type=refresh_token&client_id=5ec50e2b770cb96c54982616ede557ad&refresh_token=OLX77E1PeRr8e09ckhzttItVzEGPObbJk2-AnQopdgcAAAFeX0Ei-A';
        $curl = curl_init();
        // Set some options - we are passing in a useragent too here
        curl_setopt_array($curl, array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://kauth.kakao.com/oauth/token',
            CURLOPT_USERAGENT => 'Codular Sample cURL Request',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: application/x-www-form-urlencoded'
            ),
            CURLOPT_POSTFIELDS => $data
//            CURLOPT_POSTFIELDS => $data
        ));
        // Send the request & save response to $resp
        $resp = curl_exec($curl);
        // Close request to clear up some resources
        curl_close($curl);
        echo $resp;

//        Content-type: application/x-www-form-urlencoded;charset=UTF-8
    }
    private function chu($data){

    }

    private function coach($data){

    }
    private function date($data){
        
    }
}
