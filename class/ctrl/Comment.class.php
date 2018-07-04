<?php
include("function/comment.php");
class Comment extends Controller{
    public function add($id){
        header("Content-type:application/json");
        $id=(int)$id;
        $rel=add_comment($id,$_POST["nickname"],$_POST["email"],$_POST["text"],$_POST["from"]);
        echo $rel?"true":"false";
    }
}
?>