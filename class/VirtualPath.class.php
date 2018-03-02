<?php
/*
小青X虚拟路径解析引擎V1.0
别忘记过滤GET提交的字符串！
因为如果有人提交的内容中有“\”或"/"就XXOO了；
记得要测试一下如果尝试将带有符号的字符串做为方法名，去访问一个有__call或 __callStatic方法的类会怎样。
*/
class VirtualPath{
	public $url;
	public $ctrl;
	public $act;
	public $opt;
	function __construct(String $path){
		$this->url=$path;
		$pathArr=preg_split('/\//',$path);
		//var_dump($pathArr);
		$this->ctrl=isset($pathArr[1])?$this->filter($pathArr[1]):"";
		$this->act=isset($pathArr[2])?$this->filter($pathArr[2]):"";
		$this->opt=isset($pathArr[3])?$this->filter($pathArr[3]):"";
	}

	function filter(String $word=""){
		$word=str_replace("__","",$word);
		return $word;
	}
}
?>