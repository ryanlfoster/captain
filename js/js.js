
      
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
                        $("#message").val()
                    ].join("@@@");

           // alert(content);
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

    
    /*------------------------------------------------Msg Box-------------------------------------------------------*/
        function show_message(message,class_name) {
            $("<div/>", { class: class_name, text: message }).hide().prependTo(".contact")
            .slideDown('fast').delay(1000).slideUp(function() { jQuery(this).remove(); });
        }

 