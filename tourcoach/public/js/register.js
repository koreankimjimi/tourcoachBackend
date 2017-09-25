window.onload = ()=>{
    $("#loading").remove();
    $("#men").click(()=>{
        if($('#men').hasClass('unClickMen')){
        $('#men').removeClass('unClickMen');
        $('#men').addClass('ClickMen');
        if($('#women').hasClass('ClickWomen')){
            $('#women').removeClass('ClickWomen');
            $('#women').addClass('unClickWomen');
        }
    }
    // else{
    //   $('#men').removeClass('ClickMen');
    //   $('#men').addClass('unClickMen');
    // }
})
    $("#women").click(()=>{
        if($('#women').hasClass('unClickWomen')){
        $('#women').removeClass('unClickWomen');
        $('#women').addClass('ClickWomen');
        if($('#men').hasClass('ClickMen')){
            $('#men').removeClass('ClickMen');
            $('#men').addClass('unClickMen');
        }
    }
    // else{
    //   $('#women').removeClass('ClickWomen');
    //   $('#women').addClass('unClickWomen');
    // }
})
    $("#select").change(function() {
        if($(this).val() == "color"){
            console.log('test');
            $('#color-index').attr('placeholder', '검정색');
        }
        else if($(this).val() == "teacher"){
            console.log('test');
            $('#color-index').attr('placeholder', '고길동');
        }
        else if($(this).val() == "top"){
            console.log('test');
            $('#color-index').attr('placeholder', '장난감');
        }
        else if($(this).val() == "pet"){
            console.log('test');
            $('#color-index').attr('placeholder', '댕댕이');
        }


    });


}
