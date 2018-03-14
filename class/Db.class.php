<?php
//小青L数据库操作引擎V1.0
class Db{
    private $host="127.0.0.1";
    private $username="root";
    private $password="";
    private $dbn="blog";
    private $table="";
    private $con=null;
    private $log=null;
    private $debug=false;
    function __construct(String $tb=""){
        global $config;
        $this->host=$config["db"]["host"]="127.0.0.1";
        $this->username=$config["db"]["username"]="root";
        $this->password=$config["db"]["password"]="";
        $this->dbname=$config["db"]["dbname"]="blog";
        $this->debug=$config["system"]["debug"];
        $this->table=$tb;
        $this->con=new mysqli($this->host,$this->username,$this->password,$this->dbn);
        $this->con->query("SET NAMES `utf8`");
        $this->log=new Log();
    }

    function query(String $sql){
        if($this->debug){
            $this->log->output(Log::$info_sql,"执行语句：".$sql);
        }
        $rel=$this->con->query($sql);
        if(!$rel){
            $this->log->output(Log::$err_sql,$this->con->error);
        }else if($rel!==true){
            $relarr=null;
            $i=0;
            while(($relarr[$i]=$rel->fetch_array(MYSQLI_ASSOC))!=null){
                $i++;
            }
            $rel=$i==0?false:$relarr;
        }
        return $rel;
    }
    function select($fileds="*",$cond=null){
        $table=$this->table;
        if(is_array($fileds)){
            $f="";
            foreach($fileds as $value){
                $f.=$f==""?" `".$value."` ":", `".$value."` ";
            }
            $fileds=$f;
        }
        $sql="SELECT ".$fileds." FROM `$table` ";
        if(!empty($cond)){
            if(is_array($cond)){
                $c="";
                foreach($cond as $key=>$value){
                    $c.=$c==""?" `".$key."` = '".$value."' ":" AND `".$key."` = '".$value."' ";
                }
                $cond=$c;
            }
            $sql.=(" WHERE ".$cond);
            
        }
        return $sql;
    }
    function insert(array $data){
        $table=$this->table;
        $fileds="";
        $values="";
        foreach($data as $key=>$value){
            $fileds.=$fileds==""?" `".$key."` ":", `".$key."` ";
            $values.=$values==""?" '".$value."' ":", '".$value."' ";
        }
        $sql="INSERT INTO `$table`($fileds)VALUES($values)";
        return $sql;
    }
}
?>