<?php

class add_players
{
    use connection;

    public $db;
    public $date;
    public function __construct()
    {
        $this->db = (object) $this->connect();
        $this->db = ($this->db->flag) ? $this->db->connection : $this->_error_throw($this->db->message);
        $this->date = date("Y/m/d");
    }

    public function player_exist($player, $room_id)
    {
        $q = "SELECT * FROM play_ground WHERE players = '$player' AND room_id = '$room_id'";
        $sql = $this->db->prepare($q);
        if ($sql->execute()) {
            $res = $sql->fetch();
            if (is_array($res)) {
                return (count($res) > 0) ? ["flag" => true, "message" => 'Player Already exist', "status" => 2] : ["flag" => false, "message" => 'New Player', "status" => 1];
            } else {
                return ["flag" => false, "message" => 'New Player', "status" => 1];
            }
        } else {
            return ["flag" => false, "message" => 'Error in player exist module', "status" => 0];
        }
    }

    public function validate_player_name($player)
    {
        $player = str_replace(' ', '', $player);
        if (strlen($player) == 0) {
            return ["flag" => false, "message" => 'Empty characters not allowed, Please enter valid name !'];
        } else if (preg_match('@[^\w]@', $player)) {
            return ["flag" => false, "message" => 'Special characters not allowed, Please enter valid name !'];
        } else {
            if (strlen($player) >= 3 && strlen($player) <= 15) {
                return ["flag" => true, "message" => "Valid player name"];
            } else {
                return ["flag" => false, "message" => "Name should be available between 3 to 10 characters, Please enter valid name !"];
            }
        }
    }

    public function join_room($player, $room_id)
    {

        $validation = $this->validate_player_name($player);
        $validation['flag'] or $this->_error_throw($validation);
        $player_detail = $this->player_exist($player, $room_id);

        !$player_detail['flag'] && $player_detail['status'] == 1 or $this->_error_throw($player_detail);
        $q = $this->db->prepare("INSERT INTO play_ground (`room_id`, `players`, `player_role`, `player_status`, `character_id`, `_date`) VALUES ('$room_id', '$player', '0', 'waiting', '0', '$this->date')");
        $q->execute() or $this->_error_throw(["flag" => false, "message" => "Error in the join room"]);
        return ["flag" => true,"data"=>$room_id,"state"=>"nonacs","place"=>$this->db->lastInsertId(),"message" => "Player created Successfully"];
    }

    public function add_in_playground($room, $player)
    {
        $q = $this->db->prepare("INSERT INTO play_ground (`room_id`, `players`, `player_role`, `player_status`, `character_id`, `_date`) VALUES ('$room', '$player', '1', 'waiting', '0', '$this->date')");
        $q->execute() or $this->_error_throw(["flag" => false, "message" => "Error in the insert playground"]);
        return ["flag" => true, "data" => $room,"state"=>"acs","place"=>$this->db->lastInsertId(), "message" => "Room created successfully"];
    }

    /*public function player_status($player = '', $roomid)
    {
        if ($player != '')
            $condition = "players='$player' AND room_id='$roomid'";
        else
            $condition = "room_id='$roomid'";

        $q = $this->db->prepare("UPDATE play_ground SET player_status='waiting' WHERE $condition");
        $q->execute() or $this->_error_throw(['flag' => false, "message" => "Error in the status update module"]);
        return ['flag' => true, 'message' => "player status updated successfully"];
    }*/

    
}
