<?php
include("function/article.php");
class Article extends Controller{
    //function __construct(){}
    public function __call($name,$arguments){
        $name=(int)$name;
        $rel=article_info($name);
        $tpl=new Tpl("article/info");
        if($rel){
            $tpl->assign("info",$rel[0]);
        }else{
            $tpl->assign("info",array("title"=>"文章不存在",
            "text"=>"经查证，你要查看的文章严重违反了小青青的思想价值观。本基地有关领导高度重视此事，相关责任人已经被严肃处理。",
            "uid"=>"null","timeline"=>time()));
        }
        $tpl->display();
        //var_dump($rel);
    }
    public function list(int $start=0,int $count=10){
        header("Content-type:application/json");
        $data=article_list($start,$count);
        foreach($data as &$v){
            $v["timeline"]=date("Y年m月d日 H:i:s",$v["timeline"]);
        }
        echo json_encode($data);
    }
    public function weather($a=0){
        header("Content-type:text/xml");
        $file=fopen("http://flash.weather.com.cn/wmaps/xml/shanghai.xml","rb");
        $e=fread($file,4096);
        echo $e;
        fclose($file);
    }
}
?>