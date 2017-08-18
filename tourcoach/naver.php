<?php

$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://openapi.naver.com/v1/search/image.xml?query=%EC%A3%BC%EC%8B%9D&display=10&start=1&sort=sim',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request',
    CURLOPT_HTTPHEADER => array(
        'X-Naver-Client-Id: vfNrKbYh9h8aEjHAk0vr',
        'X-Naver-Client-Secret: 3DZGV70VAa'
    )
));
// Send the request & save response to $resp
$resp = json_decode(curl_exec($curl));
// Close request to clear up some resources
curl_close($curl);

print_r($resp);