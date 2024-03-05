<?php
require_once '../db_line/connect.php';
require_once "class_api/add_players.class.php";
require_once "class_api/room.class.php";
require_once "class_api/player_assemble.class.php";

$roomObj = new room();
$playerObj = new add_players();

if (isset($_POST['module']) && !empty($_POST['module'])) {
  switch ($_POST['module']) {
    case "add_player":
      switch ($_POST['action']) {
        case "create":
          isset($_POST['name']) or $roomObj->_error_throw(['flag' => false, 'message' => 'Name param missing']);
          $player = $_POST['name'];
          $room = $roomObj->create_room();
          $room['flag'] or $roomObj->_error_throw($room);
          $validate = $playerObj->validate_player_name($player);
          $validate['flag'] or $playerObj->_error_throw($validate);
          $store = $roomObj->store_room($room['roomid']);
          $store['flag'] or $roomObj->_error_throw($store);
          $createPlayer = $playerObj->add_in_playground($room['roomid'], $player);
          echo json_encode($createPlayer);
          break;

        case "join":
          isset($_POST['name']) or $roomObj->_error_throw(['flag' => false, 'message' => 'Name param missing']);
          isset($_POST['roomid']) or $roomObj->_error_throw(['flag' => false, 'message' => 'Room param missing']);
          $player = $_POST['name'];
          $roomid = $_POST['roomid'];
          $room_availablity_check = $roomObj->room_availability($roomid);
          $room_availablity_check['flag'] or $roomObj->_error_throw($room_availablity_check);
          $roomMembers = $roomObj->get_all_players($roomid, "online", "waiting");
          if ($roomMembers['flag'] || $roomMembers['status'] == 1) {
            if (count($roomMembers['data']) < 6) {
              $joinPlayer = $playerObj->join_room($player, $roomid);
              echo json_encode($joinPlayer);
            } else
              $roomObj->_error_throw(['flag' => false, 'message' => "Player count exceeds"]);
          } else
            $roomObj->_error_throw($roomMembers);
          break;
      }
      break;
    case "room_status":
      isset($_POST['roomid']) or $roomObj->_error_throw(['flag' => false, 'message' => 'Room id param missing']);
      $roomid = $_POST['roomid'];
      $roomObj->valid_room($roomid);
      echo json_encode($roomObj->get_all_players($roomid));
      break;
    
    case "character_allocate":
      isset($_POST['roomid']) or $roomObj->_error_throw(['flag' => false, 'message' => 'Room id param missing']);
      $roomid = $_POST['roomid'];
      $roomObj->valid_room($roomid);
      $players = $roomObj->get_all_players($roomid);
      $assembleObj = new user_assemble($players['data']);
      echo json_encode($assembleObj);
      break;
  }
}
