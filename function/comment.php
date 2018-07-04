<?php
function add_comment($id,$name,$email,$text,$from){
    if(empty($name)||empty($email)||empty($text)||empty($from)){
        return false;
    }
    $ip = $_SERVER['REMOTE_ADDR'];
    $database=new Db("article_comments");
    $insert=array("aid"=>$id,
                  "nickname"=>$name,
                  "email"=>$email,
                  "from"=>$from,
                  "text"=>$text,
                  "ip"=>$ip,
                  "timeline"=>time());
    return $database->query($database->insert($insert));
}
?>