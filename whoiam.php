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
        @font-face{
        font-family: g-title-f;
/*        ENDOR___*/
        src:url(game-assets/fonts/ENDOR___.ttf);
    }
       body{
                background:linear-gradient(rgba(0,0,0,.7),rgba(0,0,0,.7)),url('game-assets/gg-design/bg3.jpg');
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
    <h1 class="g-title">Main <span style="color:darkred">C</span>haracters</h1>
    <br>
    <section class="c-profile-layer">
        <div class="c-profile char_1">
        <img src="game-assets/gg-design/characters/police.jpg">
                <span>
                    Police
                </span>
            <div class="corner-frame">
            </div> 
        </div>
        <div class="c-profile char_2">
        <img src="game-assets/gg-design/characters/king.jpg">
                <span>
                    King
                </span>
            <div class="corner-frame">
            </div> 
        </div>
        <div class="c-profile char_3">
        <img src="game-assets/gg-design/characters/queen.jpg">
                <span>
                    Queen
                </span>
            <div class="corner-frame">
            </div> 
        </div>

        <div class="c-profile char_4">
        <img src="game-assets/gg-design/characters/thief.jpg">
                <span>
                    Thief
                </span>
            <div class="corner-frame">
            </div> 
        </div>

        <div class="c-profile char_5">
        <img src="game-assets/gg-design/characters/minister.jpg">
                <span>
                    Minister
                </span>
            <div class="corner-frame">
            </div> 
        </div>

        <div class="c-profile char_6">
        <img src="game-assets/gg-design/characters/wizard.jpg">
                <span>
                    Wizard
                </span>
            <div class="corner-frame">
            </div> 
        </div>
     </section>
 <br>
<div class="fetch_character_layer"></div>
    <center><button id="btn" class="active-btn" onclick="c_sfx();get_character();choose_character()">Who im ?</button>
    </center>
    <link rel="stylesheet" href="game-assets/gg-style/index.css">

</body>
    <script src="game-assets/g-script/index.js"></script>

<?php
require_once('game-assets/audio/audio.php');
?>
</html>