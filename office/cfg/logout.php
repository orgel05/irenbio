<?
require_once('cfg.php');

/*
$sql = "UPDATE $GLOBALS[cfgtablename] SET sesid='' WHERE uid=$_SESSION[uid]";
$result = @mysql_query($sql,$connect);
*/

//unset($_SESSION['uid']);
//unset($_SESSION['uno']);
session_destroy();


echo '
<script language=javascript>
location.href = "/bio/office/index.html";
</script>
';
exit;
?>