<?php
	 session_start();		//启用session支持
	 include_once('db_fns.php');		//包含系统功能文件
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
	 
	 $query="select count(companyid) from t_company where companyname='".$companyname."'";
	 $result = @$conn->query($query);
	 $num =$result->fetch_row();
  	if($num[0]>=1){
        echo "error1";	//该企业已存在
 	}
    //插入数据
      $query ="insert into t_company(companyname,userid,product,contact,phone,contactphone,email,address,"
	        ."website,keyword,content,publishtime,updatetime) values ('"
			.$companyname."',".$userid.",'".$product."','".$contact."','".$phone."','".$contactphone."','".$email."','".$address."','"
			.$website."','".$keyword."','".$content."','".$publishtime."','".$updatetime."')";
	   $insertresult =$conn->query($query);
       $picresult=true;
	 if( $insertresult)
	 {
		$path='company/';
        if(!file_exists($path)){
            mkdir($path);
        }
		$count_json = count($mypics);
	
		 
		if($count_json >0) { //有图片
		  $weixin = new class_weixin();//微信类，
			
		    $query="select companyid from t_company where companyname='".$companyname."'";
			$result=$conn->query($query);
			if ($result) {
				$row=$result->fetch_row();
				$companyid=$row[0];
				//
				for ($i = 0; $i < $count_json; $i++)
				{
					$mediaid =$mypics[$i];
					$filename=date('YmdHis').rand(1000,9999).$companyid;
					
					$tfilename=$filename.'s';
					$streamFileRand = $path.$filename.'.jpg';   //大图文件名
					$tfilename= $path.$tfilename.'.jpg';//缩略图文件名
					$savepicresult = $weixin->downloadWeixinFile($mediaid,$streamFileRand,$tfilename);
					
					   if($savepicresult) {	//写入文件成功，把数据插入数据库
						 $query="insert into t_companypic(companyid,companypic,instime) values(".$companyid.",'".$streamFileRand."',null)";
						 $result =$conn->query($query);
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
			else {
				$picresult=false;
			}
		
		}
	 }
	  if($insertresult && $picresult){
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