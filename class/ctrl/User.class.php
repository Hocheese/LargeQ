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
                    echo "";
                }
                break;
            default:
                $tpl=new Tpl("user/login");
			    $tpl->display();
            
        }
    }
}
?>