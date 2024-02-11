<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Raja Rani</title>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="game-assets/g-script/index.js"></script>
    <link rel="stylesheet" href="game-assets/gg-style/index.css">

	<style type="text/css">
		*{
			margin:0px;
			padding:0px;
		}
		body{
overflow: hidden;

		}
		iframe{
height:100vh;width:100%;
border:none;
		}
		.icon{
    width:50px;
}
	</style>
</head>
<body>
	<iframe src="main.php" id="g-frame" name="g-frame"></iframe>
	<div  style="position:absolute;top:10px;right:10px;">
	<button class="active-btn fa fa-chevron-left icon" onclick="c_sfx();history.back()"></button>
	<button class="in-active-btn fa fa-volume-off icon" id="bgm_speaker" onclick="muteBgm()"></button>
	<button class="active-btn fa fa-user icon" onclick="c_sfx();window.open('character.php','g-frame')"></button>
	</div>
	<audio id="bgm-sfx" preload="auto" controls="none" hidden  src="game-assets/audio/bgm.mp3"></audio>
</body>
<?php
require_once('game-assets/audio/audio.php');

?>
</html>