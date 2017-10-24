window.onload = function(){
    $("#loading").remove();
    var slideNo = 0;
    var slideBox = $("#slideBox");
    // slide
    slideBox.find(".btn").on("click",function(){
        if(slideBox.find(".slide").is(":animated")) return false;
        var no = $(this).index();
        if( no == 1){
            console.log(slideNo,slideBox.find(".slide").find("img").length*100 - 100);
			if(slideNo < slideBox.find(".slide").find("img").length*100 - 100) {
				
                slideNo += 100;
            }
        }else{
            if(slideNo > 0) {
                slideNo -= 100;
            }
        }

        slideBox.find(".slide").animate({"marginLeft":"-"+slideNo+"%"});
    })


    var Apps = function(){

        var app = {
            start : function(){
                var limitNo = 0;
                $(".reviewMoreBtn").on("click",function(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var no = $(this).attr("data");
                    $.post("/tour/getReview",{'start':limitNo,'end':limitNo+10,'tourId':no},function(data){


                        for(var a = 0 ; a < data.length ; a++ ){
                            if(data[a].userName != "undefined") {
                                var html = "<div class='review-list'>"
                                html += "<div class='review-title'>" + data[a].userName + "</div>"
                                html += "<div class='review-sub'>"
                                html += "<div class='review-date'>" + data[a].date + "</div>"
                                html += "</div>"
                                html += "<div class='review-index'>" + data[a].content + "</div>"
                                html += "</div>";
                                $("#reviewPop > button").eq(0).before(html);

                            }
                        }

                        limitNo += 10;


                    })
                    // alert();
                    $("#reviewPop").fadeIn();
                })
                $("#reviewCloseBtn").on("click",function(){
                    // alert();
                    $("#reviewPop").fadeOut();
                })

            }
        }
        return app;
    }

    var apps = new Apps()
    apps.start();


    // 좋아요
    $("#likeBtn").on("click",function(){
        var no = $(this).attr("data");
        var btn = $(this);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type : 'POST',
            url : '/tour/productLike',
            data : { tourId : no },
            success : function(data){
                if (data == "true"){
                    location.href = '/tour/detail/'+no;
                }

            }
        })
    })

    
}

function sendKakao(tourId){
    var no = tourId;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.post("/tour/sendKakao/"+no,function(){
        alert('전송하였습니다.');
    })



}