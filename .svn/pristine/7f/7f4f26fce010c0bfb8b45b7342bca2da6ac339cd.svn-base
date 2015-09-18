<?php
	 session_start();		//启用session支持
	 include_once('db_fns.php');		//包含系统功能文件
	include_once('mcr_fns.php');
	 $portid =$_SESSION["portid"];//目标口岸
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
	//echo $de_json;
	//解析数据
    $goodtype=2;//散货标识
	
	$kindid =$de_json["kindid"];//货种
	$stuffid=$de_json["stuffid"];//材种
    $productlen=chageEmptyStr($de_json["productlen"]);//长度

	$refcapacity=chageEmptyStr($de_json["refcapacity"]);//参考载量
	$diameterlen=chageEmptyStr($de_json["diameterlen"]);//径级
	$timber=$de_json["timberid"];//材质
    $timbertype=$de_json["timbertypeid"];//材类
	$wide=chageEmptyStr($de_json["wide"]);//宽度
	$thinckness=chageEmptyStr($de_json["thinckness"]);//厚度
	$tolerance=chageEmptyStr($de_json["tolerance"]);//公差
	
	$knob=$de_json["knobid"];//节巴
	$climb=$de_json["climbid"];//爬皮
	$part=$de_json["part"];//取材位置
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
    $content=$de_json["content"];
	$dumpposition=chageEmptyStr($de_json["dumpposition"]);//货场
	
			   
	$mypics =($de_json["pics"]);//图片数组
	//
	$publishtime =date("Y-m-d H:i:s");
	$updatetime=$publishtime;
    //$cdkey=$userphone.date("ymdHis").rand(1000,9999)."2";
	$cdkey = $de_json["cdkey"];  //修改散货,使用传入的值
    //*********数据输入****
    $conn = db_connect();
	$conn ->query("start transaction");//开始事务
    //插入数据
     $query ="update t_product set kindid=".$kindid.",stuffid=".$stuffid.",productlen='".$productlen."',diameterlen=".$diameterlen.",wide=".$wide.",thinckness=".$thinckness.",tolerance=".$tolerance.
	 ",widerange=".$widerange.",thincknessrange=".$thincknessrange.",refcapacity=".$refcapacity.",timber='".$timber."',dry='".$dry."',newold='".$newold."',timbertype='".$timbertype."',knob='".$knob."',blue='".$blue.
	 "',worm='".$worm."',decay='".$decay."',climb='".$climb."',slash='".$slash."',ring='".$ring."',oil='".$oil."',black='".$black."',part='".$part."',device='".$device."',fromid='".$fromid."',portid='".$portid.
	 "',publishtime='".$publishtime."',dumpposition='".$dumpposition."',updatetime='".$updatetime."',goodtype=2,content='".$content."' where cdkey='".$cdkey."'";
	    $insertresult =$conn->query($query);
	
		$path='dump/'.date('Ymd').'/';
        if(!file_exists($path)){
            mkdir($path);
        }
		
		$picresult=TRUE;
		$deleted = true;  //旧图片文件删除标记
		$delfromdb = true;  //旧图片数据删除标记
		
		$count_json = count($mypics);
		if($count_json >0) { //有图片
			
			//删除原有图片(硬盘,数据库)
			$compic = get_mydata("select picid,productpic from t_productpic where cdkey = '".$cdkey."'");
			if (is_array($compic)) {
				foreach ($compic as $drow)
				{
					if(!unlink($drow["productpic"])) $deleted = false;
				}
				$query="delete from t_productpic where cdkey = '".$cdkey."'";
				$result =$conn->query($query);
				if(!$result) $delfromdb = false;
			}
			
			for ($i = 0; $i < $count_json; $i++)
			{
				$pic =($mypics[$i]['base64']);
				$streamFileRand = $path.date('YmdHis').rand(1000,9999).$userid.'.jpg';    //产生一个随机文件名
			
				preg_match('/(?<=base64,)[\S|\s]+/',$pic,$streamForW); //处理base64文本，用正则把第一个base64,之前的部分砍掉
				if(base64ToFile($streamForW[0], $streamFileRand)) {
					//写入文件成功，把数据插入数据库
				 $query="insert into t_productpic(cdkey,productpic,instime) values(".$cdkey.",'".$streamFileRand."',null)";
				 $result =$conn->query($query);
				 if (!($result)) {
					 //数据插入记录失败 
					$picresult=false;
					break; 
				 }
				}
				else { //写文件失败
					$picresult=false;
					break;
				}
			}
		}
		
	 if($insertresult && $picresult && $deleted && $delfromdb){
		 $conn->query("commit");//提交事务
		 echo "success";//插入成功
         return; 
		 
	 }
	 else {
		 $conn->query("rollback");//提交事务
		 echo "error";//插入失败
         return; 
	 }
	
?>