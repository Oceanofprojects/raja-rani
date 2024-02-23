<?php 

trait connection{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db_name = 'raja_rani';

    function connect(){
        $con = new PDO("mysql:host=$this->host;dbname=$this->db_name",$this->user,$this->pass); 
        if($con){
            return ['flag'=>true,'connection'=>$con];
        }else{
            return ['flag'=>false,'connection'=>[]];
        }
    }

    function _error_throw($data){
        if(is_array($data)){
            echo json_encode($data);
        }else{
            echo $data;
        }
        exit;
    }
}

?>