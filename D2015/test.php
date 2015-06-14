<?php
		$mid = $_POST['mid'];
		require_once('accessInfo.php');
		$answers = array(
			$_POST['q1'],
			$_POST['q2'],
			$_POST['q3'],
			$_POST['q4'],
			$_POST['q5'],
			$_POST['q6'],
			$_POST['q7'],
			$_POST['q8'],
			$_POST['q9'],
			$_POST['q10'],
			$_POST['q11'],
			$_POST['q12'],
			$_POST['q13'],
			$_POST['q14'],
			$_POST['q15'],
			$_POST['q16'],
		);
		$conn = mysql_connect('localhost','s2pass','thepass203');
		if($conn){
			//データベース選択
			mysql_select_db($db_name,$conn);
			//回答をDBにINSERT（scoresテーブルにinsert）
			$insert = 'INSERT INTO scores (point,mid,eid) VALUES ';
			$tmp = $answers;
			//var_dump($answers);
			for($i=0;$i<count($answers);$i++){
				$num = $i+1;
				$insert = $insert.'('.$answers[$i].','.$mid.','.$num.')';
				if($i<15){
					$insert = $insert.',';//最後の要素でないとき
				}
			}
			//echo $insert;
			$q = mysql_query($insert,$conn) or die(mysql_error());
			//var_dump($q);
			//個人情報検索（midで個人を検索）
			$search = 'SELECT mname,myear,msex FROM members WHERE mid='.$mid;
			//echo $search;
			$query = mysql_query($search,$conn);
			while($row = mysql_fetch_assoc($query)){
				$name = $row["mname"];
				$year = $row["myear"];
				$gender = $row["msex"];
			}
		}
		/*
		if($gender=="m"){
			$genderStr = "男";
		}else if($gender=="f"){
			$genderStr = "女";
		}else{
			$genderStr = "";
		}
		*/
	?>

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
	<!--ファビコン-->
	<link rel="shortcut icon" href="http://cse.eedept.kobe-u.ac.jp/wp-content/uploads/2012/05/eigoUri1.png" type="image/x-icon">
	<!--フォント-->
	<link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900' rel='stylesheet' type='text/css'>
	
	<!--スクリプト-->
	<!--スクリプト-->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type= "text/javascript" src = "lib/footerFixed.js"></script>
	<script src="lib/jquery.fademover.js"></script>
	<!--<script src = "lib/jquery.animsition.min.js"></script>
	<script src = "lib/fadeUpDown.js"></script>-->
	<script src = "lib/modernizr.custom.js"></script>
	<script type="text/javascript" src="lib/fade.js"></script><script>
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
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script text/javascript>
		google.load('visualization','1.0',{'packages':['corechart']});
		google.setOnLoadCallback(drawChart);
		function drawChart(){
			var data= google.visualization.arrayToDataTable([
				['','評価値'],
				<?php
					foreach($answers as $key => $value){
						echo '[\''.$key.'\','.$value.'],';
					}
				?>
			]);
			var options = {hAxis: {title: '評価値'} };
			var chart = new google.visualization.ColumnChart(document.getElementById('chart'));
			chart.draw(data,options);
		}
	</script>
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
	<!--postされたデータの受け取り-->
	
	<div id = "main">
		<div id = "questions">
			<h1>Your Result</h1>
			
			<?php 
				echo '氏名:'.$name.'('.$year.'年配属)'.'（'.$gender.'）';
			?>
			<div id = "chart"></div>
			<!--<ul>
				<?php
					foreach($answers as $key => $value){
						echo '<li>';
						echo $key.':'.$value;
						echo '</li>';
					}
				?>
			</ul>-->
			<!--<p>Answer questions</p>-->
			
			<div>
			<!--リンクでpostする-->
			<!--音声も付与-->
			<!--<a href="javascript:basicInfo.submit()" class="animsition-link  button" onClick = "sound()">Next questions -></a>-->
				<audio id = "sound-file" preload="auto">
					<source src = "sound/se/page05.mp3" type = "audio/mp3">
					<source src = "sound/se/page05.wav" type = "audio/wav">
				</audio>
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
