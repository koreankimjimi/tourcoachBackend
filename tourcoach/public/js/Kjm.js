var Apps = function(){
    "use strict";

    var app = {
        initTag : function(){
            app.GLOBALLOGO              = $(".header-logo");
            app.GLOBALLOGOICON          = $(".header-icon");

            app.LIKEBTN                 = $("#likeBtn");

            app.REVIEWMOREBTN           = $("#reviewMoreBtn");
            return this;
        },
        initEvent : function(){
            app.GLOBALLOGO.on("click",function(){
                location.href = '/'
            })
            app.GLOBALLOGOICON.on("click",function(){
                location.href = '/'
            })

            app.LIKEBTN.on("click",function(){
                var no = $(this).attr("data");
                var btn = $(this);
                $.ajax({
                    type : 'POST',
                    url : '/tour/productLike',
                    data : { tourId : no },
                    success : function(data){
                        if (data == "true"){
                            btn.animate({"left":"-10000px"},1000,function(){
                                btn.remove();
                            });

                        }

                    }
                })
            })

            

            return this;
        },
        start : function(){



            return this
                .initTag()
                .initEvent();
        }
    }

    return app;
}

window.onload = function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var apps = new Apps();
    apps.start();
}