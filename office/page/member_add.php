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
if($_POST['mode']=='up'){
	$c = $_POST['upw'] . 'wlsdn' . $_POST['upw'];
	$upw = hash(sha256, $c);


	$uid=$_POST['uid'];
	//$upw=$_POST['upw'];
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
	$sql = "INSERT INTO a_mem(uid,upw,uname,level,view,add_post,add_1,add_2,part,posit,phone,hobby) VALUES('$uid','$upw','$uname','$level','$view','$add_post','$add_1','$add_2','$part','$posit','$phone','$hobby')";
	   $result=mysql_query($sql,$connect);
	//header("Location: ./member_list.php"); 
	   
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

	 	if(!f.uid.value){
	 		alert("아이디를 입력하세요");
	 		f.uid.focus();
	 		return false;
	 	}
	 	else if(!f.upw.value){
	 		alert("비밀번호를 입력하세요");
	 		f.upw.focus();
	 		return false;
	 	}
	 	else if(!f.uname.value){
	 		alert("이름을 입력하세요");
	 		f.uname.focus();
	 		return false;
	 	}
	 	else if(!f.level.value){
	 		alert("레벨을 입력하세요");
	 		f.level.focus();
	 		return false;
	 	}
	 	else if(f.view.value==""){
	 		alert("뷰를 입력하세요");
	 		
	 		return false;
	 	}
	 	else if(!f.add_post.value||!f.add_1.value||!f.add_2.value){
	 		alert("주소를를 모두 입력하세요");
	 		f.add_post.focus();
	 		return false;
	 	}
	 	else if(!f.part.value){
	 		alert("부서를 입력하세요");
	 		f.part.focus();
	 		return false;
	 	}
	 	else if(!f.posit.value){
	 		alert("직책를 입력하세요");
	 		f.posit.focus();
	 		return false;
	 	}
	 	else if(!f.hobby.value){
	 		alert("를 입력하세요");
	 		f.hobby.focus();
	 		return false;
	 	}
	 	else {
	 		f.submit();
	 	}
	// 	alert(f.uid.value);
	 }
	 function go_list(){
			location.href="member_list.php";
		}
	 
	</script>
<script type="text/javascript">
	function ck_id(){
	 	var cid = document.getElementById("uid").value;
	 	if(cid){
	 		url="check.php?cid="+cid;
	 		window.open(url,"chkid","width=300,height=100");
	 	}
	 	else{
	 		alert("아이디를 입력하세요");
	 	}
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
        	<div style="width:500px;">
        	<form name="insert" method="post" action="./member_add.php">
				<table cellpadding="0" cellspacing="0" class="AXFormTable">
					
        		<colgroup>
						<col width="100" />
						<col />
					</colgroup>
        		<tr><th><div class="tdRel">ID</div></th>
        			<td><input type="text" name="uid" id="uid" class="AXInput" > <button onclick="ck_id()">중복체크</button></td>
        		</tr>
        		<tr><th><div class="tdRel">PASSWORD</div></th>
        			<td><input type="PASSWORD" name="upw" class="AXInput" ></td></tr>
        		<tr><th><div class="tdRel">이름</div></th>
        			<td><input type="text" name="uname" class="AXInput" ></td></tr>
        		<tr><th><div class="tdRel">레벨</div></th>
        			<td><select name="level" class="AXSelect" >
        				<option value="1">1</option>
        				<option value="2">2</option>
        				<option value="3" selected="selected">3</option>
        				<option value="4">4</option>
        				<option value="5">5</option>
        			</select>
        				</td></tr>
        		<tr><th><div class="tdRel">VIEW</div></th>
        			<td> <label>
                    	  <input type="radio" name="view" value="Y" checked />Y</label>
                         <label><input type="radio" name="view" value="N" />N</label>
                    </td>
                </tr>
        		<tr><th><div class="tdRel">주소</div></th>
        			<td >
        				<div class="la">
        				<label class="la">  <input type="text" name="add_post" class="AXInput" >&nbsp;&nbsp;우편번호</label></div>
        			<div class="la">
        			<label> <input type="text" name="add_1" class="AXInput add"> &nbsp;&nbsp;기본주소</label></div>
        			<div class="la">
        		<label class="la"> <input type="text" name="add_2" class="AXInput add" > &nbsp;&nbsp;상세주소 </label></div>
        	      </td>
        		</tr>
        		<tr><th><div class="tdRel">부서</div></th>
        			<td>
        				<select name="part">
        					<option value="마케팅" selected="=selected">마케팅</option>
        					<option value="전산">전산</option>
        					<option value="재무">재무</option>
        				</select></td>
        		</tr>
        		<tr><th><div class="tdRel">직책</div></th>
        			<td><input type="text" name="posit" class="AXInput" ></td>
        		</tr>
        		<tr><th><div class="tdRel">전화번호</div></th>
        			<td><input type="text" name="phone" class="AXInput" >(010-0000-0000)</td>
        		</tr>
        		<tr><th><div class="tdRel">취미</div></th>
        			<td><input type="text" name="hobby" class="AXInput" ></td>
        		</tr>
        		</table>
		 	<div style="width:500px;" class="bnt_go">	
		 		<button name="ins" class="AXButton Blue"  onclick="ch(insert)">추가</button>
		 		<button class="AXButton Green" onclick="go_list()">목록으로</button>
		 	</div>
			<input type="hidden" name="mode" value="up">
		</div>
		</div>
	</div>
</body>
</html>


