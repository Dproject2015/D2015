<?php
		$mid = $_POST['mid'];
		$answers = array(
			"q1" => $_POST['q1'],
			"q2" => $_POST['q2'],
			"q3" => $_POST['q3'],
			"q4" => $_POST['q4'],
			"q5" => $_POST['q5'],
			"q6" => $_POST['q6'],
			"q7" => $_POST['q7'],
			"q8" => $_POST['q8'],
			"q9" => $_POST['q9'],
			"q10" => $_POST['q10'],
			"q11" => $_POST['q11'],
			"q12" => $_POST['q12'],
		);
	?>
<!DOCTYPE html>
<html lang = "ja">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>-Answer Questions-S2 Sorting hat</title>
	<!--スタイルシート-->
	<!--<link rel = "stylesheet" href = "css/animsition.min.css">-->
	<!--<link rel = "stylesheet" type ="text/css" href = "css/mycss.css" media = "all">
	<link rel = "stylesheet" href = "css/textform.css">
	<link rel = "stylesheet" href = "css/component.css">-->
	<link rel="stylesheet" href="css/main.css">
	<!--ファビコン-->
	<link rel="shortcut icon" href="http://cse.eedept.kobe-u.ac.jp/wp-content/uploads/2012/05/eigoUri1.png" type="image/x-icon">
	<!--フォント-->
	<link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:400,700' rel='stylesheet' type='text/css'>
	<!--スクリプト-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type= "text/javascript" src = "lib/footerFixed.js"></script>
	<script src="lib/jquery.fademover.js"></script>
	<!--<script src = "lib/jquery.animsition.min.js"></script>
	<script src = "lib/fadeUpDown.js"></script>-->
	<script src = "lib/modernizr.custom.js"></script>
	<!--フェードイン-->
	<script src="lib/fade.js"></script>
	<!--全て入力されたらリンクを表示-->
	<script src="lib/checkform.js"></script>
	<!--音声再生-->
	<script src="lib/soundbyclick.js"></script>
</head>

<body>
<div id = "contents">
	<div id = "main">
		<div id = "questions">
			<h1>Answer Questions</h1>
			<hr class="grad">
			<p class = "intro">以下の質問に5段階で回答するのだ．<br>
			（<span class="round">1</span> : あてはまらない---<span class="round">3</span> : どちらでもない---<span class="round">5</span> : あてはまる）</p>
			<!--<p>Answer questions</p>-->
			<form action = "./Output/" method="post" name = "basicInfo" class = "ac-custom ac-radio ac-checkmark">
				<!--前ページのデータをhiddenで用意-->
				<input type = "hidden" name = "mid" value = "<?php echo $mid;?>">
				<?php
					foreach($answers as $key => $value){
						echo '<input type = "hidden" name = "'.$key.'" value = "'.$value.'">';
						//echo $key.$value;
					}
				?>
				<ol id = "qList" start = "13">
					<li>睡眠時間絶対削りたくないから
					<ul class = "q">
						<li><input type = "radio" name = "q13" value = "1" id = "q13_1"><label for="q13_1">1</label></li>
						<li><input type = "radio" name = "q13" value = "2" id = "q13_2"><label for="q13_2">2</label></li>
						<li><input type = "radio" name = "q13" value = "3" id = "q13_3"><label for="q13_3">3</label></li>
						<li><input type = "radio" name = "q13" value = "4" id = "q13_4"><label for="q13_4">4</label></li>
						<li><input type = "radio" name = "q13" value = "5" id = "q13_5"><label for="q13_5">5</label></li>
					</ul>
					</li>
					<li>1度しゃべったら友達だよね
					<ul class = "q">
						<li><input type = "radio" name = "q14" value = "1" id = "q14_1"><label for="q14_1">1</label></li>
						<li><input type = "radio" name = "q14" value = "2" id = "q14_2"><label for="q14_2">2</label></li>
						<li><input type = "radio" name = "q14" value = "3" id = "q14_3"><label for="q14_3">3</label></li>
						<li><input type = "radio" name = "q14" value = "4" id = "q14_4"><label for="q14_4">4</label></li>
						<li><input type = "radio" name = "q14" value = "5" id = "q14_5"><label for="q14_5">5</label></li>
					</ul>
					</li>
					<li>物事なんとかなると思ってる
					<ul class = "q">
						<li><input type = "radio" name = "q15" value = "1" id = "q15_1"><label for="q15_1">1</label></li>
						<li><input type = "radio" name = "q15" value = "2" id = "q15_2"><label for="q15_2">2</label></li>
						<li><input type = "radio" name = "q15" value = "3" id = "q15_3"><label for="q15_3">3</label></li>
						<li><input type = "radio" name = "q15" value = "4" id = "q15_4"><label for="q15_4">4</label></li>
						<li><input type = "radio" name = "q15" value = "5" id = "q15_5"><label for="q15_5">5</label></li>
					</ul>
					</li>
					<li>何かと聞き返されることが多い
					<ul class = "q">
						<li><input type = "radio" name = "q16" value = "1" id = "q16_1"><label for="q16_1">1</label></li>
						<li><input type = "radio" name = "q16" value = "2" id = "q16_2"><label for="q16_2">2</label></li>
						<li><input type = "radio" name = "q16" value = "3" id = "q16_3"><label for="q16_3">3</label></li>
						<li><input type = "radio" name = "q16" value = "4" id = "q16_4"><label for="q16_4">4</label></li>
						<li><input type = "radio" name = "q16" value = "5" id = "q16_5"><label for="q16_5">5</label></li>
					</ul>
					</li>
				</ol>
				<!--<input type = "submit" value = "組み分け">-->
			</form>
			<div id="submit">
				<!--リンクでpostする-->
				<!--音声も付与-->
				<a href="javascript:basicInfo.submit()" class="button">ふむふむ…</a>
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
