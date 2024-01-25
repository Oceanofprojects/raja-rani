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
            'name2',
            'name3',
            'name4',
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

    public function users_entry($users){
        foreach($users as $user){
            $this->assign_character($user);
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


?>