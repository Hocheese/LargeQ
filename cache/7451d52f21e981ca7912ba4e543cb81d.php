<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><?php include("cache/3b2acd296a0ac18b604bdc12079d9456.php"); ?>
<div>
<h2>用户列表</h2>
</div>

<div>
    <h2>添加用户</h2>
    <div class="form"><input id="add_username" name="username" type="text" placeholder="用户名"></div>
    <div class="form">
        <input id="add_password" name="password" type="password" placeholder="密码">
    </div class="form">
    <div class="form">
        <input type="checkbox" id="add_admin" name="admin" placeholder="设为管理"><label>设为管理</label>
    </div class="form">
    <div class="form"><button id="user_add">添加</button></div>
    <script>
        var btn_user_add= queryid("user_add");
        btn_user_add.onclick=function(){
            un=queryid("add_username");
            ps=queryid("add_password");
            ad=queryid("add_admin");
            username=un.value.trim();
            password=ps.value.trim();
            admin=ad.checked?2:0;
            if(username==""||password==""){
                alert("未填写完整");
            }else{
                ajax("/Admin/user/add",{username:username,password:password,admin:admin},function(rel){
                    if(rel=="1"){
                        alert("添加成功");
                    }else{
                        alert("添加失败");
                    }
                })
                
            }
        }
    </script>
</div>
        
<?php include("cache/4472965c7e87e0ebbf4b41748b36a0ac.php"); ?>