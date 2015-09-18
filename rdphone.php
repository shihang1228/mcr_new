<?php
    include_once('system/model/db_fns.php');
	session_start();
	//header("Content-Type: text/html; charset=utf-8");
	$phone_arr = array();
	$chged = getdata('select phonechg from t_cs where sn=1');  //手机号是否被更新
	if(is_array($chged))
	{
		$phoneadd = $chged[0];
		if($phoneadd["phonechg"]==1)  //数据已变化,需要更新文件.
		{
			$phone_arr = getdata('select concat(\'"\',contactphone,\'",\') as contactphone from t_ownphone order by contactphone');
			//echo json_encode( $json_arr );
			$phonestr = "";
			//生成文件内容
			foreach($phone_arr as $row)
			{
				$phonestr .= $row["contactphone"];
			}
			if($phonestr!="")
			{
				$phonestr="[".$phonestr."]";
				$phonestr = str_replace(",]","]",$phonestr);
			}
			//echo $phonestr;
			//写文件
			$phonefile = fopen('data.html','w');
			if($phonefile)
			{
				fwrite($phonefile,$phonestr);
				fclose($phonefile);
			}
			getdata('update t_cs set phonechg=0 where sn=1');  //更改标记
		}
	}
?>
