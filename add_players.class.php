<?php

require_once 'db_line/connect.php';
require_once 'room.class.php';


class add_players extends room{
    use connection;

    public $db;
    public function __construct(){
        $this->db = (object) $this->connect();
        $this->db = ($this->db->flag)?$this->db->connection:die('Error in db line');
    }

    public function player_exist($player,$room_id){
        ($this->valid_room($room_id)[0])?'':die("Invalid room ID");
        $q = "SELECT * FROM play_ground WHERE players = '$player' AND room_id = $room_id";
        $sql = $this->db->prepare($q);
        if($sql->execute()){
            $res = $sql->fetch();
            if(is_array($res)){
                return (count($res)>0)?[true,'Player Already exist']:[false,'Player Already exist'];
            }else{
                return [true,'New Player'];
            }
        }else{
            return [false,'Error in player exist module'];
        }
    }

}
$obj = new add_players();
$v = $obj->player_exist('mani',1234);
print_r($v);
/***
 * 
 * GETTING ACTIVE ROOM
 * 
 * SELECT * FROM room WHERE room_id = 1234 and active = 1 
 * 
 * 
 * GETTING PLAYERS USING ROOM ID
 * 
 * SELECT * FROM room left join play_ground on room.room_id = play_ground.room_id
 * 
 * 
 * GETTING PLAYER POINT USNING GROUND ID
 * 
 * SELECT * FROM play_ground left join points on play_ground.id = points.ground_id
 * 
 */

?>


