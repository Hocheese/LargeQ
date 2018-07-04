<?php
include("function/article.php");
class Article extends Controller{
    //function __construct(){}
    public function __call($name,$arguments){
        $name=(int)$name;
        $rel=article_info($name);
        $tpl=new Tpl("article/info");
        
        
        if($rel){
            $rel=$this->data($rel);
            $tpl->assign("info",$rel[0]);
        }else{
            $tpl->assign("info",array("title"=>"文章不存在",
            "text"=>"经查证，你要查看的文章严重违反了小青青的思想价值观。本基地有关领导高度重视此事，相关责任人已经被严肃处理。",
            "uid"=>"null","username"=>"null","timeline"=>date("Y年m月d日 H:i:s")));
        }
        $tpl->display();
        //var_dump($rel);
    }
    //文章列表前端输出
    public function list(int $start=0,int $count=10){
        header("Content-type:application/json");
        $data=$this->getlist($start,$count);
        echo json_encode($data);
    }
    //文章列表调用
    private function getlist(int $start=0,int $count=100){
        $data=article_list($start,$count);
        if(is_array($data)){
            $data=$this->data($data);
            foreach($data as &$v){
                if(!empty($v["text"])){
                    $v["text"]=htmlspecialchars($v["text"]);
                    $v["text"]=mb_substr($v["text"],0,150);
                }
            
            }
        }
        return $data;
    }
    //搜索引擎优化————输出一个静态的文章链接列表
    public function SEO($page=1){
        $data=$this->getlist();
        $tpl=new Tpl("article/SEO");
        $tpl->assign("list",$data);
        $tpl->display();
    }
    //天气
    public function weather($a=0){
        header("Content-type:text/xml");
        $file=fopen("http://flash.weather.com.cn/wmaps/xml/shanghai.xml","rb");
        $file_err=fopen("source\xml\weather.xml","rb");
        $e=fread($file,4096);
        $f=fread($file_err,4096);
        if($e==$f){
            $e=str_replace(array("6","7","小雨转晴","小雨转多云"),"err",$e);
        }
        echo $e;
        fclose($file);
    }
    //友情链接
    public function friends(){
        echo json_encode(friend_get());
    }
    
    //评论，已经废弃
    public function comment($id=0){
        header("Content-type:application/json");
        if($_POST["verCode"]!=$_SESSION['verCode']){
            echo "ERR_VCODE";
        }else{
            if(isset($_COOKIE["usercode"])){
                //
            }
        }

    }

    private function data(array $data){
        foreach($data as &$v){
            if(!empty($v["timeline"])){
                $v["timeline"]=date("Y年m月d日 H:i:s",$v["timeline"]);
            }
            
        }
        return $data;
    }
}
?>