<?php


require_once 'connect.php';
require_once "class_api/add_players.class.php";
require_once "class_api/room.class.php";
require_once "class_api/player_assemble.class.php";
$roomObj = new room();
$playerObj = new add_players();
$assembleObj = new user_assemble();

if(strtolower($roomObj->RR_ENV) != 'test'){
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: POST");
  header("Access-Control-Allow-Headers: Content-Type, Authorization");
}
if (isset($_POST['module']) && !empty($_POST['module'])) {
  if($_POST['module'] == "add_player"){
    if(isset($_POST['action'])){
      handle_action($_POST['action']);//Action handle
    }
  }else if($_POST['module'] == 'room_status'){
      isset($_POST['roomid']) or $roomObj->_error_throw(['flag' => false, 'message' => 'Room id param missing']);
      $roomid = $_POST['roomid'];
      $roomObj->valid_room($roomid);
      echo json_encode($roomObj->get_all_players($roomid));
  }else if($_POST['module'] == 'eachfetch'){
      echo json_encode([
        "room"=>[
          'room_valid'=>$roomObj->isvalidroom($_POST['roomid']),
          'room_state'=>$roomObj->roomState($_POST['roomid'])
        ],
        "characters"=>[
          'flag'=>true,
          'all_chars'=>$assembleObj->character_details('','client'),
          'pri'=>$assembleObj->character_details(1,'client'),
          'non_pri'=>$assembleObj->character_details(0,'client'),
          'message'=>"fetched successfully"
        ],
        'players'=>[
          'all_players'=>$roomObj->get_all_players($_POST['roomid']),
          'online_players'=>$roomObj->get_all_players($_POST['roomid'],'online'),
          'offline_players'=>$roomObj->get_all_players($_POST['roomid'],'offline'),
          'waiting_players'=>$roomObj->get_all_players($_POST['roomid'],'waiting')
        ]
      ]);
  }else if($_POST['module'] == '_get_my_char'){
    isset($_POST['roomid']) or $roomObj->_error_throw(['flag' => false, 'message' => 'Room id param missing']);
      isset($_POST['plc']) or $roomObj->_error_throw(['flag' => false, 'message' => 'Plc id param missing']);
      echo json_encode($assembleObj->get_character_by_player_id($_POST['roomid'],$_POST['plc']));
  }else if($_POST['module'] == 'character_allocate'){
    isset($_POST['roomid']) or $roomObj->_error_throw(['flag' => false, 'message' => 'Room id param missing']);
      $roomid = $_POST['roomid'];
      $rdata = $roomObj->isvalidroom($roomid);
    $rdata['flag'] or $roomObj->_error_throw(['flag' => false, 'message' => $rdata['message']]);
      $players = $roomObj->get_all_players($roomid);
      $assembleObj = $assembleObj->users_entry($players['data']);
      echo json_encode($assembleObj);
  }else{
    $roomObj->_error_throw(['flag' => false, 'message' => 'Undef-Module']);
  }
}

  // switch ($_POST['module']) {
  //   case "add_player":
  //         isset($_POST['name']) or $roomObj->_error_throw(['flag' => false, 'message' => 'Name param missing']);
  //     switch ($_POST['action']) {
  //       case "create":
  //         $player = $_POST['name'];
  //         $room = $roomObj->create_room();
  //         $room['flag'] or $roomObj->_error_throw($room);
  //         $validate = $playerObj->validate_player_name($player);
  //         $validate['flag'] or $playerObj->_error_throw($validate);
  //         $store = $roomObj->store_room($room['roomid']);
  //         $store['flag'] or $roomObj->_error_throw($store);
  //         $createPlayer = $playerObj->add_in_playground($room['roomid'], $player);
  //         echo json_encode($createPlayer);
  //         break;
  //       case "join":
  //         isset($_POST['roomid']) or $roomObj->_error_throw(['flag' => false, 'message' => 'Room param missing']);
  //         $player = $_POST['name'];
  //         $roomid = $_POST['roomid'];
  //         $valid_room = $roomObj->isvalidroom($roomid);
  //         $valid_room['flag'] or $roomObj->_error_throw($valid_room);
  //         $room_availablity_check = $roomObj->room_availability($roomid);
  //         $room_availablity_check['flag'] or $roomObj->_error_throw($room_availablity_check);
  //         $roomMembers = $roomObj->get_all_players($roomid, "waiting");
  //         if ($roomMembers['flag'] || $roomMembers['status'] == 1) {
  //           if (count($roomMembers['data']) < 6) {
  //             $joinPlayer = $playerObj->join_room($player, $roomid);
  //             echo json_encode($joinPlayer);
  //           } else
  //             $roomObj->_error_throw(['flag' => false, 'message' => "Player count exceeds"]);
  //         } else
  //           $roomObj->_error_throw($roomMembers);
  //         break;
  //     }
  //     break;
  //   case "room_status":
  //     isset($_POST['roomid']) or $roomObj->_error_throw(['flag' => false, 'message' => 'Room id param missing']);
  //     $roomid = $_POST['roomid'];
  //     $roomObj->valid_room($roomid);
  //     echo json_encode($roomObj->get_all_players($roomid));
  //     break;

  //   case "eachfetch":
  //   echo json_encode([
  //       "room"=>$roomObj->isvalidroom($_POST['roomid']),
  //       "characters"=>[
  //         'flag'=>true,
  //         'all_chars'=>$assembleObj->character_details(),
  //         'pri'=>$assembleObj->character_details(1),
  //         'non_pri'=>$assembleObj->character_details(0),
  //         'message'=>"fetched successfully"
  //       ],
  //       'players'=>[
  //         'all_players'=>$roomObj->get_all_players($_POST['roomid']),
  //         'online_players'=>$roomObj->get_all_players($_POST['roomid'],'online'),
  //         'offline_players'=>$roomObj->get_all_players($_POST['roomid'],'offline'),
  //         'waiting_players'=>$roomObj->get_all_players($_POST['roomid'],'waiting')
  //       ]
  //     ]);
  //   break;
  //   case "_get_my_char":
  //     isset($_POST['roomid']) or $roomObj->_error_throw(['flag' => false, 'message' => 'Room id param missing']);
  //     isset($_POST['plc']) or $roomObj->_error_throw(['flag' => false, 'message' => 'Plc id param missing']);
  //     echo json_encode($assembleObj->get_character_by_player_id($_POST['roomid'],$_POST['plc']));
  //     break;

  //   case "character_allocate":
  //     isset($_POST['roomid']) or $roomObj->_error_throw(['flag' => false, 'message' => 'Room id param missing']);
  //     $roomid = $_POST['roomid'];
  //     $roomObj->valid_room($roomid);
  //     $players = $roomObj->get_all_players($roomid);
  //     $assembleObj = $assembleObj->users_entry($players['data']);
  //     echo json_encode($assembleObj);
  //     break;
  // }


function handle_action($action){
  global $roomObj,$playerObj,$assembleObj;
  isset($_POST['name']) or $roomObj->_error_throw(['flag' => false, 'message' => 'Name param missing']);
  if($action == 'create'){
          $player = $_POST['name'];
          $room = $roomObj->create_room();
          $room['flag'] or $roomObj->_error_throw($room);
          $validate = $playerObj->validate_player_name($player);
          $validate['flag'] or $playerObj->_error_throw($validate);
          $store = $roomObj->store_room($room['roomid']);
          $store['flag'] or $roomObj->_error_throw($store);
          $createPlayer = $playerObj->add_in_playground($room['roomid'], $player);
          echo json_encode($createPlayer);
  }else if($action == 'join'){
    isset($_POST['roomid']) or $roomObj->_error_throw(['flag' => false, 'message' => 'Room param missing']);
          $player = $_POST['name'];
          $roomid = $_POST['roomid'];
          $valid_room = $roomObj->isvalidroom($roomid);
          $valid_room['flag'] or $roomObj->_error_throw($valid_room);
          $room_availablity_check = $roomObj->room_availability($roomid);
          $room_availablity_check['flag'] or $roomObj->_error_throw($room_availablity_check);
          $roomMembers = $roomObj->get_all_players($roomid, "waiting");
          if ($roomMembers['flag'] || $roomMembers['status'] == 1) {
            if (count($roomMembers['data']) < 6) {
              $joinPlayer = $playerObj->join_room($player, $roomid);
              echo json_encode($joinPlayer);
            } else
              $roomObj->_error_throw(['flag' => false, 'message' => "Player count exceeds"]);
          } else
            $roomObj->_error_throw($roomMembers);
  }else{
      $roomObj->_error_throw(['flag' => false, 'message' => "Undef-Action"]);   
  }

}
