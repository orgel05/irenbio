

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
	$sql = "select * from iren_cer where no='$idx'";
	$result = mysql_query($sql, $connect) ;
	$row = mysql_fetch_array($result);
?>

	<!-- htmlHead-->
    <style type="text/css">
     .add {width:200px;}
     .la{margin-top:5px;margin-bottom:5px;  }

	</style>
	<link rel="stylesheet" type="text/css" href="/bio/css/style.css">
	<script type="text/javascript" src="/bio/office/js/check.js"></script>
	<script type="text/javascript">
	    var programID = "DATA1";
	    
	    var fnObj = {
		    pageStart: function(){

		    },
		    pageResize: function(){

		    }
	    };
	</script>
	<script type="text/javascript">
	 function modify(no){

	 		location.href="/bio/office/page/cert_modify.php?idx="+no;
	 	
	// 	alert(f.uid.value);
	 }
	 function go_list(){
			location.href="/bio/office/page/cert_list.php";
		}
		function go_del(no){
			location.href="/bio/office/page/cert_del.php?idx="+no;
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
			관리자 추가
		</div>

        <div class="contentArea">
	<div class="cer_item">
		<div class="cer_subject">
			<div class="cer_subject_text"><?=$row['c_name']?></div>
		</div>
		<div class="cer_img" ><img src="/bio/img/<?=$row['c_img']?>" style="width:300px;height:400px;  "></div>
		<div class="cer_text"><?=htmlspecialchars_decode($row['c_info'])?></div>
	</div>
		
        	<div style="width:500px;">
        	
        		<div class="bnt_go" style="width:500px; ">
        			
			<button  class="AXButton Blue" onclick="modify(<?=$row['no']?>)">수정하기</button>
			<button class="AXButton Red" onclick="go_del(<?=$row['no']?>)">삭제하기</button>
			<button class="AXButton Green" onclick="go_list()">목록으로</button>

		</div>
		
		</div>
		</div>
	</div>
</body>
</html>



