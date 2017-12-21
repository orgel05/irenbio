<?php
	$cfgdbhost='localhost'	;
	$cfgdbuser='5505';
	$cfgdbpass='5505';
	$cfgdbname='5505';

	$connect=mysql_connect("$cfgdbhost", "$cfgdbuser","$cfgdbpass") or die("에러 : DB에 접근되지 않습니다. 아이디와 패스워드를 확인하십시요.");
	mysql_select_db("$cfgdbname",$connect);
	mysql_query('set names utf8');

?>