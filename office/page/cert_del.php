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



	$idx = $_GET['idx'];
	$sql = "delete from iren_cer where no='$idx'";
	$result = mysql_query($sql, $connect) ;
	$row = mysql_fetch_array($result);
	header("Location: /bio/office/page/cert_list.php"); 
		exit;
	?>