<?php
//根据手机号或者车皮号获取数据
 function get_datafromnum($inputnumber) {
	$conn =db_connect();
	$query ="select  right(rtrim(carnum),4) as carnum,kindname, substring(updatetime,6,11) as updatetime,productlen,wide,"
         ."thinckness,portname,timber,diameterlen,productid,stuffname "
         ." from t_product p,t_kind k,t_port r ,t_user u,t_stuff s  where p.kindid = k.kindid and s.stuffid=p.stuffid "
		 ." and r.portid=p.portid and p.userid =u.userid "
         ." and  ((p.carnum like '%".$inputnumber."%')  or (u.phone like '%".$inputnumber."%')) order by updatetime desc ";
	
	$result = @$conn->query($query);
    if (!$result) {
        return false;
    }
    $num_row = @$result->num_rows;
    if ($num_row == 0) {
        return false;
    }
    $result = db_result_to_array($result);
    return $result;  
 }
//获取最新的五条数据用于首页显示
function get_newarray(){
	$conn =db_connect();
	$query ="select  right(rtrim(carnum),4) as carnum,kindname, substring(updatetime,6,11) as updatetime "
	  ."from t_product p,t_kind k where p.kindid = k.kindid order by updatetime desc limit 0,5";
	
	$result = @$conn->query($query);
    if (!$result) {
        return false;
    }
    $num_row = @$result->num_rows;
    if ($num_row == 0) {
        return false;
    }
    $result = db_result_to_array($result);
   return $result;  
}

//________________________________
//获取口岸信息
function get_portarray() {
	$conn = db_connect();
    $query = "select portid, portName from t_port";
    $result = @$conn->query($query);
    if (!$result) {
        return false;
    }
    $num_cats = @$result->num_rows;
    if ($num_cats == 0) {
        return false;
    }
    $result = db_result_to_array($result);
   return $result;
}
//获取材种信息
function get_stuffarray() {
    $conn = db_connect();
    $query ="select stuffid,stuffname from t_stuff";
    $result=@$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_stuff =@$result->num_rows;
    if($num_stuff ==0) {
        return false;
    }
    $result = db_result_to_array($result);
    return $result;
}
//获取货种信息
function get_kindarray(){//
    $conn = db_connect();
    $query="select kindid,kindname from t_kind";
    $result=@$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_kind =@$result->num_rows;
    if($num_kind ==0) {
        return false;
    }
    $result= db_result_to_array($result);
    return $result;
}
//获取材质信息
 function get_timberarray() { 
    $conn = db_connect();
	if (!$conn) {
		return false;
	}else {
		
	
    $query="select timberid,timbername from t_timber";
    $result=@$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_timber =@$result->num_rows;
    if($num_timber ==0) {
        return false;
    }
    $result= db_result_to_array($result);
    return $result;
	} 
 }
 //获取材类信息
 function get_timbertype(){
	$conn = db_connect();
    $query="select timbertypeid,timbertypename from t_timbertype";
    $result=@$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_timbertype =@$result->num_rows;
    if($num_timbertype ==0) {
        return false;
    }
    $result= db_result_to_array($result);
    return $result;
 }
 //获取节巴信息
 function get_knob(){
	$conn = db_connect();
    $query="select knobid,knobname from t_knob";
    $result=@$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_knob =@$result->num_rows;
    if($num_knob ==0) {
        return false;
    }
    $result= db_result_to_array($result);
    return $result;
 }
 //获取爬皮信息
 function get_climb(){
	 $conn = db_connect();
    $query="select climbid,climbname from t_climb";
    $result=@$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_climb =@$result->num_rows;
    if($num_climb ==0) {
        return false;
    }
    $result= db_result_to_array($result);
    return $result;
 }
 //获取取材位置信息
 function get_position(){
	$conn = db_connect();
    $query="select positionid,positionname from t_position";
    $result=@$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_position =@$result->num_rows;
    if($num_position ==0) {
        return false;
    }
    $result= db_result_to_array($result);
    return $result;
 }
 //获取加工设备
 function get_device(){
	 $conn = db_connect();
    $query="select deviceid,devicename from t_device";
    $result=@$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_device =@$result->num_rows;
    if($num_device ==0) {
        return false;
    }
    $result= db_result_to_array($result);
    return $result;
 }
 //获取产地 信息
 function get_from(){
	$conn = db_connect();
    $query="select fromid,fromname from t_from";
    $result=@$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_from =@$result->num_rows;
    if($num_from ==0) {
        return false;
    }
    $result= db_result_to_array($result);
    return $result; 
 }
 //获取货场信息
 function get_dump($portid) {
	$conn = db_connect();
    $query="select dumpid,dumpname from t_dump where portid =".$portid;
    $result=@$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_from =@$result->num_rows;
    if($num_from ==0) {
        return false;
    }
    $result= db_result_to_array($result);
    return $result; 
 }
 //获取装卸线信息
 function get_pack($dumpid) {
	 $conn = db_connect();
    $query="select packid,packname from t_pack where dumpid =".$dumpid;
    $result=@$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_from =@$result->num_rows;
    if($num_from ==0) {
        return false;
    }
    $result= db_result_to_array($result);
    return $result; 
 }
 //根据buyid获取求购信息
     function get_buydetail($buyid){
		$conn = db_connect();
		$query="select buyid ,username,".
	    " kindname,stuffname,phone,portname,updatetime,title,content,price ".
        " from t_buy p,t_kind k,t_stuff s,t_port r,t_user u ".
        " where p.userid = u.userid and p.kindid = k.kindid and ".
		" p.stuffid = s.stuffid and p.portid =r.portid and buyid =".$buyid;
		
		
		$result=@$conn->query($query);
		if(!$result) {
			return false;
		}
		$num_from =@$result->num_rows;
		if($num_from ==0) {
			return false;
		}
		$result= db_result_to_array($result);
		return $result; 
	}
 //根据saleid 获取销售信息
    function get_saledetail($saleid){
		$conn = db_connect();
		$query="select saleid, carnum ,username,".
	    " kindname,stuffname,phone,portname,updatetime,title,content,price ".
        " from t_sale p,t_kind k,t_stuff s,t_port r,t_user u ".
        " where p.userid = u.userid and p.kindid = k.kindid and ".
		" p.stuffid = s.stuffid and p.portid =r.portid and saleid =".$saleid;
		
		
		$result=@$conn->query($query);
		if(!$result) {
			return false;
		}
		$num_from =@$result->num_rows;
		if($num_from ==0) {
			return false;
		}
		$result= db_result_to_array($result);
		return $result; 
	}
 //根据productid获取产品详细信息
 function get_detail($productid){
	$conn = db_connect();
    $query="select  carnum,portname,phone,kindname,stuffname,productlen,wide,thinckness,"
		."tolerance,refnum,refwight,username,dry,newold,knob,blue,worm,decay,climb,ring,"
		."slash,oil,black,position,device,(select fromname from t_from where fromid = p.fromid) as fromname,pausetime,trackid,dumptime,"
		."(select dumpname from t_dump where dumpid=p.dumpid) as dumpname,"
		."(select packname from t_pack where packid =p.packid) as packname,goodpositionid "
		."from t_product p,t_user u,t_kind k,t_stuff s,t_port r "
		."where p.userid = u.userid and p.kindid = k.kindid  and "
		." p.stuffid = s.stuffid and r.portid= p.portid and  productid =".$productid;
		
		
    $result=@$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_from =@$result->num_rows;
    if($num_from ==0) {
        return false;
    }
    $result= db_result_to_array($result);
    return $result; 
 }
 //根据产品ID获取图片信息
 function get_productpic($productid){
	$conn = db_connect();
    $query="select productpic from t_productpic  where  productid =".$productid;
		
		
    $result=@$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_from =@$result->num_rows;
    if($num_from ==0) {
        return false;
    }
    $result= db_result_to_array($result);
    return $result; 
 }
 
 //**********首页获取产品信息列表*****
 function get_productlist() {
	$conn = db_connect();
     $query = "select productid,carnum,kindname,stuffname,phone,portname,updatetime,productlen,diameterlen,wide,thinckness   "
           ." from t_product p,t_kind k,t_stuff s,t_port r,t_user u "
          ." where p.userid = u.userid and p.kindid = k.kindid and "
		  ." p.stuffid = s.stuffid and p.portid =r.portid order by updatetime desc limit 0,20";
		
		
    $result=$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_from =@$result->num_rows;
    if($num_from ==0) {
        return false;
    }
    $result= db_result_to_array($result);
    return $result;  
 }
 //
//__________________________________________
function get_kind(&$row){
    $conn = db_connect();
    $query="select kindid,kindname from t_kind";
    $result=@$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_kind =@$result->num_rows;
    if($num_kind ==0) {
        return false;
    }
   // $result= db_result_to_array($result);
    $row =$num_kind;
    return $result;

}

 function get_stuff(&$row) {
    //query database for a list of stuff
    $conn = db_connect();
    $query ="select stuffid,stuffname from t_stuff";
    $result=@$conn->query($query);
    if(!$result) {
        return false;
    }
    $num_stuff =@$result->num_rows;
    if($num_stuff ==0) {
        return false;
    }
	$row=$num_stuff;
   // $result = db_result_to_array($result);
    return $result;
}

function get_port(&$row) {
    // query database for a list of port
    $conn = db_connect();

    $query = "select portid, portName from t_port";
    $result = @$conn->query($query);
    if (!$result) {
        return false;
    }
    $num_cats = @$result->num_rows;
    if ($num_cats == 0) {
        return false;
    }
   // $result = db_result_to_array($result);
   $row =$num_cats;
   return $result;
}

function select_filter($areavalue,$kindvalue,$stuffvalue) {
	$conn = db_connect();
	$filtervalue="";

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
    $query = "select carnum,kindname,stuffname,phone,portname,updatetime,productlen,goodstatusid   "
           ."from t_product p,t_kind k,t_stuff s,t_port r,t_user u "
          ." where p.userid = u.userid and p.kindid = k.kindid and p.stuffid = s.stuffid and p.portid =r.portid";
		
	if (strlen(trim($filtervalue))>0){
		$query =$query . $filtervalue;
	}
	
    $result = @$conn->query($query);
    if (!$result) {
        return false;
    }
    $num_cats = @$result->num_rows;
    if ($num_cats == 0) {
        return false;
    }
    $result = db_result_to_array($result);
    return $result;
}

//_______________________________________________________
/*
function get_categories() {
   // query database for a list of categories
   $conn = db_connect();
   $query = "select catid, catname from categories";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_cats = @$result->num_rows;
   if ($num_cats == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_category_name($catid) {
   // query database for the name for a category id
   $conn = db_connect();
   $query = "select catname from categories
             where catid = '".$catid."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_cats = @$result->num_rows;
   if ($num_cats == 0) {
      return false;
   }
   $row = $result->fetch_object();
   return $row->catname;
}


function get_books($catid) {
   // query database for the books in a category
   if ((!$catid) || ($catid == '')) {
     return false;
   }

   $conn = db_connect();
   $query = "select * from books where catid = '".$catid."'";
   $result = @$conn->query($query);
   if (!$result) {
     return false;
   }
   $num_books = @$result->num_rows;
   if ($num_books == 0) {
      return false;
   }
   $result = db_result_to_array($result);
   return $result;
}

function get_book_details($isbn) {
  // query database for all details for a particular book
  if ((!$isbn) || ($isbn=='')) {
     return false;
  }
  $conn = db_connect();
  $query = "select * from books where isbn='".$isbn."'";
  $result = @$conn->query($query);
  if (!$result) {
     return false;
  }
  $result = @$result->fetch_assoc();
  return $result;
}

function calculate_price($cart) {
  // sum total price for all items in shopping cart
  $price = 0.0;
  if(is_array($cart)) {
    $conn = db_connect();
    foreach($cart as $isbn => $qty) {
      $query = "select price from books where isbn='".$isbn."'";
      $result = $conn->query($query);
      if ($result) {
        $item = $result->fetch_object();
        $item_price = $item->price;
        $price +=$item_price*$qty;
      }
    }
  }
  return $price;
}

function calculate_items($cart) {
  // sum total items in shopping cart
  $items = 0;
  if(is_array($cart))   {
    foreach($cart as $isbn => $qty) {
      $items += $qty;
    }
  }
  return $items;
}
*/
?>
