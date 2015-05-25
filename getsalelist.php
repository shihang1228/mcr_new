<?php
    include_once('db_fns.php');
	header("Content-Type: text/html; charset=utf-8");
	$conn = db_connect();
	$filtervalue="";
    $noconnect ="<p>对不起，没有查找到您要查找的内容！</p>";
    $type=$_GET['type'];
	
	if($_GET['type']==1)
	{
		$areavalue =$_GET['areaselect'];
		$kindvalue =$_GET['kindselect'];
		$stuffvalue =$_GET['stuffselect'];
		
		
		if($areavalue != 0){
			$areafilter =" and p.portid =".$areavalue;
			$filtervalue =$areafilter;
		}
		if($kindvalue !=0){
			$kindfilter =" and p.kindid =".$kindvalue;
			if (strlen(($filtervalue))>0){
				$filtervalue =$filtervalue.$kindfilter;
			}
			else {
			 $filtervalue =$kindfilter;	
			}
		
		}
		if($stuffvalue !=0){
			$stufffilter =" and p.stuffid =".$stuffvalue;
			if (strlen(($filtervalue))>0){
				$filtervalue =$filtervalue.$stufffilter;
			}
			else {
				$filtervalue =$stufffilter;
			}
			
		}
	} else {
		
		$carnumvalue=$_GET['carnum'];
		$filtervalue =" and (carnum ='".$carnumvalue."' or u.phone ='".$carnumvalue."')";
		
	}
	
	//************分页获取参数 *******************
    $query = "select count(*) as total   "
           ." from t_sale p,t_kind k,t_stuff s,t_port r,t_user u "
          ." where p.userid = u.userid and p.kindid = k.kindid and p.stuffid = s.stuffid and p.portid =r.portid";
		
	if (strlen(trim($filtervalue))>0){
		$query =$query . $filtervalue;
	}
  
    $result = @$conn->query($query);
	$num =$result->fetch_row();
 
	$total=$num[0];
	
    if ($total == 0) {
         echo $noconnect;
		 return;
    }else {
		
		if(!isset($_GET["page"])|| !is_numeric($_GET["page"])) {
			$page = 1;
		}else {
			$page =intval($_GET["page"]);
		}
		$pagesize=20;//每页显示数
		if($total % $pagesize ==0) { //获取总页数
			$pagecount = intval($total/$pagesize);
		}else {
			$pagecount = ceil($total / $pagesize);
		}
	}
	//*********************************
	 $query = "select saleid, carnum ,".
	    "kindname,stuffname,phone,portname,updatetime,title,content,price ".
        " from t_sale p,t_kind k,t_stuff s,t_port r,t_user u ".
         " where p.userid = u.userid and p.kindid = k.kindid and ".
		  " p.stuffid = s.stuffid and p.portid =r.portid  ";
          
		
	if (strlen(trim($filtervalue))>0){
		$query =$query . $filtervalue;
	}
    if ($type ==1){
		$query =$query ." order by updatetime desc limit ".($page -1)*$pagesize.",$pagesize";
	}
    $result = @$conn->query($query);
    if (!$result) {
		echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
        echo $noconnect;
		return;
    }
    $result = db_result_to_array($result);
	$outputstr ="";
    foreach ($result as $row)
    {
		   $outputstr =$outputstr .
            "<dt>标题:<span class='noticeBuy'>售</span></dt>".
	         "<dd><a href='"."saleInfo.php?saleid=".$row['saleid']."'>".
		     "<ul class='panel-col-3 clearfix'>".
			 "<li>货种:".$row['kindname']."</li>".
			 "<li>材种:".$row['stuffname']."</li>".
			 "<li>价格:".$row['price']."</li>".
			 "<li class='panel-row-2'>车皮号:".$row['carnum']."</li>".
			 "<li class='panel-row-2'>目标口岸:".$row['portname']."</li>".
			 "<li class='panel-row-2'>手机号:".$row['phone']."</li>".
			 "<li class='panel-row-2'>时间:".$row['updatetime']."</li>".
		     "</ul> </a></dd>";
        }
	
	if($type == 1)	{
	//**************页码导航栏**************
	    if($page >1)
			$prepage = $page -1;
		else
			$prepage = 1;
		if($page <$pagecount)
			$nextpage=$page+1;
		else 
			$nextpage=$pagecount;
		
	    $outputstr=$outputstr."<ul class='paging'>";
		$outputstr=$outputstr."<li class='prev' onclick='start(1,".$prepage.")'>上一页</li>";
		$outputstr=$outputstr."<li class='prev'>第&nbsp;".$page."&nbsp页/共&nbsp".$pagecount."&nbsp页</li>";
		$outputstr=$outputstr."<li class='next' onclick='start(1,".$nextpage.")'>下一页</li>";
		$outputstr=$outputstr."</ul>";
    //	
	}
	echo $outputstr;

?>