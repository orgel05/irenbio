
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
if($_POST['mode']=='up'){
	//echo 1;
	//exit;
	$c = $_POST['upw'] . 'wlsdn' . $_POST['upw'];
	$upw = hash(sha256, $c);


	

	$uname=$_POST['uname'];
	$level=$_POST['level'];
	$view=$_POST['view'];
	$add_post=$_POST['add_post'];
	$add_1=$_POST['add_1'];
	$add_2=$_POST['add_2'];
	$add_3=$_POST['add_3'];
	$part=$_POST['part'];
	$posit=$_POST['posit'];
	$phone=$_POST['phone'];
	$hobby=$_POST['hobby'];
	//$sql = "UPDATE a_mem SET uid='$uid',upw='$upw',uname='$uname',level='$level',view='$view',add_post='$add_post',add_1='$add_1',add_2='$add_2',part='$part',posit='$posit',phone='$phone',hobby='$hobby' where no='$idx'";
	  $result=mysql_query($sql,$connect);
	  if(!$result){
	  	echo mysql_error();
	  	exit;
	  }
	   
}

	$sql = "select * from a_mem where no='$idx'";
	$result = mysql_query($sql, $connect) ;
	$row = mysql_fetch_array($result);
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
	 	
	// 	alert(f.uid.value);
	 }
	 function go_list(){
			location.href="member_list.php";
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
        	<form name="insert" method="post" action="./member_modify.php?idx=<?=$row['no']?>">
				<table cellpadding="0" cellspacing="0" class="AXFormTable">
					
        		<colgroup>
						<col width="100" />
						<col />
					</colgroup>
        		<tr><th><div class="tdRel">제목</div></th>
        			<td><input type="text" name="uid" class="AXInput" value="<?=$row['uid']?>"></td>
        		</tr>
        		<tr><th><div class="tdRel">이미지</div></th>
        			<td><input type="PASSWORD" name="upw" class="AXInput" ></td></tr>
        		<tr><th><div class="tdRel">내용</div></th>
        			<td><textarea name=""></textarea></td></tr>
        		</tr>
        		</table>
        		<div class="bnt_go" style="width:500px; ">
			<button  class="AXButton Blue" onclick="ch(insert)">수정하기</button>
			<button class="AXButton Green" onclick="go_list()">목록으로</button></div>
			<input type="hidden" name="mode" value="up">
		</div>
		</div>
	</div>
</body>
</html>


