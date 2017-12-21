<?

function err_msg($msg) {
	echo( "<script name=javascript>
		window.alert('$msg');
		history.go(-1)
		</script>
	"); 
	exit;
}

function err_pop($msg) {
   echo("<script language=\"javascript\"> 
   <!--
   alert('$msg');
   self.close();
   //-->   
   </script>");
exit;
}

function thumbnail($file, $save_filename, $max_width, $max_height) {
	$src_img = ImageCreateFromJPEG($file); //JPG파일로부터 이미지를 읽어옵니다

	$img_info = getImageSize($file);//원본이미지의 정보를 얻어옵니다
	$img_width = $img_info[0];
	$img_height = $img_info[1];

	if(($img_width/$max_width) == ($img_height/$max_height))
	{//원본과 썸네일의 가로세로비율이 같은경우
			$dst_width=$max_width;
			$dst_height=$max_height;
	}

	elseif(($img_width/$max_width) < ($img_height/$max_height))
	{//세로에 기준을 둔경우
			$dst_width=$max_height*($img_width/$img_height);
			$dst_height=$max_height;
	}

	else
	{//가로에 기준을 둔경우
			$dst_width=$max_width;
			$dst_height=$max_width*($img_height/$img_width);
	}


	$dst_img = imagecreatetruecolor($dst_width, $dst_height); //타겟이미지를 생성합니다

	ImageCopyResized($dst_img, $src_img, 0, 0, 0, 0, $dst_width, $dst_height, $img_width, $img_height); //타겟이미지에 원하는 사이즈의 이미지를 저장합니다

	ImageInterlace($dst_img);
	ImageJPEG($dst_img,  $save_filename); //실제로 이미지파일을 생성합니다
	ImageDestroy($dst_img);
	ImageDestroy($src_img);
}

/* 사용법
$srcFile = "./upfiles_adbrain/20055/10/img/5.jpg"; // 원본 이미지 파일
$sumFile = "./upfiles_adbrain/20055/10/sub/9.jpg"; // 타겟 이미지 파일
thumbnail($srcFile,$sumFile,"97","72");
*/

class ImageGD 
{ 
private $filename; 

private $im; 
private $quality =100; 
private $bgcolor = 0x7fffffff; 
private $fontsrc,$fontangle=0,$fontcolor = array(0,0,0),$fontsize = 20,$x=5,$y=5; 

# 시작 
public function __construct($filename=null){ 
if(!file_exists($filename) && $filename) 
throw new Exception($filename); 

$this->filename = $filename; 
} 

# void 퀄리티 설정 
public function setCompressionQuality($quality){ 
$this->quality = $quality; 
} 

# 칼라 채우기 
public function setFilledrectangle($image,$x1,$y1,$x2,$y2,$color){ 
if(false === ($im = imagefilledrectangle($image,$x1,$y1,$x2,$y2,$color))) return false; 
return $im; 
} 

# 칼라 채우기 RGB 
public function setColorallocate($image,$r,$g,$b){ 
if(0 > ($im = imagecolorallocate($image,$r,$g,$b))) return false; 
return $im; 
} 

# alpha 
public function setAlphablending($image,$boolean=false){ 
imagealphablending($image, $boolean); 
} 
# alpha 
public function setSavealpha($image,$boolean=false){ 
imagesavealpha($image, $boolean); 
} 

public function setFttext($image,$fontcolor,$text){ 
imagefttext($image,$this->fontsize,$this->fontangle,$this->x,$this->y,$fontcolor,$this->fontsrc,$text); 
} 

# 폰트 파일 경로 지정 
public function setFont($fontsrc){ $this->fontsrc = $fontsrc; } 

# 칼라 지정 
public function setFontColor($color){ $this->color = $color; } 

# 폰트 사이즈 
public function setFontSize($pixel){ $this->fontsize = $pixel; } 

# 배경칼라 
public function setBgColor($bgcolor){ $this->bgcolor = $bgcolor; } 

# 폰트 앵글 
public function setFontAngle($angle){ $this->fontangle = $angle; } 

# x:y 축 
public function setXY($x,$y){ $this->x = $x; $this->y = $y; } 

# 텍스트 이미지 만들기 
public function writeTextImage($width,$height,$text){ 
$this->im = self::createTrueImage($width,$height); 
self::setAlphablending($this->im); 
self::setFilledrectangle($this->im,0,0,$width,$height,$this->bgcolor); 

$fontcolor = self::setColorallocate($this->im,$this->fontcolor[0],$this->fontcolor[1],$this->fontcolor[2]); 
self::setFttext($this->im,$fontcolor,$text); 
self::setSavealpha($this->im,true); 
} 

public function setAntialias($image,$boolean=false){ 
imageantialias($image,$boolean); 
} 

public function setTTFText($image,$size,$x,$y,$color,$text){ 
imagettftext($image,$size,$this->fontangle,$x,$y,$color,$this->fontsrc,$text); 
} 

# 그림자 입체 텍스트 쓰기 
public function writeShadowText($width,$height,$text,$bgRGB=array(255,255,255),$mdRGB=array(128,128,128),$frontRGB=array(0,0,0)) 
{ 
$this->im = self::createTrueImage($width,$height); 

$bg = self::setColorallocate($this->im,$bgRGB[0],$bgRGB[1],$bgRGB[2]); 
$middle = self::setColorallocate($this->im, $mdRGB[0],$mdRGB[1],$mdRGB[2]); 
$front = self::setColorallocate($this->im, $frontRGB[0],$frontRGB[1],$frontRGB[2]); 
self::setFilledrectangle($this->im,0,0,$width-1,$height-1,$bg); 

// Add some shadow to the text 
self::setTTFText($this->im,$this->fontsize,$this->x,$this->y,$middle,$text); 

// Add the text 
self::setTTFText($this->im,$this->fontsize,$this->x - 1,$this->y - 1,$front,$text); 
} 

# 이미지 위에 텍스트 쓰기 
public function combineImageText($width,$height,$text,$filename=null){ 
$this->im = self::createTrueImage($width,$height); 
self::setAntialias($this->im,true); 
$fontcolor = self::setColorallocate($this->im,$this->fontcolor[0],$this->fontcolor[1],$this->fontcolor[2]); 

$filename = ($filename) ? $filename : $this->filename; 
if(!$filename) throw new Exception(__CLASS__,':'.__METHOD__.':'.__LINE__); 
$image = self::readImage($filename); 
self::copy($this->im,$image,0,0,0,0,$width,$height); 
self::setTTFText($this->im,$this->fontsize,$this->x,$this->y,$fontcolor,$text); 
} 

# margin_r : 오른쪽 여백, margin_b : 아래여백 
public function filterWatermarks($marksfilename,$margin_r=10,$margin_b=10){ 
if(!file_exists($marksfilename)) 
throw new Exception(__CLASS__.':'.__METHOD__.':'.$marksfilename); 

$this->im = self::readImage($this->filename); 
self::setAntialias($this->im,true); 
$image = self::readImage($marksfilename); 

$width = imagesx($image); 
$height = imagesy($image); 
$im_x = imagesx($this->im) - $width - $marge_r; 
$im_y = imagesy($this->im) - $height - $marge_b; 

self::copy($this->im,$image,$im_x,$im_y,0,0,$width,$height); 
} 

# void 이미지 자르기 int width,height,x,y 
public function cropImage($width,$height,$x,$y){ 
$this->im = self::createTrueImage($width,$height); 
$image = self::readImage($this->filename); 
if(self::copy($this->im,$image,0,0,$x,$y,$width,$height) === false) 
throw new Exception(__METHOD__); 
} 

# void 이미지 자르기 (center) int width,height 
public function cropThumbnailImage($width,$height){ 
$imgsize = self::getImageSize($this->filename); 

# 조정 
$im_x = 0; 
$im_y = 0; 
$image_x = 0; 
$image_y = 0; 

$wm = $imgsize->width/$width; 
$hm = $imgsize->height/$height; 
$h_height = $height/2; 
$w_height = $width/2; 
  
if($imgsize->width > $imgsize->height){ 
        $width = $imgsize->width / $hm; 
        $half_width = $width / 2; 
        $im_x = -($half_width - $w_height); 
}else if(($imgsize->width <$imgsize->height) || ($imgsize->wdith == $imgsize->height)){ 
        $height = $imgsize->height / $wm; 
        $half_height = $height / 2; 
        $im_y = $half_height - $h_height; 
    } 

$this->im = self::createTrueImage($width,$height); 
$image = self::readImage($this->filename); 
if(self::copyResampled($this->im,$image,$im_x,$im_y,$image_x,$image_y,$width,$height,$imgsize->width,$imgsize->height) === false) 
throw new Exception(__METHOD__); 

return true; 
} 
# 썸네일 이미지 만들기 int width, height 
public function thumbnailImage($width,$height){ 
$imgsize = self::getImageSize($this->filename); 

# 썸네일 사진 사이즈 설정 
if($imgsize->width>$imgsize->height){ 
$height= ceil(($imgsize->height*$width)/$imgsize->width); 
} 
else if($imgsize->width<$imgsize->height || $imgsize->width == $imgsize->height){      
$width= ceil(($imgsize->width*$height)/$imgsize->height); 
} 

$this->im = self::createTrueImage($width,$height); 
$image = self::readImage($this->filename); 
if(self::copyResampled($this->im, $image, 0,0,0,0,$width,$height,$imgsize->width,$imgsize->height) ===false) 
throw new Exception(__METHOD__); 
return true; 
} 

# imagecopy 
public function copy($im,$image,$im_x,$im_y,$image_x,$image_y,$width,$height){ 
if(imagecopy($im,$image,$im_x,$im_y,$image_x,$image_y,$width,$height) === false) return false; 
return true; 
} 

# imagemerge 
public function copyMerge($im,$image,$im_x,$im_y,$image_x,$image_y,$width,$height,$pct){ 
if(!imagecopymerge($im,$image,$im_x,$im_y,$image_x,$image_y,$width,$height,$pct)) return false; 
return true; 
} 

# imagecopyresampled 
public function copyResampled($im,$image,$im_x,$im_y,$image_x,$image_y,$width,$height,$oriwidth,$oriheight){ 
if(imagecopyresampled($im,$image,$im_x,$im_y,$image_x,$image_y,$width,$height,$oriwidth,$oriheight) ===false) return false; 
return true; 
} 

# void : createtruecolor 
public function createTrueImage($width,$height){ 
return $im = imagecreatetruecolor($width,$height); 
} 

# void 
public function readImage($filename){	
$count	= strrpos($filename,'.'); 
$extention = strtolower(substr($filename, $count+1)); 
switch($extention){ 
case 'gif': $image = imagecreatefromgif($filename); break; 
case 'png': $image = imagecreatefrompng($filename); break; 
case 'jpeg': 
case 'jpg':	$image = imagecreatefromjpeg($filename); break; 
default : throw new Exception('i can\'t the image format'); 
} 
return $image; 
} 

# string filename 
public function write($filename){	
$count	= strrpos($filename,'.'); 
$extention = strtolower(substr($filename, $count+1)); 
switch($extention){ 
case 'gif': imagegif($this->im,$filename); return true; break; 
case 'png': imagepng($this->im,$filename,($this->quality/10)-1); return true; break; 
case 'jpg': 
case 'jpeg': imagejpeg($this->im,$filename,$this->quality); return true; break; 
default : return false; 
} 
} 

# @ void : GD 버전 
public function getVersion(){ 
if(function_exists('gd_info')){ 
$info = gd_info(); 
return preg_replace('/bundled \((.*) compatible\)/','\\1', $info['GD Version']); 
} 
return false; 
} 

# 이미지 사이즈 
public function getImageSize($filename=null){ 
$filename = ($filename) ? $filename : $this->filename; 
$img_info = getImageSize($filename); 
return json_decode(json_encode(array('width'=>$img_info[0],'height'=>$img_info[1],'mime'=>$img_info['mime']))); 
} 

# @ void 
public function destroy(){ 
if(is_resource($this->im)) imagedestroy($this->im); 
} 

public function __destruct(){ 
    self::destroy(); 
    } 
} 

################ 
## 활용법 
################ 
/*
try{ 
$gd = new ImageGD($_SERVER['DOCUMENT_ROOT'].'/testdirectory/P100119003.jpg'); 
echo 'gd버전: '.$gd->getVersion().'<br />'; 

# 사진 이미지 사이즈 
$img_info = $gd->getImageSize(); 
echo '원본 사진크기 : '.$img_info->width.' x '.$img_info->height.'<br />'; 

# 썸네일 이미지 만들기 
echo '썸네일 이미지 만들기 120x120<br />'; 
$gd->thumbnailImage(120,120); 
$gd->write($_SERVER['DOCUMENT_ROOT'].'/testdirectory/thumb.jpg'); 
echo '<img src="/testdirectory/thumb.jpg" /><br />'; 

# 이미지 자르기 
echo '이미지 자르기 500x150,x:150,y:100<br />'; 
$gd->cropImage(500,150,150,100); 
$gd->write($_SERVER['DOCUMENT_ROOT'].'/testdirectory/crop.jpg'); 
echo '<img src="/testdirectory/crop.jpg" /><br />'; 

# 이미지 자르기 썸네일 
echo '이미지 자르기 썸네일 120x120<br />'; 
$gd->cropThumbnailImage(120,120); 
$gd->write($_SERVER['DOCUMENT_ROOT'].'/testdirectory/cropthumb.jpg'); 
echo '<img src="/testdirectory/cropthumb.jpg" /><br />'; 

# 필터 워터마크 찍기 
echo '필터 워터마크 찍기<br />'; 
$gd = new ImageGD($_SERVER['DOCUMENT_ROOT'].'/testdirectory/crop.jpg'); 
$gd->filterWatermarks($_SERVER['DOCUMENT_ROOT'].'/testdirectory/thumb.jpg'); 
$gd->write($_SERVER['DOCUMENT_ROOT'].'/testdirectory/watermark.jpg'); 
echo '<img src="/testdirectory/watermark.jpg" /><br />'; 

echo '타이틀 이미지 만들기<br />'; 
$gd = new ImageGD(); 
$gd->setBgColor(0x7fffffff); 
$gd->setFont($_SERVER['DOCUMENT_ROOT'].'/HYSUPM.TTF'); 
$gd->setFontColor(array(0,0,0)); 
$gd->setFontSize(20); 
$gd->setXY(5,40); 
$gd->writeTextImage(500,60,'김형오 의장, 설 앞두고 용산노인복지관'); 
$gd->write($_SERVER['DOCUMENT_ROOT'].'/testdirectory/textimage.png'); 
echo '<img src="/testdirectory/textimage.png" /><br />'; 


echo '이미지 위에 글씨 넣기<br />'; 
$gd = new ImageGD($_SERVER['DOCUMENT_ROOT'].'/testdirectory/watermark.jpg'); 
$gd->setFont($_SERVER['DOCUMENT_ROOT'].'/HYSUPM.TTF'); 
$gd->setFontColor(array(255,255,255)); 
$gd->setFontSize(20); 
$gd->setXY(5,40); 
$gd->combineImageText(500,60,'김형오 의장, 설 앞두고 용산노인복지관'); 
$gd->write($_SERVER['DOCUMENT_ROOT'].'/testdirectory/combineimagetext.png'); 
echo '<img src="/testdirectory/combineimagetext.png" /><br />'; 


echo '그림자 텍스트 이미지<br />'; 
$gd = new ImageGD(); 
$gd->setFont($_SERVER['DOCUMENT_ROOT'].'/HYMJRE.TTF'); 
$gd->setFontSize(20); 
$gd->setXY(5,40); 
$gd->writeShadowText(500,60,'연중돌봄학교로 ‘제2의 개교’ 맞는 고창성송초'); 
$gd->write($_SERVER['DOCUMENT_ROOT'].'/testdirectory/shadowtext.png'); 
echo '<img src="/testdirectory/shadowtext.png" /><br />'; 

}catch(Exception $e){ 
echo $e->getMessage(); 
}
*/

?>
