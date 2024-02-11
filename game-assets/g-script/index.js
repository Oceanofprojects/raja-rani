
class game{
	_create_sound(src){
		this.sound = document.createElement('audio');
		this.sound.src = src;
		this.sound.setAttribute('perload','auto');
		this.sound.setAttribute('controls','none');
		this.sound.style.display='none';
		document.body.appendChild(this.sound);
	}
	_play_click_sound(){
		$('#click-sfx')[0].play();
	}
	_play_bgm_sound(){
		$('#bgm-sfx')[0].play();
	}
	_pause_bgm_sound(){
		$('#bgm-sfx')[0].pause();
	}

}

let gameObj = new game();
function c_sfx(){
	gameObj._play_click_sound();
}
function opRoom(){
	// window.open('d.php','_self');
}
function joinRoom(){
	// window.open('d.php','_self');
//	gameObj._play_click_sound();
}
var soundLoop = 0;
function muteBgm(){
	$('#bgm_speaker').removeClass();
	gameObj._play_click_sound();
	if(soundLoop%2==0){
		gameObj._play_bgm_sound();
		$('#bgm_speaker').attr('class','icon active-btn fa fa-volume-up');
	}else{
				gameObj._pause_bgm_sound();
		$('#bgm_speaker').attr('class','icon in-active-btn fa fa-volume-off');

	}
	soundLoop++;
}
