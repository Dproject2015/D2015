$(function(){
	var soundP = 70;
	//塚本先生ボイスファイル
	var TsukaSound = ["a-sounan","eee","illusion","sasuga","seki","sindoiwa","soredeka",
	"sugoiyo","uwa-sugoina","wakaran","warai1","warai2","ahahasoredeka","akanwa","aso",
	"asonan","asugoina","dream","eee2","iine_nakanaka","takaine"];
	//寺田先生ボイスファイル
	var TeraSound = ["amajide","asonanya","barabarayana","funfun","hahaha","hai",
	"haihai","haihai2","haihai3","haihai4","he","naruhodo","naruhodo2","naruhodo3",
	"niiii","soyana","soyana2"];
	$(":radio").change(function(event) {
		//ラジオボタンがチェックされたら
		/* Act on the event */
		//もし#voiceがあれば削除
		if($('#voice')[0]){
			$('#voice').remove();
		}
		var target = $(event.target);
		//選択肢の番号によって分岐させる場合
		var selectedNumber = Number($(target).val());

		//塚本先生ボイスor寺田先生ボイスor鳴らさないを決定
		var voiceflag = TsukaOrTera();
		//結果で条件分岐
		if(voiceflag == "Tsukamoto"){
			//塚本先生ボイスなら
			//配列の長さを取得
			var TsukaVoices = TsukaSound.length-1;
			//乱数で配列の要素番号をランダムに指定
			var TsukaNum = Math.floor(Math.random()*TsukaVoices);
			//num番目の文字列を取得（ファイル名）
			var TsukaSoundedVoice = "tsukamoto/"+TsukaSound[TsukaNum];
			//そのファイル名のaudioタグを生成
			CreateAudio(TsukaSoundedVoice);
			//再生
			var count = 0;
			setTimeout("sound('"+count+"')",1000);
			count = 1;
		}else if(voiceflag=="Terada"){
			var TeraVoices = TeraSound.length-1;
			var TeraNum = Math.floor(Math.random()*TeraVoices);
			var TeraSoundVoices = "terada/"+TeraSound[TeraNum];
			CreateAudio(TeraSoundVoices);
			var count = 0;
			setTimeout("sound('"+count+"')",1000);
			count = 1;
		}
	});
});
function CreateAudio(name){
	var path = "sound/se/voices/";
	//var tsuka = "tsukamoto";
	//var tera = "terada";
	var audio = document.createElement("audio");
	//ID要素を設定
	audio.id="voice";
	//var location = path;
	//src要素を設定
	if(audio.canPlayType("audio/mp3")){
		audio.src=path + "mp3/" + name + ".mp3";
	}else if(audio.canPlayType("audio/wav")){
		audio.src=path + "wav/" + name + ".wav";
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
	var val = Math.floor(Math.random()*2);
	switch(val){
		case 0:
			return "Tsukamoto";
		case 1:
			return "Terada";
		case 2:
			return "none";
	}
}
//選択番号によって鳴らす音を決定する
function SoundFromNumber(num){
	switch(num){
		case 1:
			break;
		case 2:
			break;
		case 3:
			break;
		case 4:
			break;
		case 5:
			break;
		default:
			break;
	}
}