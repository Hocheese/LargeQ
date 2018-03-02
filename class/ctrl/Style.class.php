<?php
class Style extends Controller{
    private $path="source/css/";
    function __construct(){
        if(!is_dir($this->path)){
            mkdir($this->path);
        }
    }
    public function __call($name,$arguments){
        $file=$this->path.$name.".css";
        if(!file_exists($file)){
            parent::__call($name,$arguments);
        }else{
            header("Content-type:text/css");
            $h=fopen($file,"rb");
            $size=filesize($file)<=0?1:filesize($file);
            $text=fread($h,$size);
            $arguments[0]=empty($arguments[0])?"":$arguments[0];
            echo $this->egg($arguments[0]).$text;
        }
    }
    private function egg(String $name=""){
        $name=str_replace("%20"," ",$name);
        $name=trim($name);
        $text="";
        if($name=="A Little Love" ){
            $text="/*\r\nYou make me cry make me smile\r\n".
            "Make me feel that love is true\r\n".
            "You always stand by my side\r\n".
            "I don't want to say goodbye\r\n".
            "You make me cry make me smile\r\n".
            "Make me feel the joy of love\r\n".
            "Oh kissing you\r\n".
            "Thank you for all the love you always give to me\r\n".
            "Oh I love you\r\n*/\r\n";
        }
        return $text;
    }
}
?>