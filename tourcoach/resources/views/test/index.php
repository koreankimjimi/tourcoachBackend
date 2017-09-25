<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <meta name="viewport"-->
<!--          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">-->
<!--    <meta http-equiv="X-UA-Compatible" content="ie=edge">-->
<!--    <title>Document</title>-->
<!--</head>-->
<!--<body>-->
<!---->
<!--<div>-->
<!--    <fb:login-button scope="public_profile,email,publish_actions,pages_messaging" onlogin="checkLoginState();"> 로그인 </fb:login-button>-->
<!--</div>-->
<!--<div>-->
<!--    <button id="posting" onclick="posting()">포스팅</button>-->
<!--</div>-->
<!--<script>-->
<!---->
<!--    // Load the SDK asynchronously-->
<!--    (function(d, s, id) {-->
<!--        var js, fjs = d.getElementsByTagName(s)[0];-->
<!--        if (d.getElementById(id))-->
<!--            return;-->
<!--        js = d.createElement(s);-->
<!--        js.id = id;-->
<!--        js.src = "//connect.facebook.net/en_US/sdk.js";-->
<!--        fjs.parentNode.insertBefore(js, fjs);-->
<!--    }(document, 'script', 'facebook-jssdk'));-->
<!---->
<!--    window.fbAsyncInit = function() {-->
<!--        FB.init({-->
<!--            appId : 245902125919040,-->
<!--            cookie : true,-->
<!--            xfbml : true,-->
<!--            version : 'v2.5'-->
<!--        });-->
<!---->
<!--    };-->
<!---->
<!--    //로그인 여부를 확인합니다.-->
<!--    function checkLoginState() {-->
<!--        FB.getLoginStatus(function(response) {-->
<!--            statusChangeCallback(response);-->
<!--        });-->
<!--    }-->
<!---->
<!--    function statusChangeCallback(response) {-->
<!--        console.log('response를 통해 다양한 정보를 확인할 수 있습니다.');-->
<!--        console.log(response);-->
<!--        if (response.status === 'connected') {-->
<!--            console.log('사용자가 Facebook에 로그인하고 앱에 로그인했습니다');-->
<!--            FB.api('/me', function(response) {-->
<!--                console.log('Successful login for: ' + response.name);-->
<!--            });-->
<!--        } else if (response.status === 'not_authorized') {-->
<!--            console.log('사용자가 Facebook에 로그인했지만 앱에 로그인하지 않았습니다.');-->
<!--        } else {-->
<!--            console.log('사용자가 Facebook에 로그인하지 않았으므로 앱에 로그인했는지 알 수 없습니다');-->
<!--        }-->
<!--    }-->
<!---->
<!--    function posting() {-->
<!--        FB.api(-->
<!--            '/me/feed','post', {"message" : "안녕하세요?"},-->
<!--            function(response) {-->
<!--                console.log('facebook-response:', response);-->
<!--                if (response && !response.error) {-->
<!--                    alert("포스팅 성공!");-->
<!--                } else {-->
<!--                    console.log("포스팅 실패!");-->
<!--                }-->
<!--            });-->
<!--    }-->
<!---->
<!--    function login(){-->
<!--        FB.login(function(response) {-->
<!--            // handle the response-->
<!--            console.log(response);-->
<!--        }, {scope: 'email,user_likes,pages_messaging'});-->
<!--    }-->
<!---->
<!--</script>-->
<!--<button onclick="login();">login</button>-->
<!--<fb:login-button-->
<!--    scope="public_profile,email,pages_messaging"-->
<!--    onlogin="checkLoginState();">-->
<!--</fb:login-button>-->
<!--</body>-->
<!--</html>-->

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, width=device-width"/>
    <title>Login Demo - Kakao JavaScript SDK</title>
    <script src="//developers.kakao.com/sdk/js/kakao.min.js"></script>

</head>
<body>
<a id="kakao-login-btn"></a>
<a href="http://developers.kakao.com/logout"></a>
<script type='text/javascript'>
    //<![CDATA[
    // 사용할 앱의 JavaScript 키를 설정해 주세요.
    Kakao.init('36fc8efc43445022fdd021f246d39ce1');
    // 카카오 로그인 버튼을 생성합니다.
    Kakao.Auth.createLoginButton({
        container: '#kakao-login-btn',
        success: function(authObj) {
            console.log(JSON.stringify(authObj));
            alert(JSON.stringify(authObj));
        },
        fail: function(err) {
            alert(JSON.stringify(err));
        }
    });

    navigator.geolocation.getCurrentPosition(function(pos) {
        var latitude = pos.coords.latitude;
        var longitude = pos.coords.longitude;
        alert("현재 위치는 : " + latitude + ", "+ longitude);
    });



    //]]>
</script>
<img src="https://maps.googleapis.com/maps/api/staticmap?size=512x512&maptype=roadmap\
&markers=size:mid%7Ccolor:red%7C제주특별자치도 서귀포시 중문로105번길 37&zoom=12&key=AIzaSyDqWBda5DAqcIJQIWAs6_kYjTPCLUd1Ejw" alt="">
<img src="https://maps.googleapis.com/maps/api/staticmap?center=제주특별자치도 서귀포시 중문로105번길 37 (중문동)&zoom=14&size=400x400&key=AIzaSyDqWBda5DAqcIJQIWAs6_kYjTPCLUd1Ejw" alt="">
<img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference=CnRtAAAATLZNl354RwP_9UKbQ_5Psy40texXePv4oAlgP4qNEkdIrkyse7rPXYGd9D_Uj1rVsQdWT4oRz4QrYAJNpFX7rzqqMlZw2h2E2y5IKMUZ7ouD_SlcHxYq1yL4KbKUv3qtWgTK0A6QbGh87GB3sscrHRIQiG2RrmU_jF4tENr9wGS_YxoUSSDrYjWmrNfeEHSGSc3FyhNLlBU&key=AIzaSyD8V8I_nchb7DszRBZaQb0mOqCv89quXgE">
</body>
</html>