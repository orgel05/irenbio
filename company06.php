<?php
	$title='인증현황';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/cfg.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/header.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/topmenu.php';	require_once "./inc/dbcfg.php";
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/sub.php';	
	$sql = "select * from iren_cer";
	$result = mysql_query($sql, $connect) ;
?>
<div id="contentsWrap">
	<div id="subTitle">인증현황</div>

        	<? while ($row = mysql_fetch_array($result)) {
				?>
	<div class="cer_item">
		<div class="cer_subject">
			<div class="cer_subject_text"><?=$row['c_name']?></div>
		</div>
		<div class="cer_img"><img src="./img/<?=$row['c_img']?>"></div>
		<div class="cer_text"><?=htmlspecialchars_decode($row['c_info'])?></div>
	</div>
		<? }
		?>
	
	
</div>

<?php 
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/footer.php';
?>
</body>
</html>
</html>
