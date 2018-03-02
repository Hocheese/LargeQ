<?php
/*
小青易测模板引擎v2.1
包括文件：{tpl:header.html}(以tpl目录为根目录的相对路径)
输出变量：{$username}{$var.a}{$var['a']}
一般语法：{? echo "hello World!"; ?}


*/
class Tpl{
	private $tplbase="source/tpl/";//配置项:目录路径
	private $tplPath;
	private $error=0;
	private $tplData;
	private $log;
	public $var=array();
	public $value=array();
	function __construct($tpln){
		$this->log=new Log();
		$dir=$this->tplbase;
		$tpl=(file_exists($dir.$tpln.".html")?$dir.$tpln.".html":(file_exists($dir.$tpln)?$dir.$tpln:false));
		if(!$tpl){
			$this->log->output(Log::$err_tpl,"err1:不存在的模板：".$tpln);
			$this->error=1;
		}
		$this->tplPath=$tpl;
		$this->compile();
	}
	function compile(){
		if($this->error==0){
			if(!file_exists("cache/".md5($this->tplPath).".php")){
				if(!is_dir("cache")){
					mkdir("cache");
				}
				$handle=fopen($this->tplPath,"rb");
				$this->tplData=fread($handle,filesize($this->tplPath));
				while(($tplInclude=preg_match('/{tpl:([a-zA-Z.\/_]+)}/',$this->tplData,$matches))!=0){
			
					$tplobj=new Tpl($matches[1]);

					if($tplobj->error!=0){
						$this->tplData=preg_replace('/{tpl:([a-zA-Z.\/_]+)}/',"<!--模板错误：-->\n<!--文件名：".'${1}'."-->\n<!--错误信息：".$tplobj->error.'-->',$this->tplData,1);
					}else{
						$this->tplData=preg_replace('/{tpl:([a-zA-Z.\/_]+)}/','<?php include("cache/'.md5($tplobj->tplPath).'.php"); ?>',$this->tplData,1);
					}
				}
				$this->tplData="<?php if(!defined(\"TOKEN\")){\r\n	header(\"HTTP/1.1 403 Forbidden\");\r\n	exit(\"Access Forbidden\");\r\n} ?>".$this->tplData;
				preg_match_all('/\{\$[\_a-zA-Z]([\.\_a-zA-Z0-9]*)\}/',$this->tplData,$a);
				foreach($a as $v){
					$b=preg_replace('/\.([\_a-zA-Z0-9]*)/','["$1"]',$v);
					$this->tplData=str_replace($v,$b,$this->tplData);
					
				}
				$this->tplData=preg_replace('/{\$([a-zA-Z0-9_\[\$\]\'"]+)}/','<?php echo \$${1}; ?>',$this->tplData);
				/*$this->tplData=preg_replace('/{\?(\s(\S)+\s)+\?}/','<?php ${1} ?>',$this->tplData);*/
				/*$this->tplData=preg_replace('/(?=({\?))$(.*)(?=(\?}))/','<?php ${2} ?>',$this->tplData);*/
				$this->tplData=preg_replace('/{\?/','<?php',$this->tplData);
				$this->tplData=preg_replace('/\?}/','?>',$this->tplData);
				$handle=fopen("cache/".md5($this->tplPath).".php","ab");
				fwrite($handle,$this->tplData);
			}
			
		}
		
	}
	public function assign($var,$value){
		if($this->error==0){
			$this->var[count($this->var)]=$var;
			$this->value[count($this->value)]=$value;
		}
		
		
	}
	
	public function display(){
		if($this->error==0){
			for($i=0;isset($this->var[$i]);$i++){
				$var=$this->var[$i];
				$$var=$this->value[$i];
			}
			//var_dump($this->var);
			//var_dump($this->value);
			include "cache/".md5($this->tplPath).".php";
		}else{
			echo "tpl error!code:".$this->error;
		}
	}
	
}
?>
