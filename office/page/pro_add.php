
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
	
	$uploaddir = '/host/5505/html/bio/img/';
	$uploadfile = $uploaddir.$_FILES['p_img']['name'];
	move_uploaded_file($_FILES['p_img']['tmp_name'], $uploadfile);
if($_POST['mode']=='up'){

	

	$p_type=$_POST['p_type'];
	$p_img=$_FILES['p_img']['name'];
	$p_name=$_POST['p_name'];
	$view=$_POST['view'];
	$p_intro=$_POST['p_intro'];
	$p_area=$_POST['p_area'];
	$p_use=$_POST['p_use'];
	$p_mul=$_POST['p_mul'];
	$p_way=$_POST['p_way'];
	$p_feat=$_POST['p_feat'];
	$sql = "INSERT INTO pro1(p_type,p_img,p_name,view,p_intro,p_area,p_use,p_mul,p_way,p_feat) VALUES ('$p_type','$p_img','$p_name','$view','$p_intro','$p_area','$p_use','$p_mul','$p_way','$p_feat')";
	  $result=mysql_query($sql,$connect);
	 
	  if(!$result){
	  	
	  echo mysql_error();
	  	exit;
	   }
}

	$sql = "select * from pro1 where no='$idx'";
	$result = mysql_query($sql, $connect) ;
	$row = mysql_fetch_array($result);
?>

	<!-- htmlHead-->
    <style type="text/css">
     .add {width:200px;}
     .la{margin-top:5px;margin-bottom:5px;  }

	</style>
	<script type="text/javascript" src="/bio/office/js/check.js"></script>
	<script type="text/javascript" src="/bio/lib/smarteditor2/dist/js/service/HuskyEZCreator.js" charset="utf-8"></script>
	<script type="text/javascript">
	    var programID = "DATA2";
	    
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
	 	}*/
	 	
	 		f.submit();
	 	
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
			제품 추가
		</div>

        <div class="contentArea">
        	<div style="width:600px;">
        	<form name="insert" method="post" action="<?=$_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
				<table cellpadding="0" cellspacing="0" class="AXFormTable">
					<colgroup>
						<col width="100" />
						<col width="800" />
					</colgroup>
        	
        		<tr><th><div class="tdRel">타입</div></th>
        			<td><input type="text" name="p_type" class="AXInput" "></td>
        		</tr>
        		<tr><th><div class="tdRel">이름</div></th>
        			<td><input type="text" name="p_name" class="AXInput" "></td></tr>
        		<tr><th><div class="tdRel">이미지</div></th>
        			<td><input type="file" name="p_img"  />
        			</td></tr>
        		<tr><th><div class="tdRel" >제품소개</div></th>
        			<td><textarea name="p_intro" id="p_intro" rows="10" cols="100" style="width:766px; height:412px; display:none;"><?=$row['p_intro']?></textarea></div>

        		<tr><th><div class="tdRel">VIEW</div></th>
        			<td> <label>
                    	  <input type="radio" name="view" value="Y" <? if($row['view']=='Y'){echo 'checked="checked"';} ?>  />Y</label>
                         <label><input type="radio" name="view" value="N" <? if($row['view']=='N'){echo 'checked="checked"';} ?> />N</label>
                      
                    </td>
                </tr>
        		<tr><th><div class="tdRel">제품범위</div></th>
        			<td >
        				<textarea name="p_area" id="p_area" rows="10" cols="100" style="width:766px; height:412px; display:none;"></textarea>
        	      </td>
        		</tr>
        		<tr><th><div class="tdRel">사용방법</div></th>
        			<td>
        				<textarea name="p_use" id="p_use" rows="10" cols="100" style="width:766px; height:412px; display:none;"></textarea></td>
        		</tr>
        		<tr><th><div class="tdRel">희석배수</div></th>
        			<td><textarea name="p_mul" id="p_mul" rows="10" cols="100" style="width:766px; height:412px; display:none;"></textarea></td>
        		</tr>
        		<tr><th><div class="tdRel">효과</div></th>
        			<td><textarea name="p_way" id="p_way" rows="10" cols="100" style="width:766px; height:412px; display:none;"></textarea></td>
        		</tr>
        		<tr><th><div class="tdRel">특징</div></th>
        			<td><textarea name="p_feat" id="p_feat" rows="10" cols="100" style="width:766px; height:412px; display:none;"></textarea>></td>
        		</tr>
        		</table>
        		<div class="bnt_go" style="width:500px; ">
			<button  class="AXButton Blue" onclick="submitContents(insert)">추가하기</button>
			<button class="AXButton Green" onclick="go_list()">목록으로</button></div>
			<input type="hidden" name="mode" value="up">
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
	elPlaceHolder: "p_intro",
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
	elPlaceHolder: "p_area",
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
	elPlaceHolder: "p_use",
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
	elPlaceHolder: "p_mul",
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
	elPlaceHolder: "p_way",
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
	elPlaceHolder: "p_feat",
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
function pasteHTML() {
	var sHTML = "<span style='color:#FF0000;'>이미지도 같은 방식으로 삽입합니다.<\/span>";
	oEditors.getById["ir1"].exec("PASTE_HTML", [sHTML]);
}

function showHTML() {
	var sHTML = oEditors.getById["ir1"].getIR();
	alert(sHTML);
}
	
function submitContents(elClickedObj) {
	
	// 에디터의 내용에 대한 값 검증은 이곳에서 document.getElementById("ir1").value를 이용해서 처리하면 됩니다.
	
		oEditors.getById["p_feat"].exec("UPDATE_CONTENTS_FIELD",[]);
		oEditors.getById["p_way"].exec("UPDATE_CONTENTS_FIELD",[]);
		oEditors.getById["p_mul"].exec("UPDATE_CONTENTS_FIELD",[]);
		oEditors.getById["p_use"].exec("UPDATE_CONTENTS_FIELD",[]);
		oEditors.getById["p_intro"].exec("UPDATE_CONTENTS_FIELD",[]);
		oEditors.getById["p_area"].exec("UPDATE_CONTENTS_FIELD",[]);
		elClickedObj.form.submit();

}

function setDefaultFont() {
	var sDefaultFont = '궁서';
	var nFontSize = 24;
	oEditors.getById["ir1"].setDefaultFont(sDefaultFont, nFontSize);
}
</script>