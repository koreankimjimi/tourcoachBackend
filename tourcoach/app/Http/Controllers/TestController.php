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


    // 날씨
    public function weather(Request $req){
        $location = $req->input('location');

        $tourData = TourDataModel::where("name" , "LIKE" , "%".$location."%")->first();

        $weather =  TourController::weatherCheck($tourData->id,$tourData->village,$tourData->city);

        $nowWeather = $weather['weather'];
        $nowSky = $weather['sky'];

        echo "{\"weather\":\"$nowWeather\",\"sky\":\"$nowSky\"}";
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
            $sql = "SELECT A.id as realId , A.imgUrl , A.area as area ,A.village as village , A.city as city , A.address as address , A.name as name  FROM 
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
            $msg = $name."는 ".$tourData->area." ".$tourData->city." ".$tourData->village." 에 위치하며 현재 ".$name."의 날씨는 ".$weather['weather']."도 하늘은 ".$weather['sky']."입니다. 자세한 내용은 메신저로 전송하였습니다. ";

            if(strpos($weather['sky'], "비") !== false) {
                $msg .= "비가오니 우산은 꼭챙기시기 바랍니다";
            }

            $imgUrl = json_decode($tourData->imgUrl)[0];
            echo "{\"id\":\"$tourData->realId\",\"name\":\"$name\",\"msg\":\"$msg\",\"location\":\"$tourData->address\",\"img\":\"$imgUrl\"}";

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
            case "충청도":
                $location = "충청북도";
                break;
            case "전라도":
                $location = "전라북도";
                break;
        }


        /*
         * SQL QUERY**
         * SELECT DISTINCT(B.id) ,A.name , B.name as realName, B.address , B.big_cate , B.middle_cate
            FROM BestTour2016 AS A
            RIGHT JOIN
            (SELECT * FROM tourdatas as A
             LEFT JOIN
             ( SELECT tourId , COUNT(*) as cnt from product_likes GROUP BY tourId) as B
            ON A.id = B.tourId
            ORDER BY cnt DESC) as B
            ON A.location = B.address
            WHERE B.area LIKE "%성남%" or B.city LIKE "%성남%" or B.village LIKE "%성남%"
         * */
$sql = "SELECT B.id, 
       B.NAME AS realName, 
       B.address, 
       B.big_cate, 
       B.middle_cate, 
       B.cnt,
       B.imgUrl,
        
       CASE B.middle_cate 
         WHEN '건축/조형물' THEN 'construct' 
         WHEN '문화시설' THEN 'culture' 
         WHEN '산업관광지' THEN 'industry' 
         WHEN '역사관광지' THEN 'history' 
         WHEN '체험관광지' THEN 'experience' 
         WHEN '관광자원' THEN 'tourism' 
         WHEN '휴향관광지' THEN 'recreation' 
         WHEN '섬' THEN 'island' 
         WHEN '자연관광지' THEN 'nature' 
         ELSE 'construct' 
       END    AS middle_cate_back 
FROM   (SELECT * 
        FROM   tourdatas AS A 
               LEFT JOIN (SELECT tourid, 
                                 Count(*) AS cnt 
                          FROM   product_likes 
                          GROUP  BY tourid) AS B 
                      ON A.id = B.tourid 
        ORDER  BY cnt DESC) AS B 
WHERE  B.area LIKE '%".$location."%' 
        OR B.city LIKE '%".$location."%' 
        OR B.village LIKE '%".$location."%' 
ORDER  BY cnt DESC limit 0,3";


        $tourData = DB::select( DB::raw($sql) );
/*

SELECT DISTINCT(B.id) ,A.name , B.name as realName, B.address , B.big_cate ,B.middle_cate ,CASE B.middle_cate
			  WHEN '건축/조형물' THEN 'construct'
			  WHEN '문화시설' THEN 'culture'
			  WHEN '산업관광지' THEN 'industry'
			  WHEN '역사관광지' THEN 'history'
			  WHEN '체험관광지' THEN 'experience'
			  WHEN '관광자원' THEN 'tourism' 
			  WHEN '휴향관광지' THEN 'recreation' 
			  WHEN '섬' THEN 'island'
			  WHEN '자연관광지' THEN 'nature'
			  else 'construct'
			  end as middle_cate_back 
			  FROM BestTour2016 AS A LEFT JOIN (SELECT * FROM tourdatas as A LEFT JOIN (SELECT tourId , COUNT(*) as cnt from product_likes GROUP BY tourId) as B ON A.id = B.tourId ORDER BY cnt DESC) as B ON A.location = B.address WHERE B.area LIKE "%서울%" or B.city LIKE "%서울%" or B.village LIKE "%서울%"

SELECT * FROM tourdatas as A LEFT JOIN (SELECT tourId , COUNT(*) as cnt from product_likes GROUP BY tourId) as B ON A.id = B.tourId ".
  ORDER BY cnt DESC
*/

        // 타이틀
        $title = [$tourData[0]->realName,$tourData[1]->realName,$tourData[2]->realName];
        // 카테고리
        $cate = [$tourData[0]->middle_cate , $tourData[1]->middle_cate , $tourData[2]->middle_cate];
        // 고유 넘버값
        $id = [$tourData[0]->id , $tourData[1]->id , $tourData[2]->id];
        // 이미지
        $img = ["https://tourcoach.co.kr/img/RESOURCE/FieldTourist/bg_".$tourData[0]->middle_cate_back.".png" ,
            "https://tourcoach.co.kr/img/RESOURCE/FieldTourist/bg_".$tourData[1]->middle_cate_back.".png" ,
            "https://tourcoach.co.kr/img/RESOURCE/FieldTourist/bg_".$tourData[2]->middle_cate_back.".png"
        ];
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
      \"image_url\": \"$img[0]\",
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
      \"image_url\": \"$img[1]\",
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
      \"image_url\": \"$img[2]\",
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
        $msg = $tourData[0]->realName . " , ". $tourData[1]->realName ." , ". $tourData[2]->realName ."를 추천드립니다 자세한 내용은 메신저로 전송하였습니다.";
        $returnArray = array('name1' => $tourData[0]->realName , 'img1' => json_decode($tourData[0]->imgUrl)[0], 'location1' => $tourData[0]->address, 'name2' => $tourData[1]->realName , 'img2' => json_decode($tourData[1]->imgUrl)[0], 'location2' => $tourData[1]->address ,'name3' => $tourData[2]->realName , 'img3' => json_decode($tourData[2]->imgUrl)[0] , 'location3' => $tourData[2]->address , 'id1' => $tourData[0]->id , 'id2' => $tourData[1]->id , 'id3' => $tourData[2]->id);

        echo json_encode($returnArray);
    }

    public function t(){

        $to = "kimppangs@gmail.com";
        $subject = 'asd';
        $message = null;
        $headers = 'From: 투어코치 <no-reply@tourcoach.co.kr>' . "\r\n" .
            'Reply-To: no-reply@tourcoach.co.kr' . "\r\n" .
            "Content-Type: text/html; charset=ISO-8859-1\r\n".
            'X-Mailer: PHP/' . phpversion();




        $message = "<!DOCTYPE html>
<html>
  <head>
    <meta charset=\"utf-8\">
    <title></title>
   <style>
   html, body{
  width:100%;
  height: 100%;
}
.containor{
  width:100%;
  padding: 1rem;
}
.containor header{
  width:100%;
  display: flex;
  justify-content: flex-start;
  margin-bottom: 1rem;
}
.containor .main-text{
  width:100%;
  display: flex;
  flex-direction: column;
  justify-content:flex-start;
  padding: 2rem;
  font-size: 14pt;
}
.containor .main-text .text-line{
  margin-top: 0.6rem;
  margin-bottom: 0.6rem;
}
.containor .main-text .text-number{
  font-weight:600;
}
.containor .main-text .text-enter{
  margin-bottom: 0.5rem;
  margin-top:0.5rem;
}
.footer{
  text-align: left;
  font-size: 10pt;
  color:gray;
}

</style>
  </head>
  <body>
    <div class=\"containor\">
      <header>
        <img src=\"https://tourcoach.co.kr/img/RESOURCE/CertifiedMail/bg_title.png\" alt=\"\">
      </header>
      <div class=\"main-text\">
        <div class=\"text-line\">치킨맥주 님 안녕하세요?</div><br>
        <div class=\"text-enter\"></div>
        <div class=\"text-line\">투어코치 서비스를 이용해주셔서 감사합니다.</div>
        <div class=\"text-line\">본 메일은 발신메일 등록을 위한 이메일입니다.</div>
        <div class=\"text-enter\"></div>
        <div class=\"text-line\">발신이메일 인증을 위해서 아래인증번호를 입력해주세요</div>
        <div class=\"text-line\">이메일인증을 완료하시면 아래 서비스를 이용하실 수 있습니다.</div>
        <div class=\"text-line\">타인에게 유출될 경우 악용의 우려가 있으니 노출되지 않도록 각별히 주의하시기바랍니다.</div>
        <div class=\"text-line\">본 이메일은 수신 후 30분이내로 확인해주세여합니다.</div>
        <div class=\"text-enter\"></div>
        <div class=\"text-number text-line\">인증번호 : <span>2019</span></div>
        <div class=\"text-enter\"></div>
        <div class=\"text-line\">감사합니다.</div>
        <div class=\"text-line\">투어코치 드립.</div>
        치킨맥주 님 안녕하세요?

        투어코치 서비스를 이용해주셔서 감사합니다.
        본 메일은 발신메일 등록을 위한 이메일입니다.

        발신이메일 인증을 위해서 아래인증번호를 입력해주세요
        이메일인증을 완료하시면 아래 서비스를 이용하실 수 있습니다.
        타인에게 유출될 경우 악용의 우려가 있으니 노출되지 않도록 각별히 주의하시기바랍니다.
        본 이메일은 수신 후 30분이내로 확인해주세여합니다.
      </div>
      <img src=\"https://tourcoach.co.kr/img/RESOURCE/CertifiedMail/ic_line.png\" alt=\"\">
      <div class=\"footer\">
        본 메일은 발신전용 메일로 응답을 하지않습니다.
      </div>
    </div>
  </body>
</html>
";

        mail($to, $subject, $message, $headers);

    }

    public function naver(Request $req){
        $client_id = "OYGf8ldsXz99EoGmlw3q";
        $client_secret = "YivhJp5FtI";
        $encText = urlencode("명동 사진");
        $url = "https://openapi.naver.com/v1/search/image.json?query=".$encText."&display=50&start=1&sort=sim"; // json 결과
        //  $url = "https://openapi.naver.com/v1/search/blog.xml?query=".$encText; // xml 결과
        $is_post = false;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, $is_post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        $headers[] = "X-Naver-Client-Id: ".$client_id;
        $headers[] = "X-Naver-Client-Secret: ".$client_secret;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec ($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        echo "status_code:".$status_code."
";
        curl_close ($ch);
        if($status_code == 200) {
            dd(json_decode($response));
        } else {
            echo "Error 내용:".$response;
        }
    }

    public function kakao(Request $req){
        $client_id = "f9bcabafe137ae35fa2536f37923575d";

        $encText = urlencode("경포대");
        $url = "https://dapi.kakao.com/v2/search/image?query=".$encText; // json 결과
        //  $url = "https://openapi.naver.com/v1/search/blog.xml?query=".$encText; // xml 결과
        $is_post = false;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, $is_post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = array();
        $headers[] = "Authorization: KakaoAK ".$client_id;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $response = curl_exec ($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        echo "status_code:".$status_code."
";
        curl_close ($ch);
        if($status_code == 200) {
            dd(json_decode($response));
        } else {
            echo "Error 내용:".$response;
        }
    }

    private function chu($data){

    }

    private function coach($data){

    }
    private function date($data){
        
    }
}
