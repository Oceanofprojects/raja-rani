<?php
// require_once '/opt/lampp/htdocs/raja_rani/db_line/connect.php';
class room
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

    public function valid_room($room_id)
    {
        // $q = "SELECT * FROM room WHERE room_id = '$room_id' AND status <> 'closed'";
        $q = "SELECT * FROM room WHERE room_id = '$room_id' AND (status <> 'open' OR status <> 'playing') AND _date <> CURRENT_DATE";
        $sql = $this->db->prepare($q);
        if ($sql->execute()) {
            $res = $sql->fetch();
            if (is_array($res)) {
                return (count($res) > 0) ? ['flag' => true, 'message' => 'Room exist', 'status' => 2] : ['flag' => false, 'message' => 'Room not exist', 'status' => 1];
            } else {
                return ['flag' => false, 'message' => 'Room not exist', 'status' => 1];
            }
        } else {
            return ['flag' => false, 'message' => 'Error in room exist module', 'status' => 0];
        }
    }

    public function create_room()
    {
        // $prefix = range('A', 'Z');
        $prefix = ['A', 'B', 'C', 'D', 'E'];
        // $room_id = $prefix[rand(0, count($prefix)-1)] . rand(1000, 9999);
        $room_id = $prefix[rand(0, count($prefix) - 1)] . rand(1000, 9999);

        $room_details = $this->valid_room($room_id);
        if ($room_details['flag'] && $room_details['status'] == 0) {
            return $room_details;
        } else if (!$room_details['flag'] && $room_details['status'] == 1) {
            return ['flag' => true, 'roomid' => $room_id, 'message' => 'New room ID'];
        } else if ($room_details['flag']) {
            $this->create_room();
        }
    }

    public function store_room($room_id)
    {
        $q = $this->db->prepare("INSERT INTO room(`room_id`, `status`, `_date`) VALUES ('$room_id', 'waiting', '$this->date')");
        $sql_room_creation = $q->execute();
        if ($sql_room_creation)
            return ['flag' => true, 'message' => "Room created"];
        else
            return ['flag' => false, 'message' => "Error in the room creation"];
    }

    public function get_all_players($roomid, $status1 = "", $status2 = "")
    {
        $status = '';
        if (!empty($status1) && !empty($status2)) {
            $status = " AND player_status IN ('$status1', '$status2')";
        } else if (!empty($status2)) {
            $status = " AND player_status = '$status1'";
        }
        $q = $this->db->prepare("SELECT id, players, player_role, player_status, character_id FROM play_ground where room_id='$roomid'$status");
        if ($q->execute()) {
            $res = $q->fetchAll(PDO::FETCH_ASSOC);
            if (is_array($res)) {
                return ['flag' => true, 'data' => $res, 'message' => "Fetched successfully", 'status' => 1];
            } else {
                return ['flag' => false, 'data' => [], 'message' => "There is no player available", 'status' => 1];
            }
        } else {
            return ['flag' => false, 'message' => 'Error in players in the room module', 'status' => 0];
        }
    }

    public function room_availability($roomid)
    {
        $q = $this->db->prepare("SELECT * FROM `room` WHERE room_id = '$roomid' AND TIMESTAMPDIFF(minute, created_on, CURRENT_TIMESTAMP) <60");
        if ($q->execute()) {
            $res = $q->fetch(PDO::FETCH_ASSOC);
            if (is_array($res)) {
                return ['flag' => true, 'data' => $res, 'message' => "Room available"];
            } else {
                return ['flag' => false, 'message' => "Room expired", 'status' => 1];
            }
        } else {
            return ['flag' => false, 'message' => 'Error in the room available module', 'status' => 0];
        }
    }
}
