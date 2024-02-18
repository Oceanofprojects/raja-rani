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
       body{
                background:linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5)),url('game-assets/gg-design/bg2.jpg');
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
    <h1 class="g-title">Characters</h1>
    <br>
     <style type="text/css">
    .char_1{
        background: url('game-assets/gg-design/characters/police.jpg');background-position: center;background-size:100%;
    }
    .char_2{
        background: url('game-assets/gg-design/characters/king.jpg');background-position: center;background-size:100%;
    }
    .char_3{
        background: url('game-assets/gg-design/characters/thief.jpg');background-position: center;background-size:100%;
    }
    .char_4{
        background: url('game-assets/gg-design/characters/queen.jpg');background-position: center;background-size:100%;
    }
    .char_5{
        background: url('game-assets/gg-design/characters/minister.jpg');background-position: center;background-size:100%;
    }
    .char_6{
        background: url('game-assets/gg-design/characters/wizard.jpg');background-position: center;background-size:100%;
    }
    </style>
    <center>
    <p style="font-size:13pt;background:rgba(256,256,256,.5);padding:10px;border-radius:10px;color:#000;text-align:justify;width:70%;min-width:30%;"><b>ROLE : </b>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </center>
    <section class="c-profile-layer">
        <div class="c-profile char_1">
                <span>
                    Police
                </span>
            <div class="corner-frame"></div> 
        </div>

        <div class="c-profile char_2">
                <span>
                    King
                </span>
            <div class="corner-frame"></div> 
        </div>

        <div class="c-profile char_3">
                <span>
                    Thief
                </span>
            <div class="corner-frame"></div> 
        </div>

        <div class="c-profile char_4">
                <span>
                    Queen
                </span>
            <div class="corner-frame"></div> 
        </div>

        <div class="c-profile char_5">
                <span>
                    Minister
                </span>
            <div class="corner-frame"></div> 
        </div>

        <div class="c-profile char_6">
                <span>
                    Wizard
                </span>
            <div class="corner-frame"></div> 
        </div>
     </section>
      <div  style="position:absolute;top:10px;right:10px;">
    <button class="active-btn fa fa-chevron-left" onclick="c_sfx();history.back()"></button>
    </div>
</body>
    <script src="game-assets/g-script/index.js"></script>

<?php
require_once('game-assets/audio/audio.php');
?>
</html>