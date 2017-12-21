
<?
require_once('../cfg/cfg.php');
require_once('../inc/head.php');


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



?>
<?php
	$idx = $_GET['idx'];
	$uploaddir = '/host/5505/html/bio/img/';
	$uploadfile = $uploaddir.$_FILES['c_img']['name'];
	move_uploaded_file($_FILES['c_img']['tmp_name'], $uploadfile);
	$sql = "select * from iren_cer where no='$idx'";
	$result = mysql_query($sql, $connect) ;
	$row = mysql_fetch_array($result);
	
if($_POST['mode']=='up'){
	//echo 1;
	//exit;
	$c_name=$_POST['c_name'];
	$c_info=$_POST['c_info'];
	$c_img=$_FILES['c_img']['name'];
	if($c_img){
		$sql = "UPDATE iren_cer SET c_name='$c_name',c_img='$c_img',c_info='$c_info' WHERE no='$idx'" ;
	}
	else{
		$sql = "UPDATE iren_cer SET c_name='$c_name',c_info='$c_info' WHERE no='$idx'" ;
	}

	  $result=mysql_query($sql,$connect);
	  echo "<script>location.replace(\"/bio/office/page/cert_list.php\");</script>";
}

	
?>

	<!-- htmlHead-->
    <style type="text/css">
     .add {width:200px;}
     .la{margin-top:5px;margin-bottom:5px;  }

	</style>
	<script type="text/javascript" src="/bio/office/js/check.js"></script>
	<script type="text/javascript">
	    var programID = "CODE03";
	    
	    var fnObj = {
		    pageStart: function(){

		    },
		    pageResize: function(){

		    }
	    };
	</script>
	<script type="text/javascript">
	function ch(f){
		f.submit();

	}
	function go(){
		location.replace("/bio/office/page/cert_list.php");
	}

</script>



</head>
<body>
	<!-- masterMenu ------------------------------------------>
	<div class="masterMenu" id="masterMenu">
		<div class="logo cp" onclick="window.open('http://www.axisj.com');" ></div>
		<div class="menuContainer" id="masterMenuContainer"></div>
		<a href="#Axexec" onclick="masterMenu.toggle();" class="menuHandle">Handle</a>
	</div>
	<div class="masterBodyPath" id="masterBodyPath">
		<div class="masterBodyLogo">
			<div class="accountDiv abs" style="top:7px;right:7px;">
				<button class="AXButton Classic" onclick="fcObj.logout();">Logout</button>
			</div>
		</div>
		<div class="pathContainer" id="pathContainer">
			
		</div>
	</div>
	<!-- masterMenu ------------------------------------------>
	
	<div class="masterBody" id="masterBody">
		<div class="programTitle">
			인증 수정
		</div>

        <div class="contentArea">
        	<div style="width:500px;">
        	<form name="insert" method="post" action="./cert_modify.php?idx=<?=$row['no']?>" enctype="multipart/form-data"> 
				<table cellpadding="0" cellspacing="0" class="AXFormTable">
					
        		<colgroup>
						<col width="100" />
						<col />
					</colgroup>
        		<tr><th><div class="tdRel">제목</div></th>
        			<td><input type="text" name="c_name" class="AXInput" value="<?=$row['c_name']?>"></td>
        		</tr>
        		<tr><th><div class="tdRel">이미지</div></th>
        			<td><input type="file" name="c_img"></td>
        			</tr>
        		<tr><th><div class="tdRel">내용</div></th>
        			<td><textarea name="c_info"><?=$row['c_info']?></textarea></td></tr>
        		</tr>
        		</table>
        		<div class="bnt_go" style="width:500px; ">
			<button  class="AXButton Blue" onclick="ch(insert)">수정하기</button>
			<button class="AXButton Green" onclick="go()">목록으로</button></div>
			<input type="hidden" name="mode" value="up">
		</form>
		</div>
		</div>
	</div>
</body>
</html>


