<?php
require_once 'db_line/connect.php';
class room
{
    use connection;
    public $db;
    private $room_id_prefix;
    public function __construct()
    {
        $this->db = (object) $this->connect();
        $this->db = ($this->db->flag) ? $this->db->connection : die('Error in db line');
        $this->room_id_prefix = range('A', 'Z');
    }

    public function valid_room($room_id)
    {
        $q = "SELECT * FROM room WHERE room_id = '$room_id'";
        $sql = $this->db->prepare($q);
        if ($sql->execute()) {
            $res = $sql->fetch();
            if (is_array($res)) {
                return (count($res) > 0) ? [true, 'Room exist',2] : [false, 'Room not exist', 1];
            } else {
                return [false, 'Room not exist', 1];
            }
        } else {
            return [false, 'Error in room exist module', 0];
        }
    }

    public function create_room()
    {
        $room_id = $this->room_id_prefix[rand(0, 25)] . rand(1000, 9999);
        $room_details = $this->valid_room($room_id);

        if ($room_details[0] && $room_details[2] == 0) 
        {
            return $room_details;
        } 
        else if ($room_details[0] && $room_details[2] == 1) 
        {
            return [true,$room_id];
        } 
        else if ($room_details[0]) 
        {
            $this->create_room();
        }
    }
}
