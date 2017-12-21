<?php
	$title='제품소개';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/cfg.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/header.php';
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/topmenu.php';	
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/sub.php';	
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/func.php';

	require_once "./inc/dbcfg.php";
	
	$sql = "select * from iren_news order by no desc" ;
	$result = mysql_query($sql, $connect) ;
	//$row = mysql_fetch_array($result);

?>
<?// 기본 정의 변수

$view_no = 10; // 페이지당 보는 게시물 수
$pagebox = 8; // 페이지목록에 보이는 페이지 갯수
$table_member="iren_news";
// 게시물 갯수 구하기
if($s_que) { // 검색어가 있는 경우
	$sql = "select count(*) from $table_member where $sh_type like '%$s_que%'";
} else { // 검색어가 없는 경우
	$sql = "select count(*) from $table_member";
}
$result = @mysql_query($sql,$connect);
$maxrow = @mysql_result($result, 0, "COUNT(*)");  // 게시물 총 갯수
if (!$page) $page = 1; // 페이지변수가 넘어오지 않으면 페이지는 1페이지
$pagemax = intval(($maxrow-1) / $view_no)+1; // 최대페이지수 구하기
$offset = ($page - 1) * $view_no; // 페이지별 시작하는 게시물의 번호


// 페이지영역 설정을 위한 초기변수
$pagebox_cur = intval(($page-1) / $pagebox);

$a = $pagebox_cur * $pagebox;
$b =  $pagebox_cur * $pagebox + 1;
$c = $pagebox_cur * $pagebox + $pagebox;
$d = $pagebox_cur * $pagebox + $pagebox + 1;

// 첫페이지
$page_list = "<a href=\"/bio/support03.php?page=1&s_que=$s_que&sh_type=$sh_type&mode=$mode&utype=$utype&so_name=$so_name&so_arr=$so_arr\" title=\"첫 페이지\" class=\"plast\" rel=\"external\"><img src=\"/bio/officedemo/img/bl_left2.gif\" alt=\"첫페이지\" /></a>";

// 현재 페이지영역 이전의 페이지영역이 있는 경우 이전페이지목록으로 가는 링크
if (($pagebox_cur * $pagebox) >= $pagebox) {
	$page_list .= "<a href='/bio/support03.php?page=".$a."&s_que=$s_que&sh_type=$sh_type&mode=$mode&utype=$utype&so_name=$so_name&so_arr=$so_arr' title=\"이전 페이지그룹\" class=\"pnext\" rel=\"external\"><img src=\"/bio/officedemo/img/bl_left.gif\" alt=\"이전 $pagebox 페이지\" /></a>";
}

// 페이지영역안에 들어오는 경우에 페이지번호 뿌려주면서 해당페이지가 현재페이지인지 체크
for ($i = $b; ($i <= $pagemax) && ($i <= $c); $i ++) {
	if ($page != $i) {
		$page_list .= "<a href='/bio/support03.php?page=$i&s_que=$s_que&sh_type=$sh_type&mode=$mode&utype=$utype&so_name=$so_name&so_arr=$so_arr' title=\"$i 페이지\" class=\"num\" rel=\"external\">$i</a>";
    } else {
		$page_list .= "<a href=\"#\" class=\"num_current\" title=\"현재 페이지\">$i</a>";
	}
}

// 다음페이지영역이 존재하는 경우 다음페이지목록으로 가는 링크
if ($c < $pagemax) {
      $page_list .= "<a href='/bio/support03.php?page=".$d."&s_que=$s_que&sh_type=$sh_type&mode=$mode&utype=$utype&so_name=$so_name&so_arr=$so_arr' title=\"다음 페이지그룹\" class=\"pnext\" rel=\"external\"><img src=\"/bio/officedemo/img/bl_right.gif\" alt=\"다음 $pagebox 페이지\" /></a>";
}

$page_list .= "<a href=\"/bio/support02.php?page=$pagemax&s_que=$s_que&sh_type=$sh_type&mode=$mode&utype=$utype&so_name=$so_name&so_arr=$so_arr\" title=\"마지막 페이지\" class=\"plast\" rel=\"external\"><img src=\"/bio/officedemo/img/br_right2.gif\" alt=\"마지막페이지\" /></a>";


?>

	<style>
		.apage_navi  { text-align:center; padding:20px 10px;}
		.apage_navi a.num { padding:2px 7px; border:solid 1px #ccc; margin:2px; text-decoration:none; }
		.apage_navi a.num_current { padding:2px 7px; border:solid 1px #ccc; margin:2px; background-color:#a3a3a3; color:#fff; font-weight:bold; text-decoration:none; }
		.apage_navi a.pfirst { padding:2px 7px; border:solid 1px #ccc; margin:2px; background-color:#d8e1f0; }
		.apage_navi a.ppre { padding:2px 9px; border:solid 1px #ccc; margin:2px;  }
		.apage_navi a.plast { padding:2px 7px; border:solid 1px #ccc; margin:2px; background-color:#d8e1f0; }
		.apage_navi a.pnext { padding:2px 9px; border:solid 1px #ccc; margin:2px;  }
		.apage_navi a.plist { padding:5px; border:solid 1px #ccc; margin:2px; font-weight:bold; background-color:#fff;}
	</style>



<div id="subTitle">이렌뉴스</div>
<div id= "contentsWrap">
	<div align="right">조회된 게시물 수 : 총 <?=$maxrow?>건</div>
	<table class="data_table">
		<tr>
			<td style="width:5%" class="data_title" >NO</td>
			<td style="width:70%" class="data_title" >제목</td>
			<td style="width:10%" class="data_title" ">작성자</td>
			<td  style="width:15%;" class="data_title">작성일</td>
		</tr>
<?
    if($s_que) {
		$sql = "select * from $table_member where $sh_type like '%$s_que%' order by no desc limit $offset, $view_no";
	} else {
		$sql = "select * from $table_member order by no desc limit $offset, $view_no";
	}
	$result = mysql_query($sql, $connect);
    while ($row = mysql_fetch_array($result)) {
    $memo = strip_tags($row[memo]);
	$memo = strcut_utf8($memo, 20, '...');
	$nos = $maxrow - ($view_no * ($page-1) + $a++);
	?>
		<tr onmouseover="this.style.background='#E8EEC6'" onmouseout="this.style.background='#ffffff'" onclick="go_news('<?=$row['no']?>');" style="cursor: pointer;">
			<td class="data_list"><?=$row['no']?></td>
			<td class="data_list" style="text-align:left; padding-left:20px;"><?=$row['title']?></td>
			<td class="data_list"></td>
			<td class="data_list"><?=$row['date']?></td>
		</tr>
		<? } ?>
	</table>
	<div class="apage_navi">
		<div>	<?=$page_list?>
		</div>	
	</div>
	

</div>


<?php
	include_once $_SERVER['DOCUMENT_ROOT'].'/bio/inc/footer.php';
	
?>
</body>
</html>
</html>
<script type="text/javascript">
	function go_news(no){
		location.href="/bio/support03_1.php?idx="+no;

	}
</script>