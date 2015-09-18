<?php
    
	//include_once("../db/db_fns.php");
	include_once("db_fns.php");
    /*
	 现货类
	 2015-06-09  公差特殊空值为：-99，别的字段空值为：0
	*/
	
	class dump
	{
	  private $carnum ;//车皮号
	  public $portid ;//目标口岸
	  public $kindid=0 ;//货种
	  public $stuffid=0;//材种
      public $productlen=0;//长度
	  public $refnum=0;//参考根数
	  public $refcapacity=0;//参考载量
	  public $refwight=0;//参考重量
	  public $diameterlen=0;//径级
	  public $timber=0;//材质
      public $timbertype=0;//材类
	  public $wide=0;//宽度
	  public $thinckness=0;//厚度
	  public $tolerance=-99;//公差
	  public $knob=0;//节巴
	  public $climb=0;//爬皮
	  public $position=0;//取材位置
	  public $device=0;//加工设备
	  public $widerange=0;//宽度范围
	  public $thincknessrange=0;//厚度范围
	  public $newold=0;//新旧
	  public $blue=0;//蓝变
	  public $worm=0;//虫眼
	  public $decay=0;//腐朽
	  public $fromid=0;//产地
	  public $dry=0;  //烘干	 
      public $slash=0; //斜裂
	  public $ring=0;//环裂
	  public $oil=0;//抽油
	  public $black=0;//黑心
      public $dumppositionid=0;//当前位置
	  public $mypics;//图片数组
      public $perfect=0;//分数
	  public $userid;
	  public $publishtime;
	  public $updatetime;
	  public $cdkey;
	  public $userphone;
	  public $goodtype=1;//货物类型
	  public $contact=0;//货主
	  public $contactphone=0;//货主手机号
	  public $content;//详细介绍
	  public $positionvalue=0;//位置顺序值
	  private $piccount=0;//图片总数
	  
	  public $isnew;//是否是新插入数据
	  private $dbconn;//数据库连接
	  
	  private $sqlheader; //更新头
	  private $sqlupdate="";//更新参数
	  private $updatesign=false;//更新标记判断是否有新数据更新
	  
	  
	  
	  public function __set($name,$value)
	  {
		  $this->$name=$value;
	  }
	  public function __get($name)
	  {
		  return $this->$name;
	  }
	
	  
	  function __construct($pcarnum,$pdumppositionid,$pportid,$puserid,$puserphone)
	  {
		  $this->carnum=$pcarnum;
		  $this->dumppositionid=$pdumppositionid;
		  $this->portid=$pportid;
		  $this->userid=$puserid;
		  $this->userphone=$puserphone;
		  $this->cdkey=$cdkey=$this->userphone.date("ymdHis").rand(1000,9999).$this->goodtype;
		  $this->publishtime = date("Y-m-d H:i:s");
		  
		  $this->updatetime = $this->publishtime;
		
		  $this->dbconn =db_connect();//数据库连接
		  $this->positionvalue = $this->getpositionvalue();//获取当前位置顺序值
	  }
	  function getpositionvalue()
	  { //获取位置顺序值
		  $sql="select ordervalue from t_dumpposition where positionid=".$this->dumppositionid
		  ." and portid=".$this->portid;
		  $result = $this->dbconn->query($sql);
		  $row=$result->fetch_object();
		  return $row->ordervalue;
   		  
	  }
	  function getpiccount($pcdkey)
	  {
		 //获取图片数
		  $sql="select count(*) as cou from t_productpic where cdkey='".$pcdkey."'";
		  $result = $this->dbconn->query($sql);
		  $row=$result->fetch_object();
		  return $row->cou; 
	  }
	 public  function carnumExist()
	  {
		  //判断车号是否存在于现货中，如果存在返回true,否则返回false;
		$sql="select * from t_product d,t_dumpposition p where carnum='".$this->carnum
		."' and goodtype=1 and d.dumppositionid = p.positionid ";
		
	    $result = $this->dbconn->query($sql);
		if (($result) && ($result->num_rows >0)) {
			$this->isnew=false;//修改数据
			
		
			return $result;
		}
		else {
		
			$this->isnew=true;//新加数据
			return false;
		}
		
	  }
	  
	  private function getscore($pfieldname)
	  {//获取积分
	      $result=0;
		  $sql="select score from t_field where fieldname='".$pfieldname."'";
		  $result = $this->dbconn->query($sql);
		  if($result)
		  {
			  $row=$result->fetch_object(); 
			  $result=$row->score;  
		  }
		 
		  return $result;
	  }
	  
	  private function updatescore($puserid)
	  {//更新用户积分
	      $result=true;
		  if ($this->perfect >0)
		  {
			 $sql="update t_user set score =score +".$this->perfect." where userid=".$puserid;
			// return $sql;
			 $result = $this->dbconn->query($sql);
		  }
		  return $result;
	  }
	  
	 public  function insertRecord()
	  {
		//数据插入数据库
        $query =" insert into t_product(carnum,userid,kindid,stuffid,productlen,diameterlen,wide,thinckness,"
	        ."tolerance,widerange,thincknessrange,refwight,refcapacity,refnum,timber,"
			."dry,newold,timbertype,knob,blue,worm,decay,climb,slash,ring,oil,black,"
			."position,device,fromid,portid,publishtime,"
			."dumppositionid,updatetime,goodtype,cdkey,perfect,contact,contactphone,content) values ('"
            .$this->carnum."',".$this->userid.",".$this->kindid.",".$this->stuffid.",'".$this->productlen."',".$this->diameterlen.",".$this->wide.",".$this->thinckness.","
			.$this->tolerance.",".$this->widerange.",".$this->thincknessrange.",".$this->refwight.",".$this->refcapacity.",".$this->refnum.",'".$this->timber."','"
			.$this->dry."','".$this->newold."','".$this->timbertype."','".$this->knob."','".$this->blue."','".$this->worm."','".$this->decay."','".$this->climb."','".$this->slash
			."','".$this->ring."','".$this->oil."','".$this->black."','"
			.$this->position."','".$this->device."','".$this->fromid."','".$this->portid."','".$this->publishtime."',".$this->dumppositionid.",'"
			.$this->updatetime."',".$this->goodtype.",'".$this->cdkey."',".$this->perfect.",'".$this->contact."','"
			.$this->contactphone."','".$this->content."')";
			
			//return $query;
	        $result =$this->dbconn->query($query);
			
		  return $result;
	  }
	  
	 public  function operationRecord()
	  {
		  //事务开启
		  $this->dbconn->query("start transaction");
		  $resultdata=$this->carnumExist();
		  $resultpic=true;
		  $resultoperation=true;
		  if(!$resultdata) {//车皮号不存在
		   
			//return $resultoperation;
			$carnumresult=$this->runRecord("carnum",$this->carnum,0);
			$kindidresult=$this->runRecord("kindid",$this->kindid,0);
			$stuffidresult=$this->runRecord("stuffid",$this->stuffid,0);//材种
            $productlenresult=$this->runRecord("productlen",$this->productlen,0);//长度
	        $refnumresult=$this->runRecord("refnum",$this->refnum,0);//参考根数
	        $refcapacityresult=$this->runRecord("refcapacity",$this->refcapacity,0);//参考载量
			
	        $refwightresult=$this->runRecord("refwight",$this->refwight,0);//参考重量
	        $diameterlenresult=$this->runRecord("diameterlen",$this->diameterlen,0);//径级
	        $timberresult=$this->runRecord("timber",$this->timber,0);//材质
			//return $timberresult;
            $timbertyperesult=$this->runRecord("timbertype",$this->timbertype,0);//材类
            $wideresult=$this->runRecord("wide",$this->wide,0);//宽度
	        $thincknessresult=$this->runRecord("thinckness",$this->thinckness,0);//厚度
	        $toleranceresult=$this->runRecord("tolerance",$this->tolerance,-99);//公差
	        $knobresult=$this->runRecord("knob",$this->knob,0);//节巴
	        $climbresult=$this->runRecord("climb",$this->climb,0);//爬皮
	        $positionresult=$this->runRecord("position",$this->position,0);//取材位置
	        $deviceresult=$this->runRecord("device",$this->device,0);//加工设备
	        $widerangeresult=$this->runRecord("widerange",$this->widerange,0);//宽度范围
	        $thincknessrangeresult=$this->runRecord("thincknessrange",$this->thincknessrange,0);//厚度范围
	        $newoldresult=$this->runRecord("newold",$this->newold,0);//新旧
	        $blueresult=$this->runRecord("blue",$this->blue,0);//蓝变
	        $wormresult=$this->runRecord("worm",$this->worm,0);//虫眼
	        $decayresult=$this->runRecord("decay",$this->decay,0);//腐朽
	        $fromidresult=$this->runRecord("fromid",$this->fromid,0);//产地
			$dryresult=$this->runRecord("dry",$this->dry,0);//烘干
			$slashresult=$this->runRecord("slash",$this->slash,0);//斜裂
			$ringresult=$this->runRecord("ring",$this->ring,0);//环裂
			$oilresult=$this->runRecord("oil",$this->oil,0);//抽油
			$blackresult=$this->runRecord("black",$this->black,0);//黑心
			$contactresult=$this->runRecord("contact",$this->contact,0);//货主
			$contactphoneresult=$this->runRecord("contactphone",$this->contactphone,0);//货主手机
			$contentresult=$this->runRecord("content",$this->content,0);//详细介绍
			$dumppositionidresult=$this->runRecord("dumppositionid",$this->dumppositionid,0);//当前位置
		//	return $dumppositionidresult;
			$resultoperation =$this->insertRecord();//插入数据
			 //return $resultoperation;
			$resultpic =$this->savePic();
			
			}
		  else{//车皮号存在，完善信息
			$row=$resultdata->fetch_object();
			$this->cdkey=$row->cdkey;//cdkey重新赋值
			$this->piccount=$this->getpiccount($this->cdkey);//获取图片数
			$carnumresult=$this->runRecord("carnum",$this->carnum,$row->carnum);//车皮号
			$kindidresult=$this->runRecord("kindid",$this->kindid,$row->kindid);//货种
			$stuffidresult=$this->runRecord("stuffid",$this->stuffid,$row->stuffid);//材种
            $productlenresult=$this->runRecord("productlen",$this->productlen,$row->productlen);//长度
	        $refnumresult=$this->runRecord("refnum",$this->refnum,$row->refnum);//参考根数
	        $refcapacityresult=$this->runRecord("refcapacity",$this->refcapacity,$row->refcapacity);//参考载量
	        $refwightresult=$this->runRecord("refwight",$this->refwight,$row->refwight);//参考重量
	        $diameterlenresult=$this->runRecord("diameterlen",$this->diameterlen,$row->diameterlen);//径级
	        $timberresult=$this->runRecord("timber",$this->timber,$row->timber);//材质
            $timbertyperesult=$this->runRecord("timbertype",$this->timbertype,$row->timbertype);//材类
            $wideresult=$this->runRecord("wide",$this->wide,$row->wide);//宽度
	        $thincknessresult=$this->runRecord("thinckness",$this->thinckness,$row->thinckness);//厚度
	        $toleranceresult=$this->runRecord("tolerance",$this->tolerance,$row->tolerance);//公差
	        $knobresult=$this->runRecord("knob",$this->knob,$row->knob);//节巴
	        $climbresult=$this->runRecord("climb",$this->climb,$row->climb);//爬皮
	        $positionresult=$this->runRecord("position",$this->position,$row->position);//取材位置
	        $deviceresult=$this->runRecord("device",$this->device,$row->device);//加工设备
	        $widerangeresult=$this->runRecord("widerange",$this->widerange,$row->widerange);//宽度范围
	        $thincknessrangeresult=$this->runRecord("thincknessrange",$this->thincknessrange,$row->thincknessrange);//厚度范围
	        $newoldresult=$this->runRecord("newold",$this->newold,$row->newold);//新旧
	        $blueresult=$this->runRecord("blue",$this->blue,$row->blue);//蓝变
	        $wormresult=$this->runRecord("worm",$this->worm,$row->worm);//虫眼
	        $decayresult=$this->runRecord("decay",$this->decay,$row->decay);//腐朽
	        $fromidresult=$this->runRecord("fromid",$this->fromid,$row->fromid);//产地
			$dryresult=$this->runRecord("dry",$this->dry,$row->dry);//烘干
			$slashresult=$this->runRecord("slash",$this->slash,$row->slash);//斜裂
			$ringresult=$this->runRecord("ring",$this->ring,$row->ring);//环裂
			$oilresult=$this->runRecord("oil",$this->oil,$row->oil);//抽油
			$blackresult=$this->runRecord("black",$this->black,$row->black);//黑心
			$contactresult=$this->runRecord("contact",$this->contact,$row->contact);//货主
			$contactphoneresult=$this->runRecord("contactphone",$this->contactphone,$row->contactphone);//货主手机
			$contentresult=$this->runRecord("content",$this->content,$row->content);//详细介绍
			$dumppositionidresult=$this->runRecord("dumppositionid",$this->dumppositionid,$row->ordervalue);//当前位置
			//更新操作
			if ($this->updatesign) {
			   	$this->sqlupdate =" update t_product set updatetime='".$this->updatetime."', perfect=".$this->perfect.$this->sqlupdate
			." where productid='".$row->productid."'";
			//return $this->sqlupdate;
			$resultoperation =$this->dbconn->query($this->sqlupdate);	
			}
		
			
		  }
		  $resultscore=$this->updatescore($this->userid);
		//  return $resultscore;
		  $result= $resultoperation && $kindidresult && $stuffidresult && $productlenresult && $refnumresult
		     && $refcapacityresult && $refwightresult && $diameterlenresult &&  $timberresult
			 &&  $timbertyperesult &&   $wideresult && $thincknessresult  && $toleranceresult
             &&  $knobresult && $climbresult && $positionresult &&  $deviceresult &&  $widerangeresult
			 &&  $thincknessrangeresult && $newoldresult &&  $blueresult && $wormresult && $decayresult
	         &&  $fromidresult && $dryresult && $slashresult && $ringresult && $oilresult && $blackresult && $resultpic
			 &&  $contactphoneresult && $contentresult && $dumppositionidresult && $resultscore;
			 
		 if ($result) {
			 $this->dbconn->query("commit");//提交事务
		 } 
		 else {
			 $this->dbconn->query("rollback");//回滚事务
		 }
		  return $result;
		  
	  }
	  
	  //执行记录
	  function runRecord($fieldname,$fieldvalue,$param)
	  {
		 $result=true;
		if($fieldname=='tolerance') { //公差特殊处理
			if ((($param===-99)||($param==='-99')) &&(($fieldvalue !==-99)&&($fieldvalue !=='-99'))){  
		   $sql=" insert into t_fieldrecord(cdkey,fieldname,userid,updatetime,value) values('" 
			 .$this->cdkey."','".$fieldname."',".$this->userid.",'".$this->updatetime."','".$fieldvalue."')"; 
			//return $sql;
		    $result= $this->dbconn->query($sql);  
		    $this->sqlupdate=$this->sqlupdate.",".$fieldname."='".$fieldvalue."' ";
		    $this->perfect = $this->perfect +$this->getscore($fieldname);//更新分数
			$this->updatesign=true; 
		  }
		}
		else if($fieldname=='dumppositionid'){ //只有是新位置才进行更新
			if ($this->positionvalue >$param){  
		     $sql=" insert into t_fieldrecord(cdkey,fieldname,userid,updatetime,value) values('" 
			 .$this->cdkey."','".$fieldname."',".$this->userid.",'".$this->updatetime."','".$fieldvalue."')"; 
			//return $sql;
		    $result= $this->dbconn->query($sql);  
		    $this->sqlupdate=$this->sqlupdate.",".$fieldname."='".$fieldvalue."' ";
		    $this->perfect = $this->perfect +$this->getscore($fieldname);//更新分数
			$this->updatesign=true; 
		  }
		}
		else if ((($param===0)||($param==='0')) &&(($fieldvalue !==0)&&($fieldvalue !=='0'))){  
		   $sql=" insert into t_fieldrecord(cdkey,fieldname,userid,updatetime,value) values('" 
			 .$this->cdkey."','".$fieldname."',".$this->userid.",'".$this->updatetime."','".$fieldvalue."')"; 
			//return $sql;
		    $result= $this->dbconn->query($sql);  
		    $this->sqlupdate=$this->sqlupdate.",".$fieldname."='".$fieldvalue."' ";
			$this->perfect = $this->perfect +$this->getscore($fieldname);//更新分数
			$this->updatesign=true; 
		  }
		 return $result;
	  }
	  
	  public function __toString()
	  {
		  return (var_export($this,TRUE));
	  }
	  
	  public function savePic()
	  {//保存图片
	    $result=true;
		// $documentroot=$_SERVER['DOCUMENT_ROOT'];
		$dir="Uploads/".date('Ymd')."/";
		$path="../../".$dir;
		//return $path;
		
        if(!file_exists($path)){
            mkdir($path);
        }
		
		$count_json = count($this->mypics);
		
		if($count_json >0) { //有图片
		 // return $count_json;
		    if ( $count_json >4-$this->piccount)
			{
		       $count_json=4-$this->piccount;
			 }  
			for ($i = 0; $i < $count_json; $i++)
			{
				$pic =($this->mypics[$i]['base64']);
				$filename=date('YmdHis').rand(1000,9999).$this->userid.'.jpg';
				$streamFileRand = $path.$filename;   //产生一个随机文件名
			
				preg_match('/(?<=base64,)[\S|\s]+/',$pic,$streamForW); //处理base64文本，用正则把第一个base64,之前的部分砍掉
				if($this->base64ToFile($streamForW[0], $streamFileRand)) {
					//写入文件成功，把数据插入数据库
				 $query="insert into t_productpic(cdkey,productpic,instime) values(".$this->cdkey.",'".$dir.$filename."',null)";
				 $insresult =$this->dbconn->query($query);
				 if (!($insresult)) {
					 //数据插入记录失败 
					  $result=false;
					  break;
				 }
				 //图片插入记录
				  $sql=" insert into t_fieldrecord(cdkey,fieldname,userid,updatetime,value) values('" 
			       .$this->cdkey."','productpic',".$this->userid.",'".$this->updatetime."','".$dir.$filename."')"; 
		          $result= $this->dbconn->query($sql);  
				 //
				}
				else { //写文件失败
					$result=false;
					break;
				}
			}
		}
		return $result;
	  }
	  
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
	
	  
	}
  

	?>