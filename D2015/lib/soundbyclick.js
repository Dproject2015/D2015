$(function(){
	var soundP = 70;
	var TsukaSound = ["a-sounan","eee","illusion","sasuga","seki","sindoiwa","soredeka",
	"sugoiyo","uwa-sugoina","wakaran","warai1","warai2"];
	var TsukaSerifu = ["あ～そうなん","え～","イリュージョン","さすが","ゴホゴホ","しんどいわ","それでか",
	"すごいよ～","うわ～すごいな","わからん","はっはっは","ははは"];
	$(":radio").change(function(event) {
		//ラジオボタンがチェックされたら
		/* Act on the event */
		//もし#voiceがあれば削除
		if($('#voice')[0]){
			$('#voice').remove();
		}
		var target = $(event.target);
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
		//塚本先生ボイスor寺田先生ボイスor鳴らさないを決定
		var voiceflag = TsukaOrTera();
		//結果で条件分岐
		if(voiceflag == "Tsukamoto"){
			//塚本先生ボイスなら
			//配列の長さを取得
			var voices = TsukaSound.length;
			//乱数で配列の要素番号をランダムに指定
			var num = Math.floor(Math.random()*voices);
			//num番目の文字列を取得（ファイル名）
			var soundedVoice = TsukaSound[num];
			//そのファイル名のaudioタグを生成
			CreateAudio(soundedVoice,0);
			//再生
			var count = 0;
			sound(count);
			count = 1;
		}
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
	//var location = path;
	//src要素を設定
	if(audio.canPlayType("audio/mp3")){
		audio.src=path + dir + "mp3/"+name+".mp3";
	}else if(audio.canPlayType("audio/wav")){
		audio.src=path + dir + "wav/"+name+".wav";
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
	var val = Math.floor(Math.random()*3);
	/*switch(val){
		case 0:
			return "Tsukamoto";
		case 1:
			return "Terada";
		case 2:
			return "none";
	}*/
	return "Tsukamoto";
}