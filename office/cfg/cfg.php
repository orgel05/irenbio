
<?
//=======================================================
// 인젝션 방지
//=======================================================
function _clearinjection(&$val, $key) {
	if(is_array($val)) {
		array_walk($val, '_clearinjection');
	} else {
		$val = htmlspecialchars($val, ENT_QUOTES);
		@mysql_real_escape_string($val);
	}

}
if(count($_GET)) array_walk($_GET, '_clearinjection');
if(count($_POST)) array_walk($_POST, '_clearinjection');
//=============================================================
@extract($_GET);
@extract($_POST);
@extract($_SERVER); 
//===============================================

//===== DB 사용자정의(수정요) =====
$GLOBALS['cfgdbhost'] = "localhost";	// MySQL 호스트
$GLOBALS['cfgdbname'] = "5505";			// MySQL 데이타베이스명
$GLOBALS['cfgdbuser'] = "5505";			// MySQL 사용자 아이디
$GLOBALS['cfgdbpass'] = "5505";			// MySQL 사용자 비밀번호

// 상수적 변수정의
$head_title = '웹사이트 관리시스템';
$html_title = '이렌바이오 - 웹사이트관리';
$login_key = 'dlfpsqkdldh';
// 다음맵 API key
//$daummap_api_key = '5d69a6c6ce4398597c1beb340251cbe1';


//===== DB 접속 =====
$connect=@mysql_connect( "$cfgdbhost", "$cfgdbuser", "$cfgdbpass") or  die( " 에러 : DB에 접근되지 않습니다. 아이디와 패스워드를 확인하십시요."); 
@mysql_select_db("$cfgdbname",$connect);
@mysql_query('set names utf8');

session_start();

// 테이블 정의
$table_member = 'a_mem'; // 관리자 테이블
//$table_user = 'uto_member';

function strcut_utf8($str, $len, $tail='...'){ 
    $rtn = array(); 
    return preg_match('/.{'.$len.'}/su', $str, $rtn) ? $rtn[0].$tail : $str; 
}

function getBrowser() { // 브라우저 정보 분석
    $u_agent = $_SERVER['HTTP_USER_AGENT']; 
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";
 
    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) { $platform = 'linux'; }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) { $platform = 'mac'; }
    elseif (preg_match('/windows|win32/i', $u_agent)) { $platform = 'windows'; }
     
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) { $bname = 'Internet Explorer'; $ub = "MSIE"; } 
    elseif(preg_match('/Firefox/i',$u_agent)) { $bname = 'Mozilla Firefox'; $ub = "Firefox"; } 
    elseif(preg_match('/Chrome/i',$u_agent)) { $bname = 'Google Chrome'; $ub = "Chrome"; } 
    elseif(preg_match('/Safari/i',$u_agent)) { $bname = 'Apple Safari'; $ub = "Safari"; } 
    elseif(preg_match('/Opera/i',$u_agent)) { $bname = 'Opera'; $ub = "Opera"; } 
    elseif(preg_match('/Netscape/i',$u_agent)) { $bname = 'Netscape'; $ub = "Netscape"; } 
     
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
     
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){ $version= $matches['version'][0]; }
        else { $version= $matches['version'][1]; }
    }
    else { $version= $matches['version'][0]; }
     
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
    return array('userAgent'=>$u_agent, 'name'=>$bname, 'version'=>$version, 'platform'=>$platform, 'pattern'=>$pattern);
}
function error_msg($msg) {
 echo("<script language=\"javascript\"> 
   <!--
   alert('$msg');
   history.back();
   //-->
   </script>");
  exit;
}

require_once $_SERVER['DOCUMENT_ROOT']."/bio/office/cfg/func.php";
?>