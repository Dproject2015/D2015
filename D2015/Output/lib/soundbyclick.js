$(function(){
	var soundP = 70;
	$(":radio").change(function(event) {
		/* Act on the event */
		var target = $(event.target);
		//ラジオボタンがチェックされたら
		if($(target).val() == "3"){
			//乱数発生
			var val = Math.round(Math.random()*100);
			if(val<=soundP){
				//音声を鳴らす確率値以下なら
				//audioタグを動的に生成
				CreateAudio();
				var count =0;
				sound(count);
				count =1;
			}
		}
	});
});
function CreateAudio(){
	var audio = document.createElement("audio");
	//ID要素を設定
	audio.id="voice";
	//src要素を設定
	if(audio.canPlayType("audio/mp3")){
		audio.src="sound/se/voices/naruhodo.mp3";
	}else if(audio.canPlayType("audio/wav")){
		audio.src="sound/se/voices/naruhofo.wav";
	}
	//bodyの最も後ろに[audio]を生成
	document.body.appendChild(audio);
}
function sound(num){
	if(num>0){
		document.getElementById("voice").currentTime=0;
	}
	$("#voice").get(0).play();
}