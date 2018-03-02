<?php
class User extends Controller{
    function __construct(){}
        
    function login(String $opt="page"){
        switch($opt){
            case "data":
                header("Content-type:application/json");
                if(empty($_POST["username"])||empty($_POST["password"])){
                    echo json_decode(array("error"=>"未接收到参数"));
                }else{
                    include("function/user.php");
                    
                    $rel=login($_POST["username"],$_POST["password"]);
                    echo $rel?1:0;
                }
                break;
            default:
                $tpl=new Tpl("user/login");
			    $tpl->display();
            
        }
    }
}
?>