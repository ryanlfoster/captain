<?php
	$data=$_GET["imp"];
	$data_arr=explode("@@@", $data);
	$about=$data_arr[0];
	$faq=$data_arr[1];
	$pic=$data_arr[2];
	$video=$data_arr[3];
	$pic_arr=explode("$$$", $pic);
	$json_gen["about"]=$about;
	$json_gen["faq"]=$faq;
	$json_gen["pic"]=$pic_arr;
	$json_gen["video"]=$video;
	$json_str= json_encode($json_gen);
	$file = fopen('../data.json','w+');
   	if(fwrite($file, $json_str)){
   		fclose($file);
		echo "Published";	
   	}
   	else{
   		echo "Please click the Publish buttom again";
   	}
   	
?>