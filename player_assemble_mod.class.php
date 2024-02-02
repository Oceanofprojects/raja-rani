<?php

class user_assemble{
    private $characters;
    private $active_chars;
    private $player_with_chars;
    private $active_main_chars = [];
    public function __construct(){
        $this->characters = [
            ['id'=>1,'character'=>'raja','points'=>1000,'priority'=>true],
            ['id'=>2,'character'=>'rani','points'=>750,'priority'=>true],
            ['id'=>3,'character'=>'thirudan','points'=>0,'priority'=>true],
            ['id'=>6,'character'=>'police','points'=>250,'priority'=>true],
            ['id'=>7,'character'=>'pasasasolice','points'=>2050,'priority'=>true],
            ['id'=>5,'character'=>'mandri','points'=>500,'priority'=>false],
            ['id'=>4,'character'=>'thota kaaran','points'=>100,'priority'=>false]
        ];
        $this->active_chars = [];
        $this->player_with_chars = [];
        //Execution starts
        $v = $this->users_entry([
            'name1',
            'name2',
            'name3',
            'name4',
            // 'name5',
            // 'name6',
            // 'name7',
            // 'name8'

        ]);
        if($v['flag']){    
            print_r($this->player_with_chars);
        }else{
            print_r($v);
        }
    }

    public function assign_character($user){
        //Checking Main character is filled or not.
        if($this->is_priority_filled()){
            $assign = $this->find_main_characters()['not_main'];
        }else{
            $assign = $this->find_main_characters()['main'];
        }

        $id = $assign[rand(0,count($assign)-1)];//CURRENT ID

        if(!in_array($id,$this->active_chars)){        
            $this->active_chars[] = $id;
            $this->player_with_chars[] = [$user,$id];//Assign character for user 
        }else{
            $this->assign_character($user);//re-assign
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

    public function is_priority_filled(){
        foreach($this->find_main_characters()['main'] as $character){
            if(!in_array($character,$this->active_chars)){
                return false;
            }
        }
        return true;
    }

    public function find_main_characters(){
        $data = []; 
        foreach($this->characters as $character){
            if($character['priority']){
                $main[] = $character['id'];
            }else{
                $not_main[] = $character['id'];
            }
        }
        return ['main'=>$main,'not_main'=>$not_main];
    }

    public function users_entry($players){
        $players_size = count($players);
        $total_char_size = count($this->characters);
        $char_priority_size = count($this->find_main_characters()['main']);
        if($players_size <= $total_char_size){
            if(count($players) >= ($char_priority_size)){
                foreach($players as $player){
                    $this->assign_character($player);
                }
                return ['status'=>'success','flag'=>true,'message'=>'Players assigned'];
            }else{
                return ['status'=>'failed','flag'=>false,'message'=>"Oops !, Minimum ".$char_priority_size." Players"];
            }
        }else{
            return ['status'=>'failed','flag'=>false,'message'=>"Oops !, Player limit -".$total_char_size];
        }
    }

    public function player_assigned_chars(){
        foreach($this->player_with_chars as $player_data){
           $t[] = [$player_data[0],$this->characters[$player_data[1]]];
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


