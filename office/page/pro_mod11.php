
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


	$uploaddir = '/host/5505/html/bio/img/';
	$uploadfile = uploaddir.$_FILES['p_name']['name'];
	move_uploaded_file($_FILES['abc']['tmp_name'], $uploadfile);
/*
	$c = $_POST['upw'] . 'wlsdn' . $_POST['upw'];
	$upw = hash(sha256, $c);


	$uid=$_POST['uid'];

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
	$sql = "UPDATE a_mem SET uid='$uid',upw='$upw',uname='$uname',level='$level',view='$view',add_post='$add_post',add_1='$add_1',add_2='$add_2',part='$part',posit='$posit',phone='$phone',hobby='$hobby' where no='$idx'";
	  $result=mysql_query($sql,$connect);
	  if(!$result){
	  	echo mysql_error();
	  	exit;
	  }
	   
}*/

	$sql = "select * from pro1 where no='$idx'";
	$result = mysql_query($sql, $connect) ;
	$row = mysql_fetch_array($result);
?>

	<!-- htmlHead-->
    <style type="text/css">
     .add {width:200px;}
     .la{margin-top:5px;margin-bottom:5px;  }

	</style>
	<script type="text/javascript" src="/bio/lib/smarteditor2/dist/js/service/HuskyEZCreator.js" charset="utf-8"></script>
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
	 function ch(f){/*

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
	 	else */{
	 		alert("전송 되었습니다.")
	 		f.submit();
	 	}
	// 	alert(f.uid.value);
	 }
	 function go_list(){
			location.href="pro_list.php";
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
        	<div style="width:600px;">
        	<form name="insert" method="post" action="./member_modify.php?idx=<?=$row['no']?>">
				<table cellpadding="0" cellspacing="0" class="AXFormTable">
					
        		<colgroup>
						<col width="100" />
						<col />
					</colgroup>
        		<tr><th><div class="tdRel">타입</div></th>
        			<td><input type="text" name="p_type" class="AXInput" value="<?=$row['p_type']?>"></td>
        		</tr>
        		<tr><th><div class="tdRel">이름</div></th>
        			<td><input type="text" name="p_name" class="AXInput" value="<?=$row['p_name']?>"></td></tr>
        		<tr><th><div class="tdRel">이미지</div></th>
        			<td><input type="file" name="p_img" /></td></tr>
        		<tr><th><div class="tdRel" >제품소개</div></th>
        			<td><textarea  name="p_intro" class="AXTextarea W200" style="width:400px;  height:100px; "><?=$row['p_intro']?></textarea></td></tr>
        		<tr><th><div class="tdRel">VIEW</div></th>
        			<td> <label>
                    	  <input type="radio" name="view" value="Y" <? if($row['view']=='Y'){echo 'checked="checked"';} ?>  />Y</label>
                         <label><input type="radio" name="view" value="N" <? if($row['view']=='N'){echo 'checked="checked"';} ?> />N</label>
                      
                    </td>
                </tr>
        		<tr><th><div class="tdRel">제품범위</
        			div></th>
        			<td >
        				
        				<textarea name="ir1" id="ir1" rows="10" cols="100" style="width:766px; height:412px; display:none;"></textarea>
        	      </td>
        		</tr>
        		<tr><th><div class="tdRel">사용방법</div></th>
        			<td><textarea name="ir2" id="ir2" rows="10" cols="100" style="width:766px; height:412px; display:none;"></textarea>
        				<textarea  name="p_use" class="AXTextarea W200" style="width:400px;  height:100px; "><?=$row['p_use']?></textarea></td>
        		</tr>
        		<tr><th><div class="tdRel">희석배수</div></th>
        			<td><textarea name="ir3" id="ir3" rows="10" cols="100" style="width:766px; height:412px; display:none;"></textarea>
        				<textarea  name="p_mul" class="AXTextarea W200" style="width:400px;  height:100px; "><?=$row['p_mul']?></textarea></td>
        		</tr>
        		<tr><th><div class="tdRel">효과</div></th>
        			<td><textarea  name="p_way" class="AXTextarea W200" style="width:400px;  height:100px; "><?=$row['p_way']?></textarea></td>
        		</tr>
        		<tr><th><div class="tdRel">특징</div></th>
        			<td><textarea  name="p_feat" class="AXTextarea W200" style="width:400px;  height:100px; "><?=$row['p_feat']?></textarea>></td>
        		</tr>
        		</table>
        		<div class="bnt_go" style="width:500px; ">
			<button  class="AXButton Blue" onclick="ch(insert)">추가하기</button>
			<button class="AXButton Green" onclick="go_list()">목록으로</button></div>
			<input type="hidden" name="mode" value="up"></form>
		</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
var oEditors = [];

var sLang = "ko_KR";	// 언어 (ko_KR/ en_US/ ja_JP/ zh_CN/ zh_TW), default = ko_KR

// 추가 글꼴 목록
//var aAdditionalFontSet = [["MS UI Gothic", "MS UI Gothic"], ["Comic Sans MS", "Comic Sans MS"],["TEST","TEST"]];

nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "ir1",
	sSkinURI: "/bio/lib/smarteditor2/dist/SmartEditor2Skin.html",	
	htParams : {
		bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseVerticalResizer : true,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseModeChanger : true,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
		//bSkipXssFilter : true,		// client-side xss filter 무시 여부 (true:사용하지 않음 / 그외:사용)
		//aAdditionalFontList : aAdditionalFontSet,		// 추가 글꼴 목록
		fOnBeforeUnload : function(){
			//alert("완료!");
		},
		I18N_LOCALE : sLang
	}, //boolean
	fOnAppLoad : function(){
		//예제 코드
		//oEditors.getById["ir1"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
	},
	fCreator: "createSEditor2"
});
nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "ir2",
	sSkinURI: "/bio/lib/smarteditor2/dist/SmartEditor2Skin.html",	
	htParams : {
		bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseVerticalResizer : true,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseModeChanger : true,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
		//bSkipXssFilter : true,		// client-side xss filter 무시 여부 (true:사용하지 않음 / 그외:사용)
		//aAdditionalFontList : aAdditionalFontSet,		// 추가 글꼴 목록
		fOnBeforeUnload : function(){
			//alert("완료!");
		},
		I18N_LOCALE : sLang
	}, //boolean
	fOnAppLoad : function(){
		//예제 코드
		//oEditors.getById["ir1"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
	},
	fCreator: "createSEditor2"
});
nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "ir3",
	sSkinURI: "/bio/lib/smarteditor2/dist/SmartEditor2Skin.html",	
	htParams : {
		bUseToolbar : true,				// 툴바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseVerticalResizer : true,		// 입력창 크기 조절바 사용 여부 (true:사용/ false:사용하지 않음)
		bUseModeChanger : true,			// 모드 탭(Editor | HTML | TEXT) 사용 여부 (true:사용/ false:사용하지 않음)
		//bSkipXssFilter : true,		// client-side xss filter 무시 여부 (true:사용하지 않음 / 그외:사용)
		//aAdditionalFontList : aAdditionalFontSet,		// 추가 글꼴 목록
		fOnBeforeUnload : function(){
			//alert("완료!");
		},
		I18N_LOCALE : sLang
	}, //boolean
	fOnAppLoad : function(){
		//예제 코드
		//oEditors.getById["ir1"].exec("PASTE_HTML", ["로딩이 완료된 후에 본문에 삽입되는 text입니다."]);
	},
	fCreator: "createSEditor2"
});
</script>