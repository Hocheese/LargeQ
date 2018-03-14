<?php
function article_add(String $title,String $text,String $password){
    $database=new Db("article_info");
    return $database->query($database->insert(array("title"=>$title,"text"=>$text,"uid"=>$_SESSION["userinfo"]["id"],"password"=>$password,"timeline"=>time())));
}

function article_info(int $id){
    $database=new Db("article_info");
    return $database->query($database->select("*"," `id`= ".$id));
}

function article_list(int $start=0,int $count=10){
    $database=new Db("article_info");
    return $database->query($database->select());
}

function tag_add(String $name){
    $database=new Db("article_tag");
    return $database->query($database->insert(array('tag' => $name )));
}
?>