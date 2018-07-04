<?php
//小青SQL语句构造器V0.1
class SQL{
    private $selectSQL="";
    private $table= "";
    private $whereSQL="";
    private $limit="";
    private $orderSQL="";
    function select($fileds="*"){
        if(is_array($fileds)){
            $f="";
            foreach($fileds as $value){
                $f.=$f==""?" `".$value."` ":", `".$value."` ";
            }
            $fileds=$f;
        }
        $sql="SELECT ".$fileds." FROM `".$this->table."` ".$this->whereSQL;
    }
    function where($cond){
        if(!empty($cond)){
            if(is_array($cond)){
                $c="";
                foreach($cond as $key=>$value){
                    $c.=$c==""?" `".$key."` = '".$value."' ":" AND `".$key."` = '".$value."' ";
                }
                $cond=$c;
            }
            if(empty($this->whereSQL)){
                $this->whereSQL=(" WHERE ".$cond);
            }else{
                $this->whereSQL.=(" OR ".$cond);
            }
            
        }
        return $this;
    }
    function order($order){
        $this->orderSQL=$order;
        return $this;
        
    }
}
?>