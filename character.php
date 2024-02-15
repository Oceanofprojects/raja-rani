<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raja Rani</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="game-assets/gg-style/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    

   <style type="text/css">
        @font-face{
        font-family: g-title-f;
/*        ENDOR___*/
        src:url(game-assets/fonts/ENDOR___.ttf);
    }
       body{
                background:linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5)),url('game-assets/gg-design/bg2.jpg');
        background-size: cover;
        background-attachment:fixed;
        font-family: g-title-f;
   }
   .fetch_character_layer____{
    background:#000a;
    height:100vh;
    width:100%;
    position: fixed;
    top:0px;
    left:0px;
   }
   </style>

</head>

<body>
    <div
        style="filter:grayscale(100%);z-index:-1;background:url('https://i.gifer.com/ZMR1.gif');background-size:contain;position:absolute;top:0px;left:0px;height:100vh;width:100%;">

    </div>
    <br>
    <h1 class="g-title">Characters</h1>
    <br>
    <section class="char_layer">
        <div class="characters char_1" style="background: url('game-assets/gg-design/characters/police.jpg');background-position: center;
        background-size: cover;">
            <span>Police</span>
        </div>

        <div class="characters char_2" style=" background: url('game-assets/gg-design/characters/king.jpg');background-position: center;
        background-size: cover;">
            <span>King</span>
        </div>

        <div class="characters char_3" style=" background: url('game-assets/gg-design/characters/thief.jpg');background-position: center;
        background-size: cover;">
            <span>Thief</span>
        </div>
        <div class="characters char_4" style=" background: url('game-assets/gg-design/characters/queen.jpg');background-position: center;
        background-size: cover;">
            <span>Queen</span>
        </div>

        <div class="characters char_5" style=" background: url('game-assets/gg-design/characters/minister.jpg');background-position: center;
        background-size: cover;">
            <span>Minister</span>
        </div>

        <div class="characters char_6" style=" background: url('game-assets/gg-design/characters/wizard.jpg');background-position: center;
        background-size: cover;">
            <span>Wizard</span>
        </div>
    </section><br>
<div class="fetch_character_layer"></div>
    <center><button class="active-btn" onclick="c_sfx();choose_character()">Who im ?</button>
    </center>
</body>
    <script src="game-assets/g-script/index.js"></script>

<?php
require_once('game-assets/audio/audio.php');
?>
</html>