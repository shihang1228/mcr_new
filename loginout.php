<?php

session_start();
	if(isset($_SESSION['user']) ){
	unset($_SESSION['user']);
	unset($_SESSION['userid']);
	echo "<script>alert('注销成功！'); window.location.href='index.php';</script>";	
}else{
	echo "<script>alert('您尚未登录！'); window.location.href='index.php';</script>";	
}

?>