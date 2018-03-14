<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><?php include("cache/4301983a55ca7ca710d72f3065b8cbae.php"); ?>
<!--页头页体分界线-->

<div id="m_lf">
    <div class="lf_atc">
        <div class="atc_tt"><h2><a href="#"><?php echo $info["title"]; ?></a></h2></div>
        <div class="atc_tg"><span><a href="#">标签</a></span></div>
        <div class="act_ab"><p><?php echo $info["text"]; ?></p></div>
        <div class="act_if"><?php echo $info["uid"]; ?> 发表于 <?php echo $info["timeline"]; ?></div>
    </div>
    <script></script>
</div>

<?php include("cache/e56944d753e68e1cb7ff2967d1c6ee9b.php"); ?>