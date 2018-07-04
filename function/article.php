<?php
function article_add(String $title,String $text,String $password){
    $database=new Db("article_info");
    return $database->query($database->insert(array("title"=>$title,"text"=>$text,"uid"=>$_SESSION["userinfo"]["id"],"password"=>$password,"timeline"=>time())));
}

function article_info(int $id){
    $database=new Db("article_info");
    return $database->query("SELECT `article_info`.*,`user`.`username` FROM `article_info` LEFT JOIN `user` ON `user`.`id`=`article_info`.`uid` WHERE `article_info`.`id`=".$id);
}

function article_list(int $start=0,int $count=10){
    $database=new Db("article_info");
    return $database->query($database->select(" `article_info`.*,`user`.`username` ").
    "LEFT JOIN `user` ON `user`.`id`=`article_info`.`uid` ORDER BY `id` DESC LIMIT $start,$count ");
}

function tag_add(String $name){
    $database=new Db("article_tag");
    return $database->query($database->insert(array('tag' => $name )));
}

function friend_add(String $name,String $url){
    $database=new Db("friends");
    return $database->query($database->insert(array('name' => $name ,'url'=>$url)));
}
function friend_get(){
    $database=new Db("friends");
    return $database->query($database->select());
}
?>