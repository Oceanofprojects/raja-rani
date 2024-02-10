
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

function opRoom(){
	gameObj._play_click_sound();
}
function joinRoom(){
	gameObj._play_click_sound();
}
var soundLoop = 0;
function muteBgm(){
	$('#bgm_speaker').removeClass();
	if(soundLoop%2==0){
		gameObj._play_bgm_sound();
		$('#bgm_speaker').attr('class','active-btn fa fa-volume-up');
	}else{
				gameObj._pause_bgm_sound();
		$('#bgm_speaker').attr('class','in-active-btn fa fa-volume-off');

	}
	soundLoop++;
}
