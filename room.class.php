<?php

class room{

    public function valid_room($room_id){
        $q = "SELECT * FROM room WHERE room_id = $room_id";
        $sql = $this->db->prepare($q);
        if($sql->execute()){
            $res = $sql->fetch();
            if(is_array($res)){
                return (count($res)>0)?[true,'Room exist']:[false,'Room not exist'];
            }else{
                return [false,'Room not exist'];
            }
        }else{
            return [false,'Error in room exist module'];
        }
    }

}





?>