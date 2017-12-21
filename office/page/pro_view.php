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
	    var programID = "DATA1";
	    
	    var fnObj = {
		    pageStart: function(){

		    },
		    pageResize: function(){

		    }
	    }
	    function go_mo(no){
	    		    	location.href="/bio/office/page/pro_modify.php?idx="+no;

	    }
	    function go_add() {
	    	location.href="/bio/office/page/pro_add.php";
	    	// body...
	    }
	    function go_del(no){
			var	con = confirm("정말로 삭제하시겠습니까?");
 			if (con==true){
  			 	location.href="/bio/office/page/pro_del.php?idx="+no;	} 
  			else {location.href="#"}
		} 
	    	
	    function go_list(){
	    	location.href="pro_list.php";
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
		 		제품 자세히 보기 
		</div>
		<?php

		$sql = "select * from pro1 where '$idx'=no";
		$result = mysql_query($sql, $connect) ;
		$row = mysql_fetch_array($result);
?>
        <div class="contentArea">
        	
        	<div class="contentArea">
        	<table cellpadding="0" cellspacing="0" class="AXFormTable">
        		<colgroup>
						<col width="150px" />
						<col />
					</colgroup>
        		
        			<tr><th style="width:100px; "><div class="tdRel">번호</div></th><td><?=$row['no']?></td></tr>
        			<tr><th><div class="tdRel">타입</div></th><td><?=$row['p_type']?></td></tr>
        			
        			<tr><th><div class="tdRel">이름</div></th><td><?=$row['uname']?></td></tr>
        			<tr><th><div class="tdRel">이미지</div></th><td><img src="/bio/img/<?=$row['p_img']?>" id="intro_img" style="width:100px;height:150px;"></td></tr>
        			<tr><th><div class="tdRel">제품소개</div></th><td><?=$row['p_intor']?></td></tr>
        			<tr><th><div class="tdRel">제품범위</div></th><td><?=$row['p_area']?></td></tr>
        			<tr><th><div class="tdRel">사용방법</div></th><td><?=$row['p_use']?></td></tr>
        			<tr><th><div class="tdRel">희석배수</div></th><td><?=$row['p_mul']?></td></tr>
        			<tr><th><div class="tdRel">효과</div></th><td><?=htmlspecialchars_decode($row['p_way'])?></td></tr>
        			<tr><th><div class="tdRel">특징</div></th><td><?=htmlspecialchars_decode($row['p_feat'])?></td></tr>
        			<tr><th><div class="tdRel">날짜</div></th><td><?=$row['wdate']?></td></tr>
        			<tr><th><div class="tdRel">View</div></th><td><?=$row['view']?></td></tr>	
			</table>
			<div class="bnt_go">
			<button class="AXButton Blue" onclick="go_mo(<?=$row['no']?>)">수정하기</button>
			<button class="AXButton Red" onclick="go_del(<?=$row['no']?>)">삭제하기</button>
			<button class="AXButton Green" onclick="go_list()">목록으로</button>

		</div>
		</div>
	</div>
</body>
</html>
