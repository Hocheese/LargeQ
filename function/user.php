<?php
function add(array $userdata){
    $userdata["timeline"]=time();
    if(empty($userdata["username"])||empty($userdata["password"])){
        return false;
    }
    $userdata["password"]=password_hash(md5(md5($userdata["password"]).$userdata["timeline"]),PASSWORD_DEFAULT);
    $database=new Db("user");
    return $database->query($database->insert($userdata));
}
function login(String $username="",String $password=""){
    $db=new Db("user");
    $rel=$db->query($db->select("*"," `username`='$username'"));
    if(!$rel){
        return false;
    }
    if(password_verify(md5(md5($passowrd).$rel[0]["timeline"]),$rel[0]["password"])){
        unset($rel[0]["password"]);
        $_SESSION["userinfo"]=$rel[0];
        return true;
    }
    return false;
}

?>