<?php if(!defined("TOKEN")){
	header("HTTP/1.1 403 Forbidden");
	exit("Access Forbidden");
} ?><div id="m_rt">
    <div class="lf_atc">
                    <div class="atc_tt"><h2><a href="#">天气</a></h2></div>
                    <div class="act_ab">
                        <p><h3>宝山</h3> <span id="BSweather"></span> 当前温度 ：<span id="BSemNow"></span>摄氏度</p>
                        <p><h3>市区</h3> <span id="SHweather"></span> 当前温度 ：<span id="SHemNow"></span>摄氏度</p>
                        <p><h3>奉贤</h3> <span id="FXweather"></span> 当前温度 ：<span id="FXemNow"></span>摄氏度</p>
                    </div>
                    <div class="act_if">数据来源：中国天气网</div>
                </div>
</div>
</div>
<script>
    ajax("/Article/weather",function(data){
        var a=new DOMParser();
        var xml=a.parseFromString(data,"text/xml");
        var dl=xml.getElementsByTagName("city");
        for(i in dl){
            console.log(dl[i].getAttribute("cityname"))
            
            if(dl[i].getAttribute("cityname")=="宝山"){
                document.getElementById("BSweather").innerHTML= dl[i].getAttribute("stateDetailed");
                document.getElementById("BSemNow").innerHTML = dl[i].getAttribute("temNow");
            }else if (dl[i].getAttribute("cityname") == "市中心") {
                document.getElementById("SHweather").innerHTML = dl[i].getAttribute("stateDetailed");
                document.getElementById("SHemNow").innerHTML = dl[i].getAttribute("temNow");
            } else if (dl[i].getAttribute("cityname") == "奉贤") {
                document.getElementById("FXweather").innerHTML = dl[i].getAttribute("stateDetailed");
                document.getElementById("FXemNow").innerHTML = dl[i].getAttribute("temNow");
            }
        }
    })
    
</script>
<?php include("cache/4843dcc00afd1df33581e2df4233d045.php"); ?>