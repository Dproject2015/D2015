<?php
		$name = $_POST['name'];
		$year = $_POST['year'];
		$gender = $_POST['gender'];
		require_once('accessInfo.php');
		//var_dump($db_name);
		//dbに接続
		$conn = mysql_connect('localhost','s2pass','thepass203');
		if($conn){
			//データベース選択
			mysql_select_db($db_name,$conn);
			//データベースへの書き込み文
			$insertSQL = 'INSERT INTO members (mname,myear,msex) VALUES ("'.$name.'","'.$year.'","'.$gender.'")';
			//SQL実行（前ページから受け取った名前、年、性別をデータベースに登録
			//echo $insertSQL;
			$query = mysql_query($insertSQL,$conn) or die(mysql_error());
			//echo mysql_info();
			//$mysql_free_result($query);
			$searchSQL = 'SELECT mid FROM members WHERE mname="'.$name.'" AND myear="'.$year.'" AND msex="'.$gender.'"';
			//echo $searchSQL;
			//SQL実行（名前、年、性別で検索をかけ、mid（ユーザに固有の値）を取得）
			$query2 = mysql_query($searchSQL,$conn);
			while($row = mysql_fetch_assoc($query2)){
				$mid = $row["mid"];
			}
			//var_dump($mid);
			//$r = $mysql_fetch_array($query2,'MYSQL_ASSOC');
			//var_dump($r);
			//
			//$mysql_free_result($query2);*/
		}
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
	<!--全て入力されたらリンクを表示-->
	<script src="lib/checkform.js"></script>
	<!--音声再生-->
	<!--ランダム再生-->
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
			<form action = "question02.php" method="post" name = "basicInfo" class = "ac-custom ac-radio ac-checkmark">
				<!--前ページのデータをhiddenで用意-->
				<input type = "hidden" name = "mid" value = "<?php echo $mid;?>">
				<ol id = "qList">
					<li>おしゃれにする方法を私は知っている
					<ul class = "q">
						<li><input type = "radio" name = "q1" value = "1" id = "q1_1"><label for="q1_1">1</label></li>
						<li><input type = "radio" name = "q1" value = "2" id = "q1_2"><label for="q1_2">2</label></li>
						<li><input type = "radio" name = "q1" value = "3" id = "q1_3"><label for="q1_3">3</label></li>
						<li><input type = "radio" name = "q1" value = "4" id = "q1_4"><label for="q1_4">4</label></li>
						<li><input type = "radio" name = "q1" value = "5" id = "q1_5"><label for="q1_5">5</label></li>
					</ul>
					</li>
					<li>盛り上がればとりあえずはOKでしょ？
					<ul class = "q">
						<li><input type = "radio" name = "q2" value = "1" id = "q2_1"><label for="q2_1">1</label></li>
						<li><input type = "radio" name = "q2" value = "2" id = "q2_2"><label for="q2_2">2</label></li>
						<li><input type = "radio" name = "q2" value = "3" id = "q2_3"><label for="q2_3">3</label></li>
						<li><input type = "radio" name = "q2" value = "4" id = "q2_4"><label for="q2_4">4</label></li>
						<li><input type = "radio" name = "q2" value = "5" id = "q2_5"><label for="q2_5">5</label></li>
					</ul>
					</li>
					<li>よく変わっていると言われる
					<ul class = "q">
						<li><input type = "radio" name = "q3" value = "1" id = "q3_1"><label for="q3_1">1</label></li>
						<li><input type = "radio" name = "q3" value = "2" id = "q3_2"><label for="q3_2">2</label></li>
						<li><input type = "radio" name = "q3" value = "3" id = "q3_3"><label for="q3_3">3</label></li>
						<li><input type = "radio" name = "q3" value = "4" id = "q3_4"><label for="q3_4">4</label></li>
						<li><input type = "radio" name = "q3" value = "5" id = "q3_5"><label for="q3_5">5</label></li>
					</ul>
					</li>
					<li>休日は外によくでかける
					<ul class = "q">
						<li><input type = "radio" name = "q4" value = "1" id = "q4_1"><label for="q4_1">1</label></li>
						<li><input type = "radio" name = "q4" value = "2" id = "q4_2"><label for="q4_2">2</label></li>
						<li><input type = "radio" name = "q4" value = "3" id = "q4_3"><label for="q4_3">3</label></li>
						<li><input type = "radio" name = "q4" value = "4" id = "q4_4"><label for="q4_4">4</label></li>
						<li><input type = "radio" name = "q4" value = "5" id = "q4_5"><label for="q4_5">5</label></li>
					</ul>
					</li>
				</ol>
				<!--<input type = "submit" value = "組み分け">-->
			</form>
			<div id="submit">
				<!--リンクでpostする-->
				<!--音声も付与-->
				<a href="javascript:basicInfo.submit()" class="button">なるほど、引き続き答えるのだ。</a>
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
