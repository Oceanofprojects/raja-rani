<?php

class user_assemble{
    private $characters;
    private $active_chars;
    private $users_with_chars;
    public function __construct(){
        $this->characters = [
            ['character'=>'raja','points'=>1000,'priority'=>true],
            ['character'=>'rani','points'=>750,'priority'=>true],
            ['character'=>'thirudan','points'=>0,'priority'=>true],
            ['character'=>'police','points'=>250,'priority'=>true],
            ['character'=>'mandri','points'=>500,'priority'=>false],
            ['character'=>'thota kaaran','points'=>100,'priority'=>false]
        ];
        $this->active_chars = [];
        $this->users_with_chars = [];
        //Execution starts
        $this->users_entry([
            'name1',
            'name3',
            'name3',
            'name3'            
        ]);
        //View assigned characters with details
        print_r($this->user_assigned_chars());
    }

    public function assign_character($user){
        $rnd_char_id = rand(0,count($this->characters)-1);
        if(!in_array($rnd_char_id,$this->active_chars)){        
            $this->active_chars[] = $rnd_char_id;
            $this->users_with_chars[] = [$user,$rnd_char_id];//Assign character for user 
        }else{
            $this->assign_character($user);//re-assign
        }
    }

    public function find_main_characters(){
        $data = []; 
        foreach($this->characters as $character){
            if($character['priority']){
                $data[] = $character['character'];
            }
        }
        return $data;
    }

    public function users_entry($users){
        $users_size = count($users);
        $total_char_size = count($this->characters);
        $char_priority_size = count($this->find_main_characters());

        if($users_size < $total_char_size){
            if(count($users) > ($char_priority_size-1)){
                foreach($users as $user){
                    $this->assign_character($user);
                }
                return ['status'=>'success','flag'=>true,'message'=>'Players assigned'];
            }else{
                return ['status'=>'failed','flag'=>false,'message'=>"Oops !, Minimum ".$char_priority_size." Players"];
            }
        }else{
            return ['status'=>'failed','flag'=>false,'message'=>"Oops !, User limit -".$total_char_size];
        }
    }

    public function user_assigned_chars(){
        foreach($this->users_with_chars as $user_data){
           $t[] = [$user_data[0],$this->characters[$user_data[1]]];
        }
       return $t;
    }

    
}
$obj = new user_assemble();
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


