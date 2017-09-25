
var projectCount = [0, 0, 0, 0, 0];
var projectMargin = [0, 0, 0, 0, 0];
window.onload = ()=>{
    $("#loading").remove();

    $(".rightBtn1").click(function(){
        if(window.innerWidth < 600){
            if(projectCount[0] > 3){

            }
            else{
                projectMargin[0] += window.innerWidth/1*-1 - 25;
                projectCount[0]++;
                $(".a").animate({"margin-left":projectMargin[0]},1000)
            }
        }
        else if(window.innerWidth > 1200){
            if(projectCount[0] > 2){

            }
            else{
                projectMargin[0] += window.innerWidth/4*-1;
                projectCount[0]++;
                $(".a").animate({"margin-left":projectMargin[0]},1000)
            }
        }
        else{
            if(projectCount[0] > 6){

            }
            else{
                projectMargin[0] += window.innerWidth/4*-1;
                projectCount[0]++;
                $(".a").animate({"margin-left":projectMargin[0]},1000)
            }
        }
    })

    $(".leftBtn1").click(function(){
        if(window.innerWidth < 600){

            if(projectCount[0] == 0){

            }
            else{
                projectMargin[0] += window.innerWidth/1 + 25;
                projectCount[0]--;
                $(".a").animate({"margin-left":projectMargin[0]},1000)
            }
        }
        else{
            if(projectCount[0] == 0){

            }
            else{
                projectMargin[0] += window.innerWidth/4;
                projectCount[0]--;
                $(".a").animate({"margin-left":projectMargin[0]},1000)
            }
        }
    })
    $(".rightBtn2").click(function(){
        if(window.innerWidth < 600){
            if(projectCount[1] > 3){

            }
            else{
                projectMargin[1] += window.innerWidth/1*-1 - 25;
                projectCount[1]++;
                $(".b").animate({"margin-left":projectMargin[1]},1000)
            }
        }
        else if(window.innerWidth > 1200){
            if(projectCount[1] > 2){

            }
            else{
                projectMargin[1] += window.innerWidth/4*-1;
                projectCount[1]++;
                $(".b").animate({"margin-left":projectMargin[1]},1000)
            }
        }
        else{
            if(projectCount[1] > 6){

            }
            else{
                projectMargin[1] += window.innerWidth/4*-1;
                projectCount[1]++;
                $(".b").animate({"margin-left":projectMargin[1]},1000)
            }
        }
    })

    $(".leftBtn2").click(function(){
        if(window.innerWidth < 600){

            if(projectCount[1] == 0){

            }
            else{
                projectMargin[1] += window.innerWidth/1 + 25;
                projectCount[1]--;
                $(".b").animate({"margin-left":projectMargin},1000)
            }
        }
        else{
            if(projectCount[1] == 0){

            }
            else{
                projectMargin[1] += window.innerWidth/4;
                projectCount[1]--;
                $(".b").animate({"margin-left":projectMargin[1]},1000)
            }
        }
    })
    $(".rightBtn3").click(function(){
        if(window.innerWidth < 600){
            if(projectCount[2] > 3){

            }
            else{
                projectMargin[2] += window.innerWidth/1*-1 - 25;
                projectCount[2]++;
                $(".c").animate({"margin-left":projectMargin[2]},1000)
            }
        }
        else if(window.innerWidth > 1200){
            if(projectCount[2] > 2){

            }
            else{
                projectMargin[2] += window.innerWidth/4*-1;
                projectCount[2]++;
                $(".c").animate({"margin-left":projectMargin[2]},1000)
            }
        }
        else{
            if(projectCount[2] > 6){

            }
            else{
                projectMargin[2] += window.innerWidth/4*-1;
                projectCount[2]++;
                $(".c").animate({"margin-left":projectMargin[2]},1000)
            }
        }
    })

    $(".leftBtn3").click(function(){
        if(window.innerWidth < 600){

            if(projectCount[2] == 0){

            }
            else{
                projectMargin[2] += window.innerWidth/1 + 25;
                projectCount[2]--;
                $(".c").animate({"margin-left":projectMargin[2]},1000)
            }
        }
        else{
            if(projectCount[2] == 0){

            }
            else{
                projectMargin[2] += window.innerWidth/4;
                projectCount[2]--;
                $(".c").animate({"margin-left":projectMargin[2]},1000)
            }
        }
    })
    $(".rightBtn4").click(function(){
        if(window.innerWidth < 600){
            if(projectCount[3] > 3){

            }
            else{
                projectMargin[3] += window.innerWidth/1*-1 - 25;
                projectCount[3]++;
                $(".d").animate({"margin-left":projectMargin[3]},1000)
            }
        }
        else if(window.innerWidth > 1200){
            if(projectCount[3] > 2){

            }
            else{
                projectMargin[3] += window.innerWidth/4*-1;
                projectCount[3]++;
                $(".d").animate({"margin-left":projectMargin[3]},1000)
            }
        }
        else{
            if(projectCount[3] > 6){

            }
            else{
                projectMargin[3] += window.innerWidth/4*-1;
                projectCount[3]++;
                $(".d").animate({"margin-left":projectMargin[3]},1000)
            }
        }
    })

    $(".leftBtn4").click(function(){
        if(window.innerWidth < 600){

            if(projectCount[3] == 0){

            }
            else{
                projectMargin[3] += window.innerWidth/1 + 25;
                projectCount[3]--;
                $(".d").animate({"margin-left":projectMargin[3]},1000)
            }
        }
        else{
            if(projectCount[3] == 0){

            }
            else{
                projectMargin[3] += window.innerWidth/4;
                projectCount[3]--;
                $(".e").animate({"margin-left":projectMargin[3]},1000)
            }
        }
    })
    $(".rightBtn5").click(function(){
        if(window.innerWidth < 600){
            if(projectCount[4] > 3){

            }
            else{
                projectMargin[4] += window.innerWidth/1*-1 - 25;
                projectCount[4]++;
                $(".e").animate({"margin-left":projectMargin[4]},1000)
            }
        }
        else if(window.innerWidth > 1200){
            if(projectCount[4] > 2){

            }
            else{
                projectMargin[4] += window.innerWidth/4*-1;
                projectCount[4]++;
                $(".e").animate({"margin-left":projectMargin[4]},1000)
            }
        }
        else{
            if(projectCount[4] > 6){

            }
            else{
                projectMargin[4] += window.innerWidth/4*-1;
                projectCount[4]++;
                $(".e").animate({"margin-left":projectMargin[4]},1000)
            }
        }
    })

    $(".leftBtn5").click(function(){
        if(window.innerWidth < 600){

            if(projectCount[4] == 0){

            }
            else{
                projectMargin[4] += window.innerWidth/1 + 25;
                projectCount[4]--;
                $(".e").animate({"margin-left":projectMargin[4]},1000)
            }
        }
        else{
            if(projectCount[4] == 0){

            }
            else{
                projectMargin[4] += window.innerWidth/4;
                projectCount[4]--;
                $(".e").animate({"margin-left":projectMargin[4]},1000)
            }
        }
    })

    // $('.chat-box').css('height', window.innerWidth)

}