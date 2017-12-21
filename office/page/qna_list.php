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
	    var programID = "BBS1";
	    
	    var fnObj = {
		    pageStart: function(){

		    },
		    pageResize: function(){

		    }
	    };
	    function go_view(no){
	    	location.href="/bio/office/page/qna_view.php?idx="+no;

	    }
	    function go_add() {
	    	location.href="/bio/office/page/qna_add.php";
	    	// body...
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

		$sql = "select * from iren_qna";
		$result = mysql_query($sql, $connect) ;
	//	$row = mysql_fetch_array($result);
?>
        <div class="contentArea">
        	<table cellpadding="0" cellspacing="0" class="AXFormTable">
        		<colgroup>
					
					</colgroup>
        		<tr>
        			<th style="width:15px;"><div class="tdRel">번호</div></th>
        			<th style="width:100px;"> <div class="tdRel">제목</div></th>			
        			<th style="width:30px;"><div class="tdRel">작성자</div></th>
        			<th style="width:50px;"><div class="tdRel">날짜</div></th>
        		</tr>

        	
        	<? while ($row = mysql_fetch_array($result)) {
				?>

				<tr height="35" bgcolor="#ffffff" onmouseover="this.style.background='#E8EEC6'" onmouseout="this.style.background='#ffffff'" onclick="go_view('<?=$row['no']?>');" style="text-align: center;cursor: pointer;">
        			<td ><?=$row['no']?></td>
        			<td ><?=$row['q_title']?></td>
        			<td><?=$row['q_name']?></td>
        			<?php 
        			 $p_date=date("Y-m-d",strtotime($row['date']));

        			?>
        			<td><?=$p_date?></td>
        			
        		</tr>
				<? }
		?>	
			</table>
			<div style="margin:auto;position: relative; text-align:center;margin-top:10px;">
				<button onclick="go_add()"   class="AXButton Blue">추가하기</button></div>
		</div>
	</div>
</body>
</html>

