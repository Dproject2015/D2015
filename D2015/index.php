<!DOCTYPE html>
<html lang = "ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>S2 Sorting hat</title>
	<!--スタイルシート-->
	<!--<link rel = "stylesheet" href = "css/animsition.min.css">-->
	<!--<link rel = "stylesheet" type ="text/css" href = "css/mycss.css" media = "all">
	<link rel = "stylesheet" href = "css/textform.css">
	<link rel = "stylesheet" href = "css/component.css">-->
	<link rel="stylesheet" href="css/main.css">
	<!--フォント-->
	<link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900' rel='stylesheet' type='text/css'>
	
	<!--スクリプト-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type= "text/javascript" src = "lib/footerFixed.js"></script>
	<script src="lib/jquery.fademover.js"></script>
	<script src = "lib/modernizr.custom.js"></script>	
	<script>
		$(function(){
			$('#questions').fadeMover({
				'effectType':1,
				'inSpeed':800,
				'outSpeed':800,
				'inDelay':20,
				'outDalay':0,
				'nofadeOut':'nonmover'
			});
		});
	</script>
	<!--全て入力されたらリンクを表示-->
	<script src="lib/checkform.js"></script>
	<!--音声再生-->
	<script>
		var playCount = 0;
		function sound(){
			if(playCount > 0){
				document.getElementById("sound-file").currentTime = 0;
			}
			//[ID:sound-file]の音声ファイルを再生[play()]する
			$("#sound-file").get(0).play();
			//初回再生が終わった判定用に[playcount]の値を0から1に変更
			playCount = 1;
	}
	</script>
</head>

<body>
<div id = "contents">
	<div id = "main">
		<div id = "questions">
			<h1>S2 Sorting Hat</h1>
			<p>君は誰だ？</p>
			<form action = "question01.php" method="post" name = "basicInfo" class = "ac-custom ac-radio ac-checkmark">
				<ol id = "qList">
					<li>名前：<input type = "text" name = "name"></li>
					<li>性別：
						<ul class = "q vertical">
							<li><input type = "radio" name = "gender" value = "男" id = "male"><label for="male">男</label></li>
							<li><input type = "radio" name = "gender" value = "女" id = "female"><label for="female">女</label></li>
						</ul>
					</li>
					<li>配属年：<input type = "number" id = "num" name = "year" placeholder = "<?php echo date(Y);?>" min = "2004" max = "<?php echo date(Y);?>">年</li>
				</ol>
				
				<!--<input type = "submit" value = "Go next">-->
			</form>
			<div id="submit">
				<!--リンクでpostする-->
				<!--音声も付与-->
				<a href="javascript:basicInfo.submit()" class="button">よろしい，では組分けをはじめよう．</a>
			</div>
		</div>
	</div>
	<div id = "footer">
	&copy; TSUKAMOTO TERADA LABORATORY
	</div>
</div>
	<script src = "lib/svgcheckbx.js"></script>
</body>
</html>
