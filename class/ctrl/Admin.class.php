<?php
class Admin extends Controller{
    private $log="";
    function __construct(){
        $this->log=new Log();
        if(!isset($_SESSION["userinfo"]["admin"])||$_SESSION["userinfo"]["admin"]<1){
            
            $snData="";
            foreach($_SESSION as $k=>$v){
                $snData.=($k.":".$v."\r\n");
            }
            $this->log->output(Log::$warn_hack,"非法进入管理模块。\r\n\t\tURL:".$_SERVER['REQUEST_URI'].
            "\r\n\t\tIP:".$_SERVER["REMOTE_ADDR"].
            "\r\n\t\tUSER_AGENT:".$_SERVER['HTTP_USER_AGENT'].
            "\r\n\t\tSESSION:".$snData);
            
            $this->fuck();
            
            
            exit;
        }
    }
    function article(String $opt="display"){
        switch($opt){
            case "add":
                include("function/article.php");
                $text=$_POST["text"];
                $text=str_replace("\u0026","&",$text);
                $text=str_replace("\u003d","=",$text);
                echo article_add($_POST["title"],$text,$_POST["password"]);
                break;
            default:
                $tpl=new Tpl("admin/article");
                $tpl->display();
        }
    }

    function base(String $opt="display"){
        switch($opt){
            case "adf":
                include("function/article.php");
                echo friend_add($_POST["name"],$_POST["url"]);
                break;
            default:
                $tpl=new Tpl("admin/base");
                $tpl->display();
        }
    }
    
    function clear(String $type="display"){
        switch($type){
            case "cache":
                header("Content-type:application/json");
                global $config;
                $cache=$config["path"]["cache"];
                $filelist=null;
				try{
                    $filelist=scandir($cache);
                    $file;
					foreach($filelist as $key =>$value){
						$file[$key]["path"]="cache/".$value;
						if(is_file("cache/".$value)){
							$rel=false;
							try{
								$rel=unlink("cache/".$value);
							}catch(Exception $e){
                                $this->log->output(Log::$err_adm,"文件删除失败：".$e->getMessage());
							}
							$file[$key]["rel"]=$rel?"成功":"失败";
							
						}else{
							$file[$key]["rel"]="忽略";
						}
                    }
                    echo json_encode($file);
				}catch(Exception $e){
					exit($error="读取文件列表失败。".$e->getMessage()) ;
				}
                break;
            default:
        }
    }

    function tag(String $opt="display"){
        switch($opt){
            case "add":
                include("function/article.php");
                $r= tag_add($_POST["name"]);
                echo $r;
                break;
            default:
                echo 0;
        }
    }

    function user(String $opt="display"){
        switch($opt){
            case "display":
                $tpl=new Tpl("admin/user");
                $tpl->display();
                break;
            case "add":
                include("function/user.php");
                $r=add($_POST);
                echo $r;
        }
    }
}
?>