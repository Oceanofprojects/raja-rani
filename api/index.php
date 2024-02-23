<?php
require_once '../db_line/connect.php';


if (isset($_POST['module']) && !empty($_POST['module'])) {  
  switch ($_POST['module']) {
    case "add_player":
      require_once "class_api/add_players.class.php";
      $obj = new add_players();
      echo $obj->room_create(isset($_POST['name'])?$_POST['name']:'');
      break;
    case "player_assemble":
      require_once "./class.api/player_assemble_mod.class.php";
      $obj = new user_assemble("Dhineshhhh", "U12345");
      break;
    case "room":
      require_once "./class.api/room.class.php";
      $obj = new room();
      break;
  }
}
