<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raja Rani</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="game-assets/gg-style/index.css">
    <script src="https://cdn.lordicon.com/lordicon.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <style>
    
    @font-face{
        font-family: g-title-f;
        src:url(game-assets/fonts/Kingthings_Gothique.ttf);
    }

body{
        background:linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5)),url('game-assets/gg-design/vintage_paper.jpg');
        background-size: cover;
        display:flex;
        justify-content: center;
        align-items: center;
    color:#fff;

}    
.g-title{
    font-family: g-title-f;
    font-size: 7em;
    /* display:none; */
}

@media only screen and (max-width:650px){
    .g-title{
        font-size: 5em;
    }
}
@media only screen and (max-width:450px){
    .g-title{
        font-size: 3em;
    }
    .txt-box{
        width:150px;
    }
}

@media only screen and (max-width:300px){
    .g-title{
        font-size: 2em;
    }
    .txt-box{
        width:100px;
    }
}



    </style>
</head>

<body>


     <div
        style="filter:grayscale(100%);z-index:-1;background:url('https://i.gifer.com/ZMR1.gif');background-size:contain;position:absolute;top:0px;left:0px;height:100vh;width:100%;">
    </div>

<div class="center-content" >
    <h1 class="g-title">Join <span style="color:darkred">R</span>oom</h1>
    <form>
    <center>
    <input type="text" maxlength="10" class="txt-box" placeholder="Your name"  style="padding-left:20px;background:url('game-assets/gg-design/gg-gold-icons/gg-scroll.png');background-size:100% 100%;background-position: center;">
    <br>
    <input type="text" maxlength="5" class="txt-box" style="padding-left:20px;background:url('game-assets/gg-design/gg-gold-icons/gg-scroll.png');background-size:100% 100%;background-position: center;" placeholder="Room-ID">
    <br><br><input type="button"  style="border:none;outline:none;font-size:13pt;background:url('game-assets/gg-design/gg-gold-icons/gg-btn.png');background-size:100% 100%;background-position: center;" class="active-btn" onclick="c_sfx();" value="Join Game">
    <br><br>
    <span>#Message section(?)</span>
    </center>

    </form>
    <div  style="position:absolute;top:10px;right:10px;">
    <button class="active-btn fa fa-chevron-left" onclick="c_sfx();history.back()"></button>
    <button class="active-btn" onclick="c_sfx();crRoom();">
Create room</button>
</div>
    
</div>
    <script src="game-assets/g-script/index.js"></script>

</body>
<?php
require_once('game-assets/audio/audio.php');
?>
</html>