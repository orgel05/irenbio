
<!doctype html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>동양실습</title>
</head>
<body>
<?php
if($_POST['mode']=='up') {

$c = $_POST['upw'] . 'wlsdn' . $_POST['upw'];
$user_pw = hash(sha256, $c);

echo "인코딩된 패스워드 : $user_pw";

echo "<br /> <a href='돌아가기'></a>";

exit;
}
?>

<form name="myForm" method="post" action="<?=$_SERVER['PHP_SELF']?>" id="myFrom">
<input type="hidden" name="mode" value="up">

패스워드 : <input type="password" name="upw" size="15"> <input type="submit" value="확인">

</form> 
</body>
</html>
