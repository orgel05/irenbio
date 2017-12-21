<?
require_once('cfg.php');
//require_once('../inc/head.php');
?>
<meta charset="UTF-8">
<?php
if(!$_POST['uid'] || !$_POST['upw']) {
	echo("<script language=\"javascript\"> 
	
	alert('[에러]사용자 선택을 하시고 해당 사용자에 맞는 비밀번호를 입력해주세요.');
	history.back();
	   
	</script>");
	exit;
}

$table_member="a_mem";
$sql = "select no, uid, upw, uname from $table_member where uid='$_POST[uid]'";
$result = @mysql_query($sql,$connect);
$row = @mysql_fetch_array($result);

$c = $_POST['upw'] . 'wlsdn' . $_POST['upw'];
$user_pw = hash(sha256, $c);

if($user_pw != $row['upw']) {
	echo("<script language=\"javascript\"> 
	<!--
	alert('[에러]비밀번호가 틀렸습니다. 다시 입력해주시기 바랍니다.);
	history.back();
	//-->   
	</script>");
	exit;
}

$sesid = md5(microtime());
$lastaccess = date("YmdHis");
$wdate = time();

/*
$sql = "UPDATE $table_member SET sesid='$sesid', lastaccess='$lastaccess', ip='$_SERVER[REMOTE_ADDR]' WHERE uid='$_POST[uid]'";
$result = @mysql_query($sql,$connect);
*/

$_SESSION['sid'] = $sesid;
$_SESSION['uno'] = $row['no'];
$_SESSION['uid'] = $row['uid'];
$_SESSION['uname'] = $row['uname'];

echo '
<script language=javascript>
location.href = "/bio/office/page/main.php";
</script>
';
exit;
?>