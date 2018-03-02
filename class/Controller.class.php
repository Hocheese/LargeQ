<?php
//小青X控制器核心V1.1
class Controller{
	public $base="class/ctrl/";
	function __construct(){
		/*if(!isset($_SESSION["userData"])){
			include("tpl/index.html");
		}else{
			
		}
		$tpl=new Tpl("system/index");
		$tpl->display();*/
	}
	function __call($name,$arguments){
		$b=$this->base;
		if(!file_exists($b.$name.".class.php")){
			//include_once("tpl/index.html");
			$tpl=new Tpl("system/index");
			$tpl->display();

		}else{
			include($b.$name.".class.php");
			$actClass=new $name();
			global $vp;
			$act=isset($vp->act)?$vp->act:"index";
			if($vp->opt==""){
				$actClass->$act();
			}else{
				$actClass->$act($vp->opt);
				//echo $vp->opt;
			}
			
		}
		
	}
	/*
	static function __callStatic($name,$arguments){
		if(!file_exists("ctrl/".$name.".class.php")){
			global $_CONFIG;
			if($_CONFIG["sys"]["debug"]&&$_CONFIG["sys"]["visit_log"]){
				output_log("模块错误",$name."不存在，路径："."controller/".$name.".class.php");
			}
			include_once("tpl/index.html");
		}else{
			include("controller/".$name.".class.php");
			$actClass=new $name();
			$act=isset($_GET["act"])?$_GET["act"]:"index";
			$actClass->$act();
		}
	}*/


	
	
}
?>