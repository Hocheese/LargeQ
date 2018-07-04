<?php
$topW=64;
ob_clean();
		header("Content-type:image/png");

		$errorImage=imagecreatefromjpeg("test.jpg");
		$whq=imagecreate(96,32);
		imagecolorallocate($errorImage,255,255,255);
		$color=imagecolorallocate($errorImage,rand(0,255),rand(0,255),rand(0,255));
		imagefttext($whq,32.0,0,30,45,$color,"source/fonts/mzd.ttf","王贺青");

for($i=0;$i<32;$i++){
	for($j=0;$j<(64+$i);$j++){
		$unit=(64+$i)/96;


	}
}

		imagepng($errorImage);
		imagedestroy($errorImage);
		phpinfo();
?>