<?php
	$title='이렌뉴스';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/cfg.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/header.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/topmenu.php';	
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/sub.php';	


	require_once "./inc/dbcfg.php";
	$idx = $_GET['idx'];
	$sql = "select * from iren_data where no='$idx'";
	$result = mysql_query($sql, $connect) ;
	$row = mysql_fetch_array($result);

?>
	<link rel="stylesheet" type="text/css" href="/bio/lib/axisj/ui/arongi/AXButton.css" />
<div id="subTitle">자료실</div>
<div id= "contentsWrap">
	<div id="news_wrap">
		<div id="news_wrap2">
			<span id="news_sub"><?=$row['title']?></span>
			<span id="news_date"><?=$row['date']?></span>
			<hr>
			<span>첨부자료 : </span>
			<span><?=$row['data']?></span>
			<hr>
		</div>
		<div id="news_wrap3">
			<?=htmlspecialchars_decode($row['contents'])?>
		</div>
	</div>
	<div id="news_bu">
		<input type="button" name="ins" value="목록으로" class="AXButton Green"  onclick="go()">
	</div>
</div>

<script type="text/javascript">
	function go(){
		location.href="/bio/support02.php";
	}

</script>
<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/footer.php';
	
?>
</body>
</html>
</html>
