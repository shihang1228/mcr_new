<?php
  require_once('/system/model/weixin.class.php');
  require_once('/system/model/db_fns.php');
  
  $weixin = new class_weixin();

    $cdkey='1393454493115070616183179801';
	$carnum='88888888';
	$wxid='oikUKt1666QxU9gZrUu7OgpbP9OE';
	$arrivetime= date("m月d日 H时i分");
	$arriveposition="西客站";
	$username='白珏';
	$kindname='原木';
  //public function sendtemplatemsg($wxid,$cdkey,$username,$carnum,$arrivetime,$kindname,$arriveposition)
  
 $result= $weixin->sendtemplatemsg($wxid,$cdkey,$username,$carnum,$arrivetime,$kindname,$arriveposition);
 if ($result){
	echo "<script> alert('scuccess');</script>;";
 }
 else {
	 echo "<script> alert('error');</script>;";
 }

?>