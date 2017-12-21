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
$uploaddir = '/host/5505/html/bio/upload/';
$uploadfile = $uploaddir.$_FILES['data']['name'];
move_uploaded_file($_FILES['data']['tmp_name'], $uploadfile);
if($_POST['mode']=='up'){
	

	$title=$_POST['title'];
	$p_id=$_SESSION['uid'];
	$p_date=date("Y-m-d H:i:s",time());
	$contents=$_POST['ir1'];


	$sql = "INSERT INTO iren_news(title,p_id,date,contents) VALUES('$title','$p_id','$p_date','$contents')";

	   $result=mysql_query($sql,$connect);
	//header("Location: ./data_list.php"); 
	   mysql_error();
	   
}
?>
<script type="text/javascript" src="/bio/lib/smarteditor2/dist/js/service/HuskyEZCreator.js" charset="utf-8"></script>


	<!-- htmlHead-->
    <style type="text/css">
     .add {width:200px;}
     .la{margin-top:5px;margin-bottom:5px;  }

	</style>
	<script type="text/javascript" src="/bio/office/js/check.js"></script>
	<script type="text/javascript">
	    var programID = "BBS3";
	    
	    var fnObj = {
		    pageStart: function(){

		    },
		    pageResize: function(){

		    }
	    };
	
	
		 function go_list(){
			location.href="data_list.php";
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

        	
<div style="margin:auto;position:relative;width:800px ">
<form action="data_add.php" method="post" name="insert" " enctype="multipart/form-data">
	<div style="width:776px;margin-bottom:15px; ">
	<label>제목 : </label>	<input type="text" name="title" style="width:730px;border:1px solid gray;">
	</div>
	<textarea name="ir1" id="ir1" rows="10" cols="100" style="width:766px; height:412px; display:none;"></textarea>
	<!--textarea name="ir1" id="ir1" rows="10" cols="100" style="width:100%; height:412px; min-width:610px; display:none;"></textarea-->
	<p>

			<input type="hidden" name="mode" value="up">
		
		
	<p>
		
		<div style="margin:auto;position: relative; text-align:center;margin-top:10px;">
				
				<input type="button" onclick="submitContents(this);" class="AXButton Blue" value="입력완료" />
				<button onclick="go_list()"   class="AXButton Blue">목록으로</button>
		</div>

	</p>
	</p>
</form>


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
	
		oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD",[]);
		elClickedObj.form.submit();

}

function setDefaultFont() {
	var sDefaultFont = '궁서';
	var nFontSize = 24;
	oEditors.getById["ir1"].setDefaultFont(sDefaultFont, nFontSize);
}
</script>