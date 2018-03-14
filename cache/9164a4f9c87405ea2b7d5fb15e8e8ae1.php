<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><?php include("cache/4301983a55ca7ca710d72f3065b8cbae.php"); ?>
    <!--页头页体分界线-->
    
        <div id="m_lf">
            <!--div class="lf_atc">
                <div class="atc_tt"><h2><a href="#">江南皮革厂倒闭了</a></h2></div>
                <div class="atc_tg"><span><a href="#">标签</a></span></div>
                <div class="act_ab"><p>浙江温州 浙江温州 江南皮革厂倒闭了 浙江温州 最大皮革厂 江南皮革厂倒闭了 王八蛋王八蛋黄鹤老板 吃喝嫖赌吃喝嫖赌 欠下了欠下了3.5亿 带着他的小姨子跑了 我们没有没有没有办法办法 拿着钱包抵工资工资 原价都是100多 200多 300多的钱包
                统统20块 20块20块统统20块 统统统统统统20块 黄鹤王八蛋 王八蛋黄鹤 你不是你不是你不是人 100多 200多 300多的钱包 统统20块统统20块 黄鹤王八蛋 王八蛋黄鹤 你不是你不是你不是人 我们辛辛苦苦干了 辛辛苦苦给你给你干了大半年
                你你你不发不发工资工资 你还我还我血汗钱 还我血汗钱！</p></div>
                <div class="act_if">admin 发表于 1970年1月1日 08:00</div>
            </div-->
            <script>
            ajax("/Article/list",function(data){
                r=JSON.parse(data);
                for(i in r){
                    console.log(r[i].title);
                    document.getElementById("m_lf").innerHTML += '<div class="lf_atc">\
                    <div class="atc_tt" > <h2><a href="/Article/'+ r[i].id +'">'+r[i].title+'</a></h2></div >\
                        <div class="atc_tg"><span><a href="#">标签</a></span></div>\
                        <div class="act_ab"><p>'+ r[i].text +'</p></div>\
                        <div class="act_if">'+ r[i].uid +' 发表于 ' + r[i].timeline +'</div>\
            </div>'
                }
                
            })
            </script>
        </div>
        
<?php include("cache/e56944d753e68e1cb7ff2967d1c6ee9b.php"); ?>