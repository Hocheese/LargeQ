<?php
function tag_add(String $name){
    $database=new Db("article_tag");
    return $database->query($database->insert(array('tag' => $name )));
}
?>