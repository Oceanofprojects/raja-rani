<?php

// require_once '../db_line/connect.php';
// require_once 'add_players.class.php';
class user_assemble
{
    use connection;
    public $db;
    private $characters;
    private $active_chars;
    private $player_with_chars;
    private $active_main_chars = [];
    public function __construct()
    {
        $this->db = (object) $this->connect();
        if($this->db->flag){
            $this->db = $this->db->connection;
        }else{
            $this->_error_throw($this->db->message);
        }
        // Character assign
        // $char = $this->character_details();
        // print_r($char);exit;
        // $char['flag'] or $this->_error_throw($char);
        // $this->characters = $char['result'];

        // $this->active_chars = [];
        // $this->player_with_chars = [];
    }

    public function users_entry($players)
    {
        // Character assign
        $char = $this->character_details();
        $char['flag'] or $this->_error_throw($char);
        $this->characters = $char['result'];

        $this->active_chars = [];
        $this->player_with_chars = [];

        $players_size = count($players);
        $total_char_size = count($this->characters);
        $char_priority_size = count($this->find_main_characters()['main']);
        if ($players_size <= $total_char_size) {
            if (count($players) >= ($char_priority_size)) {
                foreach ($players as $player) {
                    $this->assign_character($player['id']);
                }
                return ['status' => 'success', 'flag' => true, 'message' => 'Players assigned'];
            } else {
                return ['status' => 'failed', 'flag' => false, 'message' => "Oops !, Minimum " . $char_priority_size . " Players"];
            }
        } else {
            return ['status' => 'failed', 'flag' => false, 'message' => "Oops !, Player limit -" . $total_char_size];
        }
    }

    public function get_character_by_player_id($roomid,$player_id)
    {
        $sql = $this->db->prepare("SELECT player_status,players,character_id as ch_plc FROM play_ground WHERE id=$player_id AND room_id='$roomid'");
        if ($sql->execute()) {
            $res = $sql->fetchall(PDO::FETCH_ASSOC);
            if (is_array($res) and count($res) > 0)
                return ['flag' => true, 'data' => $res,'message'=>'Character fetched !'];
            else
                return ['flag' => false, 'message' => "Error fetch Character"];
        }
    }

    public function assign_character($user)
    {
        //Checking Main character is filled or not.
        if ($this->is_priority_filled()) {
            $assign = $this->find_main_characters()['not_main'];
        } else {
            $assign = $this->find_main_characters()['main'];
        }

        $id = $assign[rand(0, count($assign) - 1)]; //CURRENT ID

        if (!in_array($id, $this->active_chars)) {
            $this->active_chars[] = $id;
            $this->player_with_chars[] = [$user, $id]; //Assign character for user 
            $this->char_assign($user, $id);
        } else {
            $this->assign_character($user); //re-assign
        }
    }

    /*public function assign_character($user){
        $rnd_char_id = rand(0,count($this->characters)-1);
        if(!in_array($rnd_char_id,$this->active_chars)){        
            $this->active_chars[] = $rnd_char_id;
            $this->player_with_chars[] = [$user,$rnd_char_id];//Assign character for user 
        }else{
            $this->assign_character($user);//re-assign
        }
    }*/

    public function is_priority_filled()
    {
        foreach ($this->find_main_characters()['main'] as $character) {
            if (!in_array($character, $this->active_chars)) {
                return false;
            }
        }
        return true;
    }

    public function find_main_characters()
    {
        $data = [];
        foreach ($this->characters as $character) {
            if ($character['priority']) {
                $main[] = $character['id'];
            } else {
                $not_main[] = $character['id'];
            }
        }
        return ['main' => $main, 'not_main' => $not_main];
    }



    public function player_assigned_chars()
    {
        foreach ($this->player_with_chars as $player_data) {
            $t[] = [$player_data[0], $this->characters[$player_data[1]]];
        }
        return $t;
    }

    public function character_details($priority='',$flow_for='server')
    {
        //flow_for (Access overall details only in internal function)
        if($priority==''){
            $condition = "";
        }else{
             $condition = " WHERE priority = ".$priority;
        }
        if($flow_for== 'server'){
            $cols ='*'; 
        }else{
            $cols ='_character as characters'; 
        }
        $sql = $this->db->prepare("SELECT $cols FROM characters $condition");
        if ($sql->execute()) {
            $res = $sql->fetchall(PDO::FETCH_ASSOC);
            if (is_array($res) and count($res) > 0)
                return ['flag' => true, 'result' => $res];
            else
                return ['flag' => false, 'message' => "Characters not available"];
        }
    }

    public function char_assign($user, $id)
    {
        $q = $this->db->prepare("UPDATE play_ground SET character_id='$id' WHERE id='$user'");
        $q->execute() or $this->_error_throw(['flag' => false, "message" => "Error in the Character update madule"]);
        return ['flag' => true, 'message' => "Character updated successfully"];
    }

    // public function add_character($name, $room_id)
    // {
    //     $player = $this->validate_player_name($name, $room_id);
    //     if (!$player[0] && $player[2] == 1) {
    //         return ['flag' => true];
    //     } else {
    //         return ['flag' => false, 'player' => $player[1]];
    //     }
    // }
}
// $obj = new user_assemble("Dhineshhhh", "U12345");
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