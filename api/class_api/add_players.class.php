<?php

require_once 'room.class.php';


class add_players extends room
{
    use connection;

    public $db;
    public function __construct()
    {
        // parent::__construct();
        $this->db = (object) $this->connect();
        $this->db = ($this->db->flag) ? $this->db->connection : die('Error in db line');
    }

    public function player_exist($player, $room_id)
    {
        $q = "SELECT * FROM play_ground WHERE players = '$player' AND room_id = '$room_id'";
        $sql = $this->db->prepare($q);
        if ($sql->execute()) {
            $res = $sql->fetch();
            if (is_array($res)) {
                return (count($res) > 0) ? [true, 'Player Already exist', 2] : [false, 'New Player', 1];
            } else {
                return [false, 'New Player', 1];
            }
        } else {
            return [false, 'Error in player exist module', 0];
        }
    }

    public function validate_player_name($player)
    {
        $player = str_replace(' ', '', $player);
        if (strlen($player) == 0) {
            return [false, 'Empty characters not allowed, Please enter valid name !'];
        } else if (preg_match('@[^\w]@', $player)) {
            return [false, 'Special characters not allowed, Please enter valid name !'];
        } else {
            if (strlen($player) >= 3 && strlen($player) <= 10) {
                return [true, "Valid player name"];
            } else {
                return [false, "Name should be available between 3 to 10 characters, Please enter valid name !"];
            }
        }
    }

    public function join_room($player, $room_id)
    {
        $validation = $this->validate_player_name($player);
        if ($validation[0]) {
            $player_detail = $this->player_exist($player, $room_id);

            if (!$player_detail[0] && $player_detail[2] == 1) {
                $q = $this->db->prepare("INSERT INTO play_ground (`room_id`, `players`, `player_role`, `player_status`, `character_id`, `_date`) VALUES ('$room_id', '$player', '0', '2', '0', '$this->date')");
                $sql_join = $q->execute();
                return [true, "Player created Successfully"];
            } else {
                return $player_detail;
            }
        } else {
            return $validation;
        }
    }

    public function room_create($player)
    {
        $room = $this->create_room();
        $room[0] or $this->_error_throw($room);
        $validation = $this->validate_player_name($player);
        $validation[0] or $this->_error_throw($validation);
        $player_detail = $this->player_exist($player, $room[1]);
        !$player_detail[0] && $player_detail[2] == 1 or $this->_error_throw($player_detail);
        $store = $this->store_room($room[1]);
        $store[0] or $this->_error_throw($store);
        $q = $this->db->prepare("INSERT INTO play_ground (`room_id`, `players`, `player_role`, `player_status`, `character_id`, `_date`) VALUES ('$room[1]', '$player', '1', '2', '0', '$this->date')");
        $sql_join = $q->execute();
        $sql_join or $this->_error_throw("Error in the insert playground");
        return json_encode([true, $room[1], "Room created successfully"]);
    }
}


// $obj = new add_players();
// print_r($obj->join_room("Dhinesh", 123423));
// print_r($obj->room_create("Dhineeee"));

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
