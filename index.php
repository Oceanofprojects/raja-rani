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
    <style>
    
    @font-face{
        font-family: g-title-f;
/*        ENDOR___*/
        src:url(game-assets/fonts/Kingthings_Gothique.ttf);
    }
body{
        background:linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5)),url('game-assets/gg-design/bg1.jpg');
        background-size: cover;
        display:flex;
        justify-content: center;
        align-items: center;
    color:#fff;

}    
.g-title{
    font-family: g-title-f;
    font-size: 7em;
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
}

@media only screen and (max-width:300px){
    .g-title{
        font-size: 2em;
    }
}


    </style>
</head>

<body>


     <div
        style="filter:grayscale(100%);z-index:-1;background:url('https://i.gifer.com/ZMR1.gif');background-size:contain;position:absolute;top:0px;left:0px;height:100vh;width:100vw;">

    </div>

<div class="center-content">
    <h1 class="g-title">Raja&nbsp;<lord-icon src="https://cdn.lordicon.com/xmuplryc.json" trigger="loop" state="loop-wifi" style="width:50px;height:50px;" colors="primary:yellow">
</lord-icon>&nbsp;Rani</h1>
    <h6 style="text-align: right;">New multiplayer. V.0.11</h6>
    <br><br>
    <center>
    <button>Create room</button>
    <button>Join room</button>    
    </center>
    
</div>

</body>

</html>