<?php
		$mid = $_POST['mid'];
		//
		$answers = array(
			"q1" => $_POST['q1'],
			"q2" => $_POST['q2'],
			"q3" => $_POST['q3'],
			"q4" => $_POST['q4'],
			"q5" => $_POST['q5'],
			"q6" => $_POST['q6'],
			"q7" => $_POST['q7'],
			"q8" => $_POST['q8'],
		);
	?>
<!DOCTYPE html>
<html lang = "ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>S2 Sorting hat</title>
	<!--スタイルシート-->
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
	<!--<script src = "lib/jquery.animsition.min.js"></script>
	<script src = "lib/fadeUpDown.js"></script>-->
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
	<!--音声再生-->
	<!--全て入力されたらリンクを表示-->
	<script src="lib/checkform.js"></script>
	<script src="lib/soundbyclick.js"></script>
</head>

<body>
<div id = "contents">
	<div id = "main">
		<div id = "questions">
			<h1>Answer Questions</h1>
			<p class = "intro">以下の質問に5段階で回答してください。<br>
			（<span class="round">1</span> : あてはまらない---<span class="round">3</span> : どちらでもない---<span class="round">5</span> : あてはまる）</p>
			<!--<p>Answer questions</p>-->
			<form action = "question04.php" method="post" name = "basicInfo" class = "ac-custom ac-radio ac-checkmark">
				<!--前ページのデータをhiddenで用意-->
				<input type = "hidden" name = "mid" value = "<?php echo $mid;?>">
				<?php
					foreach($answers as $key => $value){
						echo '<input type = "hidden" name = "'.$key.'" value = "'.$value.'">';
						//echo $key.$value;
					}
				?>
				<ol id = "qList" start = "9">
					<li>よく他人を見て、こうしたらもっとキレイに収納できるのにって思う
					<ul class = "q">
						<li><input type = "radio" name = "q9" value = "1" id = "q9_1"><label for="q9_1">1</label></li>
						<li><input type = "radio" name = "q9" value = "2" id = "q9_2"><label for="q9_2">2</label></li>
						<li><input type = "radio" name = "q9" value = "3" id = "q9_3"><label for="q9_3">3</label></li>
						<li><input type = "radio" name = "q9" value = "4" id = "q9_4"><label for="q9_4">4</label></li>
						<li><input type = "radio" name = "q9" value = "5" id = "q9_5"><label for="q9_5">5</label></li>
					</ul>
					</li>
					<li>ベストな体格はもう少し細めだと思う
					<ul class = "q">
						<li><input type = "radio" name = "q10" value = "1" id = "q10_1"><label for="q10_1">1</label></li>
						<li><input type = "radio" name = "q10" value = "2" id = "q10_2"><label for="q10_2">2</label></li>
						<li><input type = "radio" name = "q10" value = "3" id = "q10_3"><label for="q10_3">3</label></li>
						<li><input type = "radio" name = "q10" value = "4" id = "q10_4"><label for="q10_4">4</label></li>
						<li><input type = "radio" name = "q10" value = "5" id = "q10_5"><label for="q10_5">5</label></li>
					</ul>
					</li>
					<li>食事時間だけは犠牲にできないね
					<ul class = "q">
						<li><input type = "radio" name = "q11" value = "1" id = "q11_1"><label for="q11_1">1</label></li>
						<li><input type = "radio" name = "q11" value = "2" id = "q11_2"><label for="q11_2">2</label></li>
						<li><input type = "radio" name = "q11" value = "3" id = "q11_3"><label for="q11_3">3</label></li>
						<li><input type = "radio" name = "q11" value = "4" id = "q11_4"><label for="q11_4">4</label></li>
						<li><input type = "radio" name = "q11" value = "5" id = "q11_5"><label for="q11_5">5</label></li>
					</ul>
					</li>
					<li>異性と絡みたい
					<ul class = "q">
						<li><input type = "radio" name = "q12" value = "1" id = "q12_1"><label for="q12_1">1</label></li>
						<li><input type = "radio" name = "q12" value = "2" id = "q12_2"><label for="q12_2">2</label></li>
						<li><input type = "radio" name = "q12" value = "3" id = "q12_3"><label for="q12_3">3</label></li>
						<li><input type = "radio" name = "q12" value = "4" id = "q12_4"><label for="q12_4">4</label></li>
						<li><input type = "radio" name = "q12" value = "5" id = "q12_5"><label for="q12_5">5</label></li>
					</ul>
					</li>
				</ol>
				<!--<input type = "submit" value = "組み分け">-->
			</form>
			<div id="submit">
				<!--リンクでpostする-->
				<!--音声も付与-->
				<a href="javascript:basicInfo.submit()" class="button">Next questions -></a>
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
