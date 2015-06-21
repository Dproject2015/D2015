<?php
		$mid = $_POST['mid'];
		//		
		$answers = array(
			"q1" => $_POST['q1'],
			"q2" => $_POST['q2'],
			"q3" => $_POST['q3'],
			"q4" => $_POST['q4'],
		);
		//var_dump($answers);
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type= "text/javascript" src = "lib/footerFixed.js"></script>
	<script src="lib/jquery.fademover.js"></script>
	<!--<script src = "lib/jquery.animsition.min.js"></script>
	<script src = "lib/fadeUpDown.js"></script>-->
	<script src = "lib/modernizr.custom.js"></script>
	<!--フェードイン-->
	<script src="lib/fade.js"></script>
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
			<hr class="grad">
			<p class = "intro">以下の質問に5段階で回答するのだ。<br>
			（<span class="round">1</span> : あてはまらない---<span class="round">3</span> : どちらでもない---<span class="round">5</span> : あてはまる）</p>
			<!--<p>Answer questions</p>-->
			<form action = "question03.php" method="post" name = "basicInfo" class = "ac-custom ac-radio ac-checkmark">
				<!--前ページのデータをhiddenで用意-->
				<input type = "hidden" name = "mid" value = "<?php echo $mid;?>">
				<?php
					foreach($answers as $key => $value){
						echo '<input type = "hidden" name = "'.$key.'" value = "'.$value.'">';
						//echo $key.$value;
					}
				?>
				<!--<input type = "hidden" name = "q1" value = "<?php echo $q1; ?>">
				<input type = "hidden" name = "q2" value = "<?php echo $q2; ?>">
				<input type = "hidden" name = "q3" value = "<?php echo $q3; ?>">
				<input type = "hidden" name = "q4" value = "<?php echo $q4; ?>">-->
				<ol id = "qList" start = "5">
					<li>英語で不意に声をかけられても問題なく対処できる
					<ul class = "q">
						<li><input type = "radio" name = "q5" value = "1" id = "q5_1"><label for="q5_1">1</label></li>
						<li><input type = "radio" name = "q5" value = "2" id = "q5_2"><label for="q5_2">2</label></li>
						<li><input type = "radio" name = "q5" value = "3" id = "q5_3"><label for="q5_3">3</label></li>
						<li><input type = "radio" name = "q5" value = "4" id = "q5_4"><label for="q5_4">4</label></li>
						<li><input type = "radio" name = "q5" value = "5" id = "q5_5"><label for="q5_5">5</label></li>
					</ul>
					</li>
					<li>たいていのスポーツは練習すればできそうだな
					<ul class = "q">
						<li><input type = "radio" name = "q6" value = "1" id = "q6_1"><label for="q6_1">1</label></li>
						<li><input type = "radio" name = "q6" value = "2" id = "q6_2"><label for="q6_2">2</label></li>
						<li><input type = "radio" name = "q6" value = "3" id = "q6_3"><label for="q6_3">3</label></li>
						<li><input type = "radio" name = "q6" value = "4" id = "q6_4"><label for="q6_4">4</label></li>
						<li><input type = "radio" name = "q6" value = "5" id = "q6_5"><label for="q6_5">5</label></li>
					</ul>
					</li>
					<li>声がでかいとよく言われる
					<ul class = "q">
						<li><input type = "radio" name = "q7" value = "1" id = "q7_1"><label for="q7_1">1</label></li>
						<li><input type = "radio" name = "q7" value = "2" id = "q7_2"><label for="q7_2">2</label></li>
						<li><input type = "radio" name = "q7" value = "3" id = "q7_3"><label for="q7_3">3</label></li>
						<li><input type = "radio" name = "q7" value = "4" id = "q7_4"><label for="q7_4">4</label></li>
						<li><input type = "radio" name = "q7" value = "5" id = "q7_5"><label for="q7_5">5</label></li>
					</ul>
					</li>
					<li>イベントごとはできるだけ参加している
					<ul class = "q">
						<li><input type = "radio" name = "q8" value = "1" id = "q8_1"><label for="q8_1">1</label></li>
						<li><input type = "radio" name = "q8" value = "2" id = "q8_2"><label for="q8_2">2</label></li>
						<li><input type = "radio" name = "q8" value = "3" id = "q8_3"><label for="q8_3">3</label></li>
						<li><input type = "radio" name = "q8" value = "4" id = "q8_4"><label for="q8_4">4</label></li>
						<li><input type = "radio" name = "q8" value = "5" id = "q8_5"><label for="q8_5">5</label></li>
					</ul>
					</li>
				</ol>
				<!--<input type = "submit" value = "組み分け">-->
			</form>
			<div id="submit">
				<!--リンクでpostする-->
				<!--音声も付与-->
				<a href="javascript:basicInfo.submit()" class="button">ふむふむ、次の質問にも答えるのだ。</a>
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
