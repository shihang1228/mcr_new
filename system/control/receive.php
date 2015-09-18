﻿<?php
	 session_start();		//启用session支持
	 include_once('../model/db_fns.php');		//包含系统功能文件
	 include_once('../model/dump.php');
	// header("Content-Type: text/html;charset=gb2312");
	 
	 //response.setContentType("text/xml;charset=UTF-8");

	/** base64转文件输出 
	* @param  String $base64_data base64数据 
	* @param  String $file        要保存的文件路径 
	* @return boolean 
	*/  
	function base64ToFile($base64_data, $file){  
		if(!$base64_data || !$file){  
			return false;  
		}  
		return file_put_contents($file, base64_decode($base64_data), true);  
	}  
	if (isset($_SESSION['userid'])){
	  $userid=$_SESSION['userid'];	
	  $userphone=$_SESSION['user'];
	  $portid =$_SESSION["portid"];//目标口岸
	}
	else {
		echo "error:login";
		return;
	}
	/**
	*检查空串关把空串赋值为0
	*/
	function chageEmptyStr($str){
		if(trim($str)===""){
			return '0';
		}
		else {
			return (trim($str));
		}
	}
	
     header("Content-Type:text/html;charset=UTF-8");
	//response.setcontentType("text/html");

   // response.setcharacterEncoding("utf-8");
   //
 
    //**************收到数据解码验证***********************
	$receivestr = file_get_contents('php://input'); 
	$de_json = json_decode($receivestr,TRUE); //为TRUE  时，将返回 array 而非 object 。 
	//设置货种来源
	$goodtype=1;//现货
	//$cdkey=$userphone.date("ymdHis").rand(1000,9999)."1";
	//解析数据
	$carnum =$de_json["carnum"];//车皮号
	//$portid =$de_json["portid"];//目标口岸
	$goodpositionid=$de_json["goodpositionid"];//当前位置
    //调用类方法
	$dump =new dump($carnum,$goodpositionid,$portid,$userid,$userphone);
	$dump->kindid=$de_json["kindid"];
	$dump->stuffid=$de_json["stuffid"];//材种
    $dump->productlen=chageEmptyStr($de_json["productlen"]);//长度
	$dump->refnum=chageEmptyStr($de_json["refnum"]);//参考根数
	$dump->refcapacity=chageEmptyStr($de_json["refcapacity"]);//参考载量
	$dump->refwight=chageEmptyStr($de_json["refwight"]);//参考重量
	$dump->diameterlen=chageEmptyStr($de_json["diameterlen"]);//径级
	$dump->timber=$de_json["timberid"];//材质
    $dump->timbertype=$de_json["timbertypeid"];//材类
	$dump->wide=chageEmptyStr($de_json["wide"]);//宽度
	$dump->thinckness=chageEmptyStr($de_json["thinckness"]);//厚度
	$dump->tolerance=chageEmptyStr($de_json["tolerance"]);//公差
	$dump->knob=$de_json["knobid"];//节巴
	$dump->climb=$de_json["climbid"];//爬皮
	$dump->position=$de_json["positionid"];//取材位置
	$dump->device=$de_json["deviceid"];//加工设备
	$dump->widerange=chageEmptyStr($de_json["widerange"]);//宽度范围
	$dump->thincknessrange=chageEmptyStr($de_json["thincknessrange"]);//厚度范围
	$dump->newold=$de_json["newoldid"];//新旧
	$dump->blue=$de_json["blueid"];//蓝变
	$dump->worm=$de_json["wormid"];//虫眼
	$dump->decay=$de_json["decayid"];//腐朽
	$dump->fromid=$de_json["fromid"];//产地
	$dump->dry=$de_json["dryid"];  //烘干	 
    $dump->slash=$de_json["slashid"]; //斜裂
	$dump->ring=$de_json["ringid"];//环裂
	$dump->oil=$de_json["oilid"];//抽油
	$dump->black=$de_json["blackid"];//黑心
	$dump->contact=chageEmptyStr($de_json["contact"]);//货主
	$dump->contactphone=chageEmptyStr($de_json["contactphone"]);//货主手机号
	$dump->content=chageEmptyStr($de_json["content"]);//详细介绍
	$dump->mypics =($de_json["pics"]);//图片数组
    
	
	$result =$dump->operationRecord();
   // echo $result;
	// return;
	//echo $dump;
//	return;
	$updateresult=array();
	if ($result){
		$updateresult['result']="success";
		$updateresult['perfect']=$dump->perfect;
		$updateresult['isnew']=$dump->isnew;
		//$updateresult['positionvalue']=$dump->positionvalue;
		//$updateresult['diameterlen']=$dump->diameterlen;//径级
	    //$updateresult['timber']=$dump->timber;//材质
		//$updateresult['timbertype']=  $dump->timbertype;//材类
  
		echo json_encode($updateresult);//插入成功
		return;
	}
	else {
		$updateresult['result']="error";
		$updateresult['perfect']=$dump->perfect;
		$updateresult['isnew']=$dump->isnew;
		echo json_encode($updateresult);//插入成败
        return;
	}
?>