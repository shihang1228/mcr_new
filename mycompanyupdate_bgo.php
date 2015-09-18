<?php
	 session_start();		//启用session支持
	 include_once('system/model/db_fns.php');		//包含系统功能文件
	 include_once('mcr_fns.php');
	 require_once('system/model/weixin.class.php');
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
    //**************收到数据解码验证***********************
	$receivestr = file_get_contents('php://input'); 
	$de_json = json_decode($receivestr,TRUE); //为TRUE  时，将返回 array 而非 object 。 
	//echo $de_json;
	//解析数据
	$companyid = $de_json["companyid"];//公司id
	$companyname =$de_json["companyname"];//公司名
	$product =$de_json["product"];//主要产品
	$contact =$de_json["contact"];//联系人
	$phone=$de_json["phone"];//手机
   // $productlen=chageEmptyStr($de_json["productlen"]);//长度
	$contactphone=$de_json["contactphone"];//联系电话
    $email=$de_json["email"];//邮箱
	$address=chageEmptyStr($de_json["address"]);//地址
	$website=chageEmptyStr($de_json["website"]);//网址
	$content=chageEmptyStr($de_json["content"]);//网址
	
	$keyword=chageEmptyStr($de_json["keyword"]);//关键字
	
	$publishtime =date("Y-m-d H:i:s");
	$updatetime=$publishtime;
	
			   
	$mypics =($de_json["pics"]);//图片数组
	
    //*********数据输入****
     $conn = db_connect();
	 $conn ->query("start transaction");//开始事务
    //更新数据
    $query ="update t_company set companyname='".$companyname."',product='".$product."',contact='".$contact."',phone='".$phone."',contactphone='".$contactphone."',email='".$email."',"
	."address='".$address."',website='".$website."',keyword='".$keyword."',content='".$content."',updatetime='".$updatetime."' where companyid=".$companyid;
	$insertresult =$conn->query($query);
    $picresult=true;
	$deleted = true;
	$delfromdb = true;
	$tdeleted =true;
	if( $insertresult)
	 {
		$path='company/';
        if(!file_exists($path)){
            mkdir($path);
        }
		$count_json = count($mypics);
		if($count_json >0) { //有图片
			
		    
			//删除原有图片(硬盘,数据库)
			$compic = get_mycompanypicpath($companyid);
			if (is_array($compic)) {
				foreach ($compic as $drow)
				{
					if(!unlink($drow["companypic"])) $deleted = false;
					if(!unlink(str_replace('.jpg','s.jpg',$drow["companypic"]))) $tdeleted = false;
				}
				$query="delete from t_companypic where companyid = ".$companyid;
				$result =$conn->query($query);
				if($result) $delfromdb = true;
			}
               $weixin = new class_weixin();//微信类，
				//error_log(date('Y-m-d H:i:s') . ":进微信11\r\n",3,$_SERVER['DOCUMENT_ROOT']."/log/run.log");
				for ($i = 0; $i < $count_json; $i++)
				{
					$mediaid =$mypics[$i];
					$filename = date('YmdHis').rand(1000,9999).$companyid;    //产生一个随机文件名
				    $tfilename=$filename.'s';
					$streamFileRand = $path.$filename.'.jpg';   //大图文件名
					$tfilename= $path.$tfilename.'.jpg';//缩略图文件名
					
					$savepicresult = $weixin->downloadWeixinFile($mediaid,$streamFileRand,$tfilename);
					
					if($savepicresult) {
						//写入文件成功，把数据插入数据库
					 $query="insert into t_companypic(companyid,companypic,instime) values(".$companyid.",'".$streamFileRand."',null)";
					 $result =$conn->query($query);
					//echo $query;
					//return;
					 if (!($result)) {
						 //数据插入记录失败 
						 $picresult=true;
					 }
					}
					else { //写文件失败
						$picresult=false;
						break;
					}
				 }
		
		}
	 }
	 
	  if($insertresult && $picresult  && $delfromdb && $deleted && $tdeleted){
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