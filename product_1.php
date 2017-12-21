<?php
	$title='제품소개';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/cfg.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/header.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/topmenu.php';	
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/sub.php';	


	require_once "./inc/dbcfg.php";
	$idx = $_GET['idx'];
	$sql = "select * from pro1 where no='$idx'";
	$result = mysql_query($sql, $connect) ;
	$row = mysql_fetch_array($result);

?>
<div id="subTitle">제품소개</div>
<div id= "contentsWrap">
	<div id="intro_re"><a href="./product02.php">목록다시보기</a>
	</div>
	<div class="cer_subject">
		<div class="cer_subject_text"><?=$row['p_name']?></div>
	</div>
	<div class="intro_wrap1">
		<img src="./img/big/<?=$row['p_img']?>" id="intro_img">
	</div>
	<div class="intro_wrap2">
		<div class="intro_Ttile">
			<img src="./img/biz_contents02_3.png">제품소개
		</div>
		<div class="intro_Text">
			<?=$row['p_intro']?>
		</div>
		<div class="intro_Ttile">
			<img src="./img/biz_contents02_3.png">제품적용범위
		</div>
		<div class="intro_Text">
			<?=$row['p_area']?>
		</div>
		<div class="intro_Ttile">
			<img src="./img/biz_contents02_3.png">사용방법
		</div>
		<div class="intro_Text">
			<?=htmlspecialchars_decode($row['p_use'])?>

		</div>
		
			<table id="pro_use" >
				<tr >
					<td class="use_title" style="border-right:1px solid gray " width="400px">희석배수</td>
					<td class="use_title" width="150px">사용방법</td>
				</tr>
				<tr>
					<td class="use_content" style="border-right:1px solid gray "><?=htmlspecialchars_decode($row['p_mul'])?></td>
					<td class="use_content"><?=htmlspecialchars_decode($row['p_muluse'])?></td>
				</tr>
			</table>

		

	</div>
	<div>
		<div class="intro_Ttile">
			<img src="./img/biz_contents02_3.png">제품특징
		</div>
		<div class="intro_Text">
		<?=htmlspecialchars_decode($row['p_feat'])?>


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
