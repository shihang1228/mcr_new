<?php
    require_once ('../system/model/db_fns.php');
    require_once('../system/model/weixin.class.php');
    $weixin = new class_weixin();
    $result = $weixin->getUserList(null);
   // var_dump($result);
   echo $result;
    if ($result) {
       echo "<script>alert('获取成功');history.back();</script>";
    } else {
       echo "<script>alert('获取失败');history.back();</script>";
    }
    ?>