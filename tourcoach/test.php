<?php
$data = "template_object={
  \"object_type\": \"location\",
  \"content\": {
    \"title\": \"카카오 판교오피스\",
    \"description\": \"카카오 판교오피스 위치입니다.\",
    \"link\": {
      \"web_url\": \"http://dev.kakao.com\",
      \"mobile_web_url\": \"http://dev.kakao.com/mobile\",
      \"android_execution_params\": \"platform=android\",
      \"ios_execution_params\": \"platform=ios\"
    }
  },
  \"buttons\": [
    {
      \"title\": \"웹으로 보기\",
      \"link\": {
        \"web_url\": \"http://dev.kakao.com\",
        \"mobile_web_url\": \"http://dev.kakao.com/mobile\"
      }
    }
  ],
  \"address\": \"경기 성남시 분당구 판교역로 235 에이치스퀘어 N동 7층\",
  \"address_title\": \"카카오 판교오피스\"
}";
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://kapi.kakao.com/v2/api/talk/memo/default/send',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request',
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer _gLPgv5BN2QwEw4-_3vFbpY_uK8gr6bN05sTkAoqAuYAAAFeVKxo6Q',
    ),
//    CURLOPT_POSTFIELDS => array('template_id=4415')
    CURLOPT_POSTFIELDS => $data
));
// Send the request & save response to $resp
$resp = json_decode(curl_exec($curl));
// Close request to clear up some resources
curl_close($curl);
echo $data;
print_r($resp);