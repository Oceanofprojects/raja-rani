<?php 
trait connection{
    private $host = 'sql.freedb.tech';
    private $user = 'freedb_raja_rani_owner';
    private $pass = '?KV6dkgM@*8966N';
    private $db_name = 'freedb_raja_rani';

    function connect(){
        try{
            $con = new PDO("mysql:host=$this->host;dbname=$this->db_name",$this->user,$this->pass); 
            return ['flag'=>true,'connection'=>$con,'message'=>'line connected !'];
        }catch(PDOException $e){
            return ['flag'=>false,'connection'=>[],'message'=>$e->getMessage()];
        }
    }

    function _error_throw($data){
        if(is_array($data)){
            foreach($data as $key => $val){
                if(is_numeric($key)){
                    echo 'Undefined array format';
                   exit;
                }else{
                    echo json_encode($data);
                   exit;
                }
            }
        }
    }
}

?>