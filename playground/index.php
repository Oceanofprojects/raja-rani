<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raja Rani</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


   <style type="text/css">
       body{
                background:linear-gradient(rgba(0,0,0,.7),rgba(0,0,0,.7)),url('../game-assets/gg-design/bg4.png');
        background-size: cover;
        background-attachment:fixed;
        font-family:Montserrat;
   }
   </style>

</head>

<body>
    <div
        style="filter:grayscale(100%);z-index:-1;background:url('https://i.gifer.com/ZMR1.gif');background-size:contain;position:absolute;top:0px;left:0px;height:100vh;width:100%;">

    </div>
    <br>
    <h1 class="g-title">Play <span style="color:darkred">G</span>round</h1>
    <br>
    <style type="text/css">
    .c-profile{
        background: url('../game-assets/gg-design/gg-gold-icons/gift.jpg');background-position: center;background-size:100%;
    }
    .char_1{
      background: url('../game-assets/gg-design/characters/police.jpg');background-position: center;background-size:100%;
    }
    .char_2{
      background: url('../game-assets/gg-design/characters/minister.jpg');background-position: center;background-size:100%;
    }
    </style>
    <section class="c-profile-layer">
        <div class="c-profile char_1">
          <span style="display:block;opacity:.8">
              Dhinesh - Police
          </span>
          <div class="corner-frame"></div>

        </div>
      </section>
      <br>
      <center>
      <hr style="border:2px solid #ddda;width:25%">
    </center>
      <br>
    <section class="c-profile-layer">
        <div class="c-profile">
        </div>

        <div class="c-profile char_2">
          <span style="display:block;opacity:.8">
              You
          </span>
                      <div class="corner-frame"></div>
        </div>

        <div class="c-profile">
        </div>

        <div class="c-profile">
        </div>

        <div class="c-profile">
        </div>

     </section>
 <br>
    <!-- <center><button id="btn" class="active-btn" onclick="c_sfx();get_character();choose_character()">Who im ?</button>
    </center> -->
    <link rel="stylesheet" href="../game-assets/gg-style/index.css">

</body>
    <script src="../game-assets/g-script/index.js"></script>

<?php
// require_once('../game-assets/audio/audio.php');
?>
</html>
