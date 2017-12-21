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
<link rel="stylesheet" type="text/css" href="/bio/css/style.css">

	<!-- htmlHead-->
  
	<script type="text/javascript">
	    var programID = "BBS3";
	    
	    var fnObj = {
		    pageStart: function(){

		    },
		    pageResize: function(){

		    }
	    }
	    function go_mo(no){
	    	location.href="/bio/office/page/qna_modify.php?idx="+no;

	    }
	    function go_add() {
	    	location.href="/bio/office/page/qna_add.php";
	    	// body...
	    }
	    function go_del(no){
	    	
			var	con = confirm("정말로 삭제하시겠습니까?");
 			if (con==true){
  			 	location.href="/bio/office/page/qna_del.php?idx="+no;	} 
  			else {location.href="#"}
		}
		function go_list(){
	
  			 	location.href="/bio/office/page/qna_list.php";	
		}
	    	

	</script>
	<style type="text/css">
		
	</style>
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
		 		이렌뉴스
		</div>
		<?php

		$sql = "select * from iren_qna where '$idx' =no";
		$result = mysql_query($sql, $connect) ;
		$row = mysql_fetch_array($result); 
?>
        <div class="contentArea">
        	
        	<div class="contentArea">
        	<div id= "contentsWrap">
			<div id="news_wrap">
		<div id="news_wrap2">
			<span id="news_sub"><?=$row['title']?></span>
			<span id="news_date"><?=$row['date']?></span>
			<hr>
		</div>
		<div id="news_wrap3">
			<?=htmlspecialchars_decode($row['contents'])?>
		</div>
	</div>
	
</div>
			<div class="bnt_go">
			<button class="AXButton Blue" onclick="go_mo(<?=$row['no']?>)">수정하기</button>
			<button class="AXButton Red" onclick="go_del(<?=$row['no']?>)">삭제하기</button>
			<button class="AXButton Green" onclick="go_list()">목록으로</button>

		</div>
		</div>
	</div>
</body>
</html>
