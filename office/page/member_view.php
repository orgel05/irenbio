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
	<!-- htmlHead-->


	<script type="text/javascript">
	    var programID = "CODE02";
	    
	    var fnObj = {
		    pageStart: function(){

		    },
		    pageResize: function(){

		    }
	    };
	</script>
	<?php 
	$idx = $_GET['idx'];
	$sql = "select * from a_mem where no='$idx'";
	$result = mysql_query($sql, $connect) ;
	$row = mysql_fetch_array($result);
	?>
	<script type="text/javascript">
		function go_url(no){
			location.href="member_modify.php?idx="+no;
		}
		function go_del(no){
			var	con = confirm("정말로 삭제하시겠습니까?");
 			if (con==true){
  			location.href="member_del.php?idx="+no; 		} 
  			else {location.href="#"}
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
				<button class="AXButton Classic" onclick="fcObj.logout();">로그아웃</button>
			</div>
		</div>
		<div class="pathContainer" id="pathContainer">
			
		</div>
	</div>
	<!-- masterMenu ------------------------------------------>
	
	<div class="masterBody" id="masterBody">
		<div class="programTitle">
			관리자 상세보기
		</div>

        <div class="contentArea">
        	
        	<div class="contentArea">
        	<table cellpadding="0" cellspacing="0" class="AXFormTable">
        		<colgroup>
						<col width="150px" />
						<col />
					</colgroup>
        		
        			<tr><th style="width:100px; "><div class="tdRel">번호</div></th><td><?=$row['no']?></td></tr>
        			<tr><th><div class="tdRel">ID</div></th><td><?=$row['uid']?></td></tr>
        		
        			<tr><th><div class="tdRel">이름</div></th><td><?=$row['uname']?></td></tr>
        			<tr><th><div class="tdRel">레벨</div></th><td><?=$row['level']?></td></tr>
        			<tr><th><div class="tdRel">VIEW</div></th><td><?=$row['view']?></td></tr>
        			<tr><th><div class="tdRel">우편번호</div></th><td><?=$row['post']?></td></tr>
        			<tr><th><div class="tdRel">주소</div></th><td><?=$row['add_1']?><?=$row['add_2']?></td></tr>
        			<tr><th><div class="tdRel">부서</div></th><td><?=$row['part']?></td></tr>
        			<tr><th><div class="tdRel">직책</div></th><td><?=$row['posit']?></td></tr>
        			<tr><th><div class="tdRel">전화번호</div></th><td><?=$row['phone']?></td></tr>
        			<tr><th><div class="tdRel">취미</div></th><td><?=$row['hobby']?></td></tr>	
			</table>
			<div class="bnt_go">
			<button class="AXButton Blue" onclick="go_url(<?=$row['no']?>)">수정하기</button>
			<button class="AXButton Red" onclick="go_del(<?=$row['no']?>)">삭제하기</button>
			<button class="AXButton Green" onclick="go_list()">목록으로</button>

		</div>
		</div>
	</div>
</body>
</html>
