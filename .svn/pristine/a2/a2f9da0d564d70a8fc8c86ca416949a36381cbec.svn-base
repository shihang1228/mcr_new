<?php
	 session_start();		//启用session支持
	 include_once('mcr_sc_fns.php');
     require_once('system/model/weixin.class.php');


     $weixin = new class_weixin();
	 
	 $mediaid=$_GET['mediaid'];
	//$mediaid="";
	 $access_token=$weixin->access_token;
	 
	 $url="http://file.api.weixin.qq.com/cgi-bin/media/get?access_token=".$access_token."&media_id=".$mediaid;
	 $fileInfo = downloadWeixinFile($url);
	 
	 $filename="down_image.jpg";
	// echo $url;
	// return;
	 saveWeixinFile($filename,$fileInfo["body"]);
	
     function downloadWeixinFile($url) {
		 $ch=curl_init($url);
		 curl_setopt($ch,CURLOPT_HEADER,0);
		 curl_setopt($ch,CURLOPT_NOBODY,0);
		 curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,FALSE);
		 curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,FALSE);
		 curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		 $package=curl_exec($ch);
		// echo $package;
		// echo "===================";
		 
		 $httpinfo=curl_getinfo($ch);
	//	 echo @implode(';',$httpinfo);
		 curl_close($ch);
		 $imageAll=array_merge(array('header'=>$httpinfo),array('body'=>$package));
		 if(strpos($package,'errcode')===false)
		 {
			 echo "ok";
		 }
		 else {
			 echo "error";
		 }
		 return $imageAll;
	 }	
	 
	 function saveWeixinFile($filename,$filecontent)
	 {
		 $local_file =fopen($filename,'w');
	 if(false !==$local_file){
		 if(false !==fwrite($local_file,$filecontent)) {
			 fclose($local_file);
		 }
	 }
	 }
	
?>