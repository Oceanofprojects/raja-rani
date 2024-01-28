<?php 

trait connection{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db_name = 'test';

    function connect(){
        $con = new PDO("mysql:host=$this->host;dbname=$this->db_name",$this->user,$this->pass); 
        if($con){
            return ['flag'=>true,'connection'=>$con];
        }else{
            return ['flag'=>false,'connection'=>[]];
        }
    }
}

?>