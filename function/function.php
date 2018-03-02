<?php
//日志输出
function output_log(String $logtype,String $info){
	if(!is_dir("logs")){
		mkdir("logs");
	}
	$logfile=fopen("logs/".date("Y_m_d_").".log.txt","ab");
	fwrite($logfile,"[".date("H:i:s")."][".$logtype."]".$info."\r\n");
}
?>
