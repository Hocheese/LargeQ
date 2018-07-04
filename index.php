<?php
//小青X标准架构v1.0
session_start();
date_default_timezone_set("Asia/Shanghai");
include_once("config.php");
include_once("class/Controller.class.php");
include_once("class/VirtualPath.class.php");
include_once("class/Db.class.php");
include_once("class/Tpl.class.php");
include_once("class/Log.class.php");
define("TOKEN",true);
//echo $_SERVER['REQUEST_URI'];
if(strpos($_SERVER['REQUEST_URI'],"setup.php")){
    header("HTTP/1.1 233 Pretends To Success");
}
$vp=new VirtualPath($_SERVER['REQUEST_URI']);
/*if(!empty($_GET["test"])){
	echo "<br> test";
}*/
$ctrl=new Controller();
//Controller::index();
$ctrlfc=$vp->ctrl;
//echo $ctrlfc."<fuck>";
$ctrl->$ctrlfc();
//echo "微秒：".microtime()."微秒true：".microtime(true)." 秒：".time();
//echo true;
if(strpos($_SERVER['REQUEST_URI'],"setup.php")){
    echo "<br />\n<b>Warning</b>:  This is not a Phpmyadmin,Wordpress or Discuz website in <b>".$_SERVER['REQUEST_URI']."</b> on line <b>23333</b><br />";
}
?>