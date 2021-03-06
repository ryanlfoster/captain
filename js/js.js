
      ref();
      $(".slider").responsiveSlides({
        auto: true,             // Boolean: Animate automatically, true or false
        speed: 500,            // Integer: Speed of the transition, in milliseconds
        timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
        pager: false,           // Boolean: Show pager, true or false
        nav: false,             // Boolean: Show navigation, true or false
        random: false,          // Boolean: Randomize the order of the slides, true or false
        pause: true,           // Boolean: Pause on hover, true or false
        pauseControls: true,    // Boolean: Pause when hovering controls, true or false
        prevText: "Previous",   // String: Text for the "previous" button
        nextText: "Next",       // String: Text for the "next" button
        maxwidth: "",           // Integer: Max-width of the slideshow, in pixels
        navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
        manualControls: "",     // Selector: Declare custom pager navigation
        namespace: "rslides",   // String: Change the default namespace used
        before: function(){},   // Function: Before callback
        after: function(){}     // Function: After callback
      });

        
    $(window).resize(function(){
            $(".slider").height($(".slider li").height());
            var img_height=$("#tit img").height()/2;
            $("header").height(img_height*1.1);
            $("header").css({'margin-bottom':-1.1*img_height});
      });

    $(window).load(function(){
        $(".slider").height($(".slider li").height());
        var img_height=$("#tit img").height()/2;
        $("header").height(img_height*1.1);
        $("header").css({'margin-bottom':-1.1*img_height});
   });

    $("#submit").click(function(){
        //alert("dsauidhsaui");
        if(form_verify()){
            var content=[
                        $("#name").val(),
                        $("#email").val(),
                        $("#mobile").val(),
                        $("#message").val(),
                        $("#suburb").val(),
                        $("#datepicker").val(),
                        $('#type option:selected').text(),
                    ].join("@@@");

            //alert(content);
            $.ajax({
                type: "POST",
                url: "phpmail/send.php",
                data: { data : content },
                // dataType: 'json',
                async: false,
                success:function(res){
                    show_message(res,"msgbar_success");
                }
            });
        }
    });

    function form_verify(){
        if($("#name").val()==""){
            //alert("name");
            show_message("Captain needs to know your name, crew!","msgbar_warning");
            $("#name").focus();
            return false;
        }
        else if($("#email").val()==""){
            //alert("email");
            show_message("You mail address?","msgbar_warning");
            $("#email").focus();
            return false;
        }
        else if(!validate($("#email").val())){
            show_message("Captain wants a real Email, man!!!","msgbar_warning");
            $("#email").focus();
            return false;
        }
        else if($("#message").val()==""){
            //alert("message");
            show_message("Captain is waiting for your message,boy!","msgbar_warning");
            $("#message").focus();
            return false;
        }
        else{
            return true;
        }
    }



    /*-------------------------mail validation---------------------*/
    function validate(address) {   
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;  
        if(reg.test(address) == false) { 
            return false;
        }
        else{
            return true;
        } 
    } 
/*-------------------------------Back to top-----------------------------------*/

                $(window).scroll(function() {
                        if($(this).scrollTop() != 0) {
                          $('.top').fadeIn();
                        } else {
                          $('.top').fadeOut();
                        }
                });

                $('.top').click(function() {
                    $('body,html').animate({scrollTop:0},800);
                });
    
    /*------------------------------------------------Msg Box-------------------------------------------------------*/
        function show_message(message,class_name) {
            $("<div/>", { class: class_name, text: message }).hide().prependTo(".contact")
            .slideDown('fast').delay(1000).slideUp(function() { jQuery(this).remove(); });
        }

    /*--------------------------------------refresh------------------------------------------*/
function ref(){
    $.ajax({
        type: "GET",
        url: "data.json",
        dataType: 'json',
        async: false,
        success:function(res){
            $(".about .inside p").html(res.about);
            $(".faq .inside p").html(res.faq);
            $(".video .inside").html(video(res.video));
            var path="backend/server/php/files/";
            //alert(res.pic.length);
            var markup="";
            for(var j=0;j<res.pic.length;j++){
                markup="<li><img src="+path+res.pic[j]+" alt=''></li>"+markup;
            }
            $("ul.slider").html(markup);
        }
    });
}
/*---------------------------------video--------------------------------------*/
function video(code){
    var script="<object width='560' height='315'>"+
                "<param name='movie' value='//www.youtube.com/v/"+code+"?version=3&amp;hl=en_US'></param>"+
                "<param name='allowFullScreen' value='true'></param><param name='allowscriptaccess' value='always'></param>"+
                "<embed src='//www.youtube.com/v/"+code+"?version=3&amp;hl=en_US' type='application/x-shockwave-flash' width='560' height='315' allowscriptaccess='always' allowfullscreen='true' style='width:100%;'></embed>";
    return script;
}

$(document).ready(function(){
    /*--------------------------------datepicker------------------------------------------*/
    $(function(){
          $.datepicker.setDefaults(
            $.extend($.datepicker.regional[''])
          );
          $('#datepicker').datepicker();
          $('#datepicker').datepicker('option', $.datepicker.regional['au']);
    });
});

