<?php
   //include_once("db_fns.php");
    /*
	用户类  2015-07-18
	*/
	
	class user
	{
	 private $dbconn;
	 public  $userid;
	
	  
	  function __construct($puserid)
	  {
		  $this->dbconn =db_connect();//数据库连接
		  $this->userid=$puserid;
	  }
	  public function login(){ 
		 $sql="select userid,phone,freeze,rightid,username from t_user where userid ='".$this->userid."'";
		// error_log(date('Y-m-d H:i:s') . $sql."\t\n",3,$_SERVER['DOCUMENT_ROOT']."/log/run.log");
		 $result =$this->get_data($sql);
		 if($result==false){
			 return false;
			
		 }
		 else {
			foreach ($result as $row)
			{
			$_SESSION['user']=$row['phone'];
			$_SESSION['phone']=$row['phone'];
			$_SESSION['userid']=$row['userid'];
			$_SESSION['username']=$row['username'];
			$_SESSION['freeze']=$row['freeze'];
			$_SESSION['ismgr']=$row['rightid'];	
			}
		
			return true;
			 
		 }
	}
	
	 function get_data($sql){
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
	
	}	
	?>