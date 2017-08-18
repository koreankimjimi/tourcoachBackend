<?php
header("Content-Type:text/html;charset=utf-8");

$data = shell_exec('echo '.$_SERVER['argv'][1].' | mecab');
$arr = explode("\n",trim($data));
// 배열 계수
$arrCount = count($arr);
// 마지막 EOS 삭제
unset($arr[ $arrCount -1 ]);
// 요일
$day = array('월요일' => array('Monday' , 1) , '화요일' => array('Tuesday' , 2) , '수요일' => array('Wednesday',3) , '목요일' => array('Thursday',4) ,'금요일' => array('Friday',5) , '토요일' => array('Saturday' , 6) , '일요일' => array('Sunday',0));

$foundArr = [];
for ( $a = 0 ; $a < $arrCount ; $a++ ){

    $arr[$a] = explode(",",$arr[$a]);
    $arr[$a][0] = explode("\t" , $arr[$a][0]);
    if ( $arr[$a][0][1] === "NNG" || $arr[$a][0][1] === "NNP" ){

        $foundArr[] = $arr[$a][0];
        if ( $arr[$a][0][0] === "코치" || $arr[$a][0][0] === "추천" ) {
            array_unshift($foundArr, array('kinds' => $arr[$a][0][0]));
        } else {
            if ( $arr[$a][2] != "T" && $arr[$a][0][0] != "주") {
                // 여행지
                array_unshift($foundArr, array('location' => $arr[$a][0][0]));
            }
        }
    }
}


/*
 *  date > location > 추천,코치
 *  date {
 *       형식 :  XX월XX일 , 내일 , 오늘 , 다음주 X요일 , 내일 모레
 *       XX월XX일 : { SN - NNBC - SN - NNBC }
 *
 *
 *  }
 *
 * */
// 첫번째 주어를 날짜로 가정
$root = $arr[0][0][0];
switch($root){
    case "내일":
        if($arr[1][0][0] === "모레"){
            // 내일 모레
            array_unshift($foundArr , array('date' =>  date("Y-m-d",strtotime("+2 day"))));
        }else{
            // 내일
            array_unshift($foundArr , array('date' =>  date("Y-m-d",strtotime("+1 day"))));
        }
        break;
    case "오늘":
        // 오늘
        array_unshift($foundArr , array('date' =>  date("Y-m-d")));
        break;
    case "이번":
        // 이번주 + 요일
        if($arr[1][0][0] === "주" && strpos($arr[2][0][0], "요일") !== false){
            // 현재 요일 - 요청 요일
            $date = date('w') - $day[$arr[2][0][0]][1];
            if($date <= 0){
                $date = "+".abs($date)." day";
                array_unshift($foundArr , array('date' => date("Y-m-d", strtotime( $date )) ));
            }
        }
        break;
    case "다음":
        // 이번주 + 요일
        if($arr[1][0][0] === "주" && strpos($arr[2][0][0], "요일") !== false){
            array_unshift($foundArr, array('date' => date("Y-m-d", strtotime("next " . $day[$arr[2][0][0]][0]))));
        }
        break;
    default:
        // XX월XX일 찾아내기
        if($arr[0][0][1] === "SN" && $arr[1][0][1] === "NNBC" && $arr[2][0][1] === "SN" && $arr[3][0][1] === "NNBC"){
            // Y-m-d 포맷 으로바꾸기
            $date = date("Y-m-d",strtotime(date("2017-".$arr[0][0][0]."-".$arr[2][0][0])));
            array_unshift($foundArr , array('date' => $date));
        } else if(strpos($arr[0][0][0] , "요일") !== false){
            $date = date('w') - $day[$arr[0][0][0]][1];
            // 지난날은 걸름
            if($date <= 0){
                $date = "+".abs($date)." day";
                array_unshift($foundArr , array('date' => date("Y-m-d", strtotime( $date )) ));
            }
        }
        break;

}


/*
// 내일 || 내일 모레
if($arr[0][0][0] === "내일" ){
    if($arr[1][0][0] === "모레") {
        array_unshift($foundArr , array('date' =>  date("Y-m-d",strtotime("+2 day"))));
    }else{
        array_unshift($foundArr , array('date' =>  date("Y-m-d",strtotime("+1 day"))));
    }

}

// 오늘
if($arr[0][0][0] === "오늘"){
    array_unshift($foundArr , array('date' =>  date("Y-m-d")));
}

// XX월XX일 찾아내기
if($arr[0][0][1] === "SN" && $arr[1][0][1] === "NNBC" && $arr[2][0][1] === "SN" && $arr[3][0][1] === "NNBC"){
    // Y-m-d 포맷 으로바꾸기
    $date = date("Y-m-d",strtotime(date("2017-".$arr[0][0][0]."-".$arr[2][0][0])));
    array_unshift($foundArr , array('date' => $date));
}


$day = array('월요일' => array('Monday' , 1) , '화요일' => array('Tuesday' , 2) , '수요일' => array('Wednesday',3) , '목요일' => array('Thursday',4) ,'금요일' => array('Friday',5) , '토요일' => array('Saturday' , 6) , '일요일' => array('Sunday',0));
// 다음주 + 요일 , 이번주 + 요일
if($arr[1][0][0] === "주"){
    if($arr[0][0][0] === "다음") {
        // 요일 확인
        if (strpos($arr[2][0][0], "요일") !== false) {
            array_unshift($foundArr, array('date' => date("Y-m-d", strtotime("next " . $day[$arr[2][0][0]][0]))));
        }
    }else if($arr[0][0][0] === "이번"){
        // 요일 확인
        if (strpos($arr[2][0][0], "요일") !== false) {
            // 현재 요일 - 요청 요일
            $date = date('w') - $day[$arr[2][0][0]][1];
            if($date <= 0){
                $date = "+".abs($date)." day";
                array_unshift($foundArr , array('date' => date("Y-m-d", strtotime( $date )) ));
            }
        }
    }
}else{
    // 요일
    if(strpos($arr[0][0][0] , "요일") !== false){

        $date = date('w') - $day[$arr[0][0][0]][1];
        if($date <= 0){
            $date = "+".abs($date)." day";
            array_unshift($foundArr , array('date' => date("Y-m-d", strtotime( $date )) ));
        }
    }
}





*/



//return $foundArr;
//
echo json_encode($foundArr,JSON_UNESCAPED_UNICODE);
//print_r($arr);