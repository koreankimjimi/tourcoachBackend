var Apps = function(){
    "use strict";

    var app = {
        start : function(){
            console.log("start");
        }
    }

    return app;
}

window.onload = function(){
    var apps = new Apps();
    apps.start();
}