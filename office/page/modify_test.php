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
<?php /*
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
	$sql = "UPDATE a_mem SET (uid,upw,uname,level,view,add_post,add_1,add_2,part,posit,phone,hobby) VALUES('$uid','$upw','$uname','$level','$view','$add_post','$add_1','$add_2','$part','$posit','$phone','$hobby') WHERE no=";
	   $result=mysql_query($sql,$connect);
	    if($result) {
	    echo "정상적으로 입력되었습니다.";
	    } else {
	    echo "입력 실패하였습니다.";
	    }
}
*/

	$idx = $_GET['idx'];
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
			관리자 수정
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
        			<td><input type="text" name="uid" value="<?=$row['uid']?>"></td>
        		</tr>
        		<tr><th><div class="tdRel">PASSWORD</div></th>
        			<td><input type="PASSWORD" name="upw" class="AXInput" ></td></tr>
        		<tr><th><div class="tdRel">이름</div></th>
        			<td><input type="text" name="uid" value="<?=$row['uname']?>"></td></tr>
        		<tr><th><div class="tdRel">레벨</div></th>
        			<td><input type="number" min=1 max=5 name="level" class="AXInput" value="<?=$row['level']?>"></td></tr>
        		<tr><th><div class="tdRel">VIEW</div></th>
        			<td> <label>
                    	  <input type="radio" name="view" value="Y" />Y</label>
                         <label><input type="radio" name="view" value="N" />N</label>
                    </td>
                </tr>
        		<tr><th><div class="tdRel">주소</div></th>
        			<td >
        				<div class="la">
        				<label class="la">  <input type="text" name="add_post" value="<?=$row['add_post']?>" class="AXInput" >&nbsp;&nbsp;우편번호</label></div>
        			<div class="la">
        			<label> <input type="text" name="add_1" value="<?=$row['add_1']?>" class="AXInput add"> &nbsp;&nbsp;기본주소</label></div>
        			<div class="la">
        		<label class="la"> <input type="text" name="add_2" value="<?=$row['add_2']?>" class="AXInput add" > &nbsp;&nbsp;상세주소 </label></div>
        	      </td>
        		</tr>
        		<tr><th><div class="tdRel">부서</div></th>
        			<td><input type="text" name="part"  value="<?=$row['part']?>" class="AXInput" ></td>
        		</tr>
        		<tr><th><div class="tdRel">직책</div></th>
        			<td><input type="text" name="posit" value="<?=$row['posit']?>" class="AXInput" ></td>
        		</tr>
        		<tr><th><div class="tdRel">전화번호</div></th>
        			<td><input type="text" name="phone" value="<?=$row['phone']?>" class="AXInput" ></td>
        		</tr>
        		<tr><th><div class="tdRel">취미</div></th>
        			<td><input type="text" name="hobby"  value="<?=$row['hobby']?>" class="AXInput" ></td>
        		</tr>
        		</table>
			<input type="button" name="ins" value="추가" class="AXButton Blue" onclick="ch(<)">
			<input type="hidden" name="mode" value="up">
		</div>
		</div>
	</div>
</body>
</html>