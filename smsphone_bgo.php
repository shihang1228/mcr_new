<?php
   session_start();
   include_once('mcr_sc_fns.php');
   $port_array = get_portarray();

   $phone = $_POST["phone"];
   
	$code=sendvalidmessage($phone);
	if($code !=false)
	{
	  $_SESSION['code'] = $code;
	  $_SESSION['time'] =time();
	  echo 'success';
	}
	else {
		 echo 'error';
	}
	
	
?>