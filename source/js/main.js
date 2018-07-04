function ajax(){
    var url=null;
    var data = null;
    var fx = null;
    for(var i=0;i<arguments.length;i++){
        if(typeof arguments[i]=="string"){
            url=arguments[i];
        }else if(typeof arguments[i]=="object"){
            data=arguments[i];
        }else if(typeof arguments[i]=="function"){
            fx=arguments[i];
        }else{
            console.warn("ajax方法接收到了奇怪的东西：" + typeof arguments[i] + " 类型的 " + arguments[i].toString());
        }
    }
    if(url==null){
        throw "不告诉我地址你请求个毛线！！！";
    }
    var method=data==null?"GET":"POST";
    var xhr=new XMLHttpRequest();
    xhr.open(method,url,true);
    xhr.onreadystatechange=function(){
        if(xhr.readyState==4){
            if (xhr.status!=200){
                console.warn("服务器代码：" + xhr.status+" 。代码还将继续工作，但有可能会发生错误。 ");
            }
            
                if(fx==null){
                    xhr.onreadystatechange = xhr.responseText;
                }else{
                    fx(xhr.responseText);
                }
            
        }
    }
    if(method=="GET"){
        xhr.send();
    }
    if(method=="POST"){
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var dataStr="";
        for(a in data){
            var dataFileter = data[a];
            if (typeof dataFileter=="string"){
                dataFileter = dataFileter.replace(/\&/g, "\\u0026");
                dataFileter = dataFileter.replace(/\=/g, "\\u003d");
            }
            
            dataStr += (a + "=" + dataFileter+"&");
        }
        xhr.send(dataStr);
    }
    if (typeof xhr.onreadystatechange=="string"){
        return xhr.responseText;
    }
}
function checkform(form,length){
    var txt=form.value;
    if(txt.trim()==""){
        return false;
    }
    if(txt.length>length){
        return false;
    }
    return true;
}
function checkFormOut(form,length){
    var rel=checkform(form,length);
    form.attributes.class="";
    if(rel){
        form.classList.add("input_success");
    }else{
        form.classList.add("input_err");
    }
    return rel;
}
//id选择器
function queryid(selector){
    return document.getElementById(selector);
}
