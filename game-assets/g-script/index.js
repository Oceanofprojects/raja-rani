
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
	setTimeout(()=>{
	},200)
}
function crRoom(){
	window.open('createroom.php','_self');
}
function joinRoom(){
	window.open('joinroom.php','_self');
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

var speed=100;//DEFAULT LOOP SPEED
var loop=0;
var flag=false;
var innerloop = 0;
let timeOfloop = 4;
function choose_character(){
           if (loop < $('.c-profile').length) {
           		if(flag){
           			$('.char_'+(tmp+1)).css({
            'box-shadow':'0px 0px 5px 5px rgba(0,0,0,.3),0px 10px 10px 10px rgba(0,0,0,.1)'

                });
                // console.log('.char_'+(tmp+1)+'TRANS1')

           		}else{
           			flag = true;
           		}
                $('.char_'+(loop+1)).css({
            'box-shadow':'0px 0px 5px 5px rgba(256,256,256,.5),0px 0px 10px 10px rgba(256,256,256,.2)'
                });
                // console.log('.char_'+(loop+1)+'RED')

                setTimeout(function(){
                	choose_character()
                }, speed);
                tmp = loop;
            loop++;
            }else{
            	$('.char_'+(loop)).css({
		            'box-shadow':'0px 0px 5px 5px rgba(0,0,0,.3),0px 10px 10px 10px rgba(0,0,0,.1)'
                });
                // console.log('.char_'+(loop)+'TRANS')
            	loop = 0;
            	tmp = 0;
            	flag = false;
            	if(innerloop == timeOfloop){
            		//AFTER LOOP ANIMATION
            		$('.char_'+myChar).css({
            			'box-shadow':'0px 0px 5px 5px rgba(256,256,256,.5),0px 0px 10px 10px rgba(256,256,256,.2)'
                	});
					$('#btn').prop({'disabled':false,'class':'active-btn'}).text('Next Step').attr('onclick','window.open("playground/")');
            	}else{
            		speed+=100;
	            	choose_character();
	            	innerloop++;            		
            	} 
            }
}

function get_character(){
	$('#btn').prop({'disabled':true,'class':'in-active-btn'}).text('Getting in random..')
	//CODE AJAX HERE

	/**
	 * 
	 * FIND PLAYER'S CHARACTER ID BASED ON PLAYER'S UNI-ID
	 * 
	 * */
	myChar = (Math.floor(Math.random()*5)+1);//DEFAULT RAND ID (FOR TESTING)...
}