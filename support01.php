 <?php
	$title='문의하기';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/cfg.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/dbcfg.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/header.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/topmenu.php';	
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/sub.php';	
?>

<?php
	$mode=$_POST['mode'];
	if($mode=='on'){

		$q_name=$_POST['name'];
		$q_phone=$_POST['phone'];
		$q_email=$_POST['email'];
		$q_title=$_POST['title'];
		$q_contents=$_POST['contents'];
		
		$sql="INSERT INTO iren_qna(q_name,q_phone,q_email,q_title,q_contents,date) VALUES('$q_name','$q_phone','$q_email','$q_title','$q_contents',sysdate())";
		$result=mysql_query($sql,$connect);
	  	$mode="off";
	  }
?>
<script type="text/javascript" src="/bio/lib/smarteditor2/dist/js/service/HuskyEZCreator.js" charset="utf-8"></script>
<div id="subTitle">문의하기</div>

<div id="contentsWrap">
	※ *표시는 필수항목으로, 반드시 입력해주셔야 합니다.</br>
	<form name="form1" action="<?=$_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">

	<table class="qna_table" border="1">
		<tr><td class="qna_title">성명 혹은 단체</td>
			  <td><input type="text" name="name" placeholder="개인성명 또는 단체명"></td>
		</tr>
		<tr><td class="qna_title">연락처(휴대폰)</td>
			  <td><input type="text" name="phone" placeholder="연락처&middot;휴대폰번호"></td>
		</tr>
		<tr><td class="qna_title">E-mail주소</td>
			  <td><input type="text" name="email" placeholder="E-mail 주소"></td>
		</tr>
		<tr><td class="qna_title">제&nbsp;&nbsp;목</td>
			  <td><input type="textarea" width="200" name="title" placeholder="제 목"></td>
		</tr>
		<tr style="height:150px; "><td class="qna_title">문의내용</td>
			  <td>
			  		<textarea name="contents" id="ir1" rows="10" cols="100" style="width:766px; height:412px; display:none;"></textarea>		
			  </td>
		</tr>
		<!--<tr><td class="qna_title">스팸방지 번호 입력</td>
			  <td></td>
		</tr>-->
	</table>
	<div id="qna_button">
		<input type="hidden" name="mode" value="on">
	<center><input type="button" class="button" onclick="ch(form1)" value="문의하기"></div>
</form></center>




</div>

<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/footer.php';
	
?>
</body>
</html>
</html>
<script type="text/javascript">
	 function ch(f){

	 	if(!f.name.value){
	 		alert("성명을 입력하세요");
	 		f.name.focus();
	 		return false;
	 	}
	 	else if(!f.phone.value){
	 		alert("연락처를 입력하세요");
	 		f.phone.focus();
	 		return false;
	 	}
	 	else if(!f.title.value){
	 		alert("제목을 입력하세요");
	 		f.title.focus();
	 		return false;
	 	}
	 	
	 	else {
	 		alert("전송 되었습니다.");
	 		oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD",[]);
	 		f.submit();
	 	}
	// 	alert(f.uid.value);
	 }</script>

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