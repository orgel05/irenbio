<?php
	$title='제품소개';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/cfg.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/header.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/topmenu.php';	
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/sub.php';	


	require_once "./inc/dbcfg.php";
	$sql = "select * from pro1 where view='Y'";
	$result = mysql_query($sql, $connect) ;
	$row = mysql_fetch_array($result);

?>
<div id="subTitle">제품소개</div>
<div id= "contentsWrap">
	<div><a href="./product02_1.php">목록다시보기</a>
	</div>
	<div class="cer_subject">
		<div class="cer_subject_text"><?= $row['p_name']?></div>
	</div>
	<div class="intro_wrap1">
		<img src="" >사진
	</div>
	<div class="intro_wrap2">
		<div class="intro_Ttile">
			<img src="./img/biz_contents02_3.png">제품소개
		</div>
		<div class="intro_Text">
			이렌팡은 균에 대한 면역력을 증강시킴으로써 역병, 균핵, 흑성병, 흰가루, 잿빛곰팡이, 갈색무늬병, 노균 및 무름 등을 방제할 수 있는 친환경 물농약 제제로 100% 생분해 되어 친환경적이고 잔류농약과  내성이 없어 안심하고 사용할 수 있는 제품임
		</div>
		<div class="intro_Ttile">
			<img src="./img/biz_contents02_3.png">제품적용범위
		</div>
		<div class="intro_Text">
			피망, 오이, 딸기, 버섯, 고추, 파프리카, 채소, 모든 과수
		</div>
		<div class="intro_Ttile">
			<img src="./img/biz_contents02_3.png">사용방법
		</div>
		<div class="intro_Text">
			<span class="green"></span>
			※ 예방시 7일 간격으로 3회 살포하고,발생 초기 5일 간격으로 3회 살포 후, 10~15일 후  상태를 보고 재발생시 5일 간격 3회 살포하십시오. 해가 지기 한 시간 전에 살포하면 효과가 좋습니다. <br>
 			   약해시험작물 : 상추, 고추, 배추, 오이, 콩

		</div>
	</div>
	<div>
		<div class="intro_Ttile">
			<img src="./img/biz_contents02_3.png">제품특징
		</div>
		<div class="intro_Text">
		<span class="green">●</span> 식물성 지방산을 지방산 유도체에 의해 분리, 정제 후 첨단기술을 적용하여 제조한 천연, 무독성, 친환경, 유기농 자재입니다.<br>
		<span class="green">●</span> 내성이 없으며 자연광에서 100% 생분해됩니다.<br>
		<span class="green">●</span> 친환경 유기농자재 안정성 등급중 독성이 가장 낮은 경구, 경피, 저독성, 어독성 Ⅲ급으로 인체, 가축, 애완동물에 해가 없는 안전한 친환경 제품입니다.<br>
		<span class="green">●</span> 내성 및 잔류성이 없어 횟수에 제한없이 수확 당일까지 사용 가능합니다.<br>
		<span class="green">●</span> 주원료 및 함량 : 식물성오일 50%, 보조제 5%, 물 45%<br>


		</div>
		<div class="intro_Ttile">
			<img src="./img/biz_contents02_3.png">살포전후비교
		</div>
		
	</div>
</div>


<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/footer.php';
	
?>
</body>
</html>
</html>
