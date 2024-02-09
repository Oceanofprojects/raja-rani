<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raja Rani</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Poppins:wght@200&family=Share+Tech+Mono&display=swap"
        rel="stylesheet">
    <style>
    * {
        margin: 0px;
        padding: 0px;
        font-family: "Poppins", sans-serif;
    }



    body {
        background: url('games-assets/bg4.png');
        background-size: cover;
    }

    .g-title {
        color: #fff;
        text-align: center;
        text-shadow: 0px 0px 5px #000, 0px 0px 15px #000;
        font-size: 4em
    }

    .char_layer {
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
    }

    .characters {
        width: 200px;
        height: 200px;
        border: 5px solid goldenrod;
        border-radius: 10px;
        display: flex;
        justify-content: center;
        align-items: flex-end;
        margin: 10px 0px;
    }

    .characters span {
        color: #fff;
        width: 100%;
        text-align: center;
        padding: 10px 0px;
        background: rgba(0, 0, 0, .4);
        font-weight: bolder
    }

    button {
        padding: 10px;
        width: 100px;
        background: linear-gradient(0deg, darkorange, goldenrod, gold);
        outline: none;
        cursor: pointer;
        border-radius: 5px;
        font-weight: bolder
    }
    </style>
</head>

<body>
    <div
        style="filter:grayscale(100%);z-index:-1;background:url('https://i.gifer.com/ZMR1.gif');background-size:contain;position:absolute;top:0px;left:0px;height:100vh;width:100vw;">

    </div>
    <br>
    <h1 class="g-title">Characters</h1>
    <br>
    <section class="char_layer">
        <div class="characters char_1" style="background: url('games-assets/characters/police.jpg');background-position: center;
        background-size: cover;">
            <span>Police</span>
        </div>

        <div class="characters char_2" style=" background: url('games-assets/characters/king.jpg');background-position: center;
        background-size: cover;">
            <span>King</span>
        </div>

        <div class="characters char_3" style=" background: url('games-assets/characters/thief.jpg');background-position: center;
        background-size: cover;">
            <span>Thief</span>
        </div>
        <div class="characters char_3" style=" background: url('games-assets/characters/queen.jpg');background-position: center;
        background-size: cover;">
            <span>Queen</span>
        </div>

        <div class="characters char_4" style=" background: url('games-assets/characters/minister.jpg');background-position: center;
        background-size: cover;">
            <span>Minister</span>
        </div>
    </section><br>
    <center><button>Who im ?</button>
    </center>
</body>

</html>