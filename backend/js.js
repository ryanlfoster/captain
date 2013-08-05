ref();



$("#about,#faq").focus(function(){
	$(this).animate({
		"height": '200px'
	});
});
$("#about,#faq").focusout(function(){
	$(this).animate({
		"height": '100px'
	});
});

$("#publish").click(function(){
	$("#publish").removeClass("btn-warning");
	var abt=$("#about").val();
	var fq=$("#faq").val();
	var vid=$("#videoid").val();
	var pic_arr=new Array();
	for(var i=0; i<$(".files tr").length;i++){
		pic_arr.push($(".files tr:nth("+i+") td:nth(1) p a").html());
	}
	var pic=pic_arr.join("$$$");
	var content=abt+"@@@"+fq+"@@@"+pic+"@@@"+vid;
	implement(content);
});
$("#clear").click(function(){
	$("#about,#faq").val("");
});

$("#about,#faq,#videoid").change(function(){
	$("#publish").addClass("btn-warning");
});


function implement(imp){
	$.ajax({
		type: "GET",
		url: "gen.php",
		//dataType: 'json',
		data: {imp:imp},
		async: false,
		success:function(res){
			alert(res);
		}
	});
}

function ref(){
	$.ajax({
		type: "GET",
		url: "../data.json",
		dataType: 'json',
		async: false,
		success:function(res){
			$("#about").val(res.about);
			$("#faq").val(res.faq);
			$("#videoid").val(res.video);
		}
	});
}

/*--------------------------------Table change detect--------------------------------------------------*/
setInterval(function() {
    var $t = $(".table"),
        rowCount = $t.data("rowCount"),
        rowLength = $t.find("tbody").children().length;
    if (rowCount && rowCount !== rowLength) {
        $t.trigger("rowcountchanged").data("rowCount", rowLength);
    }
    else if (!rowCount) {
        $t.data("rowCount", rowLength);
    }

}, 50);
$(".table").on("rowcountchanged",function(){
	$("#publish").addClass("btn-warning");
});


 /*------------------------------------------------Msg Box-------------------------------------------------------*/
 function show_message(message,class_name) {
     $("<div/>", { class: class_name, text: message }).hide().prependTo(".contact")
     .slideDown('fast').delay(1000).slideUp(function() { jQuery(this).remove(); });
 }