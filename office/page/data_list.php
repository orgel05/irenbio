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

<?// 기본 정의 변수
$view_no = 10; // 페이지당 보는 게시물 수
$pagebox = 8; // 페이지목록에 보이는 페이지 갯수
$table_member="iren_data";

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
$page_list = "<a href=\"/bio/office/page/data_list.php?page=1&s_que=$s_que&sh_type=$sh_type&mode=$mode&utype=$utype&so_name=$so_name&so_arr=$so_arr\" title=\"첫 페이지\" class=\"plast\" rel=\"external\"><img src=\"/bio/officedemo/img/bl_left2.gif\" alt=\"첫페이지\" /></a>";

// 현재 페이지영역 이전의 페이지영역이 있는 경우 이전페이지목록으로 가는 링크
if (($pagebox_cur * $pagebox) >= $pagebox) {
	$page_list .= "<a href='/bio/office/page/data_list.php?page=".$a."&s_que=$s_que&sh_type=$sh_type&mode=$mode&utype=$utype&so_name=$so_name&so_arr=$so_arr' title=\"이전 페이지그룹\" class=\"pnext\" rel=\"external\"><img src=\"/bio/officedemo/img/bl_left.gif\" alt=\"이전 $pagebox 페이지\" /></a>";
}

// 페이지영역안에 들어오는 경우에 페이지번호 뿌려주면서 해당페이지가 현재페이지인지 체크
for ($i = $b; ($i <= $pagemax) && ($i <= $c); $i ++) {
	if ($page != $i) {
		$page_list .= "<a href='/bio/office/page/data_list.php?page=$i&s_que=$s_que&sh_type=$sh_type&mode=$mode&utype=$utype&so_name=$so_name&so_arr=$so_arr' title=\"$i 페이지\" class=\"num\" rel=\"external\">$i</a>";
    } else {
		$page_list .= "<a href=\"#\" class=\"num_current\" title=\"현재 페이지\">$i</a>";
	}
}

// 다음페이지영역이 존재하는 경우 다음페이지목록으로 가는 링크
if ($c < $pagemax) {
      $page_list .= "<a href='/bio/office/page/data_list.php?page=".$d."&s_que=$s_que&sh_type=$sh_type&mode=$mode&utype=$utype&so_name=$so_name&so_arr=$so_arr' title=\"다음 페이지그룹\" class=\"pnext\" rel=\"external\"><img src=\"/bio/officedemo/img/bl_right.gif\" alt=\"다음 $pagebox 페이지\" /></a>";
}

$page_list .= "<a href=\"/bio/office/page/data_list.php?page=$pagemax&s_que=$s_que&sh_type=$sh_type&mode=$mode&utype=$utype&so_name=$so_name&so_arr=$so_arr\" title=\"마지막 페이지\" class=\"plast\" rel=\"external\"><img src=\"/bio/officedemo/img/br_right2.gif\" alt=\"마지막페이지\" /></a>";


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


<link rel="stylesheet" type="text/css" href="/bio/css/style.css">

	<!-- htmlHead-->
  
	<script type="text/javascript">
	    var programID = "BBS2";
	    
	    var fnObj = {
		    pageStart: function(){

		    },
		    pageResize: function(){

		    }
	    };
	    function go_view(no){
	    	location.href="/bio/office/page/data_view.php?idx="+no;

	    }
	    function go_add() {
	    	location.href="/bio/office/page/data_add.php";
	    	// body...
	    }
	</script>
	<style type="text/css">
		
	</style>
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
			자료실
		</div>

        <div class="contentArea">
        	<table cellpadding="0" cellspacing="0" class="AXFormTable">
        		<colgroup>
					
					</colgroup>
        		<tr>
        			<th style="width:15px;"><div class="tdRel">번호</div></th>
        			<th style="width:100px;"> <div class="tdRel">제목</div></th>			
        			<th style="width:30px;"><div class="tdRel">작성자</div></th>
        			<th style="width:50px;"><div class="tdRel">날짜</div></th>
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

				<tr height="35" bgcolor="#ffffff" onmouseover="this.style.background='#E8EEC6'" onmouseout="this.style.background='#ffffff'" onclick="go_view('<?=$row['no']?>');" style="text-align: center;cursor: pointer;">
        			<td ><?=$row['no']?></td>
        			<td ><?=$row['title']?></td>
        			<td><?=$row['p_id']?></td>
        			<td><?=$row['date']?></td>
        			
        		</tr>
				<? }
		?>	
			</table>
			<div class="apage_navi">
				<div>	
					<?=$page_list?>
				</div>	
			<div style="margin:auto;position: relative; text-align:center;margin-top:10px;">
				<button onclick="go_add()"   class="AXButton Blue">추가하기</button></div>
		</div>
	</div>
</body>
</html>

