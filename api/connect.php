<?php 
trait connection{
    private $host;
    private $user;
    private $pass;
    private $db_name;
    public $RR_ENV = 'live';

    function connect(){
        if($this->RR_ENV == 'test'){
            //Local config
            $_SESSION['ENV'] = 'test';
            $this->host = 'localhost';
            $this->user = 'root';
            $this->pass = '';
            $this->db_name = 'raja_rani';            
        }else{
            //Live config
            $_SESSION['ENV'] = 'prod';
            $this->host = 'sql.freedb.tech';
            $this->user = 'freedb_raja_rani_owner';
            $this->pass = '?KV6dkgM@*8966N';
            $this->db_name = 'freedb_raja_rani';
        }
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
                    die(json_encode(['status'=>false,'data'=>[],'message'=>'Undefined array format']));
                }else{
                    die(json_encode($data));
                }
            }
        }else if(is_string($data) && !empty($data)){
                die(json_encode(['status'=>false,'data'=>[],'message'=>$data]));
        }
    }
}

?>