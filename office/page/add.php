<?
require_once('../cfg/cfg.php');
//require_once('../inc/head.php');
?>
<?php
	$uid=$_POST['uid'];
	$sql = "INSERT INTO a_mem(uid) VALUES('$uid')";
	   $result=mysql_query($sql,$connect);
	    if($result) {
	    echo "정상적으로 입력되었습니다.";
	    } else {
	    echo "입력 실패하였습니다.";
	    }




?>