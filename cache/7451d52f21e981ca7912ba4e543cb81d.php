<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><?php include("cache/3b2acd296a0ac18b604bdc12079d9456.php"); ?>
<div>
<h2>用户列表</h2>
</div>

<div>
    <h2>添加用户</h2>
    <div class="form"><input id="username" name="username" type="text" placeholder="用户名"></div>
    <div class="form">
        <input id="password" name="password" type="password" placeholder="密码">
    </div class="form">
    <div class="form">
        <input type="checkbox" id="admin" name="admin" placeholder="设为管理"><label>设为管理</label>
    </div class="form">
    <div class="form"><button>添加</button></div>
</div>
        
<?php include("cache/4472965c7e87e0ebbf4b41748b36a0ac.php"); ?>