<?php
   //include_once("db_fns.php");
    /*
	 木材类
	*/
	
	class wood
	{
	 private $dbconn;
	 public  $stuff=array();
	 public  $from=array();
	 public  $spotposition=array();//现货位置
	 public  $salestatus=array();//销售状态
	 public  $kind = array();//货种 lja
	 public $length = array(); //长度
	 public $device = array(); //加工设备
	 public $timber = array(); //选材
	 public $timbertype = array();  //纹理
	 public $knob = array();  //节巴
	 public $climb = array();  //爬皮
	 public $part = array();  //取材
	 public $newold = array();  //新旧
	 public $blue = array();  //蓝变
	 public $worm = array();  //虫眼
	 public $decay = array();  //腐朽
	 public $tolerance = array(); //公差
	 private $portid;
	  
	  public function __set($name,$value)
	  {
		  $this->$name=$value;
	  }
	  public function __get($name)
	  {
		  return $this->$name;
	  }
	  
	  function __construct($pportid)
	  {
		  $this->dbconn =db_connect();//数据库连接
		  $this->portid=$pportid;
	  }
	  public function release(){ 
		  $this->get_stuffarray();
		  $this->get_from();
		  $this->get_spotposition();
		  $this->get_salestatus();
		  $this->get_kind();
		  $this->get_length();
		  $this->get_device();
		  $this->timber =$this->get_dic("select timberid,timbername from t_timber"); //选材
	}
	
	 public function realrelease(){ 
		  /*$this->get_stuffarray();
		  $this->get_from();
		  $this->get_spotposition();
		  $this->get_salestatus();
		  $this->get_kind();
		  $this->get_length();
		  $this->get_device();*/

		  $this->release();
		 $this->tolerance = $this->get_dic("select tolid,tolname from t_tolerance");//公差
		 $this->timbertype =$this->get_dic("select timbertypeid,timbertypename from t_timbertype");  //纹理
		 $this->knob = $this->get_dic("select knobid,knobname from t_knob");  //节巴
		 $this->climb = $this->get_dic("select climbid,climbname from t_climb");  //爬皮
		 $this->part = $this->get_dic("select positionid,positionname from t_position");  //取材
		 $this->newold = $this->get_dic("select newoldid,newoldname from t_newold");  //新旧
		 $this->blue = $this->get_dic("select blueid,bluename from t_blue");  //蓝变
		 $this->worm = $this->get_dic("select wormid,wormname from t_worm");  //虫眼
		 $this->decay = $this->get_dic("select decayid,decayname from t_decay");  //腐朽
		  
	}
	  
	 //下拉选择2015.06.27 lja
	 function get_dic($sql){
		 if($sql!=''){
			$query = $sql;
			$result= $this->dbconn->query($query);
			if(!$result) {
				return false;
			}
			$num =@$result->num_rows;
			if($num ==0) {
				return false;
			}
			$result = db_result_to_array($result);
			return $result;
		 }
	 }
	 
	  //货种2015.06.27 lja
	 function get_device(){
		$query ="select deviceid,devicename from t_device";
		$result= $this->dbconn->query($query);
		if(!$result) {
			return false;
		}
		$num =@$result->num_rows;
		if($num ==0) {
			return false;
		}
		$result = db_result_to_array($result);
		$this->device=$result;
	 }

	 //货种2015.06.27 lja
	 function get_length(){
		$query ="select lenid,lenname from t_length order by lenorder";
		$result= $this->dbconn->query($query);
		if(!$result) {
			return false;
		}
		$num =@$result->num_rows;
		if($num ==0) {
			return false;
		}
		$result = db_result_to_array($result);
		$this->length=$result;
	 }

	  //货种2015.06.27 lja
	 function get_kind(){
		$query ="select kindid,kindname from t_kind";
		$result= $this->dbconn->query($query);
		if(!$result) {
			return false;
		}
		$num =@$result->num_rows;
		if($num ==0) {
			return false;
		}
		$result = db_result_to_array($result);
		$this->kind=$result;
	 }	  
	  //获取销售状态
	 function get_salestatus(){
		$query ="select salestatusid,salestatusname from t_salestatus";
		$result= $this->dbconn->query($query);
		if(!$result) {
			return false;
		}
		$num =@$result->num_rows;
		if($num ==0) {
			return false;
		}
		$result = db_result_to_array($result);
		$this->salestatus=$result;
	 }
	    //获取树种
	function get_stuffarray() {
		$query ="select stuffid,stuffname from t_stuff order by stufforder";
		$result= $this->dbconn->query($query);
		if(!$result) {
			return false;
		}
		$num_stuff =@$result->num_rows;
		if($num_stuff ==0) {
			return false;
		}
		$result = db_result_to_array($result);
		$this->stuff=$result;
    }
	 
    //获取产地 信息
	function get_from(){
	  $query="select fromid,fromname from t_from";
	  $result= $this->dbconn->query($query);
	  if(!$result) {
		return false;
	  }
	  $num_from =@$result->num_rows;
	   if($num_from ==0) {
		return false;
	  }
	  $result= db_result_to_array($result);
	  $this->from=$result;
	}	 
	//现货位置
	function get_spotposition(){
	  $query="select spotpositionid,position from t_spotposition where portid =".$this->portid."  order by ordervalue";
	  $result= $this->dbconn->query($query);
	  if(!$result) {
		return false;
	  }
	  $num_from =@$result->num_rows;
	   if($num_from ==0) {
		return false;
	  }
	  $result= db_result_to_array($result);
	  $this->spotposition=$result;
	}
	
	}	
	?>