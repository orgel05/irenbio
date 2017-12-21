<meta charset="utf-8">
<?
require_once('../cfg/cfg.php');
if(!$_SESSION['uid']) {
	echo("
	<meta charset=\"utf-8\">
	<script language=\"javascript\"> 
	<!--
	alert('[Error]No Session!');
	location.href = '/bio/office/';
	//-->   
	</script>
	");
	exit;
}


/*

$cid = $_GET[cid];
$sql = "select count(*) from $a_mem where uid='$cid'";
$result = @mysql_query($sql, $connect);
$maxrow = @mysql_result($result, 0, "COUNT(*)"); 

if($maxrow > 0) {
	echo "$cid 는(은) 이미 존재하는 아이디입니다. 다른 아이디를 선택해주세요.";
} else {
	echo "$cid 는(은) 사용이 가능한 아이디입니다.";
}
?>
<BUTTON value="닫기" onclick="window.close()">닫기</BUTTON>*/
$userid=$_GET[cid];
$sql="select * from a_mem where uid='$userid'";
$rst=mysql_query($sql);
$cnt=mysql_num_rows($rst);
?>
<script type="text/javascript">
function useID(v){
opener.document.all.checkid.value=1;
opener.document.all.userid.value=v;
window.close();
}

function chkId(){
var userid=document.all.userid.value;
if(userid){
url="idcheck.php?userid="+userid;
location.href=url;
}else{
alert("ID를 입력하세요!");
}
}
</script>
<?if($cnt){?>
<?=$userid?>는 사용하실 수 없는 ID입니다<br />
<form>
<input type=text name="userid">
<input type=button value="ID중복확인" onClick="chkId();">
</form>
<?}else{?>
<?=$userid?>는 사용가능한 ID입니다.<br />
<a href="#" onClick="useID('<?=$uid?>');">사용하기</a> <a href="#" onClick="window.close();">닫기</a>
<?}?>