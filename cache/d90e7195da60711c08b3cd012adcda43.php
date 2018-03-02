<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><?php include("cache/3d0c180554bab936f19d5258e7e9584e.php"); ?>
<link href="/Style/login" type="text/css" rel="stylesheet">
<link href="/Style/animation" type="text/css" rel="stylesheet">
    <div id="login_main">
        <div id="login_box">
            <div><div id="logo_circle_128"><img src="/Image/base/logo128" alt="丘比特之箭徽"></div></div>
            <div><h1>请自觉出示本基地工作证、进入许可证</h1></div>
            <div><input id="username" type="text" name="username" placeholder="工作代号"></div>
            <div><input id="password" type="password" name="password" placeholder="口令"></div>
            <div><button id="submit">进行安全检查</button></div>
        </div>
    </div>
<script>
submit=queryid("submit");
    un = queryid("username");
    ps = queryid("password");
submit.onclick=function(){
    
    if(un.value.trim()==""){
        un.className="input_err";
    }
    else if (ps.value.trim() == "") {
        ps.className = "input_err";
    }else{
        name=un.value.trim();
        pass=ps.value.trim();
        ajax("/User/login/data",{username:name,password:pass},function(r){
            if(r=="1"){
                location.href="/";
            }else{
                un.className = "input_warm";
                ps.className = "input_warm";
            }
        })
    }
}
un.onblur=function(){
    if (un.value.trim() == "") {
        un.className = "input_err";
    }else{
        un.className = "input_success";
    }
}
    ps.onblur = function () {
        if (ps.value.trim() == "") {
            ps.className = "input_err";
        } else {
            ps.className = "input_success";
        }
    }
</script>
<?php include("cache/4843dcc00afd1df33581e2df4233d045.php"); ?>