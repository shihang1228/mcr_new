﻿<?php
	 session_start();		//启用session支持
	 include_once('db_fns.php');		//包含系统功能文件
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
			return 0;
		}
		else {
			return (trim($str));
		}
	}
	
     header("Content-Type:text/html;charset=UTF-8");
	//response.setcontentType("text/html");

   // response.setcharacterEncoding("utf-8");
    //**************收到数据解码验证***********************
	$receivestr = file_get_contents('php://input'); 
	$de_json = json_decode($receivestr,TRUE); //为TRUE  时，将返回 array 而非 object 。 
	//设置货种来源
	$goodtype=1;//现货
	$cdkey=$userphone.date("ymdHis").rand(1000,9999)."1";
	//解析数据
	$carnum =$de_json["carnum"];//车皮号
	$portid =$de_json["portid"];//目标口岸
	$kindid =$de_json["kindid"];//货种
	$stuffid=$de_json["stuffid"];//材种
    $productlen=chageEmptyStr($de_json["productlen"]);//长度
	$refnum=chageEmptyStr($de_json["refnum"]);//参考根数
	$refcapacity=chageEmptyStr($de_json["refcapacity"]);//参考载量
	$refwight=chageEmptyStr($de_json["refwight"]);//参考重量
	$diameterlen=chageEmptyStr($de_json["diameterlen"]);//径级
	$timber=$de_json["timberid"];//材质
    $timbertype=$de_json["timbertypeid"];//材类
	$wide=chageEmptyStr($de_json["wide"]);//宽度
	$thinckness=chageEmptyStr($de_json["thinckness"]);//厚度
	$tolerance=chageEmptyStr($de_json["tolerance"]);//公差
	$knob=$de_json["knobid"];//节巴
	$climb=$de_json["climbid"];//爬皮
	$position=$de_json["positionid"];//取材位置
	$device=$de_json["deviceid"];//加工设备
	$widerange=chageEmptyStr($de_json["widerange"]);//宽度范围
	$thincknessrange=chageEmptyStr($de_json["thincknessrange"]);//厚度范围
	$newold=$de_json["newoldid"];//新旧
	$blue=$de_json["blueid"];//蓝变
	$worm=$de_json["wormid"];//虫眼
	$decay=$de_json["decayid"];//腐朽
	$fromid=$de_json["fromid"];//产地
	$dry=$de_json["dryid"];  //烘干	 
    $slash=$de_json["slashid"]; //斜裂
	$ring=$de_json["ringid"];//环裂
	$oil=$de_json["oilid"];//抽油
	$black=$de_json["blackid"];//黑心
   
	//$showtime=$de_json["showtime"];//显示时间
	$goodpositionid=$de_json["goodpositionid"];//当前位置
			   
	$mypics =($de_json["pics"]);//图片数组
	//
	$publishtime =date("Y-m-d H:i:s");
	$updatetime=$publishtime;
	
    //*********数据输入****
     $conn = db_connect();
	 $query="select productid from t_product where carnum='".$carnum."'";
	 $result = @$conn->query($query);
	 $num =$result->fetch_row();
  	if($num){
        echo "error1";	//车皮号已经存在于现货表
        return;
 	}
    //插入数据
     $query ="insert into t_product(carnum,userid,kindid,stuffid,productlen,diameterlen,wide,thinckness,"
	        ."tolerance,widerange,thincknessrange,refwight,refcapacity,refnum,timber,"
			."dry,newold,timbertype,knob,blue,worm,decay,climb,slash,ring,oil,black,"
			."position,device,fromid,portid,publishtime,"
			."goodpositionid,updatetime,goodtype,cdkey) values ('"
            .$carnum."',".$userid.",".$kindid.",".$stuffid.",'".$productlen."',".$diameterlen.",".$wide.",".$thinckness.","
			.$tolerance.",".$widerange.",".$thincknessrange.",".$refwight.",".$refcapacity.",".$refnum.",'".$timber."','"
			.$dry."','".$newold."','".$timbertype."','".$knob."','".$blue."','".$worm."','".$decay."','".$climb."','".$slash."','".$ring."','".$oil."','".$black."','"
			.$position."','".$device."','".$fromid."','".$portid."','".$publishtime."',".$goodpositionid.",'".$updatetime."',".$goodtype.",'".$cdkey."')";
		//echo $query;
       // return;		
	   $result =$conn->query($query);
	
	 if($result)
	 {
		$path='Uploads/'.date('Ymd').'/';
        if(!file_exists($path)){
            mkdir($path);
        }
		$count_json = count($mypics);
		if($count_json >0) { //有图片
			
		    $query="select productid from t_product where cdkey='".$cdkey."'";
			$result=$conn->query($query);
			if ($result) {
				$row=$result->fetch_row();
				$productid=$row[0];
			}
			else {
				echo "error2";//插入失败
				return;
			}
			for ($i = 0; $i < $count_json; $i++)
			{
				$pic =($mypics[$i]['base64']);
				$streamFileRand = $path.date('YmdHis').rand(1000,9999).$userid.'.jpg';    //产生一个随机文件名
			
				preg_match('/(?<=base64,)[\S|\s]+/',$pic,$streamForW); //处理base64文本，用正则把第一个base64,之前的部分砍掉
				if(base64ToFile($streamForW[0], $streamFileRand)) {
					//写入文件成功，把数据插入数据库
				 $query="insert into t_productpic(productid,productpic,instime) values(".$productid.",'".$streamFileRand."',null)";
				 $result =$conn->query($query);
				 if (!($result)) {
					 //数据插入记录失败 
				 }
				}
				else { //写文件失败
					
				}
			}
		}
	  // echo "<script>alert('发布成功！');window.location.href='index.php'</script>";
	 }else{
		 //插入产品记录失败
	   echo "error4";//记录插入失败
	   return;
	   //"<script>alert('注册失败！');history.back();</script>";
	}
	echo "success";//插入成功
    return;
	
?>