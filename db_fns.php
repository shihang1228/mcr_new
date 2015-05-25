<?php

function db_connect() {
   $result = new mysqli('localhost', 'root', 'abc123', 'mcr');
   // $result  = new mysqli ("182.92.240.59","root","13934544931blb","mcr");
  // mysql_select_db ("mcr");
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
	$result->autocommit(TRUE);
   
   return $result;
}

function db_result_to_array($result) {
   $res_array = array();

   for ($count=0; $row = $result->fetch_assoc(); $count++) {
     $res_array[$count] = $row;
   }

   return $res_array;
}

?>
