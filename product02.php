<?php
	$title='제품소개';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/cfg.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/header.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/topmenu.php';	
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/sub.php';	


	require_once "./inc/dbcfg.php";
	$sql = "select * from pro1 where view='Y'";
	$result = mysql_query($sql, $connect) ;


?>
<div id="subTitle">제품소개</div>
<div id= "contentsWrap">
	

	<?php	
			while ($row = mysql_fetch_array($result)) {
		?>		
	<div class="product_item">
		<div class="product_subject">
			<div class="product_subject_text"><a href="product_1.php?idx=<?=$row['no']?>"><?=$row['p_name'] ?></a></div>
		</div>
		<div class="product_img"><a href="product_1.php?idx=<?=$row['no']?>"><img src="./img/<?=$row['p_img']?>"></a></div>
		<div class="product_text"><?=htmlspecialchars_decode($row['p_way']) ?></div>
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
