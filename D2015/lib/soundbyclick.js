$(function(){
	var soundP = 70;
	var TsukaSound = ["a-sounan","eee","illusion","sasuga","seki","sindoiwa","soredeka","sugoiyo","uwa-sugoina","wakaran","warai1","warai2"];
	var TsukaSerifu = ["あ～そうなん","え～","イリュージョン","さすが","ゴホゴホ","しんどいわ","それでか","すごいよ～","うわ～すごいな","わからん","はっはっは","ははは"];
	$(":radio").change(function(event) {
		/* Act on the event */
		var target = $(event.target);
		//ラジオボタンがチェックされたら
		switch($(target).val()){
			case "1":
			break;
			case "2":
			break;
			case "3":
			break;
			case "4":
			break;
			case "5":
			break;
			default:
			break;
		}
		var voiceflag = TsukaOrTera();
		if(voiceflag == "Tsukamoto"){
			var voices = TsukaSound.length;
			var num = Math.round(Math.random()*voices);
			soundedVoice = TsukaSound[num];
			CreateAudio(soundedVoice);
			var count = 0;
			sound(count);
			count = 1;
		}
		/*if($(target).val() == "3"){
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
		}*/
	});
});
function CreateAudio(name,num){
	var path = "sound/se/voices/";
	var dir = "";
	if(num == 0){
		dir = "tsukamoto/";
	}else{
		dir = "terada/";
	}
	//var tsuka = "tsukamoto";
	//var tera = "terada";
	var audio = document.createElement("audio");
	//ID要素を設定
	audio.id="voice";
	var location = path + dir + name;
	//src要素を設定
	if(audio.canPlayType("audio/mp3")){
		audio.src=location+".mp3";
	}else if(audio.canPlayType("audio/wav")){
		audio.src=location+".wav";
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
//塚本先生か寺田先生か鳴らすか鳴らさないかを決める
function TsukaOrTera(){
	var val = Math.round(Math.random()*3);
	switch(val){
		case 0:
			return "Tsukamoto";
		case 1:
			return "Terada";
		case 2:
			return "none";
	}
}