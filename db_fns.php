<?php

//连接数据库
function db_connect() {
   $result = new mysqli('127.0.0.1', 'wx_mcr_jywy', 'mcr1312_9828AB', 'mcr',3307);
  if(mysqli_connect_errno())
  {
	  echo "数据库连接失败";
	  return false;
  }
  
   if (!$result) {
	   echo "数据库连接失败";
      return false;
   }
    $result->query(  "SET NAMES UTF8");
	//$result->autocommit(TRUE);
   
   return $result;
}

function db_result_to_array($result) {
   $res_array = array();

   for ($count=0; $row = $result->fetch_assoc(); $count++) {
     $res_array[$count] = $row;
   }

   return $res_array;
}

	//从数据库中查询信息2015.6.27 lja
	function getdata($sqlstr){
	   //参数为sql查询语句,存储过程调用.
	   $conn=db_connect();
	   $sql =$sqlstr;
	   $result=@$conn->query($sql);
	   if(!$result) {
        return false;
       }
      $num_from =@$result->num_rows;
      if($num_from ==0)  //没有返回值
	  {
        return false;
      }
      $result= db_result_to_array($result);  //转换成数组
      return $result; 
   }
?>
