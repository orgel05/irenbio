
<!doctype html>
<html lang="ko">

<head>
<meta charset="UTF-8">
<meta name="Keywords" content="이렌바이오">
<meta name="Description" content="이렌바이오">
<link rel="stylesheet" type="text/css" href="./css/style.css">
<script type="text/javascript" src="./js/menu.js"></script>
<title><?= $title ?>-<?= $html_title ?></title>
</head>

<body>
<!-- HEADER -->

<div id="header">
	<div id="topmenu">
		<a href="./">HOME</a>
		<span class="topmenu_gap">|</span>
		<a href="./support01.php">문의하기</a>
		<span class="topmenu_gap">|</span>
		<a href="./sitemap.php">SITEMAP</a>
	</div>

	<div id="logo">
		<a href="./index.php"><img src="./img/logo.gif" border="0" /></a>
	</div>

	<ul id="menu">
		<li><a href="./company01.php" onMouseOver="menuOn('submenu01')">회사소개</a></li>
		<li><a href="./biz01.php" onMouseOver="menuOn('submenu02')">사업소개</a></li>
		<li><a href="./product01.php" onMouseOver="menuOn('submenu03')">생산품</a></li>
		<li><a href="./support01.php" onMouseOver="menuOn('submenu04')">고객지원</a></li>
	</ul>

</div>

