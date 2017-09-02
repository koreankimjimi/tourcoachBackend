<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div>
    <fb:login-button scope="public_profile,email,publish_actions,pages_messaging" onlogin="checkLoginState();"> 로그인 </fb:login-button>
</div>
<div>
    <button id="posting" onclick="posting()">포스팅</button>
</div>
<script>

    // Load the SDK asynchronously
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    window.fbAsyncInit = function() {
        FB.init({
            appId : 245902125919040,
            cookie : true,
            xfbml : true,
            version : 'v2.5'
        });

    };

    //로그인 여부를 확인합니다.
    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            statusChangeCallback(response);
        });
    }

    function statusChangeCallback(response) {
        console.log('response를 통해 다양한 정보를 확인할 수 있습니다.');
        console.log(response);
        if (response.status === 'connected') {
            console.log('사용자가 Facebook에 로그인하고 앱에 로그인했습니다');
            FB.api('/me', function(response) {
                console.log('Successful login for: ' + response.name);
            });
        } else if (response.status === 'not_authorized') {
            console.log('사용자가 Facebook에 로그인했지만 앱에 로그인하지 않았습니다.');
        } else {
            console.log('사용자가 Facebook에 로그인하지 않았으므로 앱에 로그인했는지 알 수 없습니다');
        }
    }

    function posting() {
        FB.api(
            '/me/feed','post', {"message" : "안녕하세요?"},
            function(response) {
                console.log('facebook-response:', response);
                if (response && !response.error) {
                    alert("포스팅 성공!");
                } else {
                    console.log("포스팅 실패!");
                }
            });
    }

    function login(){
        FB.login(function(response) {
            // handle the response
            console.log(response);
        }, {scope: 'email,user_likes,pages_messaging'});
    }

</script>
<button onclick="login();">login</button>
<fb:login-button
    scope="public_profile,email,pages_messaging"
    onlogin="checkLoginState();">
</fb:login-button>
</body>
</html>