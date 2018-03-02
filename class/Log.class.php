<?php
//小青日志引擎v1.0
class Log{
    public $logbase="source/logs/";
    public $type=".log.txt";
    static $info="信息";
    static $info_sql="sql信息";
    static $err_tpl="模板错误";
    static $err_sql="sql错误";
    static $err_img="图片错误";
    static $err_adm="管理错误";
    static $warn_hack="安全警告";
    function output(String $logtype,String $info){
        $lb=$this->logbase;
        $tp=$this->type;
	    if(!is_dir($lb)){
		    mkdir($lb);
	    }
	    $logfile=fopen($lb.date("Y_m_d_").$tp,"ab");
	    fwrite($logfile,"[".date("H:i:s")."][".$logtype."]".$info."  访问路径：".$_SERVER['REQUEST_URI']."\r\n");
    }
}
?>