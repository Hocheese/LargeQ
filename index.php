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
?>